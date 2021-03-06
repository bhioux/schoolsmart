<?php namespace App\Models;

use CodeIgniter\Model;

class Gradebook extends Model
{
    protected $table = 'setup_gradebook';
    protected $primaryKey = 'studentid';
    protected $allowedFields = [
        'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term'
    ];
}