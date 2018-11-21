# laravel 5.7 测试细节

### 1. Clear all caches and logs, warmup caches if needed 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

### 2. Clear all caches and logs, warmup caches if needed 

run `./init_benchmark.sh`

### 3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache

run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8001/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8001/api/redis`

### 4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   8.451 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    591.67 [#/sec] (mean)
Time per request:       1.690 [ms] (mean)
Time per request:       1.690 [ms] (mean, across all concurrent requests)
Transfer rate:          127.69 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   0.2      2       5
Waiting:        1    2   0.2      2       5
Total:          1    2   0.2      2       6

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
run `ab -n 5000 -c 5 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   2.798 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1787.24 [#/sec] (mean)
Time per request:       2.798 [ms] (mean)
Time per request:       0.560 [ms] (mean, across all concurrent requests)
Transfer rate:          385.72 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    3   1.1      2      12
Waiting:        2    3   1.1      2      12
Total:          2    3   1.1      2      12

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      3
  75%      3
  80%      3
  90%      4
  95%      5
  98%      6
  99%      7
 100%     12 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   2.500 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    2000.37 [#/sec] (mean)
Time per request:       4.999 [ms] (mean)
Time per request:       0.500 [ms] (mean, across all concurrent requests)
Transfer rate:          431.72 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    5   1.4      4      15
Waiting:        2    5   1.4      4      15
Total:          2    5   1.4      4      15

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      6
  80%      6
  90%      7
  95%      8
  98%      9
  99%     10
 100%     15 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8001/api/hello`

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
Server Port:            8001

Document Path:          /api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.533 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1973.61 [#/sec] (mean)
Time per request:       10.134 [ms] (mean)
Time per request:       0.507 [ms] (mean, across all concurrent requests)
Transfer rate:          425.94 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     3   10   2.5      9      38
Waiting:        2   10   2.5      9      38
Total:          3   10   2.5      9      38

Percentage of the requests served within a certain time (ms)
  50%      9
  66%     10
  75%     11
  80%     12
  90%     13
  95%     15
  98%     16
  99%     17
 100%     38 (longest request)
```

### 5.  [DB test] 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   15.472 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    323.16 [#/sec] (mean)
Time per request:       3.094 [ms] (mean)
Time per request:       3.094 [ms] (mean, across all concurrent requests)
Transfer rate:          69.74 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    3   0.9      3      48
Waiting:        2    3   0.9      3      48
Total:          2    3   0.9      3      49

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      3
  80%      3
  90%      4
  95%      4
  98%      5
  99%      6
 100%     49 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   4.452 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1122.99 [#/sec] (mean)
Time per request:       4.452 [ms] (mean)
Time per request:       0.890 [ms] (mean, across all concurrent requests)
Transfer rate:          242.36 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    4   3.5      4     107
Waiting:        2    4   3.5      4     107
Total:          3    4   3.5      4     107

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      5
  80%      5
  90%      6
  95%      7
  98%      9
  99%     10
 100%    107 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   4.220 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1184.74 [#/sec] (mean)
Time per request:       8.441 [ms] (mean)
Time per request:       0.844 [ms] (mean, across all concurrent requests)
Transfer rate:          255.69 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     5    8   2.7      8     108
Waiting:        5    8   2.7      8     108
Total:          5    8   2.7      8     108

Percentage of the requests served within a certain time (ms)
  50%      8
  66%      9
  75%      9
  80%     10
  90%     11
  95%     13
  98%     15
  99%     16
 100%    108 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8001/api/db`

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
Server Port:            8001

Document Path:          /api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   4.135 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1209.21 [#/sec] (mean)
Time per request:       16.540 [ms] (mean)
Time per request:       0.827 [ms] (mean, across all concurrent requests)
Transfer rate:          260.97 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       1
Processing:     4   16   3.4     16      40
Waiting:        4   16   3.4     16      40
Total:          5   16   3.4     16      41

Percentage of the requests served within a certain time (ms)
  50%     16
  66%     17
  75%     18
  80%     19
  90%     21
  95%     23
  98%     25
  99%     28
 100%     41 (longest request)
```

### 6.  [redis] 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 

run `ab -n 5000 -c 1 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   10.766 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    464.41 [#/sec] (mean)
Time per request:       2.153 [ms] (mean)
Time per request:       2.153 [ms] (mean, across all concurrent requests)
Transfer rate:          100.23 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     2    2   0.4      2       6
Waiting:        2    2   0.4      2       6
Total:          2    2   0.4      2       6

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      4
  99%      4
 100%      6 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   3.201 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1561.83 [#/sec] (mean)
Time per request:       3.201 [ms] (mean)
Time per request:       0.640 [ms] (mean, across all concurrent requests)
Transfer rate:          337.08 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    3   1.2      3      15
Waiting:        2    3   1.2      3      15
Total:          2    3   1.2      3      15

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      3
  75%      4
  80%      4
  90%      5
  95%      5
  98%      6
  99%      7
 100%     15 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   3.384 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1477.50 [#/sec] (mean)
Time per request:       6.768 [ms] (mean)
Time per request:       0.677 [ms] (mean, across all concurrent requests)
Transfer rate:          318.87 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     3    7   3.3      7     208
Waiting:        3    7   3.3      7     208
Total:          3    7   3.3      7     208

Percentage of the requests served within a certain time (ms)
  50%      7
  66%      7
  75%      7
  80%      8
  90%      9
  95%      9
  98%     11
  99%     12
 100%    208 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8001/api/redis`

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
Server Port:            8001

Document Path:          /api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   2.944 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1105000 bytes
HTML transferred:       55000 bytes
Requests per second:    1698.48 [#/sec] (mean)
Time per request:       11.775 [ms] (mean)
Time per request:       0.589 [ms] (mean, across all concurrent requests)
Transfer rate:          366.57 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     3   12   2.2     11      30
Waiting:        3   12   2.2     11      30
Total:          3   12   2.2     11      31

Percentage of the requests served within a certain time (ms)
  50%     11
  66%     12
  75%     12
  80%     12
  90%     15
  95%     16
  98%     18
  99%     19
 100%     31 (longest request)
```
