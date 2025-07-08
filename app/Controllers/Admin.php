<?php namespace App\Controllers;
use App\Models\ContenidoModel; // <--- ESTA LÍNEA ES CLAVE
$lang = \Config\Services::language();
use App\Libraries\Correo;


class Admin extends BaseController
{
	
	public function index()
	{ 
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();

        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');
		$data['privacy_content'] = $model->getContenidoPublicado($idioma, 'privacy_content');

		return view('header', $data) . view('login').view('footer');
	}
	public function autenticar(){
		 $login = new AdminModel();


	}
}
