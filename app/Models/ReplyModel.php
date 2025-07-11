<?php
namespace App\Models;
use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'reply';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_comment', 'reply', 'fecha'];
    protected $useTimestamps = false;
}
