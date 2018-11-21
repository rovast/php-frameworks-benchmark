<?php
/**
 * 欢迎
 *
 * @author camera360_server@camera360.com
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
}
