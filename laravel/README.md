### laravel 5.7 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8001/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/redis`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   85.496 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    584.83 [#/sec] (mean)
Time per request:       1.710 [ms] (mean)
Time per request:       1.710 [ms] (mean, across all concurrent requests)
Transfer rate:          126.22 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   0.1      2       5
Waiting:        1    2   0.1      2       5
Total:          1    2   0.1      2       5

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      2
 100%      5 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   26.081 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1917.07 [#/sec] (mean)
Time per request:       2.608 [ms] (mean)
Time per request:       0.522 [ms] (mean, across all concurrent requests)
Transfer rate:          413.74 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       3
Processing:     2    3   1.5      2     214
Waiting:        0    3   1.5      2     214
Total:          2    3   1.5      2     214

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      3
  80%      3
  90%      4
  95%      5
  98%      6
  99%      8
 100%    214 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   22.449 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    2227.28 [#/sec] (mean)
Time per request:       4.490 [ms] (mean)
Time per request:       0.449 [ms] (mean, across all concurrent requests)
Transfer rate:          480.69 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       4
Processing:     2    4   1.3      4     209
Waiting:        2    4   1.3      4     209
Total:          2    4   1.3      4     209

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      5
  80%      5
  90%      5
  95%      6
  98%      7
  99%      9
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   22.314 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    2240.73 [#/sec] (mean)
Time per request:       8.926 [ms] (mean)
Time per request:       0.446 [ms] (mean, across all concurrent requests)
Transfer rate:          483.60 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    9   1.2      9      22
Waiting:        2    9   1.2      8      22
Total:          2    9   1.2      9      22

Percentage of the requests served within a certain time (ms)
  50%      9
  66%      9
  75%      9
  80%     10
  90%     10
  95%     11
  98%     13
  99%     14
 100%     22 (longest request)
```

**5.  [DB test] 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   137.034 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    364.87 [#/sec] (mean)
Time per request:       2.741 [ms] (mean)
Time per request:       2.741 [ms] (mean, across all concurrent requests)
Transfer rate:          78.75 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    3   0.2      3      10
Waiting:        2    3   0.2      3       8
Total:          2    3   0.2      3      10

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      3
  95%      3
  98%      3
  99%      3
 100%     10 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   34.229 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1460.74 [#/sec] (mean)
Time per request:       3.423 [ms] (mean)
Time per request:       0.685 [ms] (mean, across all concurrent requests)
Transfer rate:          315.26 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    3   0.7      3      18
Waiting:        2    3   0.7      3      18
Total:          2    3   0.7      3      18

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      4
  90%      4
  95%      5
  98%      6
  99%      6
 100%     18 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   35.141 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1422.84 [#/sec] (mean)
Time per request:       7.028 [ms] (mean)
Time per request:       0.703 [ms] (mean, across all concurrent requests)
Transfer rate:          307.08 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     3    7   1.6      7      41
Waiting:        3    7   1.6      6      41
Total:          3    7   1.6      7      41

Percentage of the requests served within a certain time (ms)
  50%      7
  66%      7
  75%      7
  80%      8
  90%      8
  95%      9
  98%     12
  99%     14
 100%     41 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   34.232 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1460.62 [#/sec] (mean)
Time per request:       13.693 [ms] (mean)
Time per request:       0.685 [ms] (mean, across all concurrent requests)
Transfer rate:          315.23 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     3   14   2.1     13     226
Waiting:        3   14   2.1     13     226
Total:          4   14   2.1     13     226

Percentage of the requests served within a certain time (ms)
  50%     13
  66%     14
  75%     14
  80%     14
  90%     15
  95%     17
  98%     19
  99%     21
 100%    226 (longest request)
```

**6.  [redis] 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   106.705 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    468.58 [#/sec] (mean)
Time per request:       2.134 [ms] (mean)
Time per request:       2.134 [ms] (mean, across all concurrent requests)
Transfer rate:          101.13 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    2   0.2      2      10
Waiting:        2    2   0.2      2       8
Total:          2    2   0.2      2      10

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%     10 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   28.574 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1749.82 [#/sec] (mean)
Time per request:       2.857 [ms] (mean)
Time per request:       0.571 [ms] (mean, across all concurrent requests)
Transfer rate:          377.65 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       5
Processing:     2    3   1.3      3     211
Waiting:        2    3   1.3      3     210
Total:          2    3   1.3      3     211

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      4
  95%      4
  98%      6
  99%      7
 100%    211 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   27.026 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1850.04 [#/sec] (mean)
Time per request:       5.405 [ms] (mean)
Time per request:       0.541 [ms] (mean, across all concurrent requests)
Transfer rate:          399.28 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     2    5   1.0      5      20
Waiting:        2    5   1.0      5      20
Total:          3    5   1.0      5      20

Percentage of the requests served within a certain time (ms)
  50%      5
  66%      5
  75%      6
  80%      6
  90%      7
  95%      7
  98%      9
  99%     10
 100%     20 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   27.624 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      11050000 bytes
HTML transferred:       550000 bytes
Requests per second:    1810.01 [#/sec] (mean)
Time per request:       11.050 [ms] (mean)
Time per request:       0.552 [ms] (mean, across all concurrent requests)
Transfer rate:          390.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       6
Processing:     4   11   2.1     10      35
Waiting:        3   11   2.1     10      35
Total:          4   11   2.1     10      35

Percentage of the requests served within a certain time (ms)
  50%     10
  66%     11
  75%     11
  80%     12
  90%     13
  95%     15
  98%     18
  99%     21
 100%     35 (longest request)
```
