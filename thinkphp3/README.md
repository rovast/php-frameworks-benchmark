### thinkphp 3.2.3 测试细节

**1. Clear all caches and logs, warmup caches if needed** 

run `sudo service nginx restart && sudo service php7.1-fpm restart`

**2. Clear all caches and logs, warmup caches if needed** 

run `./init_benchmark.sh`

**3.  First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache**

run `ab -n 1000 -c 1 http://127.0.0.1:8009/?m=home&c=api&a=hello`

**4.  5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20)** 

run `ab -n 5000 -c 1 http://127.0.0.1:8009/?m=home&c=api&a=hello`

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
Server Port:            8009

Document Path:          /?m=home&c=api&a=hello
Document Length:        11 bytes

Concurrency Level:      1
Time taken for tests:   3.854 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    1297.20 [#/sec] (mean)
Time per request:       0.771 [ms] (mean)
Time per request:       0.771 [ms] (mean, across all concurrent requests)
Transfer rate:          401.58 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   0.3      1       5
Waiting:        1    1   0.3      1       5
Total:          1    1   0.3      1       5

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      1
  95%      1
  98%      2
  99%      3
 100%      5 (longest request)
```
---
run `ab -n 5000 -c 5 http://127.0.0.1:8009/?m=home&c=api&a=hello`

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
Server Port:            8009

Document Path:          /?m=home&c=api&a=hello
Document Length:        11 bytes

Concurrency Level:      5
Time taken for tests:   1.341 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    3729.09 [#/sec] (mean)
Time per request:       1.341 [ms] (mean)
Time per request:       0.268 [ms] (mean, across all concurrent requests)
Transfer rate:          1154.42 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       0
Processing:     1    1   1.0      1       8
Waiting:        0    1   1.0      1       8
Total:          1    1   1.0      1       9

Percentage of the requests served within a certain time (ms)
  50%      1
  66%      1
  75%      1
  80%      1
  90%      2
  95%      4
  98%      5
  99%      6
 100%      9 (longest request)
```
---
run `ab -n 5000 -c 10 http://127.0.0.1:8009/?m=home&c=api&a=hello`

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
Server Port:            8009

Document Path:          /?m=home&c=api&a=hello
Document Length:        11 bytes

Concurrency Level:      10
Time taken for tests:   1.261 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    3964.20 [#/sec] (mean)
Time per request:       2.523 [ms] (mean)
Time per request:       0.252 [ms] (mean, across all concurrent requests)
Transfer rate:          1227.20 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       1
Processing:     1    2   1.6      2      12
Waiting:        1    2   1.6      2      12
Total:          1    3   1.6      2      12

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      2
  75%      2
  80%      2
  90%      4
  95%      7
  98%      9
  99%     10
 100%     12 (longest request)
```
---
run `ab -n 5000 -c 20 http://127.0.0.1:8009/?m=home&c=api&a=hello`

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
Server Port:            8009

Document Path:          /?m=home&c=api&a=hello
Document Length:        11 bytes

Concurrency Level:      20
Time taken for tests:   1.420 seconds
Complete requests:      5000
Failed requests:        0
Total transferred:      1585000 bytes
HTML transferred:       55000 bytes
Requests per second:    3522.08 [#/sec] (mean)
Time per request:       5.678 [ms] (mean)
Time per request:       0.284 [ms] (mean, across all concurrent requests)
Transfer rate:          1090.33 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.0      0       2
Processing:     2    6   4.1      4      56
Waiting:        2    6   4.1      4      56
Total:          2    6   4.1      4      56

Percentage of the requests served within a certain time (ms)
  50%      4
  66%      5
  75%      6
  80%      7
  90%     10
  95%     12
  98%     14
  99%     15
 100%     56 (longest request)
```
