<?php namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = "menuid";
    protected $allowedFields = [
        'menutitle', 'menudescription', 'menuroute', 'menucategory', 'menurole'
    ];
    protected $returnType    = 'App\Entities\Menu';
    //protected $useTimestamps = true;
}