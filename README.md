# php-frameworks-benchmark

php 主流框架压力测试

### 测试环境

- OS: MacOS 10.14.1
- Processor: 2.3 GHz Intel Core i5
- Memory: 8 GB 2133 MHz LPDDR3
- PHP: 7.1.24
- Nginx: 1.15.6

### 测试策略

> 参考 http://www.phpbenchmarks.com/en/benchmark-protocol.html

- #1 PHP FPM is restarted, to clear OPCache 
- #2 Clear all caches and logs, warmup caches if needed 
- #3 First unsaved benchmark is launched, 1,000 calls, concurrency 1, to init caches and fill OPCache 
- #4 5 benchmarks are launched, 50,000 calls, for each concurrencies (1, 5, 10 and 20) 
- #5 Only best results are added to Score, for each concurrencies

### 框架版本

- laravel: 5.7.13
