<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class ApiController
 */
class ApiController
{
    public function hello()
    {
        return new Response('hello world');
    }
}
