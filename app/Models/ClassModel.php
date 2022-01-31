<?php namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $primaryKey = 'class_id';
    protected $allowedFields = [
        'class_type', 'class_group', 'class_fullname'
    ];
}