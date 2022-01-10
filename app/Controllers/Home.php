<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\MenuModel;
use App\Models\Register;
use App\Models\PassReset;
use App\Models\UserProfile;
// use App\Models\EditProfile;
use App\Models\Students;
use App\Models\AddVehicles;
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
use App\Models\ApplicationForm;
//use App\Models\DateTime;
use CodeIgniter\Controller;

class Home extends BaseController
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
    
    public function register()
    {
		/*`accountid``username``password``email``phoneno``status`*/

        $menu = new MenuModel();        
        $data['register'] = "";
        return view('pages/register', $data);
    }

	public function createaccount(){
		$result = $this->MenuModel->createaccount();
		echo $result;				
	}

	public function passreset()
    {
        $menu = new MenuModel();        
        //$data['header'] = "";
        //$data['mainnav'] = "";
        $data['passreset'] = "";
        //$data['footer'] = "";
        //$data['adminmenu'] = $menu->asObject()->findAll();
        return view('pages/passreset', $data);
    }

	public function studentprofile()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['studentprofile'] = "";
        return view('pages/studentprofile', $data);
    }

	public function updateprofile()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['updateprofile'] = "";
        return view('pages/updateprofile', $data);
    }

	// public function editprofile()
 //    {
 //        $menu = new MenuModel();
	// 	$data['header'] = "";
 //        $data['mainnav'] = "";        
 //        $data['editprofile'] = "";
 //        return view('pages/editprofile', $data);
 //    }

	public function vehicleslist()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['vehicleslist'] = "";
        return view('pages/vehicleslist', $data);
    }

	public function addvehicles()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['addvehicles'] = "";
        return view('pages/addvehicles', $data);
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

	public function registration()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['registration'] = "";
        return view('pages/registration', $data);
    }

	// public function personalinfo()
	// {		
		// $menu = new MenuModel();
		// $staffprofile = new StaffProfile();
		// $studentprofile = new StudentProfile();
		// $parentsprofile = new ParentsProfile();
		// $personalinfo = new PersonalInfo();
		// $data['adminmenu'] = $menu->asObject()->findAll();
		// $data["title"] = "Student Profile";
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

	// 	return view('pages/personalinfo', $data);
	// }

	public function applicationform()
	{		
		// $menu = new MenuModel();
		// $staffprofile = new StaffProfile();
		// $studentprofile = new StudentProfile();
		// $parentsprofile = new ParentsProfile();
		// $personalinfo = new PersonalInfo();
		// $reportcardnur = new ReportCardNur();
		// $reportcardpry = new ReportCardPry();
		$applicationform = new ApplicationForm();
		// $data['adminmenu'] = $menu->asObject()->findAll();
		$data["title"] = "School Application Form";
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



		return view('pages/applicationform', $data);
	}

	
	public function staffprofile()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['staffprofile'] = "";
        return view('pages/staffprofile', $data);
    }

	
	public function updatestaffprofile()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['updatestaffprofile'] = "";
        return view('pages/updatestaffprofile', $data);
    }

	public function staffsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['staffsetup'] = "";
        return view('pages/staffsetup', $data);
    }

	public function subjectsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['subjectsetup'] = "";
        return view('pages/subjectsetup', $data);
    }

    public function sessionsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['sessionsetup'] = "";
        return view('pages/sessionsetup', $data);
    }

    public function termsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['termsetup'] = "";
        return view('pages/termsetup', $data);
    }

	public function classsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['classsetup'] = "";
        return view('pages/classsetup', $data);
    }
	
	public function populateclass()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['populateclass'] = "";
        return view('pages/populateclass', $data);
    }

    public function students()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['students'] = "";
        return view('pages/students', $data);
    }

    public function assignclasses()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['assignclasses'] = "";
        return view('pages/assignclasses', $data);
    }

    public function gradebooksetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['gradebooksetup'] = "";
        return view('pages/gradebooksetup', $data);
    }

	// public function academicYear(DateTime $userDate) {
	// 	$currentYear = $userDate->format('Y');
	// 	$cutoff = new DateTime($userDate->format('Y') . '/07/31 23:59:59');
	// 	if ($userDate < $cutoff) {
	// 		return ($currentYear-1) . '/' . $currentYear;
	// 	}
	// 	return $currentYear . '/' . ($currentYear+1);
	// }

	// public static function getAcademicYear(){
	// 	$now = new DateTime();

	// 	$year = $now->format('Y');
	// 	return ($now->format('m') < 8) ? $year - 1 : $year;
	// }

	//--------------------------------------------------------------------

}
