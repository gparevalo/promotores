<?php

class InstallerModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProspects($idInstaller)
    {
        $sql = "SELECT 
                    prospects.*,
                    IFNULL(promotor.namesStaff, 'No asignado') AS nombrePromotor,
                    IFNULL(aprobador.namesStaff, 'No asignado') AS nombreAprobador,
                    IFNULL(instalador.namesStaff, 'No asignado') AS nombreInstalador
                FROM 
                    prospects
                LEFT JOIN 
                    staffs AS promotor ON prospects.idPromoter = promotor.idStaff AND promotor.rolStaff = 'Promotor'
                LEFT JOIN 
                    staffs AS aprobador ON prospects.idApprover = aprobador.idStaff AND aprobador.rolStaff = 'Aprobador'
                LEFT JOIN 
                    staffs AS instalador ON prospects.idInstaller = instalador.idStaff AND instalador.rolStaff = 'Instalador'    
                WHERE prospects.estado = 'prospectos' AND prospects.idInstaller = $idInstaller AND prospects.affiliationProspect = 'Finalizado'  ORDER BY prospects.idProspect DESC";

        $request = $this->select_all($sql);

        return $request;
    }

    function getProspectByID($id)
    {
        $sql = "SELECT 
                    prospects.*,
                    IFNULL(promotor.namesStaff, 'No asignado') AS nombrePromotor,
                    IFNULL(aprobador.namesStaff, 'No asignado') AS nombreAprobador,
                    IFNULL(instalador.namesStaff, 'No asignado') AS nombreInstalador
                FROM 
                    prospects
                LEFT JOIN 
                    staffs AS promotor ON prospects.idPromoter = promotor.idStaff AND promotor.rolStaff = 'Promotor'
                LEFT JOIN 
                    staffs AS aprobador ON prospects.idApprover = aprobador.idStaff AND aprobador.rolStaff = 'Aprobador'
                LEFT JOIN 
                    staffs AS instalador ON prospects.idInstaller = instalador.idStaff AND instalador.rolStaff = 'Instalador'
                WHERE idProspect = $id
                ";
        $request_edit = $this->select($sql);

        return $request_edit;
    }

    public function getComments($idProspect)
    {

        $sql = "SELECT s.namesStaff, s.rolStaff, c.*
                FROM comments c
                INNER JOIN staffs s ON c.idStaff = s.idStaff
                WHERE c.idProspect = $idProspect";
        $request = $this->select_all($sql);

        return $request;
    }

    public function addComments()
    {
        $idStaff = $_SESSION['usuario']['idStaff'];
        $idProspect = $_POST['idProspectC'];
        $comment = $_POST['commentC'];

        $sql_insert = "INSERT INTO comments (idProspect, idStaff, comment) VALUES (?, ?, ?)";
        $arrData_insert = array(
            $idProspect,
            $idStaff,
            $comment,
        );

        $request_insert = $this->insert($sql_insert, $arrData_insert);

        return $request_insert;
    }

    function agregarProspect() 
    {
        $idProspect = $_POST['idProspect'];
        $installedProspect = $_POST['installedProspect'];
        $imgInstalledProspect = $_POST['imgInstalledProspectValue'];

        $baseDirectory = $_SERVER['DOCUMENT_ROOT'] . "/formulario";
        $uploadDirectory = $baseDirectory . "/Models/images/prospects/";

        if (isset($_FILES['imgInstalledProspect'])) 
        {
            $localFilePath = $uploadDirectory . $imgInstalledProspect;
            $tempFilePath = $_FILES['imgInstalledProspect']['tmp_name'];
            move_uploaded_file($tempFilePath, $localFilePath);
        }


        $sql_update = "UPDATE prospects SET installedProspect= ?, imgInstalledProspect = ? WHERE idProspect = ?";
        $arrData_update = array(
            $installedProspect,
            $imgInstalledProspect,
            $idProspect
        );

        $request_update = $this->update($sql_update, $arrData_update);
        
        return $request_update;
    }
}
