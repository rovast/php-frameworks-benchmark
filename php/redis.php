<?php

$redis = new \Redis();
$redis->connect('127.0.0.1');

$result = $redis->get('php');
echo $result;

$redis->close();