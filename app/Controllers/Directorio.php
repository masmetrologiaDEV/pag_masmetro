<?php namespace App\Controllers;
use App\Models\ContenidoModel; // <--- ESTA LÍNEA ES CLAVE
use App\Models\AdminModel; // <--- ESTA LÍNEA ES CLAVE
$lang = \Config\Services::language();
use App\Libraries\Correo;

class Directorio extends BaseController
{
    public function index($slug)
    {
        $idioma = "es"; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();
        $data["video_header"] = "MAS Precisión.mov";
        $data["contenido"] = $model->getContenidoPublicado($idioma, "header");
        $data["header_content"] = $model->getContenidoPublicado($idioma,"services_content");
        $data["footer_content"] = $model->getContenidoPublicado($idioma,"footer_content");
        $data["footer_logo"] = $model->getContenidoPublicado($idioma,"footer_logo");
        $data["privacy_content"] = $model->getContenidoPublicado($idioma,"privacy_content");
        $data["profile"] = $model->getBySlug($slug,$idioma);

        return view("header", $data) . view("directorio_user", $data) . view("footer");
    }
    public function descargarVCard($slug)
{
    $model = new ContenidoModel();
 $idioma = "es";
    // Obtener el registro que tenga el archivo, por ejemplo por slug
    $registro = $model->getBySlug($slug, $idioma);
    if (!$registro || empty($registro->files)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Archivo no encontrado');
    }


    // Asumiendo que $registro->file contiene el blob (binario)
    $fileData = $registro->files;

    // Si tienes también el nombre del archivo en BD, úsalo, si no usa uno por defecto
    $fileName = "contacto.vcf";

    return $this->response->download($fileName, $fileData, true);
}

}
