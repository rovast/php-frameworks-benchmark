<?php

/**
 * @name ApiController
 * @author corerman
 * @desc   默认控制器
 * @see    http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class ApiController extends Yaf_Controller_Abstract
{

    /**
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/yaf_api/index/index/index/name/corerman 的时候, 你就会发现不同
     */
    public function init()
    {
        /**
         * 如果是Ajax请求, 则关闭HTML输出
         */
        // if ($this->getRequest()->isXmlHttpRequest()) {
        Yaf_Dispatcher::getInstance()->disableView();
        //  }
    }

    public function helloAction()
    {
        //1. fetch query
        //   $this->disableView(); //关闭视图输出
        echo "hello world";
//		//2. fetch model
//		$model = new SampleModel();
//
//		//3. assign
//		$this->getView()->assign("content", $model->selectSample());
//		$this->getView()->assign("name", $name);

        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
    }

    public function dbAction()
    {
		$model = new TestModel();
		$result = $model->getName();

		echo $result;

        return false;
    }

    public function setRedisAction()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $redis->set('yaf', 'hello world', 60 * 3600);
        $redis->close();
    }

    public function redisAction()
    {
        $redis = new \Redis();
        $redis->connect('127.0.0.1');
        $result = $redis->get('yaf');
        echo $result;
    }
}
