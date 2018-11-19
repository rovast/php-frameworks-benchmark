# php-frameworks-benchmark

php 主流框架压力测试

### 测试环境

- OS: Deepin GNU/Linux 15.7
- Processor: Intel Core i5 8400 @ 2.84 GHz x 6 
- Memory: 7.63 G
- PHP: 7.1.16
- Nginx: 1.13.12

PHP 已加载模块

```bash
# php -m

[PHP Modules]
calendar
Core
ctype
curl
date
dom
exif
fileinfo
filter
ftp
gettext
hash
iconv
intl
json
libxml
mbstring
openssl
pcntl
pcre
PDO
Phar
posix
readline
Reflection
session
shmop
SimpleXML
sockets
SPL
standard
sysvmsg
sysvsem
sysvshm
tokenizer
wddx
xml
xmlreader
xmlwriter
xsl
Zend OPcache
zip
zlib

[Zend Modules]
Zend OPcache
```

### 测试策略

> 参考 http://www.phpbenchmarks.com/en/benchmark-protocol.html

- #1 PHP FPM is restarted, to clear OPCache 
- #2 Clear all caches and logs, warmup caches if needed 
- #3 First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache 
- #4 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 
- #5 Only best results are added to Score, for each concurrencies

### 测试细节

测试细节在各自的文件夹的 README.md 中有详细说明

### 测试结果

| framework         | requests | concurrency | QPS     |
| ----------------- | -------- | ----------- | ------- |
| laravel 5.7       | 5000     | 1           | 591.67  |
|                   | 5000     | 5           | 1787.24 |
|                   | 5000     | 10          | 2000.37 |
|                   | 5000     | 20          | 1973.61 |
|                   |          |             |         |
| lumen 5.7         | 5000     | 1           | 1391.16 |
|                   | 5000     | 5           | 4761.69 |
|                   | 5000     | 10          | 5427.96 |
|                   | 5000     | 20          | 5018.9  |
|                   |          |             |         |
| CodeIgniter 3.1.9 | 5000     | 1           | 1994.78 |
|                   | 5000     | 5           | 7525.71 |
|                   | 5000     | 10          | 9081.93 |
|                   | 5000     | 20          | 9337.09 |
|                   |          |             |         |
| slim 3.11.0       | 5000     | 1           | 1269.25 |
|                   | 5000     | 5           | 4325.9  |
|                   | 5000     | 10          | 4657.73 |
|                   | 5000     | 20          | 4463.78 |
|                   |          |             |         |
| cakephp 3.3.0     | 5000     | 1           | 533.37  |
|                   | 5000     | 5           | 1661.56 |
|                   | 5000     | 10          | 2030.89 |
|                   | 5000     | 20          | 2020.06 |
|                   |          |             |         |
| symfony 4.1.7     | 5000     | 1           | 242.99  |
|                   | 5000     | 5           | 870.47  |
|                   | 5000     | 10          | 926.9   |
|                   | 5000     | 20          | 955.42  |
|                   |          |             |         |
| Yii 2.0.15        | 5000     | 1           | 603.1   |
|                   | 5000     | 5           | 1842.3  |
|                   | 5000     | 10          | 2062.58 |
|                   | 5000     | 20          | 2023    |


