<?php namespace App\Controllers;
use App\Models\ContenidoModel; // <--- ESTA LÍNEA ES CLAVE
use App\Models\AdminModel; // <--- ESTA LÍNEA ES CLAVE
$lang = \Config\Services::language();
use App\Libraries\Correo;

class Admin extends BaseController
{
    public function index()
    {
        $idioma = "es"; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();
        $data["video_header"] = "MAS Precisión.mov";
        $data["contenido"] = $model->getContenidoPublicado($idioma, "header");
        $data["header_content"] = $model->getContenidoPublicado(
            $idioma,
            "services_content"
        );
        $data["footer_content"] = $model->getContenidoPublicado(
            $idioma,
            "footer_content"
        );
        $data["footer_logo"] = $model->getContenidoPublicado(
            $idioma,
            "footer_logo"
        );
        $data["privacy_content"] = $model->getContenidoPublicado(
            $idioma,
            "privacy_content"
        );

        return view("header", $data) . view("login") . view("footer");
    }
    public function autenticar()
    {
        $login = new AdminModel();
        $usuario = $this->request->getPost("user");
        $pass = $this->request->getPost("pass");

        $res = $login->autenticar($usuario, $pass);

        if ($res) {
            $session = session();

            $session->set([
                "id" => $res->id,
                "no_empleado" => $res->no_empleado,
                "email" => $res->email,
                "fullname" => $res->fullname,
                "foto" => $res->profile_image,
                "activo" => $res->status,
            ]);

            $privilegios = $login->getPrivilegios($res->id);
            $session->set("privilegios", $privilegios);

            return redirect()->route("/"); // 🚨 Asegúrate que /dashboard exista y no redirija de nuevo
        } else {
            return redirect()->route("admin");
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("admin");
    }

    public function edit($id)
    {
        $idioma = "es"; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();
        $data["video_header"] = "MAS Precisión.mov";
        $data["contenido"] = $model->getContenidoPublicado($idioma, "header");
        $data["header_content"] = $model->getContenidoPublicado(
            $idioma,
            "services_content"
        );
        $data["footer_content"] = $model->getContenidoPublicado(
            $idioma,
            "footer_content"
        );
        $data["footer_logo"] = $model->getContenidoPublicado(
            $idioma,
            "footer_logo"
        );
        $data["privacy_content"] = $model->getContenidoPublicado(
            $idioma,
            "privacy_content"
        );

        $query = "SELECT * FROM page_content WHERE id = $id";

        $dato = $model->consultar($query, true);

        return view("header", $data) .
            view("edit", ["data" => (object) $dato]) .
            view("footer");
    }

    public function admin($id)
    {
        $idioma = "es"; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();
        $data["video_header"] = "MAS Precisión.mov";
        $data["contenido"] = $model->getContenidoPublicado($idioma, "header");
        $data["header_content"] = $model->getContenidoPublicado(
            $idioma,
            "services_content"
        );
        $data["footer_content"] = $model->getContenidoPublicado(
            $idioma,
            "footer_content"
        );
        $data["footer_logo"] = $model->getContenidoPublicado(
            $idioma,
            "footer_logo"
        );
        $data["privacy_content"] = $model->getContenidoPublicado(
            $idioma,
            "privacy_content"
        );

        $query = "SELECT a.*, u.fullname FROM admin_log a JOIN users u ON a.user = u.id WHERE a.idPag = $id";
        $datos = $model->consultar($query, false, false); // para obtener array de objetos

        return view("header", $data) .
            view("admin", ["datos" => $datos]) .
            view("footer");
    }

    public function add($category)
    {
        $idioma = "es"; // o detecta desde URL, sesión, etc.
        $model = new ContenidoModel();
        $data["video_header"] = "MAS Precisión.mov";
        $data["contenido"] = $model->getContenidoPublicado($idioma, "header");
        $data["header_content"] = $model->getContenidoPublicado(
            $idioma,
            "services_content"
        );
        $data["footer_content"] = $model->getContenidoPublicado(
            $idioma,
            "footer_content"
        );
        $data["footer_logo"] = $model->getContenidoPublicado(
            $idioma,
            "footer_logo"
        );
        $data["privacy_content"] = $model->getContenidoPublicado(
            $idioma,
            "privacy_content"
        );

        return view("header", $data) .
            view("add", ["data" => $category]) .
            view("footer");
    }

    public function update()
    {
        $request = \Config\Services::request();
        //   $session = session();

        $id = $request->getPost("id");

        $model = new AdminModel();

        // Procesar archivos
        $img = $request->getFile("foto");
        $icon = $request->getFile("icon");
        $file = $request->getFile("files");
        //echo var_dump($img);die();
        $data = [
            "title" => $request->getPost("title"),
            "slug" => $request->getPost("slug"),
            "category" => $request->getPost("category"),
            "intro_text" => $request->getPost("intro_text"),
            "content" => $request->getPost("content"),
            "tags" => $request->getPost("tags"),
            "is_published" => $request->getPost("is_published") ? 1 : 0,
            "language" => $request->getPost("language"),
            "last_modified" => date("Y-m-d H:i:s"),
        ];

        // Agregar imagen si se cargó
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $data["img"] = file_get_contents($img->getTempName());
        }

        // Agregar ícono si se cargó
        if ($icon && $icon->isValid()) {
            $data["icon"] = file_get_contents($icon->getTempName());
        }

        // Agregar archivo si se cargó
        if ($file && $file->isValid()) {
            $data["files"] = file_get_contents($file->getTempName());
        }

        // Actualiza contenido principal
        $model->updateCustom($id, $data);
        // 1. Instancia del modelo

        // 2. Arreglo con los valores a registrar
        $logData = [
            "idPag" => $id,
            "category" => $data["category"] ?? null,
            "intro_text" => $data["intro_text"] ?? null,
            "content" => $data["content"] ?? null,
            "img" => $data["img"] ?? null,
            "icon" => $data["icon"] ?? null,
            "files" => $data["files"] ?? null,
            "title" => $data["title"] ?? null,
            "slug" => $data["slug"] ?? null,
            "tags" => $data["tags"] ?? null,
            "is_published" => $data["is_published"] ?? 0,
            "published_at" => date("Y-m-d H:i:s"),
            "language" => $data["language"] ?? null,
            "user" => session("id"), // o $this->session->id
            "last_modified" => date("Y-m-d H:i:s"),
        ];

        $model->insertAdmin($logData);
        return redirect()
            ->to(base_url())
            ->with("message", "Contenido actualizado correctamente");
    }

    public function add_insert()
{
    helper(['form', 'url']);

    $logModel = new \App\Models\AdminModel(); // Asegúrate de tener este modelo

    // Datos del contenido
    $data = [
        'title'         => $this->request->getPost('title'),
        'slug'          => $this->request->getPost('slug'),
        'category'      => $this->request->getPost('category'),
        'intro_text'    => $this->request->getPost('intro_text'),
        'content'       => $this->request->getPost('content'),
        'tags'          => $this->request->getPost('tags'),
        'is_published'  => $this->request->getPost('is_published') ? 1 : 0,
        'language'      => $this->request->getPost('language'),
        'date'          => date('Y-m-d H:i:s'),
        'last_modified' => date('Y-m-d H:i:s'),
        'user'          => session('user_id') ?? 1, // Ajusta si usas sesiones
    ];

    // Imagen
    $img = $this->request->getFile('foto');
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $data['img'] = file_get_contents($img->getTempName());
    }

    // Icono
    $icon = $this->request->getFile('icon');
    if ($icon && $icon->isValid() && !$icon->hasMoved()) {
        $data['icon'] = file_get_contents($icon->getTempName());
    }

    // Archivos
    $file = $this->request->getFile('files');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $data['files'] = file_get_contents($file->getTempName());
    }

    // Insertar contenido
    $idInsertado = $logModel->insert($data);
$logData = [
            "idPag" => $idInsertado,
            "category" => $data["category"] ?? null,
            "intro_text" => $data["intro_text"] ?? null,
            "content" => $data["content"] ?? null,
            "img" => $data["img"] ?? null,
            "icon" => $data["icon"] ?? null,
            "files" => $data["files"] ?? null,
            "title" => $data["title"] ?? null,
            "slug" => $data["slug"] ?? null,
            "tags" => $data["tags"] ?? null,
            "is_published" => $data["is_published"] ?? 0,
            "published_at" => date("Y-m-d H:i:s"),
            "language" => $data["language"] ?? null,
            "user" => session("id"), // o $this->session->id
            "last_modified" => date("Y-m-d H:i:s"),
        ];

        $logModel->insertAdmin($logData);

    return redirect()->to(base_url('admin'))->with('success', 'Contenido agregado y registrado en log.');
}

}
