<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin','AppAPI'),
    'DEFAULT_MODULE'       =>    'Home',  // 默认模块

    //URL地址不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    'LOAD_EXT_CONFIG' => 'db', //如需创建新的数据库配置文件，必须在此声明
    'MD5_PRE'=>'sing_cms',
    'HTML_FILE_SUFFIX' => '.html',
    'URL_HTML_SUFFIX' => 'html|shtml|xml',  
	
    'DATA_CACHE_TYPE' => 'Memcache',   
    'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211',    
    'DATA_CACHE_TIME' => '3600',   
);
