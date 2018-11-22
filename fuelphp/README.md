### fuelphp 1.8.1 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8020/api/hello`


**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 5000 -c 1 http://127.0.0.1:8020/api/hello`

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
Server Port:            8020

Document Path:          /api/hello
Document Length:        75 bytes

Concurrency Level:      1
Time taken for tests:   11.446 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1020000 bytes
HTML transferred:       375000 bytes
Requests per second:    436.84 [#/sec] (mean)
Time per request:       2.289 [ms] (mean)
Time per request:       2.289 [ms] (mean, across all concurrent requests)
Transfer rate:          87.03 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    2   0.3      2       6
Waiting:        2    2   0.3      2       6
Total:          2    2   0.3      2       6

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      3
  99%      4
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8020/api/hello`

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
Server Port:            8020

Document Path:          /api/hello
Document Length:        75 bytes

Concurrency Level:      5
Time taken for tests:   3.671 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1020000 bytes
HTML transferred:       375000 bytes
Requests per second:    1362.08 [#/sec] (mean)
Time per request:       3.671 [ms] (mean)
Time per request:       0.734 [ms] (mean, across all concurrent requests)
Transfer rate:          271.35 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    4   1.4      4      50
Waiting:        2    4   1.4      4      50
Total:          2    4   1.4      4      50

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      4
  80%      4
  90%      6
  95%      6
  98%      6
  99%      8
 100%     50 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8020/api/hello`

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
Server Port:            8020

Document Path:          /api/hello
Document Length:        75 bytes

Concurrency Level:      10
Time taken for tests:   2.701 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1020000 bytes
HTML transferred:       375000 bytes
Requests per second:    1851.36 [#/sec] (mean)
Time per request:       5.401 [ms] (mean)
Time per request:       0.540 [ms] (mean, across all concurrent requests)
Transfer rate:          368.83 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    5   1.4      5      16
Waiting:        2    5   1.4      5      16
Total:          3    5   1.4      5      16

Percentage of the requests served within a certain time (ms)
  50%      5
  66%      6
  75%      6
  80%      6
  90%      7
  95%      8
  98%      9
  99%     11
 100%     16 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8020/api/hello`

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
Server Port:            8020

Document Path:          /api/hello
Document Length:        75 bytes

Concurrency Level:      20
Time taken for tests:   2.779 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1020000 bytes
HTML transferred:       375000 bytes
Requests per second:    1799.30 [#/sec] (mean)
Time per request:       11.115 [ms] (mean)
Time per request:       0.556 [ms] (mean, across all concurrent requests)
Transfer rate:          358.45 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     3   11   2.3     10      30
Waiting:        3   11   2.3     10      30
Total:          3   11   2.3     10      30

Percentage of the requests served within a certain time (ms)
  50%     10
  66%     12
  75%     12
  80%     13
  90%     14
  95%     15
  98%     17
  99%     18
 100%     30 (longest request)
```
