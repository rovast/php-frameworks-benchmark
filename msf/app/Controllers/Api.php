<?php
/**
 * 欢迎
 *
 * @author    camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace App\Controllers;

use PG\MSF\Controllers\Controller;

class Api extends Controller
{
    public function actionHello()
    {
        $this->output('hello world');
    }

    public function actionDb()
    {
        $bizLists = yield $this->getMysqlPool('master')->select("*")->from('test')->go();
        $result   = $bizLists['result'][0];
        $this->output($result['name']);
    }

    public function actionSetRedis()
    {
        $result = yield $this->getRedisPool('p1')->set('msf', 'hello world', 60 * 3600);
        $this->output($result);
    }

    public function actionRedis()
    {
        $val = yield $this->getRedisPool('p1')->get('msf');

        $this->output($val);
    }

    public function actionSetPRedis()
    {
        $redis = new \Redis();
        $redis->pconnect('127.0.0.1');
        $result = $redis->set('msf-p', 'hello world', 60 * 3600);
        $this->output($result);
    }

    public function actionPredis()
    {
        $redis = new \Redis();
        $redis->pconnect('127.0.0.1');
        $result = $redis->get('msf-p');
        $this->output($result);
    }
}
