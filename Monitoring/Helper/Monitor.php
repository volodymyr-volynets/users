<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Helper;

use Helper\Cmd;
use Numbers\Users\Monitoring\Model\SessionSequence;
use Numbers\Users\Monitoring\Model\Usages;

class Monitor
{
    /**
     * Usage
     *
     * @var array
     */
    private static $usage = [];

    /**
     * History #
     *
     * @var int
     */
    private static $__history_id;

    /**
     * Initialize
     */
    public function initialize()
    {
        // generate session #
        if (empty($_SESSION['numbers']['flag_monitoring_session_id'])) {
            $model = new SessionSequence();
            $result = $model->nextval();
            $_SESSION['numbers']['flag_monitoring_session_id'] = $result['simple'];
        }
        if (!isset($_SESSION['numbers']['flag_monitoring_steps'])) {
            $_SESSION['numbers']['flag_monitoring_steps'] = [];
        }
        self::$__history_id = \Application::get('flag.global.__history_id');
        if (isset(self::$__history_id)) {
            self::$__history_id = (int) self::$__history_id;
            if (!isset($_SESSION['numbers']['flag_monitoring_steps'][self::$__history_id])) {
                self::$__history_id = null;
            }
        }
        self::$usage = [
            'sm_monusage_tenant_id' => \Tenant::id(),
            'sm_monusage_session_id' => $_SESSION['numbers']['flag_monitoring_session_id'],
            'sm_monusage_timestamp' => \Format::now('timestamp'),
            'sm_monusage_user_id' => \User::id(),
            'sm_monusage_user_ip' => \Request::ip(),
            'sm_monusage_country_code' => $_SESSION['numbers']['ip']['country_code'] ?? null,
            'sm_monusage_resource_id' => null,
            'sm_monusage_duration' => microtime(true),
            'sm_monusage_method' => \Request::method(),
            '\Numbers\Users\Monitoring\Model\Usage\Actions' => []
        ];
        // back link
        if (!empty($_SESSION['numbers']['flag_monitoring_steps'])) {
            if (!isset(self::$__history_id)) {
                end($_SESSION['numbers']['flag_monitoring_steps']);
                $last = current($_SESSION['numbers']['flag_monitoring_steps']);
            } elseif (self::$__history_id == 0) {
                $last = null;
            } else {
                $last = null;
                foreach ($_SESSION['numbers']['flag_monitoring_steps'] as $k => $v) {
                    if ($k == self::$__history_id) {
                        break;
                    }
                    $last = $v;
                }
            }
            if (!empty($last)) {
                \Layout::addAction(
                    'monitoring_back',
                    [
                        'value' => 'Back',
                        'title' => i18n(null, 'Back to [title].', ['replace' => ['[title]' => i18n(null, $last['title'])]]),
                        'icon' => 'fas fa-backward', 'href' => $last['url'],
                        'order' => -100002
                    ]
                );
            }
        }
        // forward link
        if (isset(self::$__history_id)) {
            $last = null;
            foreach (array_reverse($_SESSION['numbers']['flag_monitoring_steps'], true) as $k => $v) {
                if ($k == self::$__history_id) {
                    break;
                }
                $last = $v;
            }
            if (!empty($last)) {
                \Layout::addAction(
                    'monitoring_forward',
                    [
                        'value' => 'Forward',
                        'title' => i18n(null, 'Forward to [title].', ['replace' => ['[title]' => i18n(null, $last['title'])]]),
                        'icon' => 'fas fa-forward', 'href' => $last['url'],
                        'order' => -100001
                    ]
                );
            }
        }
    }

    /**
     * Destroy
     */
    public function destroy()
    {
        if (!empty(self::$usage) && !\Application::get('flag.global.__ajax') && !Cmd::isCli() && empty(\Application::$controller->skip_monitoring)) {
            self::$usage['sm_monusage_user_id'] = \User::id();
            self::$usage['sm_monusage_duration'] = round(microtime(true) - self::$usage['sm_monusage_duration'], 4);
            self::$usage['sm_monusage_resource_id'] = \Application::$controller->controller_id ?? null;
            self::$usage['sm_monusage_resource_name'] = \Application::$controller->title ?? (isset(\Application::$controller) ? get_class(\Application::$controller) : 'Unknown');
            // get sequence last
            $usages_model = new Usages();
            $usages_model->db_object->begin();
            self::$usage['sm_monusage_id'] = $usages_model->sequence('sm_monusage_id');
            // usage actions
            $usage_actions = \Application::$controller->getUsageActions();
            if (!empty($usage_actions)) {
                foreach ($usage_actions as $k => $v) {
                    self::$usage['\Numbers\Users\Monitoring\Model\Usage\Actions'][] = [
                        'sm_monusgact_action_id' => ($k + 1),
                        'sm_monusgact_usage_code' => $v['usage_code'],
                        'sm_monusgact_message' => $v['message'],
                        'sm_monusgact_replace' => $v['replace'],
                        'sm_monusgact_affected_rows' => $v['affected_rows'],
                        'sm_monusgact_error_rows' => $v['error_rows'],
                        'sm_monusgact_url' => $v['url'],
                        'sm_monusgact_history' => $v['history']
                    ];
                }
                // update history in reverse order
                foreach (array_reverse($usage_actions) as $k => $v) {
                    if (!empty($v['history']) && !empty($v['url'])) {
                        $this->updateHistory($v['url'] . '', \Application::$controller->title ?? '');
                        break;
                    }
                }
            }
            // add data to database
            $collection = new \Numbers\Users\Monitoring\Model\Collection\Usages();
            $collection->merge(self::$usage);
            $usages_model->db_object->commit();
        }
    }

    /**
     * Update history
     *
     * @param string $url
     * @param string $title
     */
    private function updateHistory(string $url, string $title)
    {
        // we do not add history if we preview history link
        if (isset(self::$__history_id)) {
            return;
        }
        if (empty($_SESSION['numbers']['flag_monitoring_steps'])) {
            return;
        }
        end($_SESSION['numbers']['flag_monitoring_steps']);
        $key = key($_SESSION['numbers']['flag_monitoring_steps']);
        $key += 1;
        $_SESSION['numbers']['flag_monitoring_steps'][$key] = [
            'url' => $url,
            'title' => $title,
        ];
        $_SESSION['numbers']['flag_monitoring_steps'][$key]['url'] .= '&__history_id=' . $key;
        // we only keep 5 items in history
        $counter = 0;
        foreach (array_reverse($_SESSION['numbers']['flag_monitoring_steps'], true) as $k => $v) {
            if ($counter >= 10) {
                unset($_SESSION['numbers']['flag_monitoring_steps'][$k]);
            }
            $counter++;
        }
    }
}
