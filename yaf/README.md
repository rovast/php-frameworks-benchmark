# thinkphp 5.0.22 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8012/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8012/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8012/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8012/api/redis`

run `ab -n 1 -c 1 http://127.0.0.1:8012/api/setPRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8012/api/predis`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8012/api/hello`

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
Server Port:            8012

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   13.208 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    3785.55 [#/sec] (mean)
Time per request:       0.264 [ms] (mean)
Time per request:       0.264 [ms] (mean, across all concurrent requests)
Transfer rate:          550.83 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   0.1      0      14
Waiting:        0    0   0.1      0       3
Total:          0    0   0.1      0      14

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%     14 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8012/api/hello`

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
Server Port:            8012

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   3.281 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    15239.72 [#/sec] (mean)
Time per request:       0.328 [ms] (mean)
Time per request:       0.066 [ms] (mean, across all concurrent requests)
Transfer rate:          2217.50 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   0.9      0     208
Waiting:        0    0   0.9      0     208
Total:          0    0   0.9      0     208

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      1
  99%      1
 100%    208 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8012/api/hello`

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
Server Port:            8012

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.717 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    18403.12 [#/sec] (mean)
Time per request:       0.543 [ms] (mean)
Time per request:       0.054 [ms] (mean, across all concurrent requests)
Transfer rate:          2677.80 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.3      0     212
Waiting:        0    0   1.3      0     212
Total:          0    1   1.3      0     213

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
run `ab -n 50000 -c 20 http://127.0.0.1:8012/api/hello`

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
Server Port:            8012

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.667 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    18750.99 [#/sec] (mean)
Time per request:       1.067 [ms] (mean)
Time per request:       0.053 [ms] (mean, across all concurrent requests)
Transfer rate:          2728.42 [Kbytes/sec] received

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

### 5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8012/api/db`

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
Server Port:            8012

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   32.138 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1555.77 [#/sec] (mean)
Time per request:       0.643 [ms] (mean)
Time per request:       0.643 [ms] (mean, across all concurrent requests)
Transfer rate:          226.38 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    1   0.1      1       5
Waiting:        0    1   0.1      1       5
Total:          0    1   0.1      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      5 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8012/api/db`

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
Server Port:            8012

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   7.553 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6619.70 [#/sec] (mean)
Time per request:       0.755 [ms] (mean)
Time per request:       0.151 [ms] (mean, across all concurrent requests)
Transfer rate:          963.22 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.2      1       8
Waiting:        0    1   0.2      1       8
Total:          0    1   0.2      1       8

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      8 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8012/api/db`

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
Server Port:            8012

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   6.901 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7245.48 [#/sec] (mean)
Time per request:       1.380 [ms] (mean)
Time per request:       0.138 [ms] (mean, across all concurrent requests)
Transfer rate:          1054.27 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   0.3      1       6
Waiting:        1    1   0.3      1       6
Total:          1    1   0.3      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%      6 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8012/api/db`

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
Server Port:            8012

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.001 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7142.34 [#/sec] (mean)
Time per request:       2.800 [ms] (mean)
Time per request:       0.140 [ms] (mean, across all concurrent requests)
Transfer rate:          1039.27 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    3   0.5      3      11
Waiting:        1    3   0.5      3      11
Total:          1    3   0.5      3      11

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      3
  95%      3
  98%      5
  99%      5
 100%     11 (longest request)
```

### 6.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8012/api/redis`

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
Server Port:            8012

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   19.100 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2617.86 [#/sec] (mean)
Time per request:       0.382 [ms] (mean)
Time per request:       0.382 [ms] (mean, across all concurrent requests)
Transfer rate:          380.92 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   0.1      0       8
Waiting:        0    0   0.1      0       8
Total:          0    0   0.1      0       8

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      1
  99%      1
 100%      8 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8012/api/redis`

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
Server Port:            8012

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   5.362 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    9324.99 [#/sec] (mean)
Time per request:       0.536 [ms] (mean)
Time per request:       0.107 [ms] (mean, across all concurrent requests)
Transfer rate:          1356.86 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.4      0     212
Waiting:        0    0   1.4      0     212
Total:          0    1   1.4      0     212

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      3
 100%    212 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8012/api/redis`

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
Server Port:            8012

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   4.931 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10139.61 [#/sec] (mean)
Time per request:       0.986 [ms] (mean)
Time per request:       0.099 [ms] (mean, across all concurrent requests)
Transfer rate:          1475.39 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   2.1      1     217
Waiting:        0    1   2.1      1     217
Total:          0    1   2.1      1     217

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      5
  99%      6
 100%    217 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8012/api/redis`

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
Server Port:            8012

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   4.814 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10386.87 [#/sec] (mean)
Time per request:       1.926 [ms] (mean)
Time per request:       0.096 [ms] (mean, across all concurrent requests)
Transfer rate:          1511.37 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       4
Processing:     0    2   1.8      2     213
Waiting:        0    2   1.8      2     213
Total:          1    2   1.8      2     213

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      8
  99%     12
 100%    213 (longest request)
```

### 7.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8012/api/predis`

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
Server Port:            8012

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   14.999 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    3333.50 [#/sec] (mean)
Time per request:       0.300 [ms] (mean)
Time per request:       0.300 [ms] (mean, across all concurrent requests)
Transfer rate:          485.05 [Kbytes/sec] received

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
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      2 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8012/api/predis`

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
Server Port:            8012

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   4.275 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    11694.56 [#/sec] (mean)
Time per request:       0.428 [ms] (mean)
Time per request:       0.086 [ms] (mean, across all concurrent requests)
Transfer rate:          1701.65 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   1.9      0     209
Waiting:        0    0   1.9      0     209
Total:          0    0   1.9      0     209

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      1
  95%      1
  98%      1
  99%      1
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8012/api/predis`

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
Server Port:            8012

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   3.330 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    15014.01 [#/sec] (mean)
Time per request:       0.666 [ms] (mean)
Time per request:       0.067 [ms] (mean, across all concurrent requests)
Transfer rate:          2184.66 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.2      1      10
Waiting:        0    1   0.2      1      10
Total:          0    1   0.2      1      10

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
run `ab -n 50000 -c 20 http://127.0.0.1:8012/api/predis`

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
Server Port:            8012

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   3.292 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    15189.04 [#/sec] (mean)
Time per request:       1.317 [ms] (mean)
Time per request:       0.066 [ms] (mean, across all concurrent requests)
Transfer rate:          2210.12 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.3      1       5
Waiting:        0    1   0.3      1       5
Total:          0    1   0.3      1       6

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%      2
  99%      3
 100%      6 (longest request)
```

