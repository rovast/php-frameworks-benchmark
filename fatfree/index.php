<?php

require_once "/var/www/html/xhgui/external/header.php";

// Kickstart the framework
$f3 = require('lib/base.php');

$f3->set('DEBUG', 1);
if ((float)PCRE_VERSION < 7.9)
    trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');

$f3->route('GET /',
    function ($f3) {
        $classes = array(
            'Base'         =>
                array(
                    'hash',
                    'json',
                    'session',
                    'mbstring',
                ),
            'Cache'        =>
                array(
                    'apc',
                    'apcu',
                    'memcache',
                    'memcached',
                    'redis',
                    'wincache',
                    'xcache',
                ),
            'DB\SQL'       =>
                array(
                    'pdo',
                    'pdo_dblib',
                    'pdo_mssql',
                    'pdo_mysql',
                    'pdo_odbc',
                    'pdo_pgsql',
                    'pdo_sqlite',
                    'pdo_sqlsrv',
                ),
            'DB\Jig'       =>
                array('json'),
            'DB\Mongo'     =>
                array(
                    'json',
                    'mongo',
                ),
            'Auth'         =>
                array('ldap', 'pdo'),
            'Bcrypt'       =>
                array(
                    'mcrypt',
                    'openssl',
                ),
            'Image'        =>
                array('gd'),
            'Lexicon'      =>
                array('iconv'),
            'SMTP'         =>
                array('openssl'),
            'Web'          =>
                array('curl', 'openssl', 'simplexml'),
            'Web\Geo'      =>
                array('geoip', 'json'),
            'Web\OpenID'   =>
                array('json', 'simplexml'),
            'Web\Pingback' =>
                array('dom', 'xmlrpc'),
        );
        $f3->set('classes', $classes);
        $f3->set('content', 'welcome.htm');
        echo View::instance()->render('layout.htm');
    }
);

$f3->route('GET /userref',
    function ($f3) {
        $f3->set('content', 'userref.htm');
        echo View::instance()->render('layout.htm');
    }
);

$f3->route('GET /api/hello',
    function ($f3) {
        echo 'hello world';
    }
);

$f3->route('GET /api/db',
    function ($f3) {
        $db = new DB\SQL(
            'mysql:host=localhost;port=3306;dbname=benchmark',
            'benchmark',
            'benchmark'
        );

        $result = $db->exec('SELECT * FROM `test`');
        echo $result[0]['name'];
    }
);

$f3->route('GET /api/setRedis',
    function ($f3) {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $redis->set('fatfree', 'hello world', 60 * 3600);
        echo $redis->close();
    }
);

$f3->route('GET /api/redis',
    function ($f3) {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $result = $redis->get('fatfree');
        echo $result;
    }
);

$f3->route('GET /api/setPRedis',
    function ($f3) {
        $redis = new \Redis();
        $redis->pconnect('127.0.0.1');
        echo $redis->set('fatfree-p', 'hello world', 60 * 3600);
    }
);

$f3->route('GET /api/predis',
    function ($f3) {
        $redis = new \Redis();
        $redis->pconnect('127.0.0.1');
        $result = $redis->get('fatfree-p');
        echo $result;
    }
);

$f3->run();
