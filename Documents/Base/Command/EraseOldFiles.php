<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Documents\Base\Command;

use Numbers\Backend\System\ShellCommand\Class2\ShellCommands;
use Numbers\Users\Documents\Base\Base;

class EraseOldFiles extends ShellCommands
{
    public $code = 'DT::ERASE_OLD_FILES';
    public $name = 'D/T Erase Old Files (Command)';
    public $command = 'dt_erase_old_files';
    public $columns = [
        'tenant_id' => ['required' => true, 'name' => 'Tenant #', 'domain' => 'tenant_id'],
        'start_date' => ['sometimes' => true, 'name' => 'Start Date', 'type' => 'date', 'null' => true],
        'end_date' => ['sometimes' => true, 'name' => 'End Date', 'type' => 'date', 'null' => true],
        'dry_run' => ['required' => true, 'name' => 'Dry Run', 'type' => 'yes/no'],
    ];

    public function execute(array $parameters, array $options = []): array
    {
        $result = [
            'success' => false,
            'error' => [],
            'hint' => [],
        ];
        $db_object = new \Db('default');
        // extract
        extract($parameters);
        // query
        $sql = <<<SQL
            SELECT
                *
            FROM public.dt_files
            WHERE 1=1
                AND dt_file_url IS NULL
                AND dt_file_path LIKE '$tenant_id/%'
                AND dt_file_inserted_timestamp::date BETWEEN '$start_date' AND '$end_date'
                AND dt_file_erased = 0
SQL;
        //echo $sql;
        $files = $db_object->query($sql, 'dt_file_id');
        $result['hint'][] = 'Total files to be erased is: ' . count($files['rows']);
        if ($dry_run == 'y' || $dry_run == 'yes') {
            return $result;
        }
        // erase files
        $index = 1;
        foreach ($files['rows'] as $k => $v) {
            $file_model = new Base();
            $file_result = $file_model->delete($v['dt_file_id'], ['erase' => true]);
            if (!$file_result['success']) {
                $result['error'] = $file_result['error'];
                return $result;
            }
            $result['hint'][] = 'Erased ' . $k . ' storage: ' . $v['dt_file_storage_id'] . ' path: ' . $v['dt_file_path'];
            // echo dot every 5 records
            if ($index % 5) {
                echo '.';
            }
            $index++;
        }
        return $result;
    }
}
