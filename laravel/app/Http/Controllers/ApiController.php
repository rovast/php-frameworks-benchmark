<?php

namespace App\Http\Controllers;

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
}
