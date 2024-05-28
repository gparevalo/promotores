<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class StaffsModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getStaffs()
    {
        $sql = "SELECT * FROM staffs WHERE rolStaff != 'Supervisor' ORDER BY idStaff DESC";
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

        if ($idStaff != "") {
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
        } else {
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

        if ($idStaff) {
            return $request_update;
        }

        return $request_insert;
    }

    public function editStaff($idStaff)
    {
        $namesStaff = $_POST['namesStaffE'.$idStaff];
        $phoneStaff = $_POST['phoneStaffE'.$idStaff];
        $emailStaff = $_POST['emailStaffE'.$idStaff];
        $claveStaff = $_POST['claveStaffE'.$idStaff];


        $sql_update = "UPDATE staffs SET namesStaff = ?, phoneStaff= ?, emailStaff= ?, claveStaff= ? WHERE idStaff = ?";
        $arrData_update = array(
            $namesStaff,
            $phoneStaff,
            $emailStaff,
            $claveStaff,
            $idStaff
        );

        $request_update = $this->update($sql_update, $arrData_update);
        return $request_update;
    }

    function deleteStaff($id)
    {
        $sql = "DELETE FROM staffs WHERE idStaff = $id";
        $request_delete = $this->delete($sql);

        return $request_delete;
    }

    public function sendEmail($correo, $clave)
    {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'mail.promotores.cofeps.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'contactoweb@promotores.cofeps.com';
            $mail->Password   = 'contactoweb2024';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('contactoweb@promotores.cofeps.com', 'Cofeps');
            $mail->addAddress($correo);
            $mail->addAddress('contactoweb@promotores.cofeps.com');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'FORMULARIO DE CONTACTO';
            $mail->Body = "
    <h2>Información del Contacto</h2>
    <table>
        <tr><td><strong>Correo:</strong></td><td>$correo</td></tr>
        <tr><td><strong>Clave:</strong></td><td>$clave</td></tr>
    </table>

";

            // Configuración adicional para un correo HTML
            $mail->isHTML(true);
            $mail->AltBody = "Información del Contacto:\n\n
    Correo: $correo\n
    Clave: $clave\n";


        
            return true;

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
