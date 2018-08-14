<?php
namespace AppAPI\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends Controller{

    public function index(){
        $this->show('这是接口的入口地址，说明环境安装已经正常。','utf-8');
    } 
}