<?php

class Controller_Api extends Controller_Rest
{
    public function action_hello()
    {
        return $this->response('hello world');
    }
}
