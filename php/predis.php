<?php

$redis = new \Redis();
$redis->pconnect('127.0.0.1');

$result = $redis->get('php-pconnect');
echo $result;
