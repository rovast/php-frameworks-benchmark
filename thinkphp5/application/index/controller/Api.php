<?php
namespace app\index\controller;

use app\index\model\Test;

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
}
