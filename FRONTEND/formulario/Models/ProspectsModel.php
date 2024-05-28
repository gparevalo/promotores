<?php

class ProspectsModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProspects()
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
                WHERE prospects.estado = 'prospectos' 
                ORDER BY prospects.idProspect DESC";
        $request = $this->select_all($sql);

        return $request;
    }

    public function getStaffs()
    {
        $sql = "SELECT * FROM staffs";
        $request = $this->select_all($sql);

        return $request;
    }

    function addProspect()
    {
        $idProspect = $_POST['idProspect'];
        $category = $_POST['category'];
        $dateProspect = $_POST['dateProspect'];
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
        $imgProspect = $_POST['imgProspect'];
        $estado = $_POST['estado'];

        if ($idProspect != "") {
            $sql_update = "UPDATE prospects SET category = ?, dateProspect= ?, nameCProspect= ?, directionProspect= ?, serviceProspect= ?, partnerProspect= ?, idPromoter= ?, idApprover= ?, idInstaller= ?, notaProspect= ?, nameProspect= ?, lastNameProspect= ?, rucCIProspect= ?, phoneProspect= ?, emailProspect= ?, imgProspect= ?, estado= ? WHERE idProspect = ?";
            $arrData_update = array(
                $category,
                $dateProspect,
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
        } else {
            $sql_insert = "INSERT INTO prospects (category, dateProspect, nameCProspect, directionProspect, serviceProspect, partnerProspect, idPromoter, idApprover, idInstaller, notaProspect, nameProspect, lastNameProspect, rucCIProspect, phoneProspect, emailProspect, imgProspect, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $arrData_insert = array(
                $category,
                $dateProspect,
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

        if ($idProspect) {
            return $request_update;
        }
        return $request_insert;
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

    function deleteProspect($id)
    {
        $sql = "DELETE FROM prospects WHERE idProspect = $id";
        $request_delete = $this->delete($sql);

        return $request_delete;
    }
}
