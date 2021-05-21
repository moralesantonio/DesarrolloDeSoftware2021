<?php
require "modelos/usuarios.php";
class Controller {

    protected $user;
    public function __construct($param1, $param2){
        $this->user=new Usuarios();
        if(($param2!="") && ($param1!="login")){
           if (!$this->user->validarToken($param2)){
                new ErroresController("Token no valido");
           }
        } else if (($param2=="")&& ($param1!="login")) {
                new ErroresController("El campo token es un valor obligatorio");
        }
        if (method_exists($this, $param1)) {
            $this->$param1();
        } else {
            new ErroresController("Metodo no existe");
        }
    }
}