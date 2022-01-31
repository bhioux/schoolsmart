<?php namespace App\Models;

use CodeIgniter\Model;

class StaffSetup extends Model
{
    protected $table = 'staff_profile';
    protected $allowedFields = [
        'staffid','empno','passport','surname','othernames','dob','hometown','lga','stateoforigin','permanentaddress','nin','email','phonenumber','position','bio','gender','ethnicity','religion','weight','height','disability','bloodgroup','genotype','vision','hearing','speech','generalvitality','nationality','nextofkin','nextofkinrelationship','nextofkinnin','nextofkinoccupation','nextofkinaddress','nextofkinphonenumber','employername','officeaddress','country1','jobtitle','startedon','stopedon','descriptionofduty','country2','nameofschool','attendedfrom','attendedto','courseofstudy','qualification','classofaward','dateofaward','classesassigned','subjectsassigned'
    ];
} 