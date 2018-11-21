# CodeIgniter 3.1.9 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8002/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/redis`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8002/api/hello`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   2.507 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    1994.78 [#/sec] (mean)
Time per request:       0.501 [ms] (mean)
Time per request:       0.501 [ms] (mean, across all concurrent requests)
Transfer rate:          290.26 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       2
Waiting:        0    0   0.1      0       2
Total:          0    0   0.1      0       2

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      2 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8002/api/hello`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   0.664 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    7525.71 [#/sec] (mean)
Time per request:       0.664 [ms] (mean)
Time per request:       0.133 [ms] (mean, across all concurrent requests)
Transfer rate:          1095.05 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.3      1       5
Waiting:        0    1   0.3      1       5
Total:          0    1   0.3      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%      5 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8002/api/hello`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   0.551 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    9081.93 [#/sec] (mean)
Time per request:       1.101 [ms] (mean)
Time per request:       0.110 [ms] (mean, across all concurrent requests)
Transfer rate:          1321.49 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.5      1       6
Waiting:        0    1   0.5      1       6
Total:          0    1   0.5      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%      3
  99%      3
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8002/api/hello`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   0.535 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    9337.09 [#/sec] (mean)
Time per request:       2.142 [ms] (mean)
Time per request:       0.107 [ms] (mean, across all concurrent requests)
Transfer rate:          1358.62 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       1
Processing:     1    2   0.7      2       7
Waiting:        1    2   0.6      2       7
Total:          1    2   0.7      2       7

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      4
  98%      4
  99%      4
 100%      7 (longest request)
```

### 5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8002/api/db`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   4.895 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    1021.36 [#/sec] (mean)
Time per request:       0.979 [ms] (mean)
Time per request:       0.979 [ms] (mean, across all concurrent requests)
Transfer rate:          148.62 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.2      1       4
Waiting:        1    1   0.2      1       4
Total:          1    1   0.2      1       4

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%      4 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8002/api/db`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   1.491 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    3353.52 [#/sec] (mean)
Time per request:       1.491 [ms] (mean)
Time per request:       0.298 [ms] (mean, across all concurrent requests)
Transfer rate:          487.96 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.7      1       7
Waiting:        1    1   0.7      1       7
Total:          1    1   0.7      1       7

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      2
  80%      2
  90%      2
  95%      3
  98%      4
  99%      4
 100%      7 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8002/api/db`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   1.209 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    4136.19 [#/sec] (mean)
Time per request:       2.418 [ms] (mean)
Time per request:       0.242 [ms] (mean, across all concurrent requests)
Transfer rate:          601.85 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     1    2   0.7      2       8
Waiting:        1    2   0.7      2       8
Total:          1    2   0.7      2       8

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      3
  80%      3
  90%      3
  95%      4
  98%      4
  99%      5
 100%      8 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8002/api/db`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   1.279 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    3909.10 [#/sec] (mean)
Time per request:       5.116 [ms] (mean)
Time per request:       0.256 [ms] (mean, across all concurrent requests)
Transfer rate:          568.80 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    5   1.5      5      17
Waiting:        1    5   1.5      5      17
Total:          2    5   1.5      5      17

Percentage of the requests served within a certain time (ms)
  50%      5
  66%      5
  75%      6
  80%      6
  90%      7
  95%      8
  98%      9
  99%     10
 100%     17 (longest request)
```

### 6.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8002/api/redis`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   3.712 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    1347.02 [#/sec] (mean)
Time per request:       0.742 [ms] (mean)
Time per request:       0.742 [ms] (mean, across all concurrent requests)
Transfer rate:          196.00 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.2      1       6
Waiting:        0    1   0.2      1       3
Total:          1    1   0.2      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8002/api/redis`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   0.954 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    5239.84 [#/sec] (mean)
Time per request:       0.954 [ms] (mean)
Time per request:       0.191 [ms] (mean, across all concurrent requests)
Transfer rate:          762.44 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   0.4      1       5
Waiting:        0    1   0.4      1       5
Total:          1    1   0.4      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      2
  98%      2
  99%      3
 100%      5 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8002/api/redis`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   0.951 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    5256.45 [#/sec] (mean)
Time per request:       1.902 [ms] (mean)
Time per request:       0.190 [ms] (mean, across all concurrent requests)
Transfer rate:          764.85 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   0.6      2       6
Waiting:        1    2   0.6      2       6
Total:          1    2   0.6      2       6

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      3
  98%      4
  99%      5
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8002/api/redis`

```bash
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 500 requests
Completed 1000 requests
Completed 1500 requests
Completed 2000 requests
Completed 2500 requests
Completed 3000 requests
Completed 3500 requests
Completed 4000 requests
Completed 4500 requests
Completed 5000 requests
Finished 5000 requests


Server Software:        nginx/1.13.12
Server Hostname:        127.0.0.1
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   0.924 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      745000 bytes
HTML transferred:       55000 bytes
Requests per second:    5412.20 [#/sec] (mean)
Time per request:       3.695 [ms] (mean)
Time per request:       0.185 [ms] (mean, across all concurrent requests)
Transfer rate:          787.52 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    4   1.1      3      10
Waiting:        1    4   1.1      3      10
Total:          1    4   1.1      3      10

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      4
  75%      4
  80%      4
  90%      5
  95%      6
  98%      7
  99%      8
 100%     10 (longest request)
```



