<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class UserModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['full_name','user_name','password','isDeleted'];
}
