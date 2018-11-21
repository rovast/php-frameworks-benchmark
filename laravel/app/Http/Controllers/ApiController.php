<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        $result = DB::table('test')->where('id', 1)->first();
        echo $result->name;
    }

    public function setRedis()
    {
        Cache::add('laravel', 'hello redis', 60);
    }

    public function redis()
    {
        $result = Cache::get('laravel');
        return $result;
    }
}
