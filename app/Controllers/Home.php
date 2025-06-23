<?php namespace App\Controllers;
use App\Models\ContenidoModel; // <--- ESTA LÍNEA ES CLAVE

class Home extends BaseController
{
	public function index()
	{ 
		//echo site_url('home/services');die();
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'header_content');
        $data['home_content'] = $model->getContenidoPublicado($idioma, 'home_content');

		return view('header', $data) . view('inicio', $data).view('footer');
	}
	public function services(){
		return view('header') . view('services').view('footer');

	}
	public function lab_calibracion(){
		return view('header') . view('lab_calibracion').view('footer');

	}
	public function inspeccion_dimensional(){
		return view('header') . view('inspeccion_dimensional').view('footer');

	}
	public function equipos_inventarios(){
		return view('header') . view('equipos_inventarios').view('footer');

	}
	public function acreditacion(){
		return view('header') . view('acreditacion').view('footer');

	}
	public function about(){
		return view('header') . view('about').view('footer');

	}
	public function contact(){
		return view('header') . view('contact').view('footer');

	}
}
