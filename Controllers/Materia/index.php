<?php
/**
 *
 */

error_reporting(E_ALL ^ E_NOTICE);

class Index extends Controllers
{
    public $response;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $userName = Session::getSession("Usuario");
        if ($userName != ""){
            header("Location: " .URL. "Materia/Principal/principal");
        }else{
            $this->view->render('Home', $this,'index','');
        }
        //var_dump($this->view);
    }
    /*
    public function sigIn(){
        $this->view->render($this,'sigIn','');
    }
    */
}