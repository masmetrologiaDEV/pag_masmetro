<?php

namespace App\Models;

use CodeIgniter\Model;

class ContenidoModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect(); // similar a $this->load->database();
    }

    public function getContenidoPublicado($lang = 'es', $category)
    {
        $builder = $this->db->table('page_content');
        $builder->select('*');
        $builder->where('language', $lang);
        $builder->where('category', $category);
        $builder->where('is_published', 1);

        $query = $builder->get();

        return $query->getResult(); // o getResult() si quieres objetos
    }

    public function getBySlug($slug, $lang = 'es')
    {
        $builder = $this->db->table('contenido');
        $builder->where('slugÍndice', $slug);
        $builder->where('language', $lang);
        $builder->where('is_published', 1);

        $query = $builder->get(1);

        return $query->getRowArray(); // o getRow()
    }

    public function insertContenido($data)
    {
        $builder = $this->db->table('contenido');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateContenido($id, $data)
    {
        $builder = $this->db->table('contenido');
        $builder->where('idPrimaria', $id);
        $builder->update($data);
        return $this->db->affectedRows();
    }

    public function deleteContenido($id)
    {
        $builder = $this->db->table('contenido');
        $builder->where('idPrimaria', $id);
        $builder->delete();
        return $this->db->affectedRows();
    }
}
