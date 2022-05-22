<?php

    require __DIR__ . "/inc/bootstrap.php";

    require PROJECT_ROOT_PATH . "/Controller/Api/movimientosController.php";
    
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('index.php',$uri);

    if(count($uri) == 1){
        header('Location: Views/menu.php');
    }elseif(count($uri) == 2){
        $uri = explode('/',$uri[1]);

        $objFeedController = new movimientosController();


        if ((isset($uri[1]) && $uri[1] != 'movimientos') || !isset($uri[2])) {
            header("HTTP/1.1 404 Not Found");
            exit();
        }

        if($uri[2] == 'list'){
            
            $strMethodName = $uri[2] . 'Action';
            $objFeedController->{$strMethodName}();
        }

        if($uri[2] == 'guardar'){
            $strMethodName = $uri[2] . 'Action';
            $objFeedController->{$strMethodName}();
        }
        
        if($uri[2] == 'ganancias'){
            $strMethodName = $uri[2] . 'Action';
            $objFeedController->{$strMethodName}();
        }


        if($uri[2] == 'gananciasTotal'){
            $strMethodName = $uri[2] . 'Action';
            $objFeedController->{$strMethodName}();
        }

    }else{
        header("HTTP/1.1 404 Not Found");
        exit();
    }


    
?>