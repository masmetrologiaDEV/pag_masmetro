<?php

namespace App\Controllers;
use App\Models\CommentModel;
use App\Models\ReplyModel;
use CodeIgniter\Controller;

class ComentarioController extends BaseController
{
    public function guardarComentario()
    {
        $model = new CommentModel();

        $data = [
            'nombre'     => $this->request->getPost('nombre'),
            'correo'     => $this->request->getPost('correo'),
            'comentario' => $this->request->getPost('comentario'),
        ];

        $model->insert($data);
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function guardarRespuesta()
    {
        $model = new ReplyModel();

        $data = [
            'id_comment' => $this->request->getPost('id_comment'),
            'reply'      => $this->request->getPost('reply'),
        ];

        $model->insert($data);
        return $this->response->setJSON(['status' => 'ok']);
    }

    public function obtenerComentarios()
    {
        $commentModel = new CommentModel();
        $replyModel   = new ReplyModel();

        $comentarios = $commentModel->orderBy('fecha', 'DESC')->findAll();

        foreach ($comentarios as &$comentario) {
            $comentario['replies'] = $replyModel->where('id_comment', $comentario['id'])->findAll();
        }

        return $this->response->setJSON($comentarios);
    }
}
