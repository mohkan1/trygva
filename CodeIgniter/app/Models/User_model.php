<?php 
namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', "phone_number", 'email', "password"];
}