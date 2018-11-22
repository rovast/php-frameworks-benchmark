### CodeIgniter 3.1.9 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8002/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/redis`

run `ab -n 1 -c 1 http://127.0.0.1:8002/api/setPRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8002/api/predis`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8002/api/hello`

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
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   24.933 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2005.39 [#/sec] (mean)
Time per request:       0.499 [ms] (mean)
Time per request:       0.499 [ms] (mean, across all concurrent requests)
Transfer rate:          291.80 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       5
Waiting:        0    0   0.1      0       5
Total:          0    0   0.1      0       5

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      5 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8002/api/hello`

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
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   5.598 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    8931.61 [#/sec] (mean)
Time per request:       0.560 [ms] (mean)
Time per request:       0.112 [ms] (mean, across all concurrent requests)
Transfer rate:          1299.62 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.6      0     213
Waiting:        0    1   1.6      0     213
Total:          0    1   1.6      0     213

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%    213 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8002/api/hello`

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
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   4.810 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10395.04 [#/sec] (mean)
Time per request:       0.962 [ms] (mean)
Time per request:       0.096 [ms] (mean, across all concurrent requests)
Transfer rate:          1512.56 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   1.4      1     209
Waiting:        0    1   1.4      1     209
Total:          0    1   1.4      1     209

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
run `ab -n 50000 -c 20 http://127.0.0.1:8002/api/hello`

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
Server Port:            8002

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   4.855 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10298.63 [#/sec] (mean)
Time per request:       1.942 [ms] (mean)
Time per request:       0.097 [ms] (mean, across all concurrent requests)
Transfer rate:          1498.53 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       2
Processing:     1    2   1.7      2     211
Waiting:        1    2   1.7      2     211
Total:          1    2   1.7      2     211

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      4
  99%      5
 100%    211 (longest request)
```

**5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8002/api/db`

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
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   45.075 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1109.26 [#/sec] (mean)
Time per request:       0.902 [ms] (mean)
Time per request:       0.902 [ms] (mean, across all concurrent requests)
Transfer rate:          161.41 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.1      1       4
Waiting:        1    1   0.1      1       4
Total:          1    1   0.1      1       4

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      4 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8002/api/db`

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
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   10.523 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    4751.27 [#/sec] (mean)
Time per request:       1.052 [ms] (mean)
Time per request:       0.210 [ms] (mean, across all concurrent requests)
Transfer rate:          691.35 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   1.0      1     213
Waiting:        1    1   1.0      1     213
Total:          1    1   1.0      1     213

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%    213 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8002/api/db`

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
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   9.714 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    5147.01 [#/sec] (mean)
Time per request:       1.943 [ms] (mean)
Time per request:       0.194 [ms] (mean, across all concurrent requests)
Transfer rate:          748.93 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   0.4      2      12
Waiting:        1    2   0.4      2      12
Total:          1    2   0.4      2      12

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      3
  99%      4
 100%     12 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8002/api/db`

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
Server Port:            8002

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   9.691 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    5159.50 [#/sec] (mean)
Time per request:       3.876 [ms] (mean)
Time per request:       0.194 [ms] (mean, across all concurrent requests)
Transfer rate:          750.75 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    4   0.7      4      16
Waiting:        1    4   0.7      4      16
Total:          2    4   0.7      4      16

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      4
  75%      4
  80%      4
  90%      4
  95%      5
  98%      6
  99%      7
 100%     16 (longest request)
```

**6.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8002/api/redis`

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
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   35.918 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1392.06 [#/sec] (mean)
Time per request:       0.718 [ms] (mean)
Time per request:       0.718 [ms] (mean, across all concurrent requests)
Transfer rate:          202.56 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    1   0.1      1       4
Waiting:        0    1   0.1      1       4
Total:          1    1   0.1      1       4

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      4 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8002/api/redis`

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
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   8.504 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    5879.34 [#/sec] (mean)
Time per request:       0.850 [ms] (mean)
Time per request:       0.170 [ms] (mean, across all concurrent requests)
Transfer rate:          855.49 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   0.3      1       9
Waiting:        0    1   0.3      1       9
Total:          1    1   0.3      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%      9 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8002/api/redis`

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
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   7.784 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6423.77 [#/sec] (mean)
Time per request:       1.557 [ms] (mean)
Time per request:       0.156 [ms] (mean, across all concurrent requests)
Transfer rate:          934.71 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     1    2   1.9      1     213
Waiting:        1    1   1.9      1     213
Total:          1    2   1.9      1     213

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      3
  99%      3
 100%    213 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8002/api/redis`

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
Server Port:            8002

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.788 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6419.86 [#/sec] (mean)
Time per request:       3.115 [ms] (mean)
Time per request:       0.156 [ms] (mean, across all concurrent requests)
Transfer rate:          934.14 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     1    3   0.5      3      12
Waiting:        1    3   0.5      3      12
Total:          1    3   0.5      3      12

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      4
  95%      4
  98%      4
  99%      5
 100%     12 (longest request)
```

**7.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8002/api/predis`

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
Server Port:            8002

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   26.585 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1880.79 [#/sec] (mean)
Time per request:       0.532 [ms] (mean)
Time per request:       0.532 [ms] (mean, across all concurrent requests)
Transfer rate:          273.67 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0      10
Waiting:        0    0   0.1      0       3
Total:          0    1   0.1      1      10

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%     10 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8002/api/predis`

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
Server Port:            8002

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   6.353 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7870.23 [#/sec] (mean)
Time per request:       0.635 [ms] (mean)
Time per request:       0.127 [ms] (mean, across all concurrent requests)
Transfer rate:          1145.18 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   1.0      1     209
Waiting:        0    1   1.0      1     209
Total:          0    1   1.0      1     209

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
run `ab -n 50000 -c 10 http://127.0.0.1:8002/api/predis`

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
Server Port:            8002

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   5.321 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    9396.36 [#/sec] (mean)
Time per request:       1.064 [ms] (mean)
Time per request:       0.106 [ms] (mean, across all concurrent requests)
Transfer rate:          1367.24 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.0      1     209
Waiting:        0    1   1.0      1     209
Total:          0    1   1.0      1     209

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
run `ab -n 50000 -c 20 http://127.0.0.1:8002/api/predis`

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
Server Port:            8002

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   5.425 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    9216.72 [#/sec] (mean)
Time per request:       2.170 [ms] (mean)
Time per request:       0.108 [ms] (mean, across all concurrent requests)
Transfer rate:          1341.10 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   1.7      2     210
Waiting:        1    2   1.7      2     210
Total:          1    2   1.7      2     210

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      3
  99%      4
 100%    210 (longest request)
```



