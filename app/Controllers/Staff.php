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
use App\Models\AssessmentSetup;
use App\Models\ClassSetup;
use App\Models\PopulateClass;
use App\Models\AssignClasses;
use App\Models\ParentsProfile;
use App\Models\GradebookSetup;
use App\Models\TraitsSetup;
use App\Models\AffectiveAreaSetup;
use App\Models\SocialHabitSetup;
use App\Models\CommentsSetup;
use App\Models\BillSetup;
use App\Models\AwardSetup;
use App\Models\Registration;
use App\Models\ReportCardNur;
use App\Models\ReportCardPry;
use App\Models\ReportCardJss;
use App\Models\ReportCardSss;
use App\Models\ApplicationForm;
// use App\Models\ApplicationFormSecSchool;
//use App\Models\DateTime;
use CodeIgniter\Controller;

class Staff extends BaseController
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

	public function staffsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['staffsetup'] = "";
        return view('pages/staffsetup', $data);
    }

	public function poststaffsetup()
	{
		$staffsetupmodel = new StaffSetup();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
			'surname' => 'required',
			'othernames' => 'required',
			'basicFlatpickr' => 'required',
			'hometown' => 'required',
			'lga' => 'required',
			'stateoforigin' => 'required',
			'permanentaddress' => 'required',
			'nin' => 'nin',
			'email' => 'email',
			'phonenmber' => 'required',
			'position' => 'required',
			'bio' => 'required',
			'gender' => 'required',
			'ethnicity' => 'required',
			'religion' => 'required',
			'weight' => 'required',
			'height' => 'required',
			'disability' => 'required',
			'bloodgroup' => 'required',
			'genotype' => 'required',
			'vision' => 'required',
			'hearing' => 'required',
			'speech' => 'required',
			'generalvitality' => 'required',
			'nationality' => 'required',
			'nextofkin' => 'required',
			'nextofkinrelationship' => 'required',
			'nextofkinnin' => 'required',
			'nextofkinoccupation' => 'required',
			'nextofkinaddress' => 'required',
			'nextofkinphonenumber' => 'required',
			'employername' => 'required',
			'officeaddress' => 'required',
			'country1' => 'required',
			'jobtitle' => 'required',
			'startedon' => 'required',
			'stoppedon' => 'required',
			'descriptionofduty' => 'required',
			'country2' => 'required',
			'nameofschool' => 'required',
			'attendedfrom' => 'required',
			'attendedto' => 'required',
			'courseofstudy' => 'required',
			'qualification' => 'required',
			'classofaward' => 'required',
			'dateofaward' => 'required',
			'classesassigned' => 'required',
			'subjectsassigned' => 'required',
		])){
			try{
				$recsaved = $staffsetupmodel->insert([
					'csrf_test_name' => $this->request->getPost('csrf_test_name'),
					'surname' => $this->request->getPost('surname'),
					'othernames' => $this->request->getPost('othernames'),
					'basicFlatpickr' => $this->request->getPost('basicFlatpickr'),
					'hometown' => $this->request->getPost('hometown'),
					'lga' => $this->request->getPost('lga'),
					'stateoforigin' => $this->request->getPost('stateoforigin'),
					'permanentaddress' => $this->request->getPost('permanentaddress'),
					'nin' => $this->request->getPost('nin'),
					'email' => $this->request->getPost('email'),
					'phonenmber' => $this->request->getPost('phonenmber'),
					'position' => $this->request->getPost('position'),
					'bio' => $this->request->getPost('bio'),
					'gender' => $this->request->getPost('gender'),
					'ethnicity' => $this->request->getPost('ethnicity'),
					'religion' => $this->request->getPost('religion'),
					'weight' => $this->request->getPost('weight'),
					'height' => $this->request->getPost('height'),
					'disability' => $this->request->getPost('disability'),
					'bloodgroup' => $this->request->getPost('bloodgroup'),
					'genotype' => $this->request->getPost('genotype'),
					'vision' => $this->request->getPost('vision'),
					'hearing' => $this->request->getPost('hearing'),
					'speech' => $this->request->getPost('speech'),
					'generalvitality' => $this->request->getPost('generalvitality'),
					'nationality' => $this->request->getPost('nationality'),
					'nextofkin' => $this->request->getPost('nextofkin'),
					'nextofkinrelationship' => $this->request->getPost('nextofkinrelationship'),
					'nextofkinnin' => $this->request->getPost('nextofkinnin'),
					'nextofkinoccupation' => $this->request->getPost('nextofkinoccupation'),
					'nextofkinaddress' => $this->request->getPost('nextofkinaddress'),
					'nextofkinphonenumber' => $this->request->getPost('nextofkinphonenumber'),
					'employername' => $this->request->getPost('employername'),
					'officeaddress' => $this->request->getPost('officeaddress'),
					'country1' => $this->request->getPost('country1'),
					'jobtitle' => $this->request->getPost('jobtitle'),
					'startedon' => $this->request->getPost('startedon'),
					'stoppedon' => $this->request->getPost('stoppedon'),
					'descriptionofduty' => $this->request->getPost('descriptionofduty'),
					'country2' => $this->request->getPost('country2'),
					'nameofschool' => $this->request->getPost('nameofschool'),
					'attendedfrom' => $this->request->getPost('attendedfrom'),
					'attendedto' => $this->request->getPost('attendedto'),
					'courseofstudy' => $this->request->getPost('courseofstudy'),
					'qualification' => $this->request->getPost('qualification'),
					'classofaward' => $this->request->getPost('classofaward'),
					'dateofaward' => $this->request->getPost('dateofaward'),
					'classesassigned' => $this->request->getPost('classesassigned'),
					'subjectsassigned' => $this->request->getPost('subjectsassigned'),
				]);
				$this->session->setFlashdata('savedmsg', 'Record saved successfully');
				$data['savedmsg'] = 'Record saved successfully';
				if($recsaved > 0){
					echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
				}elseif($recsaved == 0){
					echo json_encode(array("success"=>-1, "message"=>'Record saved FAILED'));
				}else{
					echo json_encode(array("success"=>0, "message"=>'Error saving record'));
				}
				exit;
			}catch(\Exception $e){
				echo json_encode(array("success"=>-2, "message"=>$e->getMessage()));
				exit;
			}

		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			echo json_encode(array("success"=>-2, "message"=>$failed));
			exit;
			//return view('pages/gradebooksetup', $data);
		}
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

	public function commentssetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['commentssetup'] = "";
        return view('pages/commentssetup', $data);
    }

	public function traitssetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['traitssetup'] = "";
		$data['classrecs'] = $this-> classrecs();        
		//$data['subjects'] = Gradebook::classrecs();       
        return view('pages/traitssetup', $data);
    }

	public function affectiveareasetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['affectiveareasetup'] = "";
        return view('pages/affectiveareasetup', $data);
    }

	public function socialhabitsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['socialhabitsetup'] = "";
        return view('pages/socialhabitsetup', $data);
    }

	public function billsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['billsetup'] = "";
        return view('pages/billsetup', $data);
    }

	public function awardsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['awardsetup'] = "";
        return view('pages/awardsetup', $data);
    }

	public static function classrecs(){
		$session = session();
		$classmodel = new ClassSetup();
		$classmodel->orderBy('classid', 'ASC');	
		//$sessionmodel->where(['sessionid'=>$sessionid]);	
		$query = $classmodel->get();
		$result = $query->getResult();
		return @$result;
	}


	public function assessmentsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['assessmentsetup'] = "";
        return view('pages/assessmentsetup', $data);
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


}
