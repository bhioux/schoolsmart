<?php namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'session_id';
    protected $allowedFields = [
        'session_code', 'session_duration'
    ];
}