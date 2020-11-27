<?php

    // Load Config
    require_once 'config/config.php';
    
    // Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/datetime_helper.php';
    require_once 'helpers/authetication_helper.php';

    // Autoload Core Libraries
    spl_autoload_register(function($className){
       require_once 'libraries/' . $className . '.php';
    });

