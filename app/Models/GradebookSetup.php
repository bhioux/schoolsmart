<?php namespace App\Models;

use CodeIgniter\Model;

class GradebookSetup extends Model
{
    protected $table = 'menu';
    protected $allowedFields = [
        'menutext', 'menulink', 'menucategory', 'menugroup'
    ];

    //Register Users
    public function createaccount(){
        $password = md5(trim($this->input->post('surname')));
        $data = array(
            'username' => $this->input->post('surname'),
            'password' => $this->input->post('other_names'),
            'email' => $this->input->post('email'),
            'phoneno' => $this->input->post('phone_no'),
            'accesskey' => $password
        );
        //Insert User
       $this->db->insert('users', $data);
       return 1;
    }
}
