<?php

namespace app\index\controller;

use app\index\model\Test;
use think\Cache;

class Api
{
    public function hello()
    {
        return 'hello world';
    }

    public function db()
    {
        $result = Test::get(1);
        return $result->name;
    }

    public function setRedis()
    {
        cache('thinkphp5', 'hello world', 60 * 3600);
    }

    public function redis()
    {
        $result = cache('thinkphp5');
        return $result;
    }
}
