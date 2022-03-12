<?php namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    // `classid`, `classtype`, `classname`, `classgroup`
   // protected $table = 'class'; //
    protected $table = 'setup_classes'; //setup_classes
    protected $primaryKey = 'class_id';
    protected $allowedFields = [
        'classtype', 'classname', 'classgroup'
    ];
}