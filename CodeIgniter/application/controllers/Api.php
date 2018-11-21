<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function hello()
    {
        echo "hello world";
    }

    public function db()
    {
        $this->load->database();
        $query  = $this->db->get_where('test', array('id' => 1));
        $result = $query->row_array()['name'];
        echo $result;
    }

    public function setRedis()
    {
        $this->load->driver('cache');
        $this->cache->redis->save('ci', 'hello world', 60 * 3600);
    }

    public function redis()
    {
        $this->load->driver('cache');
        $result = $this->cache->redis->get('ci');
        echo $result;
    }
}
