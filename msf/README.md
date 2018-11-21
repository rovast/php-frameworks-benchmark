# thinkphp 5.0.22 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `php server.php stop && php server.php start -d`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8090/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8090/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8090/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8090/api/redis`

run `ab -n 1 -c 1 http://127.0.0.1:8090/api/setPRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8090/api/predis`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8090/api/hello`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   5.229 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    9561.15 [#/sec] (mean)
Time per request:       0.105 [ms] (mean)
Time per request:       0.105 [ms] (mean, across all concurrent requests)
Transfer rate:          1848.74 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    0   0.0      0       3
Waiting:        0    0   0.0      0       3
Total:          0    0   0.1      0       3

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      3 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8090/api/hello`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   4.043 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    12367.39 [#/sec] (mean)
Time per request:       0.404 [ms] (mean)
Time per request:       0.081 [ms] (mean, across all concurrent requests)
Transfer rate:          2391.35 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    0   0.0      0       3
Waiting:        0    0   0.0      0       3
Total:          0    0   0.0      0       3

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      3 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8090/api/hello`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   4.068 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    12289.68 [#/sec] (mean)
Time per request:       0.814 [ms] (mean)
Time per request:       0.081 [ms] (mean, across all concurrent requests)
Transfer rate:          2376.32 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    1   0.1      1       4
Waiting:        0    1   0.1      1       4
Total:          0    1   0.1      1       4

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
run `ab -n 50000 -c 20 http://127.0.0.1:8090/api/hello`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   4.081 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    12253.09 [#/sec] (mean)
Time per request:       1.632 [ms] (mean)
Time per request:       0.082 [ms] (mean, across all concurrent requests)
Transfer rate:          2369.25 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    2   0.1      2       4
Waiting:        0    2   0.1      2       4
Total:          1    2   0.1      2       4

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      2
 100%      4 (longest request)
```

### 5. [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8090/api/db`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   12.138 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    4119.30 [#/sec] (mean)
Time per request:       0.243 [ms] (mean)
Time per request:       0.243 [ms] (mean, across all concurrent requests)
Transfer rate:          796.50 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       3
Waiting:        0    0   0.1      0       3
Total:          0    0   0.1      0       3

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      3 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8090/api/db`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   7.418 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6740.21 [#/sec] (mean)
Time per request:       0.742 [ms] (mean)
Time per request:       0.148 [ms] (mean, across all concurrent requests)
Transfer rate:          1303.28 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    1   0.1      1       9
Waiting:        0    1   0.1      1       9
Total:          0    1   0.1      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      9 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8090/api/db`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   7.490 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6675.95 [#/sec] (mean)
Time per request:       1.498 [ms] (mean)
Time per request:       0.150 [ms] (mean, across all concurrent requests)
Transfer rate:          1290.86 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.2      1      10
Waiting:        0    1   0.2      1      10
Total:          0    1   0.2      1      11

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%      2
  99%      2
 100%     11 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8090/api/db`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.609 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6570.87 [#/sec] (mean)
Time per request:       3.044 [ms] (mean)
Time per request:       0.152 [ms] (mean, across all concurrent requests)
Transfer rate:          1270.54 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    3   0.4      3      11
Waiting:        0    3   0.4      3      11
Total:          1    3   0.4      3      11

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      3
  95%      4
  98%      4
  99%      5
 100%     11 (longest request)
```

### 6. [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8090/api/redis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   10.698 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    4673.80 [#/sec] (mean)
Time per request:       0.214 [ms] (mean)
Time per request:       0.214 [ms] (mean, across all concurrent requests)
Transfer rate:          903.72 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       3
Waiting:        0    0   0.1      0       3
Total:          0    0   0.1      0       3

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      3 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8090/api/redis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   7.590 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6587.60 [#/sec] (mean)
Time per request:       0.759 [ms] (mean)
Time per request:       0.152 [ms] (mean, across all concurrent requests)
Transfer rate:          1273.77 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
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
run `ab -n 50000 -c 10 http://127.0.0.1:8090/api/redis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   7.449 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6712.17 [#/sec] (mean)
Time per request:       1.490 [ms] (mean)
Time per request:       0.149 [ms] (mean, across all concurrent requests)
Transfer rate:          1297.86 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.2      1       9
Waiting:        0    1   0.2      1       9
Total:          1    1   0.2      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      2
  98%      2
  99%      2
 100%      9 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8090/api/redis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.554 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6619.07 [#/sec] (mean)
Time per request:       3.022 [ms] (mean)
Time per request:       0.151 [ms] (mean, across all concurrent requests)
Transfer rate:          1279.86 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    3   0.2      3       6
Waiting:        0    3   0.2      3       6
Total:          1    3   0.2      3       6

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      3
  95%      3
  98%      4
  99%      4
 100%      6 (longest request)
```

### 7. [redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 50000 -c 1 http://127.0.0.1:8090/api/predis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   7.184 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    6959.94 [#/sec] (mean)
Time per request:       0.144 [ms] (mean)
Time per request:       0.144 [ms] (mean, across all concurrent requests)
Transfer rate:          1345.77 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.0      0       1
Waiting:        0    0   0.0      0       1
Total:          0    0   0.0      0       1

Percentage of the requests served within a certain time (ms)
  50%      0
  66%      0
  75%      0
  80%      0
  90%      0
  95%      0
  98%      0
  99%      0
 100%      1 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8090/api/predis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   6.026 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    8296.86 [#/sec] (mean)
Time per request:       0.603 [ms] (mean)
Time per request:       0.121 [ms] (mean, across all concurrent requests)
Transfer rate:          1604.28 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.1      1       4
Waiting:        0    1   0.1      1       4
Total:          0    1   0.1      1       4

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
run `ab -n 50000 -c 10 http://127.0.0.1:8090/api/predis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   6.076 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    8228.99 [#/sec] (mean)
Time per request:       1.215 [ms] (mean)
Time per request:       0.122 [ms] (mean, across all concurrent requests)
Transfer rate:          1591.15 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.4      1      30
Waiting:        0    1   0.4      1      30
Total:          0    1   0.4      1      30

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%     30 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8090/api/predis`

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


Server Software:        swoole-http-server
Server Hostname:        127.0.0.1
Server Port:            8090

Document Path:          /api/predis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   6.040 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      9900000 bytes
HTML transferred:       550000 bytes
Requests per second:    8277.48 [#/sec] (mean)
Time per request:       2.416 [ms] (mean)
Time per request:       0.121 [ms] (mean, across all concurrent requests)
Transfer rate:          1600.53 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    2   0.3      2      13
Waiting:        0    2   0.3      2      13
Total:          1    2   0.3      2      13

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      3
  98%      3
  99%      3
 100%     13 (longest request)
```


