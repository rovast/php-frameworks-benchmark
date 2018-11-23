<?php

require_once "/var/www/html/xhgui/external/header.php";

\xhprof_enable(XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_CPU);

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'benchmark',
    'username'  => 'benchmark',
    'password'  => 'benchmark',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$result = Capsule::table('test')->first()->name;



// stop profiler
$xhprof_data = xhprof_disable();

// display raw xhprof data for the profiler run
print_r($xhprof_data);

include_once __DIR__ . '/xhprof_lib.php';
include_once __DIR__ . '/xhprof_runs.php';

// save raw data for this profiler run using default
// implementation of iXHProfRuns.
$xhprof_runs = new XHProfRuns_Default();

// save the run under a namespace "xhprof_foo"
$run_id = $xhprof_runs->save_run($xhprof_data, 'php-orm');
