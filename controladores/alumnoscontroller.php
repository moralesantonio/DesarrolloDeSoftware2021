<?php
require "modelos/alumnos.php";
class AlumnosController extends Controller{
    private $empleados;

    public function __construct($param1, $param2){
        $this->alumnos=new Alumnos();
        parent:: __construct($param1, $param2);
        
    }

    public function add(){
        if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['lab1']) && isset($_POST['lab2']) && isset($_POST['parcial'])){
            $this->alumnos->add($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['lab1'], $_POST['lab2'], $_POST['parcial']);
            $info=array('sucess'=>true, 'msg'=>'Alumno agregado con exito');

        } else {
            $info=array('sucess'=>false, 'msg'=>'El parametro titulo, descripcion y fecha son obligatorios');

        }

        echo json_encode($info);
    }

    public function getAll(){
        
            $info=array('success'=>true, 'data'=>$this->alumnos->getAll());
 
        echo json_encode($info);
    }


}