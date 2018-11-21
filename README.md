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
mongodb
mysqli
mysqlnd
openssl
pcntl
pcre
PDO
pdo_mysql
Phar
posix
readline
redis
Reflection
session
shmop
SimpleXML
sockets
SPL
standard
swoole
sysvmsg
sysvsem
sysvshm
tokenizer
wddx
xml
xmlreader
xmlwriter
xsl
yac
yaf
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

| framework         | requests | concurrency | QPS          | DB                | Redis             |
| ----------------- | -------- | ----------- | -------      | ----------------- | ----------------- |
| php               | 50000    | 1           | 5921.02      | 1957.36           | 3609.36           |
|                   | 50000    | 5           | 20215.67     | 7431.98           | 10015.64          |
|                   | 50000    | 10          | 24196.09     | **8586.92**       | 11048.46          |
|                   | 50000    | 20          | **25267.66** | 8355.32           | **12246.58**      |
|                   |          |             |              |                   |                   |
| yaf               | 50000    | 1           | 3785.55      | 1555.77           | 2617.86           |
|                   | 50000    | 5           | 15239.7      | 6619.70           | 9324.99           |
|                   | 50000    | 10          | 18403.12     | 7245.48           | 10139.61          |
|                   | 50000    | 20          | 18750.99     | 7142.34           | 10386.87          |
|                   |          |             |              |                   |                   |
| msf               | 50000    | 1           | 9561.15      | 4119.30           | 4673.80           |
|                   | 50000    | 5           | 12367.39     | **6740.21**       | 6587.60           |
|                   | 50000    | 10          | **12289.68** | 6675.95           | **6712.17**       |
|                   | 50000    | 20          | 12253.09     | 6570.87           | 6619.07           |
|                   |          |             |              |                   |                   |
| CodeIgniter 3.1.9 | 50000    | 1           | 2005.39      | 1109.26           | 1392.06           |
|                   | 50000    | 5           | 8931.61      | 4751.27           | 5879.34           |
|                   | 50000    | 10          | 10395.04     | 5147.01           | 6423.77           |
|                   | 50000    | 20          | 10298.63     | 5159.50           | 6419.86           |
|                   |          |             |              |                   |                   |
| ThinkPHP 5.0.22   | 50000    | 1           | 1835.95      | 620.64            | 1440.22           |
|                   | 50000    | 5           | 7842.16      | 2762.88           | 6218.83           |
|                   | 50000    | 10          | 9294.35      | 2853.10           | 6734.60           |
|                   | 50000    | 20          | 8790.33      | 2805.68           | 6484.24           |
|                   |          |             |              |                   |                   |
| lumen 5.7         | 50000    | 1           | 1259.31      | 545.64            | 987.62            |
|                   | 50000    | 5           | 5095.16      | 2210.88           | 4273.42           |
|                   | 50000    | 10          | **6657.57**  | 2233.02           | 4508.09           |
|                   | 50000    | 20          | 6317.51      | **2252.16**       | **4526.78**       |
|                   |          |             |              |                   |                   |
| swoft             | 5000     | 1           | 3644.18      |                   |                   |
|                   | 5000     | 5           | 6370.04      |                   |                   |
|                   | 5000     | 10          | **6403.82**  |                   |                   |
|                   | 5000     | 20          | 6349.69      |                   |                   |
|                   |          |             |              |                   |                   |
| slim 3.11.0       | 5000     | 1           | 1269.25      |                   |                   |
|                   | 5000     | 5           | 4325.9       |                   |                   |
|                   | 5000     | 10          | 4657.73      |                   |                   |
|                   | 5000     | 20          | **4463.78**  |                   |                   |
|                   |          |             |              |                   |                   |
| ThinkPHP 3.2.23   | 5000     | 1           | 1297.2       |                   |                   |
|                   | 5000     | 5           | 3729.09      |                   |                   |
|                   | 5000     | 10          | **3964.2**   |                   |                   |
|                   | 5000     | 20          | 3522.08      |                   |                   |
|                   |          |             |              |                   |                   |
| laravel 5.7       | 50000    | 1           | 584.83       | 364.87            | 468.58            |
|                   | 50000    | 5           | 1917.07      | **1460.74**       | 1749.82           |
|                   | 50000    | 10          | 2227.28      | 1422.84           | **1850.04**       |
|                   | 50000    | 20          | **2240.73**  | 1460.62           | 1810.01           |
|                   |          |             |              |                   |                   |
| Yii 2.0.15        | 5000     | 1           | 603.1        |                   |                   |
|                   | 5000     | 5           | 1842.3       |                   |                   |
|                   | 5000     | 10          | **2062.58**  |                   |                   |
|                   | 5000     | 20          | 2023         |                   |                   |
|                   |          |             |              |                   |                   |
| cakephp 3.3.0     | 5000     | 1           | 533.37       |                   |                   |
|                   | 5000     | 5           | 1661.56      |                   |                   |
|                   | 5000     | 10          | **2030.89**  |                   |                   |
|                   | 5000     | 20          | 2020.06      |                   |                   |
|                   |          |             |              |                   |                   |
| symfony 4.1.7     | 5000     | 1           | 242.99       |                   |                   |
|                   | 5000     | 5           | 870.47       |                   |                   |
|                   | 5000     | 10          | 926.9        |                   |                   |
|                   | 5000     | 20          | **955.42**   |                   |                   |
|                   |          |             |              |                   |                   |
