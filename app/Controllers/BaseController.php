<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    /**
     * Idioma actual disponible para todos los controladores y vistas.
     * Ej.: $this->lang o en la vista: service('request')->getLocale()
     */
    protected  $lang = 'es';

    /**
     * Si quieres cargar helpers globales, agrégalos aquí, p. ej. ['url', 'html']
     */
    protected $helpers = [];

    /**
     * Lista de idiomas permitidos
     */
    private  $supportedLocales = ['es', 'en'];

    /**
     * Constructor “extendido”.
     */
    public function initController(
        RequestInterface  $request,
        ResponseInterface $response,
        LoggerInterface   $logger
    )
    {
        parent::initController($request, $response, $logger);

        /* --------------------------------------------------------
         | 1) Detectar idioma desde la URL (?lang=es)              |
         |    Si no viene o no está soportado, usar 'es'.          |
         |-------------------------------------------------------- */
        $incoming = $request->getGet('lang');          // ?lang=es
        $lang     = in_array($incoming, $this->supportedLocales, true)
                    ? $incoming
                    : 'es';

        /* --------------------------------------------------------
         | 2) Fijar el locale para todo el ciclo de vida           |
         |-------------------------------------------------------- */
        service('request')->setLocale($lang);
        $this->lang = $lang;                            // disponible en $this

        /* --------------------------------------------------------
         | 3) (Opcional) Carga automática de archivos de idioma    |
         |    Si repartes textos en varios grupos, quítalo o       |
         |    cambia 'App' por el nombre de tu grupo.             |
         |-------------------------------------------------------- */
        // helper('language');                          // si no estaba cargado
        // lang('App', [], $lang);                      // precarga grupo
    }
}
