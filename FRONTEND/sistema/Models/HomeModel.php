<?php

class HomeModel extends Mysql
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

    function addProspect()
    {
        $idProspect = $_POST['idProspect'];
        $category = ($_POST['category'] === 'Otra') ? $_POST['otraCategoria'] : $_POST['category'];
        $nameCProspect = $_POST['nameCProspect'];
        $directionProspect = $_POST['directionProspect'];
        $serviceProspect = $_POST['serviceProspect'];
        $partnerProspect = $_POST['partnerProspect'];
        $idPromoter = $_POST['idPromoter'];
        $idApprover = $_POST['idApprover'];
        $idInstaller = $_POST['idInstaller'];
        $notaProspect = $_POST['notaProspect'];
        $nameProspect = $_POST['nameProspect'];
        $lastNameProspect = $_POST['lastNameProspect'];
        $rucCIProspect = $_POST['rucCIProspect'];
        $phoneProspect = $_POST['phoneProspect'];
        $emailProspect = $_POST['emailProspect'];
        $imgProspect = $_POST['imgProspectValue'];
        $estado = ($serviceProspect === 'no') ? 'rechazados' : 'prospectos';

        $uploadDirectory = __DIR__ . "/images/prospects/";

        if (isset($_FILES['imgProspect'])) 
        {
            $localFilePath = $uploadDirectory . $imgProspect;
            $tempFilePath = $_FILES['imgProspect']['tmp_name'];
            move_uploaded_file($tempFilePath, $localFilePath);
        }

        if ($idProspect != "") 
        {
            $sql_update = "UPDATE prospects SET category = ?, nameCProspect= ?, directionProspect= ?, serviceProspect= ?, partnerProspect= ?, idPromoter= ?, idApprover= ?, idInstaller= ?, notaProspect= ?, nameProspect= ?, lastNameProspect= ?, rucCIProspect= ?, phoneProspect= ?, emailProspect= ?, imgProspect= ?, estado= ? WHERE idProspect = ?";
            $arrData_update = array(
                $category,
                $nameCProspect,
                $directionProspect,
                $serviceProspect,
                $partnerProspect,
                $idPromoter,
                $idApprover,
                $idInstaller,
                $notaProspect,
                $nameProspect,
                $lastNameProspect,
                $rucCIProspect,
                $phoneProspect,
                $emailProspect,
                $imgProspect,
                $estado,
                $idProspect
            );

            $request_update = $this->update($sql_update, $arrData_update);
        } else 
        {
            $sql_insert = "INSERT INTO prospects (category, nameCProspect, directionProspect, serviceProspect, partnerProspect, idPromoter, idApprover, idInstaller, notaProspect, nameProspect, lastNameProspect, rucCIProspect, phoneProspect, emailProspect, imgProspect, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $arrData_insert = array(
                $category,
                $nameCProspect,
                $directionProspect,
                $serviceProspect,
                $partnerProspect,
                $idPromoter,
                $idApprover,
                $idInstaller,
                $notaProspect,
                $nameProspect,
                $lastNameProspect,
                $rucCIProspect,
                $phoneProspect,
                $emailProspect,
                $imgProspect,
                $estado
            );

            $request_insert = $this->insert($sql_insert, $arrData_insert);
        }

        if ($idProspect) 
        {
            return $request_update;
        }

        return $request_insert;
    }

    function sendRejectedProspect()
    {
        $idProspect = $_POST['idRProspect'];
        $notaProspect = $_POST['notaRProspect'];

        $sql_update = "UPDATE prospects SET notaProspect = ?, estado = 'rechazados' WHERE idProspect = ?";
        $arrData_update = array(
            $notaProspect,
            $idProspect
        );

        $request_update = $this->update($sql_update, $arrData_update);

        return $request_update;
        
    }

    function pasarComercio($idProspect)
    {
        $visitedProspect = "Finalizado";
        $openingProspect = "Finalizado";
        $trainingProspect = "Finalizado";
        $affiliationProspect = "Finalizado";
        $installedProspect = "Finalizado";

        $sql_update = "UPDATE prospects SET visitedProspect = ?, openingProspect = ?, trainingProspect = ?, affiliationProspect = ?,installedProspect = ? WHERE idProspect = ?";
        $arrData_update = array(
            $visitedProspect,
            $openingProspect,
            $trainingProspect,
            $affiliationProspect,
            $installedProspect,
            $idProspect
        );

        $request_update = $this->update($sql_update, $arrData_update);

        return $request_update;
    }
}
