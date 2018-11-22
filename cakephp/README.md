### cakephp 3.3.0 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8005/api/hello`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 5000 -c 1 http://127.0.0.1:8005/api/hello`

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
Server Port:            8005

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   9.374 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1595000 bytes
HTML transferred:       55000 bytes
Requests per second:    533.37 [#/sec] (mean)
Time per request:       1.875 [ms] (mean)
Time per request:       1.875 [ms] (mean, across all concurrent requests)
Transfer rate:          166.16 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    2   0.2      2       6
Waiting:        2    2   0.2      2       6
Total:          2    2   0.2      2       6

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8005/api/hello`

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
Server Port:            8005

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   3.009 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1595000 bytes
HTML transferred:       55000 bytes
Requests per second:    1661.56 [#/sec] (mean)
Time per request:       3.009 [ms] (mean)
Time per request:       0.602 [ms] (mean, across all concurrent requests)
Transfer rate:          517.61 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    3   1.2      2      13
Waiting:        2    3   1.2      2      13
Total:          2    3   1.2      2      13

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      4
  75%      4
  80%      4
  90%      4
  95%      5
  98%      6
  99%      7
 100%     13 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8005/api/hello`

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
Server Port:            8005

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.462 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1595000 bytes
HTML transferred:       55000 bytes
Requests per second:    2030.89 [#/sec] (mean)
Time per request:       4.924 [ms] (mean)
Time per request:       0.492 [ms] (mean, across all concurrent requests)
Transfer rate:          632.67 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    5   1.4      4      15
Waiting:        2    5   1.4      4      15
Total:          2    5   1.4      4      16

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      6
  80%      6
  90%      6
  95%      8
  98%      9
  99%     10
 100%     16 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8005/api/hello`

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
Server Port:            8005

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.475 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1595000 bytes
HTML transferred:       55000 bytes
Requests per second:    2020.06 [#/sec] (mean)
Time per request:       9.901 [ms] (mean)
Time per request:       0.495 [ms] (mean, across all concurrent requests)
Transfer rate:          629.29 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2   10   2.0     10      29
Waiting:        2   10   2.0     10      29
Total:          3   10   2.0     10      29

Percentage of the requests served within a certain time (ms)
  50%     10
  66%     10
  75%     10
  80%     10
  90%     12
  95%     14
  98%     16
  99%     16
 100%     29 (longest request)
```
