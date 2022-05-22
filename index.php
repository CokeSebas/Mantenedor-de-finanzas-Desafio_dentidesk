<?php

    require __DIR__ . "/inc/bootstrap.php";

    require PROJECT_ROOT_PATH . "/Controller/Api/movimientosController.php";
    

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );

    $objFeedController = new movimientosController();


    if ((isset($uri[3]) && $uri[3] != 'movimientos') || !isset($uri[4])) {
        header("HTTP/1.1 404 Not Found");
        exit();
    }

    if($uri[4] == 'list'){
        
        $strMethodName = $uri[4] . 'Action';
        $objFeedController->{$strMethodName}();
    }
    

    if($uri[4] == 'guardar'){
        $strMethodName = $uri[4] . 'Action';
        $objFeedController->{$strMethodName}();
    }
    
    if($uri[4] == 'ganancias'){
        $strMethodName = $uri[4] . 'Action';
        $objFeedController->{$strMethodName}();
    }





?>