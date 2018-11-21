<?php

$redis = new \Redis();
$redis->pconnect('127.0.0.1');
$redis->set('php-pconnect', 'hello world', 60 * 3600);
