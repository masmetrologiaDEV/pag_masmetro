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
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        $data['home_content'] = $model->getContenidoPublicado($idioma, 'home_content');

		return view('header', $data) . view('inicio', $data).view('footer');
	}
	public function services(){
		$model = new ContenidoModel();

		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        $data['services'] = $model->getContenidoPublicado($idioma, 'services');
		return view('header',$data) . view('services', $data).view('footer');

	}
	public function lab_calibracion(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        $data['calibration'] = $model->getContenidoPublicado($idioma, 'calibration');
        $data['calibration_content'] = $model->getContenidoPublicado($idioma, 'calibration_content');
		return view('header', $data) . view('lab_calibracion', $data).view('footer');

	}
	public function inspeccion_dimensional(){
		$model = new ContenidoModel();
		$idioma = 'es'; // o detecta desde URL, sesión, etc.

        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
	 	$data['inspection'] = $model->getContenidoPublicado($idioma, 'inspection');
		$data['inspection_content'] = $model->getContenidoPublicado($idioma, 'inspection_content');
		return view('header', $data) . view('inspeccion_dimensional', $data).view('footer');

	}
	public function equipos_inventarios(){
		$model = new ContenidoModel();
		$idioma = 'es'; // o detecta desde URL, sesión, etc.

		$data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['inventory'] = $model->getContenidoPublicado($idioma, 'inventory');
		
		$data['inventory_content'] = $model->getContenidoPublicado($idioma, 'inventory_content');
		return view('header', $data) . view('equipos_inventarios', $data).view('footer');

	}
	public function acreditacion(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		return view('header', $data) . view('acreditacion').view('footer');

	}
	public function about(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['about'] = $model->getContenidoPublicado($idioma, 'about');
		
		$data['about_content'] = $model->getContenidoPublicado($idioma, 'about_content');
		return view('header', $data) . view('about', $data).view('footer');

	}
	public function contact(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		return view('header', $data) . view('contact', $data).view('footer');

	}
	public function content_calibration(){
		$model = new ContenidoModel();
		$id = $this->request->getPost('id');
		$query = "SELECT content from page_content where id=". $id;
		
		$res = $model->consultar($query, true);	

		if ($res) {
			echo json_encode($res);
		}

	}
	public function content_inspection(){
		$model = new ContenidoModel();
		$id = $this->request->getPost('id');
		$query = "SELECT content from page_content where id=". $id;
		
		$res = $model->consultar($query, true);	

		if ($res) {
			echo json_encode($res);
		}

	}
	public function content_inventory(){
		$model = new ContenidoModel();
		$id = $this->request->getPost('id');
		$query = "SELECT content from page_content where id=". $id;
		
		$res = $model->consultar($query, true);	

		if ($res) {
			echo json_encode($res);
		}

	}
}
