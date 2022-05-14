<?php namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'view_menu';
    protected $primaryKey = "menuid";
    protected $allowedFields = [
    ];
}
