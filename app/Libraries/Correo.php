
<?php namespace App\Libraries;


class Correo extends BaseController
{
    function correoContacto($datos){
         $CI = & get_instance();
        $CI->load->library('email');


        $mensaje = <<<EOD

               <img width='400' src='$logo'><br>
               <h1><font face="Arial">SIGA-MAS</font></h1>
               <h2>Se ha creado Ticket de Servicio $prefijo</h2>
               <p><b>ID:</b> $idCompleto</p>
               <p><b>Usuario:</b> $usuario</p>
               <p><b>Titulo:</b> $titulo</p>
               <a href='$url' class='btn btn-primary'>Ver Ticket</a>
EOD;

        $CI->email->from('tickets@masmetrologia.mx', 'Soporte SIGA-MAS');

        $CI->email->to($remitentes);

        $CI->email->subject('Ticket De Servicio');
        $CI->email->message($mensaje);

        $CI->email->send();
    }
}