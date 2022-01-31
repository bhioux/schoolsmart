<?php namespace App\Models;

use CodeIgniter\Model;

class TermSetup extends Model
{
    protected $table = 'term_setup';
    protected $primaryKey = 'termid';
    protected $allowedFields = [
       'term'
    ];
}