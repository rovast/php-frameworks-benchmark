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

### 框架版本

- laravel: 5.7.13
