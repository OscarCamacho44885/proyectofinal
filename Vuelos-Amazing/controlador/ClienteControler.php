<?php
require_once '../modelo/ClienteModel.php';

class ClienteControler {
    private $ClienteModel;

    // Constructor para inicializar el modelo
    public function __construct() {
        $this->ClienteModel = new ClienteModel();
    }

    // Método para insertar un nuevo administrador
    public function insertarCliente($nombre, $Apaterno, $Amaterno, $cell, $correo, $password) {
        // Llamar al modelo para insertar el nuevo administrador
        return $this->ClienteModel->insertarCliente($nombre, $Apaterno, $Amaterno, $cell, $correo, $password);
    }
}
?>