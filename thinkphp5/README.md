### thinkphp 5.0.22 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8010/?s=/index/api/hello`
run `ab -n 1000 -c 1 http://127.0.0.1:8010/?s=/index/api/db`
run `ab -n 1 -c 1 http://127.0.0.1:8010/?s=/index/api/setRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8010/?s=/index/api/redis`

run `ab -n 1 -c 1 http://127.0.0.1:8010/?s=/index/api/setPRedis`
run `ab -n 1000 -c 1 http://127.0.0.1:8010/?s=/index/api/predis`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8010/?s=/index/api/hello`

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
Server Port:            8010

Document Path:          /?s=/index/api/hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   27.234 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1835.95 [#/sec] (mean)
Time per request:       0.545 [ms] (mean)
Time per request:       0.545 [ms] (mean, across all concurrent requests)
Transfer rate:          267.15 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    0   0.1      0       3
Waiting:        0    0   0.1      0       3
Total:          0    1   0.1      1       3

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      3 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8010/?s=/index/api/hello`

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
Server Port:            8010

Document Path:          /?s=/index/api/hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   6.376 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7842.16 [#/sec] (mean)
Time per request:       0.638 [ms] (mean)
Time per request:       0.128 [ms] (mean, across all concurrent requests)
Transfer rate:          1141.09 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   1.9      1     212
Waiting:        0    1   1.9      0     212
Total:          0    1   1.9      1     212

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%    212 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8010/?s=/index/api/hello`

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
Server Port:            8010

Document Path:          /?s=/index/api/hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   5.380 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    9294.35 [#/sec] (mean)
Time per request:       1.076 [ms] (mean)
Time per request:       0.108 [ms] (mean, across all concurrent requests)
Transfer rate:          1352.40 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.0      1     213
Waiting:        0    1   1.0      1     213
Total:          0    1   1.0      1     213

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
run `ab -n 50000 -c 20 http://127.0.0.1:8010/?s=/index/api/hello`

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
Server Port:            8010

Document Path:          /?s=/index/api/hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   5.688 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    8790.33 [#/sec] (mean)
Time per request:       2.275 [ms] (mean)
Time per request:       0.114 [ms] (mean, across all concurrent requests)
Transfer rate:          1279.06 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    2   0.5      2       8
Waiting:        0    2   0.5      2       8
Total:          1    2   0.5      2       8

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      3
  95%      3
  98%      4
  99%      5
 100%      8 (longest request)
```

**5.  [MySQL]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8010/?s=/index/api/db`

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
Server Port:            8010

Document Path:          /?s=/index/api/db
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   80.562 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    620.64 [#/sec] (mean)
Time per request:       1.611 [ms] (mean)
Time per request:       1.611 [ms] (mean, across all concurrent requests)
Transfer rate:          90.31 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   0.4      2      57
Waiting:        1    2   0.3      2      11
Total:          1    2   0.4      2      57

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      2
  98%      2
  99%      3
 100%     57 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8010/?s=/index/api/db`

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
Server Port:            8010

Document Path:          /?s=/index/api/db
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   18.097 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2762.88 [#/sec] (mean)
Time per request:       1.810 [ms] (mean)
Time per request:       0.362 [ms] (mean, across all concurrent requests)
Transfer rate:          402.02 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     1    2   0.5      2      21
Waiting:        1    2   0.5      2      21
Total:          1    2   0.5      2      21

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      2
  95%      3
  98%      3
  99%      4
 100%     21 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8010/?s=/index/api/db`

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
Server Port:            8010

Document Path:          /?s=/index/api/db
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   17.525 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2853.10 [#/sec] (mean)
Time per request:       3.505 [ms] (mean)
Time per request:       0.350 [ms] (mean, across all concurrent requests)
Transfer rate:          415.15 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     1    3   0.6      3      15
Waiting:        1    3   0.6      3      15
Total:          2    3   0.6      3      15

Percentage of the requests served within a certain time (ms)
  50%      3
  66%      4
  75%      4
  80%      4
  90%      4
  95%      4
  98%      5
  99%      6
 100%     15 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8010/?s=/index/api/db`

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
Server Port:            8010

Document Path:          /?s=/index/api/db
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   17.821 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    2805.68 [#/sec] (mean)
Time per request:       7.128 [ms] (mean)
Time per request:       0.356 [ms] (mean, across all concurrent requests)
Transfer rate:          408.25 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     2    7   1.0      7      21
Waiting:        2    7   1.0      7      21
Total:          3    7   1.0      7      21

Percentage of the requests served within a certain time (ms)
  50%      7
  66%      7
  75%      7
  80%      7
  90%      8
  95%      9
  98%     11
  99%     12
 100%     21 (longest request)
```

**6.  [Redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8010/?s=/index/api/redis`

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
Server Port:            8010

Document Path:          /?s=/index/api/redis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   34.717 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1440.22 [#/sec] (mean)
Time per request:       0.694 [ms] (mean)
Time per request:       0.694 [ms] (mean, across all concurrent requests)
Transfer rate:          209.56 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   0.1      1       7
Waiting:        0    1   0.1      1       7
Total:          1    1   0.1      1       7

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      7 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8010/?s=/index/api/redis`

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
Server Port:            8010

Document Path:          /?s=/index/api/redis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   8.040 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6218.83 [#/sec] (mean)
Time per request:       0.804 [ms] (mean)
Time per request:       0.161 [ms] (mean, across all concurrent requests)
Transfer rate:          904.89 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.9      1     213
Waiting:        0    1   1.9      1     213
Total:          0    1   1.9      1     213

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      2
 100%    213 (longest request)
```
---
run `ab -n 50000 -c 10 http://127.0.0.1:8010/?s=/index/api/redis`

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
Server Port:            8010

Document Path:          /?s=/index/api/redis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   7.424 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6734.60 [#/sec] (mean)
Time per request:       1.485 [ms] (mean)
Time per request:       0.148 [ms] (mean, across all concurrent requests)
Transfer rate:          979.94 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    1   1.3      1     209
Waiting:        1    1   1.3      1     209
Total:          1    1   1.3      1     209

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
---
run `ab -n 50000 -c 20 http://127.0.0.1:8010/?s=/index/api/redis`

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
Server Port:            8010

Document Path:          /?s=/index/api/redis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   7.711 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6484.24 [#/sec] (mean)
Time per request:       3.084 [ms] (mean)
Time per request:       0.154 [ms] (mean, across all concurrent requests)
Transfer rate:          943.51 [Kbytes/sec] received

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
  90%      4
  95%      4
  98%      4
  99%      5
 100%     11 (longest request)
```

**7.  [Redis]5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 50000 -c 1 http://127.0.0.1:8010/?s=/index/api/predis`

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
Server Port:            8010

Document Path:          /?s=/index/api/predis
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   29.442 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    1698.25 [#/sec] (mean)
Time per request:       0.589 [ms] (mean)
Time per request:       0.589 [ms] (mean, across all concurrent requests)
Transfer rate:          247.11 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     0    1   0.1      1       2
Waiting:        0    1   0.1      1       2
Total:          0    1   0.1      1       2

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      1
  99%      1
 100%      2 (longest request)
```
---
run `ab -n 50000 -c 5 http://127.0.0.1:8010/?s=/index/api/predis`

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
Server Port:            8010

Document Path:          /?s=/index/api/predis
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   7.228 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    6917.68 [#/sec] (mean)
Time per request:       0.723 [ms] (mean)
Time per request:       0.145 [ms] (mean, across all concurrent requests)
Transfer rate:          1006.58 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     0    1   1.4      1     208
Waiting:        0    1   1.4      1     208
Total:          0    1   1.4      1     209

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
run `ab -n 50000 -c 10 http://127.0.0.1:8010/?s=/index/api/predis`

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
Server Port:            8010

Document Path:          /?s=/index/api/predis
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   6.071 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    8236.33 [#/sec] (mean)
Time per request:       1.214 [ms] (mean)
Time per request:       0.121 [ms] (mean, across all concurrent requests)
Transfer rate:          1198.45 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     0    1   0.3      1       8
Waiting:        0    1   0.3      1       8
Total:          1    1   0.3      1       8

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      2
  98%      2
  99%      2
 100%      8 (longest request)
```
---
run `ab -n 50000 -c 20 http://127.0.0.1:8010/?s=/index/api/predis`

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
Server Port:            8010

Document Path:          /?s=/index/api/predis
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   6.264 seconds
Complete requests:      50000
Failed requests:        0
Total transferred:      7450000 bytes
HTML transferred:       550000 bytes
Requests per second:    7981.49 [#/sec] (mean)
Time per request:       2.506 [ms] (mean)
Time per request:       0.125 [ms] (mean, across all concurrent requests)
Transfer rate:          1161.37 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       3
Processing:     0    2   1.1      2     211
Waiting:        0    2   1.1      2     211
Total:          1    2   1.1      2     211

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      3
  80%      3
  90%      3
  95%      3
  98%      4
  99%      5
 100%    211 (longest request)
```


