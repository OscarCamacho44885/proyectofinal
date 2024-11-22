<?php
require_once "../modelo/AdminsModel.php";

class AdminsControler {
    private $adminsModel;

    // Constructor para inicializar el modelo
    public function __construct() {
        $this->adminsModel = new AdminsModel();
    }

    // Método para insertar un nuevo administrador
    public function insertarAdmin($nombre, $correo, $password) {
        // Llamar al modelo para insertar el nuevo administrador
        return $this->adminsModel->insertarAdmin($nombre, $correo, $password);
    }
}
?>


