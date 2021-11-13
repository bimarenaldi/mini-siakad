<?php namespace App\Models;

use CodeIgniter\Model;

class usermodel extends Model{
    protected $table = 'tbl_users';
    protected $primaryKey = 'pk_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username','email','password','plain_password','created_date'];
    
}
