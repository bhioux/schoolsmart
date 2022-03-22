<?php namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
   // protected $table = 'subjects';
   //`subjectid`, `subjectname`, `subjectcode`, `subjectdescription`
    protected $table = 'setup_subjects';
    protected $primaryKey = 'subjectid';
    protected $allowedFields = [
        'subjectname', 'subjectcode',  'subjectdescription'
    ];
}