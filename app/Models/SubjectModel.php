<?php namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    protected $allowedFields = [
        'subject_name', 'subject_code',  'subject_description'
    ];
}