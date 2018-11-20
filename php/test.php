<?php

class ApiController {
    public function hello()
    {
        echo "hello world";
    }
}

$controller = new ApiController();
$controller->hello();
