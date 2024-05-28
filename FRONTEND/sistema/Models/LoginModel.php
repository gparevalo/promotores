<?php

class LoginModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPromoters()
    {
        $sql = "SELECT * FROM staffs WHERE rolStaff = 'Promotor'";
        $request = $this->select_all($sql);

        return $request;
    }

    public function validar() 
    {
        $emailStaff = $_POST['emailStaff'];
        $claveStaff = $_POST['claveStaff'];
        $sql = "SELECT * FROM staffs WHERE emailStaff = '$emailStaff' AND claveStaff = '$claveStaff'"; 
        $request = $this->select($sql);

        if ($request) {
            
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 

            $_SESSION['usuario'] = $request;

        }

        return $request;
    }

}
