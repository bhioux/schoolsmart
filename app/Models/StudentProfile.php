<?php namespace App\Models;

use CodeIgniter\Model;

class StudentProfile extends Model
{
    protected $table = 'student_profile';
    protected $primaryKey = 'studentid';
    protected $allowedFields = [
        'regno', 'passport', 'surname', 'othernames', 'dob', 'class', 'hometown', 'lga', 'stateoforigin', 'nationality', 'nin', 'gender', 'height', 'weight', 'fathername', 'fatheroccupation', 'mothername', 'motheroccupation', 'fatherpermaddress', 'fatherphonenumber', 'motherpermaddress', 'motherphonenumber', 'guardianname', 'guardianoccupation', 'guardianpermaddress', 'guardianphonenumber', 'email', 'familytype', 'familysize', 'positioninfamily', 'noofbrothers', 'noofsisters', 'parentreligion', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'classgiven', 'classgroup'
    ];
}