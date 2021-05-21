<?php
class Alumnos extends BaseDeDatos {
    public function __construct(){
        $this->conectar();
    }

    public function add($nombre, $direccion, $telefono, $lab1, $lab2, $parcial){
        $result=$this->conexion->query("insert into alumnos set Nombre='{$nombre}', Direccion='{$direccion}', Telefono='{$telefono}',
                                Laboratorio1='{$lab1}', Laboratorio2='{$lab2}', Parcial='{$parcial}'");
        return true;
    }


    public function getAll(){
        $result=$this->conexion->query("SELECT idalu, Nombre, Direccion, Telefono, Laboratorio1, Laboratorio2, Parcial,
          (Laboratorio1*0.25)+(Laboratorio1*0.25)+(Parcial*0.50) AS PROMEDIO from alumnos");
          return $this->getArrayfromResult($result);

    }




}