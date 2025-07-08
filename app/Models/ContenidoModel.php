<?php

namespace App\Models;

use CodeIgniter\Model;

class ContenidoModel extends Model
{
    protected $db;

    protected $table = 'page_content'; // 👈 Necesario para que funcione findAll(), like(), etc.
    protected $primaryKey = 'id';       // Ajusta si tu clave primaria tiene otro nombre
    protected $allowedFields = ['title', 'intro_text', 'content']; // o los campos que uses

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

public function consultar(string $query, bool $row = false, bool $array = true)
{
   
    $res = $this->db->query($query);

    if ($res->getResult() > 0) {
        if ($array) {
            if ($row) {
                return $res->getRowArray(); // retorna un solo resultado como array
            } else {
                return $res->getResultArray(); // retorna todos los resultados como array
            }
        } else {
            return $res; // devuelve el objeto completo
        }
    } else {
        return false;
    }
}

public function buscarPorPalabraClave($palabraClave)
{
    return $this->like('title', $palabraClave)
                ->orLike('intro_text', $palabraClave)
                ->orLike('content', $palabraClave)
                ->findAll();
}



}
