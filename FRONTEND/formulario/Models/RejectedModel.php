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
                WHERE prospects.estado = 'rechazados'";
        $request = $this->select_all($sql);

        return $request;
    }
}