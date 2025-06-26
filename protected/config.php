<?php

date_default_timezone_set('America/Vancouver');

$config = array(
	'rewrite' => array(
    //    'm=admin&c=<c>&a=<a>'             => 'admin/<c>/<a>',
    //    'admin/main/panel'            => 'admin/main/panel',
	//	'admin/index.html' => 'admin/main/index',
        'api/captcha'      => 'api/captcha/image',
		'admin/<c>_<a>.html'    => 'admin/<c>/<a>', 
        '<c>/<a>?m=admin'       => 'admin/<c>/<a>',
        '<m>/<c>/<a>'          => '<m>/<c>/<a>',
		'<c>/<a>'          => '<c>/<a>',
        'admin'            => 'admin/main/index',
		'/'                => 'main/index',
	),
    
    'is_maintaining' => false,
    
    
    
    'enabled_theme' => 'default',
    
    'encrypt_key' => '25f1021e233ea641963def75ce6728af',
    
    'md5_key' => 'CROWNDIAMOND',
    
    'captcha_admin_login' => '0',
    'admin_mult_ip_login' => '1',
    
    'captcha_user_login' => 8,
    
    
    'backend_cookie_name' => 'CD_ADMIN_STAY',
    
 
    'upload_products_filetype' => 
    array (
        0 => '.jpg',
        1 => '.png',
        2 => '.gif',
        3 => '.pdf',
    ),
    

 
    'upload_products_filetype' => array('.png', '.jpg', '.jpeg', '.gif', '.bmp','.pdf'),
    'upload_products_filesize' => 5242880,
    'products_img_thumb' => array (
        0 => array (
            'w' => 350,
            'h' => 350,
            ),
        1 => array (
            'w' => 150,
            'h' => 150,
            ),
        2 => array (
            'w' => 100,
            'h' => 100,
            ),
        3 => array (
            'w' => 50,
            'h' => 50,
            ),
        4 => array (
            'w' => 500,
            'h' => 500,
        ),
    ),
    
    'products_album_thumb' => array (
        0 => array (
            'w' => 350,
            'h' => 350,
            ),
        1 => array (
            'w' => 50,
            'h' => 50,
            ),
        2 => array (
            'w' => 500,
            'h' => 500,
        ),
    ),
    
);
    
$domain = array(
	"localhost" => array( // 调试配置
		'debug' => 1,
        'mysql' => array(
        'MYSQL_HOST' => 'localhost',
        'MYSQL_PORT' => '3306',
        'MYSQL_USER' => 'root',
        'MYSQL_DB'   => 'crowndiamond_db_develop',
        'MYSQL_PASS' => '',
        'MYSQL_DB_TABLE_PRE' => 'cd_',
        'MYSQL_CHARSET' => 'UTF8',
        ),
     "AppPath" => "/crowndiamond",
     "http_host" => 'http://localhost/crowndiamond',
     "is_localhost" => 1,
     "protocol_str" => "http://", //local host use http://, this variable is used in speed.php : url

	),
    "192.168.1.69" => array( // 调试配置
		'debug' => 1,
        'mysql' => array(
        'MYSQL_HOST' => 'localhost',
        'MYSQL_PORT' => '3306',
        'MYSQL_USER' => 'root',
        'MYSQL_DB'   => 'crowndiamond_db_develop',
        'MYSQL_PASS' => '',
        'MYSQL_DB_TABLE_PRE' => 'cd_',
        'MYSQL_CHARSET' => 'UTF8',
        ),
     "AppPath" => "/crowndiamond",
     "http_host" => 'http://192.168.1.69/crowndiamond',
     "is_localhost" => 1,
     "protocol_str" => "http://", //local host use http://, this variable is used in speed.php : url
	),

    "192.168.1.113" => array( // 调试配置
		'debug' => 1,
        'mysql' => array(
        'MYSQL_HOST' => 'localhost',
        'MYSQL_PORT' => '3306',
        'MYSQL_USER' => 'root',
        'MYSQL_DB'   => 'crowndiamond_db_develop',
        'MYSQL_PASS' => '',
        'MYSQL_DB_TABLE_PRE' => 'cd_',
        'MYSQL_CHARSET' => 'UTF8',
        ),
     "AppPath" => "/crowndiamond",
     "http_host" => 'http://192.168.1.113/crowndiamond',
     "is_localhost" => 1,
     "protocol_str" => "http://", //local host use http://, this variable is used in speed.php : url
	),
    
    "www.crowndiamond.ca" => array( //线上配置，有安全证书
		'debug' => 0,
		'mysql' => array(
            'MYSQL_HOST' => 'localhost',
            'MYSQL_PORT' => '3306',
            'MYSQL_USER' => 'user123cdw',
            'MYSQL_DB'   => 'crowndiamond_db_development',
            'MYSQL_PASS' => 'xxxxxx',
            'MYSQL_DB_TABLE_PRE' => 'cd_',
            'MYSQL_CHARSET' => 'UTF8',
        ),
        "AppPath" => "",
        "http_host" => '',
        "is_localhost" => 0,
        //local host use http://, this variable is used in speed.php : url
        "protocol_str" => "https://", 
        
	),
    
    "crowndiamond.ca" => array( //线上配置，有安全证书
		'debug' => 0,
		'mysql' => array(
            'MYSQL_HOST' => 'localhost',
            'MYSQL_PORT' => '3306',
            'MYSQL_USER' => 'user123cdw',
            'MYSQL_DB'   => 'crowndiamond_db_development',
            'MYSQL_PASS' => 'xxxxxx',
            'MYSQL_DB_TABLE_PRE' => 'cd_',
            'MYSQL_CHARSET' => 'UTF8',
        ),
        "AppPath" => "",
        "http_host" => '',
        "is_localhost" => 0,
        //local host use http://, this variable is used in speed.php : url
        "protocol_str" => "https://", 
	),

   
);

// 为了避免开始使用时会不正确配置域名导致程序错误，加入判断
if(empty($domain[$_SERVER["HTTP_HOST"]])) die("配置域名不正确，请确认".$_SERVER["HTTP_HOST"]."的配置是否存在！");

return $domain[$_SERVER["HTTP_HOST"]] + $config;
