<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'correo', 'comentario', 'fecha'];
    protected $useTimestamps = false;
}
