<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class movimientosModel extends Database
{
    public function getAllMovimientos($limit){
        return $this->select("SELECT * FROM movimientos LIMIT ?", ["i", $limit]);
    }


    public function insertMovimiento($datos){

        $sql = "INSERT INTO movimientos (`ingreso`, `egreso`, `fecha`) VALUES (".$datos[0]['monto_ingreso'].", ".$datos[1]['monto_egreso'].", '".$datos[2]['fecha_transaccion']."'); ";
        return $this->insert($sql);
    }


    public function getGanaciasPorMes($datos){

        $sql = 'SELECT (SUM(ingreso) - SUM(egreso)) AS ganancias FROM `movimientos` WHERE DATE_FORMAT(fecha, "%Y-%m") = "'.$datos[0]['fecha_transaccion'].'";';
        return $this->select($sql);
    }

    public function getGananciasTotal(){
        $sql = 'SELECT (SUM(ingreso) - SUM(egreso)) AS ganancias, DATE_FORMAT(fecha, "%Y-%m") AS fecha
                FROM movimientos
                GROUP BY DATE_FORMAT(fecha, "%Y-%m")';
        return $this->select($sql);
    }
}


?>