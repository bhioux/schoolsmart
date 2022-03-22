<?php namespace App\Models;

use CodeIgniter\Model;

class SubjectSetup extends Model
{
    protected $table = 'setup_subjects';
    protected $primaryKey = 'subjectid';
    protected $allowedFields = [
        'subjectname', 'subjectcode', 'subjectdescription'
    ];
}