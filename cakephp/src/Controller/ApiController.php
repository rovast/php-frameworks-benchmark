<?php

namespace App\Controller;

/**
 * Class ApiController
 *
 * @package \App\Controller
 */
class ApiController extends AppController
{
    public function hello()
    {
        return $this->response->withStringBody('hello world');
    }
}
