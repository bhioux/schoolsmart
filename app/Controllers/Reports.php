<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\MenuModel;
use App\Models\Register;
use App\Models\PassReset;
use App\Models\UserProfile;
// use App\Models\EditProfile;
use App\Models\Students;
use App\Models\StaffProfile;
use App\Models\UpdateStaffProfile;
use App\Models\StudentProfile;
use App\Models\StaffSetup;
use App\Models\SubjectSetup;
use App\Models\SessionSetup;
use App\Models\TermSetup;
use App\Models\ClassSetup;
use App\Models\PopulateClass;
use App\Models\AssignClasses;
use App\Models\ParentsProfile;
use App\Models\GradebookSetup;
use App\Models\Registration;
use App\Models\ReportCardNur;
use App\Models\ReportCardPry;
use App\Models\ReportCardJss;
use App\Models\ReportCardSss;
use App\Models\ApplicationForm;
// use App\Models\ApplicationFormSecSchool;
//use App\Models\DateTime;
use CodeIgniter\Controller;

class Reports extends BaseController
{

	protected $request;

	use ResponseTrait;
    public function __construct(){
        $this->session = $session = session();
		helper(['form', 'string']);
		$this->request = $request = \Config\Services::request();
		$uri = $request->uri;
		$this->requestMethod = $request->getMethod(TRUE);
		$this->validation =  \Config\Services::validation();
    }

	public function index()
	{
		$menu = new MenuModel();        
		//$data['header'] = "";
        //$data['mainnav'] = "";
        $data['content'] = "";
		//$data['footer'] = "";
		//$data['adminmenu'] = $menu->asObject()->findAll();
		return view('pages/home', $data);
	}

	
	public function reportcardjss()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['reportcardjss'] = "";
        return view('pages/reportcardjss', $data);
    }

	// public function applicationformsecschool()
	// {		
	// 	$applicationform = new ApplicationFormSecSchool();
	// 	$data["title"] = "School Application Form";
	// 	return view('pages/applicationformsecschool', $data);
	// }

	public function reportcardsss()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['reportcardjss'] = "";
        return view('pages/reportcardsss', $data);
    }

    
	public function reportcardnur()
	{		
		$menu = new MenuModel();
		// $staffprofile = new StaffProfile();
		// $studentprofile = new StudentProfile();
		// $parentsprofile = new ParentsProfile();
		// $personalinfo = new PersonalInfo();
		$reportcardnur = new ReportCardNur();
		$data['header'] = "";
        $data['mainnav'] = ""; 
		$data['reportcardpry'] = "";
		// $data['adminmenu'] = $menu->asObject()->findAll();
		$data["title"] = "Student Report Card";
		// $data['guardians'] = $parentsprofile->asObject()->findAll();
		//$data['guardians'] = $guardians;
		//$profiletable = $this->load->view('admin/global/profiletable', $defaults , TRUE);
		//$studentprofile = $this->load->view('admin/global/studentprofile', $defaults , TRUE);
		// $data['studentprofile'] = $studentprofile->asObject()->findAll();	
		//$modaltest = $this->load->view('admin/global/modaltest', $defaults , TRUE);
		//$stprofilecrudscript = $this->load->view('admin/global/stprofilecrudscript', $defaults , TRUE);
		/*modaltest.php*/
		//$datatablescripts = $this->load->view('admin/global/datatablescripts', $defaults , TRUE);
		//$defaults = array_merge($defaults, array("profiletable"=>$profiletable, "modaltest"=>$modaltest, "stprofilecrudscript"=>$stprofilecrudscript, 'datatablescripts'=>$datatablescripts));

		return view('pages/reportcardnur', $data);
	}

	public function reportcardpry()
	{		
		$menu = new MenuModel();
		// $staffprofile = new StaffProfile();
		// $studentprofile = new StudentProfile();
		// $parentsprofile = new ParentsProfile();
		// $personalinfo = new PersonalInfo();
		$reportcardnur = new ReportCardNur();
		$reportcardpry = new ReportCardPry();
		$data['header'] = "";
        $data['mainnav'] = ""; 
		$data['reportcardpry'] = "";
		// $data['adminmenu'] = $menu->asObject()->findAll();
		$data["title"] = "Student Report Card";
		// $data['guardians'] = $parentsprofile->asObject()->findAll();
		//$data['guardians'] = $guardians;
		//$profiletable = $this->load->view('admin/global/profiletable', $defaults , TRUE);
		//$studentprofile = $this->load->view('admin/global/studentprofile', $defaults , TRUE);
		// $data['studentprofile'] = $studentprofile->asObject()->findAll();	
		//$modaltest = $this->load->view('admin/global/modaltest', $defaults , TRUE);
		//$stprofilecrudscript = $this->load->view('admin/global/stprofilecrudscript', $defaults , TRUE);
		/*modaltest.php*/
		//$datatablescripts = $this->load->view('admin/global/datatablescripts', $defaults , TRUE);
		//$defaults = array_merge($defaults, array("profiletable"=>$profiletable, "modaltest"=>$modaltest, "stprofilecrudscript"=>$stprofilecrudscript, 'datatablescripts'=>$datatablescripts));

		return view('pages/reportcardpry', $data);
	}


}
