<?php namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{
    protected $table = 'session_setup';
    protected $primaryKey = 'session_id';
    protected $allowedFields = [
        'session', 'activeflag'
    ];
}