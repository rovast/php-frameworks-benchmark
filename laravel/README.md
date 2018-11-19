# laravel 5.7 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/hello`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   8.533 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    585.98 [#/sec] (mean)
Time per request:       1.707 [ms] (mean)
Time per request:       1.707 [ms] (mean, across all concurrent requests)
Transfer rate:          126.47 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    2   0.3      2       5
Waiting:        1    2   0.3      2       5
Total:          1    2   0.3      2       5

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%      5 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   2.922 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1711.23 [#/sec] (mean)
Time per request:       2.922 [ms] (mean)
Time per request:       0.584 [ms] (mean, across all concurrent requests)
Transfer rate:          369.32 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    3   1.2      3      16
Waiting:        1    3   1.2      3      16
Total:          2    3   1.2      3      16

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      4
  90%      5
  95%      5
  98%      6
  99%      7
 100%     16 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.251 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    2221.14 [#/sec] (mean)
Time per request:       4.502 [ms] (mean)
Time per request:       0.450 [ms] (mean, across all concurrent requests)
Transfer rate:          479.37 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    4   1.0      4      19
Waiting:        2    4   1.0      4      19
Total:          2    4   1.0      4      19

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      5
  80%      5
  90%      6
  95%      6
  98%      7
  99%      8
 100%     19 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.439 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    2049.65 [#/sec] (mean)
Time per request:       9.758 [ms] (mean)
Time per request:       0.488 [ms] (mean, across all concurrent requests)
Transfer rate:          442.36 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2   10   1.7      9      24
Waiting:        2   10   1.7      9      24
Total:          2   10   1.7      9      24

Percentage of the requests served within a certain time (ms)
  50%      9
  66%     10
  75%     10
  80%     11
  90%     12
  95%     12
  98%     13
  99%     15
 100%     24 (longest request)
```
