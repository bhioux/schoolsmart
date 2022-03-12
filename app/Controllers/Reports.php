<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\MenuModel;
use App\Models\Register;
use App\Models\PassReset;
use App\Models\UserProfile; 
use App\Models\StudentProfileView; 
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
    protected $menu;
    protected $currentuser = null;
    protected $class = null;
    protected $studentview;


	use ResponseTrait;
    public function __construct(){
        // if(!isset($_SESSION['islogin'])){
		// 	return redirect()->to('/login');
		// }
        helper(['form', 'string', 'array']);
        $menu = new MenuModel();
        $this->session = $session = session();		
		$this->request = $request = \Config\Services::request();
		$uri = $request->uri;
		$this->requestMethod = $request->getMethod(TRUE);
		$this->validation =  \Config\Services::validation();
        //$this->menu = $menu->asObject()->findAll();\
		if(isset($_SESSION['username'])){
			$this->currentuser = $_SESSION['username'];
			$studentprofile = new StudentProfileView();
			$studentprofile->where(['regno'=>$this->currentuser]);	
			$query = $studentprofile->get();
			$result = $query->getResult();
			$this->studentview = $student = $result[0];
			$this->class = $student->class;
		}
        
    }

	public function index()
	{      
        $data['menu'] = $this->menu;
		return view('pages/home', $data);
	}

	
	public function reportcard()
    {
		//echo $_SESSION['username']; exit;
		if(!isset($_SESSION['username'])){
			return redirect()->to('/login');
		}

        $gradebook = new GradebookSetup();
        $gradebook->where(['studentno'=>$this->currentuser]);	
        $query = $gradebook->get();
        $result = $query->getResultArray();
        $data['gradebook'] = $result;
        $data['studentview'] = $this->studentview;

        //var_dump($result);

		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['reportcardjss'] = "";

        switch(strtoupper(substr(trim($this->class),0,1))){
            case 'J':
                $data['title'] = "JUNIOR SECONDARY SCHOOL, TERMINAL REPORT - ".$this->currentuser;
                return view('pages/reportcardjss', $data);
            case 'S':
                $data['title'] = "SENIOR SECONDARY SCHOOL, TERMINAL REPORT - ".$this->currentuser;
                return view('pages/reportcardsss', $data);
            default:
                return redirect()->to('/studentprofile')->with('message', 'Gradebook record not found for '. $this->currentuser);
        }
        
    }

	public function observables()
    {
		//echo $_SESSION['username']; exit;
		if(!isset($_SESSION['username'])){
			return redirect()->to('/login');
		}

        $gradebook = new GradebookSetup();
        $gradebook->where(['studentno'=>$this->currentuser]);	
        $query = $gradebook->get();
        $result = $query->getResultArray();
        $data['gradebook'] = $result;
        $data['studentview'] = $this->studentview;

        //var_dump($result);

		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['reportcardjss'] = "";

		$data['title'] = "OBSERVABLES REPORT - ".$this->currentuser;
        return view('pages/reportobservables', $data);

        // switch(strtoupper(substr(trim($this->class),0,1))){
        //     case 'J':
        //         $data['title'] = "JUNIOR SECONDARY SCHOOL, TERMINAL REPORT - ".$this->currentuser;
        //         return view('pages/reportcardjss', $data);
        //     case 'S':
        //         $data['title'] = "SENIOR SECONDARY SCHOOL, TERMINAL REPORT - ".$this->currentuser;
        //         return view('pages/reportobservables', $data);
        //     default:
        //         return redirect()->to('/studentprofile')->with('message', 'Gradebook record not found for '. $this->currentuser);
        // }
        
    }


	public function reportcardsss()
    {
		if(!isset($_SESSION['islogin'])){
			//return redirect()->to('/login');
		}
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['reportcardjss'] = "";
        return view('pages/reportcardsss', $data);
    }

    
	public function reportcardnur()
	{		
		if(!isset($_SESSION['islogin'])){
			//return redirect()->to('/login');
		}
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
		if(!isset($_SESSION['islogin'])){
			//return redirect()->to('/login');
		}
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
