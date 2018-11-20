<?php

namespace App\Http\Controllers;

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
}
