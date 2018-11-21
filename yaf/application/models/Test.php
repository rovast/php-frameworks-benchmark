<?php

/**
 * @name TestModel
 * @desc   sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author corerman
 */
class TestModel
{
    public function __construct()
    {
    }

    public function getName()
    {
        $host = '127.0.0.1';
        $db   = 'benchmark';
        $user = 'benchmark';
        $pass = 'benchmark';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $fetchList = $pdo->query('SELECT * FROM `test`')->fetch();

        return $fetchList['name'];
    }
}
