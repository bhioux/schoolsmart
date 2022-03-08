<?php namespace App\Models;

use CodeIgniter\Model;

class ClassSetup extends Model
{
    protected $table = 'setup_classes';
    protected $primaryKey = 'classid';
    protected $allowedFields = [
        'classtype', 'classname', 'classgroup'
    ];
}