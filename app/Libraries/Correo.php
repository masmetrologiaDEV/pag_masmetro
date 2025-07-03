<?php namespace App\Libraries;

use CodeIgniter\Email\Email;

class Correo
{
    public function correoContacto($datos)
    {
        $email = \Config\Services::email(); // Obtiene el servicio de correo de CI4

        $logo = base_url('template/images/logo.png');
        $mensaje = <<<EOD
            <img width='400' src='$logo'><br>
            <h2>Mensaje de contacto desde el sitio web</h2>
            <p><b>Nombre:</b> {$datos['name']}</p>
            <p><b>Correo:</b> {$datos['email']}</p>
            <p><b>Asunto:</b> {$datos['subject']}</p>
            <p><b>Mensaje:</b><br>{$datos['message']}</p>
EOD;
        $correo =$datos['email'];
        //echo var_dump($correo);die();
        $email->setFrom('tickets@masmetrologia.mx', 'Web MAS Metrología');
        $remitentes = array('tickets@masmetrologia.mx',$correo);
        $email->setTo($remitentes); // Cambia esto por el correo receptor
        
        $email->setSubject($datos['subject']);
        $email->setMessage($mensaje);

        return $email->send();
    }
}
