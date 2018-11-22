### slim 3.11.0 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8008/api/hello`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 5000 -c 1 http://127.0.0.1:8008/api/hello`

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
Server Port:            8008

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   3.939 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    1269.25 [#/sec] (mean)
Time per request:       0.788 [ms] (mean)
Time per request:       0.788 [ms] (mean, across all concurrent requests)
Transfer rate:          392.92 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.2      1       5
Waiting:        1    1   0.2      1       5
Total:          1    1   0.2      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%      5 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8008/api/hello`

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
Server Port:            8008

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   1.156 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    4325.90 [#/sec] (mean)
Time per request:       1.156 [ms] (mean)
Time per request:       0.231 [ms] (mean, across all concurrent requests)
Transfer rate:          1339.17 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.8      1       9
Waiting:        1    1   0.8      1       9
Total:          1    1   0.8      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      2
  98%      4
  99%      5
 100%      9 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8008/api/hello`

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
Server Port:            8008

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   1.073 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    4657.73 [#/sec] (mean)
Time per request:       2.147 [ms] (mean)
Time per request:       0.215 [ms] (mean, across all concurrent requests)
Transfer rate:          1441.90 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   1.2      2      11
Waiting:        1    2   1.2      2      11
Total:          1    2   1.2      2      11

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      5
  98%      7
  99%      8
 100%     11 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8008/api/hello`

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
Server Port:            8008

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   1.120 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    4463.78 [#/sec] (mean)
Time per request:       4.481 [ms] (mean)
Time per request:       0.224 [ms] (mean, across all concurrent requests)
Transfer rate:          1381.85 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    4   1.9      4      17
Waiting:        1    4   1.9      4      17
Total:          2    4   1.9      4      17

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      4
  80%      4
  90%      6
  95%     10
  98%     11
  99%     12
 100%     17 (longest request)
```
