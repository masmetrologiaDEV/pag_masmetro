<?php

namespace App\Controllers;
use App\Models\CommentModel;
use App\Models\ContenidoModel;
use App\Models\ReplyModel;
use CodeIgniter\Controller;

class ComentarioController extends BaseController
{
    

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
         $id_blog= $this->request->getPost('id_blog');

        $model = new ContenidoModel();
		$id = $this->request->getPost('id');
		$query = "SELECT * from comments where id_blog=". $id_blog. " ORDER BY fecha DESC";
		
		$res = $model->consultar($query);	
        if ($res) {
			echo json_encode($res);
		}
    }


    public function obtenerRespuestas()
{
    $replyModel = new \App\Models\ReplyModel();
    $id_comment = $this->request->getPost('id_comment');

    $respuestas = $replyModel
        ->where('id_comment', $id_comment)
        ->orderBy('fecha', 'ASC') // si tienes el campo fecha
        ->findAll();

    return $this->response->setJSON($respuestas);
}

}
