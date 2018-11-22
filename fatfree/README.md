### fatfree 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8021/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8021/api/db`

run `ab -n 1 -c 1 http://127.0.0.1:8021/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8021/api/redis`

run `ab -n 1 -c 1 http://127.0.0.1:8021/api/setPRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8021/api/predis`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8021/api/hello`

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
Server Port:            8021

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   20.638 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    2422.67 [#/sec] (mean)
Time per request:       0.413 [ms] (mean)
Time per request:       0.413 [ms] (mean, across all concurrent requests)
Transfer rate:          922.70 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       4
Waiting:        0    0   0.1      0       4
Total:          0    0   0.1      0       4

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      1
  99%      1
 100%      4 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8021/api/hello`

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
Server Port:            8021

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   4.563 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    10957.41 [#/sec] (mean)
Time per request:       0.456 [ms] (mean)
Time per request:       0.091 [ms] (mean, across all concurrent requests)
Transfer rate:          4173.23 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.9      0     209
Waiting:        0    0   0.9      0     209
Total:          0    0   0.9      0     209

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
run `ab -n 50000 -c 10 http://127.0.0.1:8021/api/hello`

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
Server Port:            8021

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   3.927 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    12732.51 [#/sec] (mean)
Time per request:       0.785 [ms] (mean)
Time per request:       0.079 [ms] (mean, across all concurrent requests)
Transfer rate:          4849.30 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.6      1     209
Waiting:        0    1   1.6      1     209
Total:          0    1   1.6      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%    209 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8021/api/hello`

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
Server Port:            8021

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   3.690 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    13548.64 [#/sec] (mean)
Time per request:       1.476 [ms] (mean)
Time per request:       0.074 [ms] (mean, across all concurrent requests)
Transfer rate:          5160.13 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.0      1     209
Waiting:        0    1   1.0      1     209
Total:          1    1   1.0      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      2
 100%    209 (longest request)
```

**5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8021/api/db`

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
Server Port:            8021

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   35.757 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    1398.33 [#/sec] (mean)
Time per request:       0.715 [ms] (mean)
Time per request:       0.715 [ms] (mean, across all concurrent requests)
Transfer rate:          532.57 [Kbytes/sec] received

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
run `ab -n 50000 -c 5 http://127.0.0.1:8021/api/db`

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
Server Port:            8021

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   8.562 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    5839.59 [#/sec] (mean)
Time per request:       0.856 [ms] (mean)
Time per request:       0.171 [ms] (mean, across all concurrent requests)
Transfer rate:          2224.06 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   0.3      1      16
Waiting:        0    1   0.3      1      16
Total:          1    1   0.3      1      16

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      2
 100%     16 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8021/api/db`

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
Server Port:            8021

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   7.458 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    6703.91 [#/sec] (mean)
Time per request:       1.492 [ms] (mean)
Time per request:       0.149 [ms] (mean, across all concurrent requests)
Transfer rate:          2553.25 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   0.3      1       9
Waiting:        1    1   0.3      1       9
Total:          1    1   0.3      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%      9 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8021/api/db`

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
Server Port:            8021

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.422 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      19500000 bytes
HTML transferred:       550000 bytes
Requests per second:    6736.44 [#/sec] (mean)
Time per request:       2.969 [ms] (mean)
Time per request:       0.148 [ms] (mean, across all concurrent requests)
Transfer rate:          2565.64 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    3   1.1      3     212
Waiting:        1    3   1.1      3     212
Total:          2    3   1.1      3     212

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      3
  95%      4
  98%      5
  99%      6
 100%    212 (longest request)
```

**6.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

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
Time taken for tests:   18.155 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2754.04 [#/sec] (mean)
Time per request:       0.363 [ms] (mean)
Time per request:       0.363 [ms] (mean, across all concurrent requests)
Transfer rate:          400.73 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0      10
Waiting:        0    0   0.1      0       4
Total:          0    0   0.1      0      10

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      1
  99%      1
 100%     10 (longest request)
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
Time taken for tests:   5.250 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    9523.56 [#/sec] (mean)
Time per request:       0.525 [ms] (mean)
Time per request:       0.105 [ms] (mean, across all concurrent requests)
Transfer rate:          1385.75 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   2.1      0     215
Waiting:        0    0   2.1      0     215
Total:          0    1   2.1      0     215

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%    215 (longest request)
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
Time taken for tests:   4.814 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10385.86 [#/sec] (mean)
Time per request:       0.963 [ms] (mean)
Time per request:       0.096 [ms] (mean, across all concurrent requests)
Transfer rate:          1511.22 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.8      1     209
Waiting:        0    1   1.8      1     209
Total:          0    1   1.8      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      2
  98%      5
  99%      6
 100%    209 (longest request)
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
Time taken for tests:   4.934 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    10133.18 [#/sec] (mean)
Time per request:       1.974 [ms] (mean)
Time per request:       0.099 [ms] (mean, across all concurrent requests)
Transfer rate:          1474.46 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     0    2   1.8      2     218
Waiting:        0    2   1.8      2     218
Total:          1    2   1.8      2     218

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      7
  99%     12
 100%    218 (longest request)
```

**7.  [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

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
Time taken for tests:   16.125 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    3100.79 [#/sec] (mean)
Time per request:       0.322 [ms] (mean)
Time per request:       0.322 [ms] (mean, across all concurrent requests)
Transfer rate:          451.19 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       4
Waiting:        0    0   0.1      0       4
Total:          0    0   0.1      0       4

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      1
 100%      4 (longest request)
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
Time taken for tests:   3.820 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    13088.92 [#/sec] (mean)
Time per request:       0.382 [ms] (mean)
Time per request:       0.076 [ms] (mean, across all concurrent requests)
Transfer rate:          1904.54 [Kbytes/sec] received

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
  95%      1
  98%      1
  99%      1
 100%    208 (longest request)
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
Time taken for tests:   3.295 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    15172.52 [#/sec] (mean)
Time per request:       0.659 [ms] (mean)
Time per request:       0.066 [ms] (mean, across all concurrent requests)
Transfer rate:          2207.72 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.3      1     209
Waiting:        0    1   1.3      1     208
Total:          0    1   1.3      1     209

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
Time taken for tests:   3.291 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    15191.50 [#/sec] (mean)
Time per request:       1.317 [ms] (mean)
Time per request:       0.066 [ms] (mean, across all concurrent requests)
Transfer rate:          2210.48 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.3      1     209
Waiting:        0    1   1.3      1     209
Total:          1    1   1.3      1     209

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%      2
  99%      2
 100%    209 (longest request)
```
