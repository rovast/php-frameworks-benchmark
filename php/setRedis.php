<?php

$redis = new \Redis();
$redis->connect('127.0.0.1');
$redis->set('php', 'hello world', 60 * 3600);
$redis->close();
