<?php namespace App\Libraries;

use CodeIgniter\Email\Email;
use App\Models\ContenidoModel; // ✅ Importar el modelo

class Correo
{
    public function correoContacto($datos)
    {
        $email = \Config\Services::email(); // Obtiene el servicio de correo de CI4
        
       

        
        $mensaje = <<<EOD
<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background-color: #fff;">
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <td style="width: 70%; vertical-align: middle;">
                <h2 style="color: #004080; margin: 0;">Mensaje desde el sitio web</h2>
            </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 6px 10px; font-weight: bold; width: 110px;">Nombre:</td>
            <td style="padding: 6px 10px;">{$datos['name']}</td>
        </tr>
        <tr>
            <td style="padding: 6px 10px; font-weight: bold;">Correo:</td>
            <td style="padding: 6px 10px;"><a href="mailto:{$datos['email']}">{$datos['email']}</a></td>
        </tr>
        <tr>
            <td style="padding: 6px 10px; font-weight: bold;">Teléfono:</td>
            <td style="padding: 6px 10px;">{$datos['phone']}</td>
        </tr>
        <tr>
            <td style="padding: 6px 10px; font-weight: bold;">Asunto:</td>
            <td style="padding: 6px 10px;">{$datos['subject']}</td>
        </tr>
        <tr>
            <td style="padding: 6px 10px; font-weight: bold;">Mensaje:</td>
            <td style="padding: 6px 10px;">{$datos['message']}</td>
        </tr>
    </table>

    <hr style="margin: 20px 0;">
    <p style="font-size: 12px; color: #555; text-align: center;">
        Este mensaje fue enviado desde el formulario de contacto del sitio web de MAS Metrología.
    </p>
</div>
EOD;



        $correo =$datos['email'];
        //echo var_dump($correo);die();
        $email->setFrom('tickets@masmetrologia.mx', 'Web MAS Metrología');
        $remitentes = array('info@masmetrologia.com',$correo);
        $email->setTo($remitentes); // Cambia esto por el correo receptor
        
        $email->setSubject($datos['subject']);
        $email->setMessage($mensaje);

        return $email->send();
    }
}
