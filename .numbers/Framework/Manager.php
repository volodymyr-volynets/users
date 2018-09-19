<?php
/**
 * Repository manager
 */
// command line parameters
$type = $argv[1];
$mode = $argv[2];
$verbose = $argv[3] ?? false;
$skip_confirmation = $argv[4] ?? false;
// timer
$start_time = microtime(true);
// include helpers
require('Functions.php');
require('Models.php');
require('Helper/Cmd.php');
require('Helper/File.php');
// must change working directory to one level above
chdir('../');
$working_directory = getcwd() . DIRECTORY_SEPARATOR;
// increase in memory and unlimited execution time
ini_set('memory_limit', '2048M');
set_time_limit(0);
// confirmation whether to run the script
if (empty($skip_confirmation) || $skip_confirmation == 2) {
	if (!\Helper\Cmd::confirm("Conitune operation \"$type\" with mode \"$mode\"?")) exit;
}
// define result variable to keep scripts messages
$result = [
	'success' => false,
	'error' => [],
	'hint' => []
];
// wrapping everything into try-catch block for system exceptions
try {
	// running proper class
	switch ($type) {
		// versions - mode: test, commit
		case 'version':
		default:
			$result = \Helper\Cmd::executeCommand('git add --all');
			if (!$result['success']) {
				break;
			}
			// check for trailing spaces
			$result = \Helper\Cmd::executeCommand('git diff --cached --check');
			if (!$result['success']) {
				$result['error'] = array_merge($result['error'], $result['data']);
				break;
			}
			// load changed files
			$result = \Helper\Cmd::executeCommand('git diff --cached --numstat');
			if (!$result['success']) {
				break;
			}
			if (empty($result['data'])) {
				echo "\n" . \Helper\Cmd::colorString('Nothing to commit!', 'green', null, true) . "\n\n";
				break;
			}
			// find all changed files
			$files = [];
			$totals = ['addition' => 0, 'deletion' => 0];
			foreach ($result['data'] as $v) {
				$v = explode("\t", $v);
				$files[$v[2]] = [
					'shortname' => $v[2],
					'pathname' => realpath($v[2]),
					'filename' => basename($v[2]),
					'addition' => (int) $v[0],
					'deletion' => (int) $v[1],
					'directory' => realpath(dirname($v[2])),
				];
				$totals['addition']+= (int) $v[0];
				$totals['deletion']+= (int) $v[1];
			}
			// load all module.ini files
			$modules = [];
			$temp = \Helper\File::iterate($working_directory, ['recursive' => true, 'extended' => true, 'relative_path' => true, 'only_files' => ['module.ini']]);
			usort($temp, function($a, $b) { return strlen($b['pathname']) - strlen($a['pathname']); });
			foreach ($files as $k2 => $v2) {
				foreach ($temp as $k => $v) {
					if (stripos($v2['pathname'], $v['directory']) !== false) {
						if (!isset($modules[$v['directory']])) {
							$modules[$v['directory']] = [
							    'module' => $v,
							    'data' => [],
							    'files' => [],
							    'totals' => ['addition' => 0, 'deletion' => 0],
							];
							// load ini file
							$temp2 = parse_ini_file($v['pathname'], true);
							$modules[$v['directory']]['data'] = $temp2['module'];
							// validate module parameters
							foreach (['module.name', 'module.title', 'module.version'] as $v3) {
								if (empty($temp2['module'][$v3])) {
									$result['error'][] = 'Missing ' . $v3 . ' in ' . $v['pathname'];
								}
							}
							if (!empty($result['error'])) {
								goto error;
							}
						}
						$modules[$v['directory']]['files'][$k2] = $v2;
						$modules[$v['directory']]['totals']['addition']+= $v2['addition'];
						$modules[$v['directory']]['totals']['deletion']+= $v2['deletion'];
						break;
					}
				}
			}
			unset($temp, $files);
			// load repository information
			$temp = parse_ini_file($working_directory . DIRECTORY_SEPARATOR . 'module.ini', true);
			$repository = $temp['module'] ?? [];
			foreach (['module.name', 'module.title', 'module.version', 'module.repository'] as $v3) {
				if (empty($repository[$v3])) {
					$result['error'][] = 'Missing ' . $v3 . ' in module.ini';
				}
			}
			if (!empty($result['error'])) {
				goto error;
			}
			// load git information
			$git = ['last_tag' => ''];
			$git_result = \Helper\Cmd::executeCommand('git describe --tags');
			$git['last_tag'] = $git_result['data'][0] ?? '';
			// username / email
			$git_config = \Helper\Cmd::executeCommand('git config --list');
			if (!$git_config['success']) {
				break;
			}
			$git_params = parse_ini_string(implode("\n", $git_config['data']));
			if (empty($git_params['user.name'])) {
				$result['error'][] = 'Missing user.name in git config file';
			}
			if (empty($git_params['user.email'])) {
				$result['error'][] = 'Missing user.name in git config file';
			}
			if (!empty($git_params['core.ignorecase'])) {
				$result['error'][] = 'Set core.ignorecase to false in git config file';
			}
			if (!empty($result['error'])) {
				goto error;
			}
			// print statistics
			$stats = [];
			$stats[] = 'Repository / Git:';
				$stats[] = "\tName: " . $repository['module.name'];
				$stats[] = "\tTitle: " . $repository['module.title'];
				$stats[] = "\tVersion: " . $repository['module.version'];
				$stats[] = "\tLast Tag: " . $git['last_tag'];
				$stats[] = "\tUser Name: " . $git_params['user.name'];
				$stats[] = "\tUser Email: " . $git_params['user.email'];
			$stats[] = 'Statistics:';
			$stats[] = "\tAddition: " . \Helper\Cmd::colorString($totals['addition'], 'green', null, true);
			$stats[] = "\tDeletion: " . \Helper\Cmd::colorString($totals['deletion'], 'red', null, true);
			$stats[] = 'Modules:';
			foreach ($modules as $k => $v) {
				$temp = "\t" . $v['data']['module.title'] . ' (' . $v['data']['module.name'] . ', ' . $v['data']['module.version'] . ')';
				$temp = str_pad($temp, 90, ' ', STR_PAD_RIGHT);
				$temp.= ' | ';
				$temp.= \Helper\Cmd::colorString(str_pad($v['totals']['addition'], 5, ' ', STR_PAD_LEFT), $v['totals']['addition'] > 0 ? 'green' : null, null, true);
				$temp.= \Helper\Cmd::colorString(str_pad($v['totals']['deletion'], 5, ' ', STR_PAD_LEFT), $v['totals']['deletion'] > 0 ? 'red' : null, null, true);
				$stats[] = $temp;
				// print files
				foreach ($v['files'] as $k2 => $v2) {
					$temp = "\t\t";
					$temp.= \Helper\Cmd::colorString(str_pad($v2['addition'], 5, ' ', STR_PAD_LEFT), $v2['addition'] > 0 ? 'green' : null, null, true);
					$temp.= \Helper\Cmd::colorString(str_pad($v2['deletion'], 5, ' ', STR_PAD_LEFT), $v2['deletion'] > 0 ? 'red' : null, null, true);
					$temp.= "\t | " . $v2['shortname'];
					$stats[] = $temp;
				}
			}
			// preparing to commit
			if ($mode == 'commit') {
				// show what is going on
				echo "\n" . \Helper\Cmd::colorString(implode("\n", $stats), null, null, false) . "\n\n";
				$commit = ['number_of_questions' => 0, 'answers' => []];
				// ask questions
				$commit['number_of_questions'] = \Helper\Cmd::ask('How many tickets were resolved?', ['mandatory' => true, 'function' => 'intval']);
				for ($i = 1; $i <= $commit['number_of_questions']; $i++) {
reask_type:
					$commit['answers'][$i]['type'] = \Helper\Cmd::ask('Type (' . print_options_array($numbers_enhancement_types) . ')', ['mandatory' => true]);
					if (!in_array($commit['answers'][$i]['type'], array_keys($numbers_enhancement_types))) goto reask_type;
					$commit['answers'][$i]['group'] = \Helper\Cmd::ask('Group', ['mandatory' => true]);
					$commit['answers'][$i]['ticket'] = \Helper\Cmd::ask('Ticket #', ['mandatory' => true, 'function' => 'intval']);
					$commit['answers'][$i]['notes'] = \Helper\Cmd::ask('Notes', ['mandatory' => true]);
				}
				// generate commit message
				$message = '';
				$temp = [];
				foreach ($commit['answers'] as $k => $v) {
					if (!isset($temp[$v['group']])) {
						$temp[$v['group']] = [];
					}
					$temp[$v['group']][]= "\t" . $numbers_enhancement_types[$v['type']] . ' #' . $v['ticket'] . ' (' . $v['notes'] . ')';
				}
				$short = [];
				$changes = [];
				foreach ($temp as $k => $v) {
					$short[$k] = $k;
					$message.= $k . ":\n" . implode("\n", $v);
					$changes[$k] = '<li>' . implode('</li><li>', $v) . '</li>';
				}
				$message = implode(', ', $short) . "\n\n" . $message;
				$changes_formatted = '<ul>';
				foreach ($changes as $k => $v) {
					$changes_formatted.= '<li>';
						$changes_formatted.= $k;
						$changes_formatted.= '<ul>' . $v . '</ul>';
					$changes_formatted.= '</li>';
				}
				$changes_formatted.= '</ul>';
				// bump versions
				$repository_version = null;
				foreach ($modules as $k => $v) {
					$version = version_increment($v['data']['module.version']);
					if (!empty($v['data']['module.repository'])) {
						$repository_version = $version;
					}
					$temp = \Helper\File::replace($v['module']['pathname'], 'module.version', 'module.version = "' . $version . '"');
					if (!$temp) {
						$result['error'][] = 'Could not increase version!';
						goto error;
					}
				}
				if (empty($repository_version)) {
					$repository_version = version_increment($repository['module.version']);
					$temp = \Helper\File::replace($working_directory . DIRECTORY_SEPARATOR . 'module.ini', 'module.version', 'module.version = "' . $repository_version . '"');
					if (!$temp) {
						$result['error'][] = 'Could not increase version!';
						goto error;
					}
				}
				// create change log file
				$stats = [];
				$stats[] = 'Repository / Git:';
					$stats[] = "\tName: " . $repository['module.name'];
					$stats[] = "\tTitle: " . $repository['module.title'];
					$stats[] = "\tVersion: " . $repository['module.version'];
					$stats[] = "\tLast Tag: " . $git['last_tag'];
					$stats[] = "\tUser Name: " . $git_params['user.name'];
					$stats[] = "\tUser Email: " . $git_params['user.email'];
				$stats[] = 'Statistics:';
				$stats[] = "\tAddition: " . $totals['addition'];
				$stats[] = "\tDeletion: " . $totals['deletion'];
				$stats[] = 'Modules:';
				foreach ($modules as $k => $v) {
					$temp = "\t" . $v['data']['module.title'] . ' (' . $v['data']['module.name'] . ', ' . $v['data']['module.version'] . ')';
					$temp = str_pad($temp, 90, ' ', STR_PAD_RIGHT);
					$temp.= ' | ';
					$temp.= str_pad($v['totals']['addition'], 5, ' ', STR_PAD_LEFT);
					$temp.= str_pad($v['totals']['deletion'], 5, ' ', STR_PAD_LEFT);
					$stats[] = $temp;
					// print files
					foreach ($v['files'] as $k2 => $v2) {
						$temp = "\t\t";
						$temp.= str_pad($v2['addition'], 5, ' ', STR_PAD_LEFT);
						$temp.= str_pad($v2['deletion'], 5, ' ', STR_PAD_LEFT);
						$temp.= "\t | " . $v2['shortname'];
						$stats[] = $temp;
					}
				}
				$replaces = [
				    '[version]' => $repository_version,
				    '[date_commit]' => date('Y-m-d'),
				    '[changes]' => $changes_formatted,
				    '[affected_files]' => implode("\n", $stats)
				];
				$template = \Helper\File::read($working_directory . '.numbers' . DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR . 'ChangeLog.html');
				$template = str_replace(array_keys($replaces), array_values($replaces), $template);
				$change_log_filename = date('YmdHis') . '_' . $repository_version . '.html';
				if (!\Helper\File::write($working_directory . '.numbers' . DIRECTORY_SEPARATOR . 'ChangeLogs' . DIRECTORY_SEPARATOR . $change_log_filename, $template)) {
					$result['error'][] = 'Could not write to change log file!';
					break;
				}
				// git add all
				$result = \Helper\Cmd::executeCommand('git add --all');
				if (!$result['success']) {
					break;
				}
				// commit
				$result = \Helper\Cmd::executeCommand('git commit -m "' . (str_replace('"', '\"', $message)) . '"');
				if (!$result['success']) {
					break;
				}
				// tag
				$result = \Helper\Cmd::executeCommand('git tag ' . $repository_version);
				if (!$result['success']) {
					break;
				}
			} else {
				$result['hint'] = array_merge($result['hint'] ?? [], $stats);
			}
	}
// error label
error:
	// hint
	if (!empty($result['hint'])) {
		echo "\n" . \Helper\Cmd::colorString(implode("\n", $result['hint']), null, null, false) . "\n\n";
	}
	// if we did not succeed
	if (!empty($result['error'])) {
		echo "\n" . \Helper\Cmd::colorString(implode("\n", $result['error']), 'red', null, true) . "\n\n";
		exit;
	}
} catch (Exception $e) {
	echo "\n" . \Helper\Cmd::colorString($e->getMessage(), 'red', null, true) . "\n\n" . $e->getTraceAsString() . "\n\n";
	exit;
}

// success message
$seconds = microtime(true) - $start_time;
echo "\nOperation \"$type\" with mode \"$mode\" completed in {$seconds} seconds!\n\n";