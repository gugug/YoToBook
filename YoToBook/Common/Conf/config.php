

<?php
return array(
    


//允许二级控制器
'CONTROLLER_LEVEL'=>1,//使用多级控制器后，其他级的都不可以使用

//定义按顺序传参绑定 
'URL_PARAMS_BIND_TYPE'=>1,//省略键值对中的键，按变量的顺序绑定，此时绑定后就不可以变量名来绑定的

//URL可以不区分大小写
'URL_CASE_INSENSITIVE' =>true,
    
'MODULE_ALLOW_LIST' => array('Home','Admin','Common'),
'DEFAULT_MODULE' => 'Home', // 默认模块，可以省去模块名输入

  'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
  'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    
//设置多个伪静态的后缀
'URL_HTML_SUFFIX'=>'html|shtml|xml',
    
'URL_MODEL' =>2,

'DB_TYPE'=>'mysql', //数据库类型 
'DB_HOST'=>'localhost', //服务器地址 
'DB_NAME'=>'YoToBook', //数据库名 
'DB_USER'=>'root', //用户名 
'DB_PWD'=>'', //密码 
'DB_PORT'=>3306, //端口 
'DB_PREFIX'=>'', //数据库表前缀 
);