<?php namespace App\Models;

use CodeIgniter\Model;

class StaffSetup extends Model
{
    protected $table = 'staff_profile';
    protected $primaryKey = 'staffid';
    protected $allowedFields = [
         'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'bio', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 
    ];
} 