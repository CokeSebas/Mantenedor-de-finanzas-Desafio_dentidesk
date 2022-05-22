<?php
class movimientosController extends BaseController{

    /**
     * "/movimientos/list" Endpoint - Obtiene lista de movimentos
     */
    public function listAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();

 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $movimientosModel = new movimientosModel();

                $intLimit = 10;
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $intLimit = $arrQueryStringParams['limit'];
                }
 
                $arrUsers = $movimientosModel->getAllMovimientos($intLimit);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Algo Salio Mal! Favor contactar Soporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Metodo no compatible';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
 
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    /**
     * /movimientos/guardar EndPoint - Inserta un nuevo registro
     */
    public function guardarAction(){

        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->postQueryStringParams();

        if (strtoupper($requestMethod) == 'POST') {
            try {
                $movimientosModel = new movimientosModel();
 
                $dataInsert = $movimientosModel->insertMovimiento($arrQueryStringParams);

                $salida['status'] = true;
                $salida['id_insert'] = $dataInsert;
                
                $responseData = json_encode($salida);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Algo Salio Mal! Favor contactar Soporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Metodo no compatible';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

         // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }


    /**
     * /movimientos/ganancias EndPoint - Obtiene las ganancias de un mes
     */
    public function gananciasAction(){

        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->postQueryStringParams();

        if (strtoupper($requestMethod) == 'POST') {
            try {
                $movimientosModel = new movimientosModel();
            
                $ganancias = 0;
 
                $arrGanancias = $movimientosModel->getGananciasMes($arrQueryStringParams);

                if($arrGanancias[0]['ganancias'] != NULL){
                    $ganancias = $arrGanancias[0]['ganancias'];
                }
                $salida['status'] = true;
                $salida['fecha'] = $arrQueryStringParams[0]['fecha_transaccion'];
                $salida['arrGanancias'] = $ganancias;
                
                $responseData = json_encode($salida);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Algo Salio Mal! Favor contactar Soporte.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Metodo no compatible';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

         // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

}