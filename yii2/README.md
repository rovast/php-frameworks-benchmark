# yii 2.0.15 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8006/?r=api/hello`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8006/?r=api/hello`

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
Server Port:            8006

Document Path:          /?r=api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   8.291 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1335000 bytes
HTML transferred:       55000 bytes
Requests per second:    603.10 [#/sec] (mean)
Time per request:       1.658 [ms] (mean)
Time per request:       1.658 [ms] (mean, across all concurrent requests)
Transfer rate:          157.25 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    2   0.6      2      20
Waiting:        1    2   0.6      1      20
Total:          1    2   0.6      2      20
WARNING: The median and mean for the waiting time are not within a normal deviation
        These results are probably not that reliable.

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      3
  99%      4
 100%     20 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8006/?r=api/hello`

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
Server Port:            8006

Document Path:          /?r=api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   2.714 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1335000 bytes
HTML transferred:       55000 bytes
Requests per second:    1842.30 [#/sec] (mean)
Time per request:       2.714 [ms] (mean)
Time per request:       0.543 [ms] (mean, across all concurrent requests)
Transfer rate:          480.37 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    3   1.4      2      20
Waiting:        1    3   1.4      2      20
Total:          1    3   1.4      2      20

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      3
  75%      3
  80%      3
  90%      4
  95%      5
  98%      7
  99%      8
 100%     20 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8006/?r=api/hello`

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
Server Port:            8006

Document Path:          /?r=api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.424 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1335000 bytes
HTML transferred:       55000 bytes
Requests per second:    2062.58 [#/sec] (mean)
Time per request:       4.848 [ms] (mean)
Time per request:       0.485 [ms] (mean, across all concurrent requests)
Transfer rate:          537.80 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    5   1.9      4      24
Waiting:        2    5   1.9      4      24
Total:          2    5   1.9      4      24

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      5
  80%      5
  90%      8
  95%      9
  98%     11
  99%     11
 100%     24 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8006/?r=api/hello`

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
Server Port:            8006

Document Path:          /?r=api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.472 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1335000 bytes
HTML transferred:       55000 bytes
Requests per second:    2023.00 [#/sec] (mean)
Time per request:       9.886 [ms] (mean)
Time per request:       0.494 [ms] (mean, across all concurrent requests)
Transfer rate:          527.48 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     3   10   2.7      9      27
Waiting:        2   10   2.7      9      27
Total:          3   10   2.7      9      27

Percentage of the requests served within a certain time (ms)
  50%      9
  66%     10
  75%     11
  80%     12
  90%     14
  95%     15
  98%     16
  99%     19
 100%     27 (longest request)
```
