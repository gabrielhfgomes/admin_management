<?php

    if(isset($_SERVER['RDS_HOSTNAME'])) {
        define('DB_HOSTNAME', $_SERVER['RDS_HOSTNAME']);
    } else {
        define('DB_HOSTNAME','localhost');
    }
    
    if(isset($_SERVER['RDS_USERNAME'])) {
        define('DB_USERNAME', $_SERVER['RDS_USERNAME']);
    } else {
        define('DB_USERNAME','root');
    }

    if(isset($_SERVER['RDS_PASSWORD'])) {
        define('DB_PASSWORD', $_SERVER['RDS_PASSWORD']);
    } else {
        define('DB_PASSWORD','My-N7w_And.5ecure-P@s5w0rd');
    }

    define('DB_NAME','admin_management');
    define('DB_CHARSET','utf8');

    define('APP_ROOT', dirname(dirname(__FILE__)));

    if(isset($_SERVER['RDS_HOSTNAME'])) {
    define('URL_ROOT','http://adminmanagement1-env.eba-t2qyfah7.sa-east-1.elasticbeanstalk.com/admin_management');
    define('URL','http://adminmanagement1-env.eba-t2qyfah7.sa-east-1.elasticbeanstalk.com');
    } else {
        define('URL_ROOT', 'http://127.0.0.1/admin_management');
        define('URL', 'http://127.0.0.1');
    }
    define('SITE_NAME', 'Admin');
    define('APP_VERSION', '1.0.0');
    define('APP_DATE', 'NOV 29, 2020');
    define('APP_DATE_TIME_FORMAT', 'd/m/Y H:i:s');
