<?php

class RejectedModel extends Mysql
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
                WHERE prospects.estado = 'rechazados'  ORDER BY prospects.idProspect DESC";
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
                WHERE prospects.estado = 'rechazados' AND idProspect = $id";
        $request_edit = $this->select($sql);

        return $request_edit;
    }

    public function getStaffs()
    {
        $sql = "SELECT * FROM staffs";
        $request = $this->select_all($sql);

        return $request;
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

    function deleteProspect($id)
    {
        $sql = "DELETE FROM prospects WHERE idProspect = $id";
        $request_delete = $this->delete($sql);

        return $request_delete;
    }
}