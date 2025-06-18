<?php namespace App\Controllers;
use App\Models\ContenidoModel; // <--- ESTA LÍNEA ES CLAVE

class Home extends BaseController
{
	public function index()
	{
		
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();

        $data['contenidos'] = $model->getContenidoPublicado($idioma);

		return view('header') . view('inicio', $data).view('footer');
	}
	public function services(){
		return view('header') . view('services').view('footer');

	}
}
