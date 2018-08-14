<?php
return array(
	//'配置项'=>'配置值'
    'MODULE_ALLOW_LIST'    =>    array('AppAPI'),
    'DEFAULT_MODULE'       =>    'AppAPI',  // 默认模块

    //URL地址不区分大小写
    'URL_CASE_INSENSITIVE' =>true,
    'LOAD_EXT_CONFIG' => 'db', //如需创建新的数据库配置文件，必须在此声明 
    'HTML_FILE_SUFFIX' => '.html',
    'URL_HTML_SUFFIX' => 'html|shtml|xml',    
);
