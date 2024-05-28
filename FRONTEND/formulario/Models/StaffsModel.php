<?php

class StaffsModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getStaffs()
    {
        $sql = "SELECT * FROM staffs";
        $request = $this->select_all($sql);

        return $request;
    }

    public function addStaff() 
    {
        $idStaff = $_POST['idStaff'];
        $namesStaff = $_POST['namesStaff'];
        $phoneStaff = $_POST['phoneStaff'];
        $emailStaff = $_POST['emailStaff'];
        $claveStaff = $_POST['claveStaff'];
        $rolStaff = $_POST['rolStaff'];

        if ($idStaff != "") 
        {
            $sql_update = "UPDATE staffs SET namesStaff = ?, phoneStaff= ?, emailStaff= ?, claveStaff= ?, rolStaff= ? WHERE idStaff = ?";
            $arrData_update = array(
                $namesStaff,
                $phoneStaff,
                $emailStaff,
                $claveStaff,
                $rolStaff,
                $idStaff
            );

            $request_update = $this->update($sql_update, $arrData_update);
        } else 
        {
            $sql_insert = "INSERT INTO staffs (namesStaff, phoneStaff, emailStaff, claveStaff, rolStaff) VALUES (?, ?, ?, ?, ?)";
            $arrData_insert = array(
                $namesStaff,
                $phoneStaff,
                $emailStaff,
                $claveStaff,
                $rolStaff
            );

            $request_insert = $this->insert($sql_insert, $arrData_insert);
        }

        if ($idStaff) 
        {
            return $request_update;
        }

        return $request_insert;
    }
}