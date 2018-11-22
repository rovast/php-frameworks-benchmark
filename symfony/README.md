### symfony 4.1.7 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8004/api/hello`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 5000 -c 1 http://127.0.0.1:8004/api/hello`

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
Server Port:            8004

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   20.577 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    242.99 [#/sec] (mean)
Time per request:       4.115 [ms] (mean)
Time per request:       4.115 [ms] (mean, across all concurrent requests)
Transfer rate:          52.44 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     4    4   0.3      4       9
Waiting:        4    4   0.3      4       9
Total:          4    4   0.3      4       9

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      4
  80%      4
  90%      4
  95%      4
  98%      5
  99%      5
 100%      9 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8004/api/hello`

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
Server Port:            8004

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   5.744 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    870.47 [#/sec] (mean)
Time per request:       5.744 [ms] (mean)
Time per request:       1.149 [ms] (mean, across all concurrent requests)
Transfer rate:          187.87 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     4    6   2.1      5      21
Waiting:        4    6   2.1      5      21
Total:          4    6   2.1      5      21

Percentage of the requests served within a certain time (ms)
  50%      5
  66%      5
  75%      5
  80%      7
  90%      9
  95%     10
  98%     12
  99%     13
 100%     21 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8004/api/hello`

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
Server Port:            8004

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   5.394 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    926.96 [#/sec] (mean)
Time per request:       10.788 [ms] (mean)
Time per request:       1.079 [ms] (mean, across all concurrent requests)
Transfer rate:          200.06 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     6   11   2.4      9      26
Waiting:        6   11   2.4      9      26
Total:          6   11   2.4     10      26

Percentage of the requests served within a certain time (ms)
  50%     10
  66%     10
  75%     12
  80%     13
  90%     14
  95%     17
  98%     17
  99%     18
 100%     26 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8004/api/hello`

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
Server Port:            8004

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   5.233 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    955.42 [#/sec] (mean)
Time per request:       20.933 [ms] (mean)
Time per request:       1.047 [ms] (mean, across all concurrent requests)
Transfer rate:          206.20 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     6   21   4.8     19     226
Waiting:        6   21   4.8     19     226
Total:          6   21   4.8     19     226

Percentage of the requests served within a certain time (ms)
  50%     19
  66%     21
  75%     23
  80%     23
  90%     26
  95%     30
  98%     32
  99%     34
 100%    226 (longest request)
```
