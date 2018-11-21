<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

/**
 * Class ApiController
 *
 * @package \App\Http\Controllers
 */
class ApiController extends Controller
{
    public function hello()
    {
        return response('hello world');
    }

    public function db()
    {
        $result = app('db')->select('SELECT * FROM `test`');
        return $result[0]->name;
    }

    public function setRedis()
    {
        Cache::add('lumen', 'hello world', 60);
    }

    public function redis()
    {
        $result = Cache::get('lumen');
        return $result;
    }
}
