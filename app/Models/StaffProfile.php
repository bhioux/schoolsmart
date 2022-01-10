<?php namespace App\Models;

use CodeIgniter\Model;

class StaffProfile extends Model
{
    protected $table = 'staffprofile';
    protected $allowedFields = [
        'surname', 'firstname', 'homeaddress', 'telephone', 'email', 'sex', 'dob', 'placeofborth', 'ethnicity', 'religion', 'weight', 'height', 'physicalchallenge', 'bloodtype', 'genotype', 'illnesssuffered', 'allergies', 'distancetoschool', 'guardianname', 'guardianrelationship', 'guardianoccupation', 'guardiangrade', 'guardianaddress', 'guradiantelephone', 'prevacadrecords', 'prevschool', 'leavingdate', 'grades', 'results', 'observation', 'currentgrade'
    ];
}