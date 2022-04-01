<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\MenuModel;
use App\Models\StudentProfileView;
use \App\Models\StaffProfileView;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if(!isset($_SESSION['username'])){
            return redirect()->to(site_url('login'));
        }

        // SETUP MENU DATA FOR CURRENT SESSION
        ########################################
        $category = $_SESSION['category'];
        $menu = new MenuModel(); 
        $menu->where(['category'=>$category]);
        $menu->orderBy('menuposition', 'ASC');
        $query = $menu->get();
		$menu = $query->getResult();
		//$menu = $menu->asObject()->findAll();
        $session->set('menu', $menu);
        //var_dump($menu); exit;

        // SETUP STUDENT DATA FOR CURRENT SESSION
        ########################################
        // $currentuser = $_SESSION['username'];
        // $studentprofile = new StudentProfileView();
        // $studentprofile->where(['regno'=>$currentuser]);	
        // $query = $studentprofile->get();
        // $result = $query->getResult();
        // $studentview = $student = $result[0];
        // $session->set('studentview', $student);
        //$this->class = $student->class;

        if(isset($_SESSION['category']) && strtoupper($_SESSION['category']) =='STUDENT' ){
			$this->currentuser = $_SESSION['username'];
			$studentprofile = new StudentProfileView();
			$studentprofile->where(['regno'=>$this->currentuser]);	
			$query = $studentprofile->get();
			$result = $query->getResult();
			$this->studentview = $student = $result[0];
            $session->set('studentview', $student);
			//$this->class = $student->class;
		}else{
			$this->currentuser = $_SESSION['username'];
			$studentprofile = new StaffProfileView();
			$studentprofile->where(['regno'=>$this->currentuser]);	
			$query = $studentprofile->get();
			$result = $query->getResult();
			$this->studentview = $student = $result[0];
            $session->set('studentview', $student);
			//$this->class = $student->class ?? '';
		}


    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}