<?php 
namespace App\Controllers;
use App\Models\ContenidoModel;

class Reconocimientos extends BaseController
{
    public function index($slug)
    {
        $model = new ContenidoModel();
        $idioma = 'es';

        // Buscar portada de la sección (solo uno)
        $portadaArray = $model->getContenidoPublicado($idioma, 'certificados');
        $data['portada_certificado'] = !empty($portadaArray) ? $portadaArray[0] : null;

        // Buscar certificado por slug
        $certificado = $model->getContenidoPorSlug($slug, 'certificados_content');

        if (!$certificado) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Reconocimiento no encontrado.");
        }

        $data['contenido'] = $model->getContenidoPublicado($idioma, 'header');
            $data['header_content'] = $model->getContenidoPublicado($idioma, 'services_content');

        $data['footer_content'] = $model->getContenidoPublicado($idioma, 'footer_content');
        $data['footer_logo'] = $model->getContenidoPublicado($idioma, 'footer_logo');
        $data['privacy_content'] = $model->getContenidoPublicado($idioma, 'privacy_content');
        $data['certificado'] = $certificado;
            $data['video_header'] = 'MAS Cobertura H.mov';


        return view('header', $data)
             . view('reconocimiento_detalle', $data)
             . view('footer');
    }



 public function verImagen($slug)
{
    $model = new ContenidoModel();
    $certificado = $model->getContenidoPorSlug($slug, 'certificados_content');

    if (!$certificado || empty($certificado['img'])) {
        return $this->response->setStatusCode(404, 'Imagen no encontrada');
    }

    return $this->response
                ->setHeader('Content-Type', 'image/png') // cambia a 'image/jpeg' si es JPG
                ->setBody($certificado['img']);
}


}
