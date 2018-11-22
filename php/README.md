### php 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8011/test.php`
run `ab -n 1000 -c 1 http://127.0.0.1:8011/db.php`
run `ab -n 1 -c 1 http://127.0.0.1:8011/setRedis.php`
run `ab -n 1000 -c 1 http://127.0.0.1:8011/redis.php`

run `ab -n 1 -c 1 http://127.0.0.1:8011/setPRedis.php`
run `ab -n 1000 -c 1 http://127.0.0.1:8011/predis.php`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8011/test.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /test.php
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   8.444 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    5921.02 [#/sec] (mean)
Time per request:       0.169 [ms] (mean)
Time per request:       0.169 [ms] (mean, across all concurrent requests)
Transfer rate:          861.56 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.0      0       5
Waiting:        0    0   0.0      0       4
Total:          0    0   0.0      0       5

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      5 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8011/test.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /test.php
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   2.473 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    20215.67 [#/sec] (mean)
Time per request:       0.247 [ms] (mean)
Time per request:       0.049 [ms] (mean, across all concurrent requests)
Transfer rate:          2941.54 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.0      0     212
Waiting:        0    0   1.0      0     212
Total:          0    0   1.0      0     212

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%    212 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8011/test.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /test.php
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.066 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    24196.09 [#/sec] (mean)
Time per request:       0.413 [ms] (mean)
Time per request:       0.041 [ms] (mean, across all concurrent requests)
Transfer rate:          3520.72 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    0   0.2      0       5
Waiting:        0    0   0.2      0       5
Total:          0    0   0.2      0       5

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      1
  95%      1
  98%      1
  99%      1
 100%      5 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8011/test.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /test.php
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   1.979 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    25267.66 [#/sec] (mean)
Time per request:       0.792 [ms] (mean)
Time per request:       0.040 [ms] (mean, across all concurrent requests)
Transfer rate:          3676.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       1
Processing:     0    1   0.3      1       6
Waiting:        0    1   0.3      1       6
Total:          0    1   0.3      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%      6 (longest request)
```

**5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8011/db.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /db.php
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   25.545 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1957.36 [#/sec] (mean)
Time per request:       0.511 [ms] (mean)
Time per request:       0.511 [ms] (mean, across all concurrent requests)
Transfer rate:          284.81 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0      14
Waiting:        0    0   0.1      0       3
Total:          0    0   0.1      0      14

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%     14 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8011/db.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /db.php
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   6.728 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7431.98 [#/sec] (mean)
Time per request:       0.673 [ms] (mean)
Time per request:       0.135 [ms] (mean, across all concurrent requests)
Transfer rate:          1081.41 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   1.3      1     209
Waiting:        0    1   1.3      1     209
Total:          0    1   1.3      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8011/db.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /db.php
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   5.823 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    8586.92 [#/sec] (mean)
Time per request:       1.165 [ms] (mean)
Time per request:       0.116 [ms] (mean, across all concurrent requests)
Transfer rate:          1249.46 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.0      1     209
Waiting:        0    1   1.0      1     209
Total:          1    1   1.0      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8011/db.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /db.php
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   5.984 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    8355.32 [#/sec] (mean)
Time per request:       2.394 [ms] (mean)
Time per request:       0.120 [ms] (mean, across all concurrent requests)
Transfer rate:          1215.76 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     1    2   0.5      2      13
Waiting:        1    2   0.5      2      13
Total:          1    2   0.5      2      13

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      3
  98%      4
  99%      5
 100%     13 (longest request)
```

**6.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8011/redis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /redis.php
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   13.853 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    3609.36 [#/sec] (mean)
Time per request:       0.277 [ms] (mean)
Time per request:       0.277 [ms] (mean, across all concurrent requests)
Transfer rate:          525.19 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    0   0.1      0       4
Waiting:        0    0   0.1      0       4
Total:          0    0   0.1      0       4

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      4 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8011/redis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /redis.php
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   4.992 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10015.64 [#/sec] (mean)
Time per request:       0.499 [ms] (mean)
Time per request:       0.100 [ms] (mean, across all concurrent requests)
Transfer rate:          1457.35 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.4      0     209
Waiting:        0    0   1.4      0     209
Total:          0    0   1.4      0     209

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      1
  95%      1
  98%      2
  99%      4
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8011/redis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /redis.php
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   4.526 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    11048.46 [#/sec] (mean)
Time per request:       0.905 [ms] (mean)
Time per request:       0.091 [ms] (mean, across all concurrent requests)
Transfer rate:          1607.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   1.7      1     212
Waiting:        0    1   1.7      1     212
Total:          0    1   1.7      1     212

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      2
  98%      5
  99%      6
 100%    212 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8011/redis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /redis.php
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   4.083 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    12246.58 [#/sec] (mean)
Time per request:       1.633 [ms] (mean)
Time per request:       0.082 [ms] (mean, across all concurrent requests)
Transfer rate:          1781.97 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    2   2.0      1     209
Waiting:        0    2   2.0      1     209
Total:          1    2   2.0      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%     10
  99%     13
 100%    209 (longest request)
```

**7.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8011/predis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /predis.php
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   10.595 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    4719.15 [#/sec] (mean)
Time per request:       0.212 [ms] (mean)
Time per request:       0.212 [ms] (mean, across all concurrent requests)
Transfer rate:          686.67 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0      21
Waiting:        0    0   0.0      0       1
Total:          0    0   0.1      0      21

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%     21 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8011/predis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /predis.php
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   3.059 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    16345.02 [#/sec] (mean)
Time per request:       0.306 [ms] (mean)
Time per request:       0.061 [ms] (mean, across all concurrent requests)
Transfer rate:          2378.33 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.3      0     212
Waiting:        0    0   1.3      0     212
Total:          0    0   1.3      0     212

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      1
 100%    212 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8011/predis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /predis.php
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.543 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    19664.14 [#/sec] (mean)
Time per request:       0.509 [ms] (mean)
Time per request:       0.051 [ms] (mean, across all concurrent requests)
Transfer rate:          2861.29 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   0.9      0     209
Waiting:        0    0   0.9      0     209
Total:          0    0   0.9      0     209

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8011/predis.php`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 5000 requests
Completed 10000 requests
Completed 15000 requests
Completed 20000 requests
Completed 25000 requests
Completed 30000 requests
Completed 35000 requests
Completed 40000 requests
Completed 45000 requests
Completed 50000 requests
Finished 50000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8011

Document Path:          /predis.php
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.544 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    19656.52 [#/sec] (mean)
Time per request:       1.017 [ms] (mean)
Time per request:       0.051 [ms] (mean, across all concurrent requests)
Transfer rate:          2860.18 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.3      1       6
Waiting:        0    1   0.3      1       6
Total:          0    1   0.3      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%      6 (longest request)
```

