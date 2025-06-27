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
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header', $data) . view('inicio', $data).view('footer');
	}
	public function services(){
		$model = new ContenidoModel();

		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        $data['services'] = $model->getContenidoPublicado($idioma, 'services');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header',$data) . view('services', $data).view('footer');
		

	}
	public function lab_calibracion(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
        $data['calibration'] = $model->getContenidoPublicado($idioma, 'calibration');
        $data['calibration_content'] = $model->getContenidoPublicado($idioma, 'calibration_content');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header', $data) . view('lab_calibracion', $data).view('footer');

	}
	public function inspeccion_dimensional(){
		$model = new ContenidoModel();
		$idioma = 'es'; // o detecta desde URL, sesión, etc.

        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
	 	$data['inspection'] = $model->getContenidoPublicado($idioma, 'inspection');
		$data['inspection_content'] = $model->getContenidoPublicado($idioma, 'inspection_content');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header', $data) . view('inspeccion_dimensional', $data).view('footer');

	}
	public function equipos_inventarios(){
		$model = new ContenidoModel();
		$idioma = 'es'; // o detecta desde URL, sesión, etc.

		$data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['inventory'] = $model->getContenidoPublicado($idioma, 'inventory');
		
		$data['inventory_content'] = $model->getContenidoPublicado($idioma, 'inventory_content');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header', $data) . view('equipos_inventarios', $data).view('footer');

	}
	public function acreditacion(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['acreditacion'] = $model->getContenidoPublicado($idioma, 'acreditacion');
        $data['acreditacion_content'] = $model->getContenidoPublicado($idioma, 'acreditacion_content');

		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');


		return view('header', $data) . view('acreditacion').view('footer');

	}
	public function about(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['about'] = $model->getContenidoPublicado($idioma, 'about');
		
		$data['about_content'] = $model->getContenidoPublicado($idioma, 'about_content');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

		return view('header', $data) . view('about', $data).view('footer');

	}
	public function contact(){
		$idioma = 'es'; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();


        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
        $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');
		$data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
		$data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');

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

	public function files($id) {
	$model = new ContenidoModel();
	
    // Se obtiene el nombre y contenido binario del archivo correspondiente
    $query = "SELECT tags, files from page_content where id=". $id;
	
	$res = $model->consultar($query, true);	
	//echo var_dump($res);die();
    $nombre = $res['tags'];
    $file = $res['files'];    
    
    // Encabezados para forzar descarga del archivo PDF
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $nombre . '"');

    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($file));

    // Limpia el búfer de salida por si ya se imprimió algo
    ob_clean();
    flush();

    // Imprime el archivo binario al navegador
    echo $file;
    exit;
    
		
	}
}
