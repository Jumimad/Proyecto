<?php

/**
 *
 */
class Details extends Controllers
{

    function __construct()
    {
        parent::__construct();
    }

    public function details($idRol)
    {
        $userName = Session::getSession("Usuario");
        if ($userName != "") {
            $response = $this->model->getDataModel("*", "rol", "id_rol = '" . $idRol . "'");
            $this->view->render('Rol', $this, "details", $response);
        } else {
            header("Location: " . URL);
        }
    }

}