<?php namespace App\Models;

use CodeIgniter\Model;

class GradebookSetup extends Model
{
    protected $table = 'view_scoresheet';
    protected $primaryKey = 'studentno';
    protected $allowedFields = [
        
    ];
}