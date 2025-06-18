<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();

        $data['contenidos'] = $model->getContenidoPublicado($idioma);

		return view('header') . view('inicio', $data).view('footer');
	}


}
