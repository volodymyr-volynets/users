<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\TaskScheduler\Abstract2;

use Numbers\Users\TaskScheduler\Model\Collection\Tasks;

abstract class Task
{
    /**
     * Task code
     *
     * @var string
     */
    public $task_code;

    /**
     * Task data
     *
     * @var array
     */
    public $task_data;

    /**
     * Parameters
     *
     * @var array
     */
    public $parameters = [];

    /**
     * Options
     *
     * @var array
     */
    public $options = [];

    /**
     * Now
     *
     * @var string
     */
    public static $now;

    /**
     * Execute
     *
     * @param array $parameters
     * @param array $options
     * @return array
     *		success
     *		error
     *		data
     */
    abstract public function execute(array $parameters, array $options = []): array;

    /**
     * Constructor
     *
     * @param array $parameters
     * @param array $options
     */
    public function __construct(array $parameters, array $options = [])
    {
        $this->parameters = $parameters ?? [];
        $this->options = $options ?? [];
        // sanity check
        if (empty($this->task_code)) {
            throw new \Exception('task code?');
        }
        // load task
        $model = new Tasks();
        $data = $model->get([
            'where' => [
                'ts_task_code' => $this->task_code
            ]
        ]);
        if (!$data['success'] || empty($data['data'][$this->task_code])) {
            throw new \Exception('task code?');
        }
        $this->task_data = $data['data'][$this->task_code];
    }

    /**
     * Process
     *
     * @return array
     */
    public function process(array $options = [])
    {
        $result = [
            'success' => false,
            'error' => []
        ];
        // process parameters
        foreach ($this->task_data['\Numbers\Users\TaskScheduler\Model\TaskParameters'] as $k => $v) {
            if (!empty($v['ts_tskparam_mandatory'])) {
                if (empty($this->parameters[$v['ts_tskparam_name']])) {
                    $result['error'][] = 'Missing parameter: ' . $v['ts_tskparam_name'];
                }
            }
        }
        if (!empty($result['error'])) {
            return $result;
        }
        // execute
        $this->options = array_merge_hard($this->options, $options);
        $this->options['datetime'] = self::now();
        \Alive::start();
        $result = $this->execute($this->parameters, $this->options);
        \Alive::stop();
        // todo: send email notification
        return $result;
    }

    /**
     * Now
     *
     * @return string
     */
    public static function now()
    {
        if (!empty(self::$now)) {
            $result = self::$now;
        } else {
            $result = \Format::now('datetime');
        }
        return $result;
    }
}
