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
        $query = $this->db->get_where('test', array('id' => 1));
        $result = $query->row_array()['name'];
        echo $result;
    }
}
