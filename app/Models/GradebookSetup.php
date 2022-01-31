<?php namespace App\Models;

use CodeIgniter\Model;

class GradebookSetup extends Model
{
    protected $table = 'setup_gradebook';
    protected $primaryKey = 'studentid';
    protected $allowedFields = [
        'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade',  'session', 'term'
    ];
}