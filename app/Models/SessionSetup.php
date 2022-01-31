<?php namespace App\Models;

use CodeIgniter\Model;

class SessionSetup extends Model
{
    protected $table = 'session_setup';
    protected $primaryKey = 'sessionid';
    protected $allowedFields = [
        'session'
    ];
}