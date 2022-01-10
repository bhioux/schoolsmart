<?php namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $allowedFields = [
        'menutext', 'menulink', 'menucategory', 'menugroup'
    ];
    protected $returnType    = 'App\Entities\Menu';
    //protected $useTimestamps = true;
}