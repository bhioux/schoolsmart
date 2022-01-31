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

	public function postregistration()
    {
		$studentprofilemodel = new StudentProfile();
		//echo -1;
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// `studentid`, `passport`, `surname`, `othernames`, `dob`, `class`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `mothername`, `motheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup`, `last_updated`

				//'passport' => 'required',
				'surname' => 'required',
				'othernames' => 'required',
				'dob' => 'required',
				'class'  => 'required',
				'hometown'  => 'required',
				'lga'  => 'required',
				'stateoforigin' => 'required',
				'nationality' => 'required',
				//'nin' => 'required',
				'gender' => 'required',
				'height'  => 'required',
				'weight'  => 'required',
				'fathername'  => 'required',
				'fatheroccupation' => 'required',
				'mothername' => 'required',
				'motheroccupation' => 'required',
				'fatherpermaddress' => 'required',
				'fatherphonenumber'  => 'required',
				'motherpermaddress'  => 'required',
				'motherphonenumber'  => 'required',
				'guardianname' => 'required',
				'guardianoccupation' => 'required',
				'guardianpermaddress' => 'required',
				'guardianphonenumber' => 'required',
				'familytype'  => 'required',
				'familysize'  => 'required',
				'positioninfamily'  => 'required',
				'noofbrothers' => 'required',
				'noofsisters' => 'required',
				'parentreligion' => 'required',
				'disability' => 'required',
				'bloodgroup'  => 'required',
				'genotype'  => 'required',
				'vision'  => 'required',
				'hearing'  => 'required',
				'speech'  => 'required',
				'generalvitality'  => 'required',
				'classgiven'  => 'required',
				'classgroup'  => 'required',
			])){
				if(!$recsaved = $studentprofilemodel->insert([
						//'username' => $this->request->getPost('username'),
						'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						//'passport' => $this->request->getPost('passport'),
						'surname' => $this->request->getPost('surname'),
						'othernames' => $this->request->getPost('othernames'),
						'dob' => $this->request->getPost('dob'),
						'class'  => $this->request->getPost('class'),
						'hometown'  => $this->request->getPost('hometown'),
						'lga'  => $this->request->getPost('lga'),
						'stateoforigin' => $this->request->getPost('stateoforigin'),
						'nationality' => $this->request->getPost('nationality'),
						//'nin' => $this->request->getPost('nin'),
						'gender' => $this->request->getPost('gender'),
						'height'  => $this->request->getPost('height'),
						'weight'  => $this->request->getPost('weight'),
						'fathername'  => $this->request->getPost('fathername'),
						'fatheroccupation' => $this->request->getPost('fatheroccupation'),
						'mothername' => $this->request->getPost('mothername'),
						'motheroccupation' => $this->request->getPost('motheroccupation'),
						'fatherpermaddress' => $this->request->getPost('fatherpermaddress'),
						'fatherphonenumber'  => $this->request->getPost('fatherphonenumber'),
						'motherpermaddress'  => $this->request->getPost('motherpermaddress'),
						'motherphonenumber'  => $this->request->getPost('motherphonenumber'),
						'guardianname' => $this->request->getPost('guardianname'),
						'guardianoccupation' => $this->request->getPost('guardianoccupation'),
						'guardianpermaddress' => $this->request->getPost('guardianpermaddress'),
						'guardianphonenumber' => $this->request->getPost('guardianphonenumber'),
						'familytype'  => $this->request->getPost('familytype'),
						'familysize'  => $this->request->getPost('familysize'),
						'positioninfamily'  => $this->request->getPost('positioninfamily'),
						'noofbrothers' => $this->request->getPost('noofbrothers'),
						'noofsisters' => $this->request->getPost('noofsisters'),
						'parentreligion' => $this->request->getPost('parentreligion'),
						'disability' => $this->request->getPost('disability'),
						'bloodgroup'  => $this->request->getPost('bloodgroup'),
						'genotype'  => $this->request->getPost('genotype'),
						'vision'  => $this->request->getPost('vision'),
						'hearing'  => $this->request->getPost('hearing'),
						'speech'  => $this->request->getPost('speech'),
						'generalvitality'  => $this->request->getPost('generalvitality'),
						'classgiven'  => $this->request->getPost('classgiven'),
						'classgroup'  => $this->request->getPost('classgroup'),
					])){
						throw new Exception("Error Inserting Records", 1);
					}
				
				try{					
					$this->session->setFlashdata('savedmsg', 'Record saved successfully');
					//$data['token'] = csrf_hash();	
					$data['savedmsg'] = 'Record saved successfully';
					//return view('pages/users', $data);
					//return redirect()->to(site_url("/"));
					//print_r($recsaved);
					if($recsaved > 0){
						echo 1;
					}elseif($recsaved == 0){
						echo -1;
					}else{
						echo 0;
					}
					exit;
				}catch(exception $e){
					print_r($e->getMessage());
					exit;
				}

				//echo $recsaved; //exit;

				// if($recsaved){
				// 	$this->session->setFlashdata('savedmsg', 'Record saved successfully');			
				// 	//return view('pages/users', $data);
				// 	return redirect()->to(site_url("users"));
				// }else{
				// 	$this->session->setFlashdata('savedmsg', 'Failed to save record');			
				// 	//return view('pages/systemuser', $data);
				// 	//return redirect()->to(site_url("adduser"));
				// 	return redirect()->to("adduser")->withInput();
				// }
				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				print_r($failed);
				exit;
				//return view('pages/gradebooksetup', $data);
			}
        // $menu = new MenuModel();
		// $data['header'] = "";
        // $data['mainnav'] = "";        
        // $data['registration'] = "";
        //return view('pages/registration', $data);
    }

	public function updateregistration()
    {
		$studentprofilemodel = new StudentProfile();
		//echo -1;
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// `studentid`, `passport`, `surname`, `othernames`, `dob`, `class`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `mothername`, `motheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup`, `last_updated`

				//'passport' => 'required',
				'surname' => 'required',
				'othernames' => 'required',
				'dob' => 'required',
				'class'  => 'required',
				'hometown'  => 'required',
				'lga'  => 'required',
				'stateoforigin' => 'required',
				'nationality' => 'required',
				//'nin' => 'required',
				'gender' => 'required',
				'height'  => 'required',
				'weight'  => 'required',
				'fathername'  => 'required',
				'fatheroccupation' => 'required',
				'mothername' => 'required',
				'motheroccupation' => 'required',
				'fatherpermaddress' => 'required',
				'fatherphonenumber'  => 'required',
				'motherpermaddress'  => 'required',
				'motherphonenumber'  => 'required',
				'guardianname' => 'required',
				'guardianoccupation' => 'required',
				'guardianpermaddress' => 'required',
				'guardianphonenumber' => 'required',
				'familytype'  => 'required',
				'familysize'  => 'required',
				'positioninfamily'  => 'required',
				'noofbrothers' => 'required',
				'noofsisters' => 'required',
				'parentreligion' => 'required',
				'disability' => 'required',
				'bloodgroup'  => 'required',
				'genotype'  => 'required',
				'vision'  => 'required',
				'hearing'  => 'required',
				'speech'  => 'required',
				'generalvitality'  => 'required',
				'classgiven'  => 'required',
				'classgroup'  => 'required',
			])){
				if(!$recsaved = $studentprofilemodel->insert([
						//'username' => $this->request->getPost('username'),
						'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						//'passport' => $this->request->getPost('passport'),
						'surname' => $this->request->getPost('surname'),
						'othernames' => $this->request->getPost('othernames'),
						'dob' => $this->request->getPost('dob'),
						'class'  => $this->request->getPost('class'),
						'hometown'  => $this->request->getPost('hometown'),
						'lga'  => $this->request->getPost('lga'),
						'stateoforigin' => $this->request->getPost('stateoforigin'),
						'nationality' => $this->request->getPost('nationality'),
						//'nin' => $this->request->getPost('nin'),
						'gender' => $this->request->getPost('gender'),
						'height'  => $this->request->getPost('height'),
						'weight'  => $this->request->getPost('weight'),
						'fathername'  => $this->request->getPost('fathername'),
						'fatheroccupation' => $this->request->getPost('fatheroccupation'),
						'mothername' => $this->request->getPost('mothername'),
						'motheroccupation' => $this->request->getPost('motheroccupation'),
						'fatherpermaddress' => $this->request->getPost('fatherpermaddress'),
						'fatherphonenumber'  => $this->request->getPost('fatherphonenumber'),
						'motherpermaddress'  => $this->request->getPost('motherpermaddress'),
						'motherphonenumber'  => $this->request->getPost('motherphonenumber'),
						'guardianname' => $this->request->getPost('guardianname'),
						'guardianoccupation' => $this->request->getPost('guardianoccupation'),
						'guardianpermaddress' => $this->request->getPost('guardianpermaddress'),
						'guardianphonenumber' => $this->request->getPost('guardianphonenumber'),
						'familytype'  => $this->request->getPost('familytype'),
						'familysize'  => $this->request->getPost('familysize'),
						'positioninfamily'  => $this->request->getPost('positioninfamily'),
						'noofbrothers' => $this->request->getPost('noofbrothers'),
						'noofsisters' => $this->request->getPost('noofsisters'),
						'parentreligion' => $this->request->getPost('parentreligion'),
						'disability' => $this->request->getPost('disability'),
						'bloodgroup'  => $this->request->getPost('bloodgroup'),
						'genotype'  => $this->request->getPost('genotype'),
						'vision'  => $this->request->getPost('vision'),
						'hearing'  => $this->request->getPost('hearing'),
						'speech'  => $this->request->getPost('speech'),
						'generalvitality'  => $this->request->getPost('generalvitality'),
						'classgiven'  => $this->request->getPost('classgiven'),
						'classgroup'  => $this->request->getPost('classgroup'),
					])){
						throw new Exception("Error Inserting Records", 1);
					}
				
				try{					
					$this->session->setFlashdata('savedmsg', 'Record saved successfully');
					//$data['token'] = csrf_hash();	
					$data['savedmsg'] = 'Record saved successfully';
					//return view('pages/users', $data);
					//return redirect()->to(site_url("/"));
					//print_r($recsaved);
					if($recsaved > 0){
						echo 1;
					}elseif($recsaved == 0){
						echo -1;
					}else{
						echo 0;
					}
					exit;
				}catch(exception $e){
					print_r($e->getMessage());
					exit;
				}

				//echo $recsaved; //exit;

				// if($recsaved){
				// 	$this->session->setFlashdata('savedmsg', 'Record saved successfully');			
				// 	//return view('pages/users', $data);
				// 	return redirect()->to(site_url("users"));
				// }else{
				// 	$this->session->setFlashdata('savedmsg', 'Failed to save record');			
				// 	//return view('pages/systemuser', $data);
				// 	//return redirect()->to(site_url("adduser"));
				// 	return redirect()->to("adduser")->withInput();
				// }
				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				print_r($failed);
				exit;
				//return view('pages/gradebooksetup', $data);
			}
        // $menu = new MenuModel();
		// $data['header'] = "";
        // $data['mainnav'] = "";        
        // $data['registration'] = "";
        //return view('pages/registration', $data);
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


	public function registrationtable()
	{
		$session = session();
		$studentprofilemodel = new StudentProfile();
		//$model->where('msgtype !=','V');
		$studentprofilemodel->orderBy('last_updated', 'ASC');	
		$query = $studentprofilemodel->get();
		$result = $query->getResult();
		//echo json_encode("messagelog"=$result);
		echo json_encode(array('registrationdata'=>$result));
	}

	public function editregistration(){
		$session = session();
		$studentprofilemodel = new StudentProfile();
		//$model->where('msgtype !=','V');
		if($this->request->getMethod() === 'post' && $this->validate([
			'studentid' => 'required|integer',			
		])){
			$studentid = $this->request->getPost('studentid');
			$studentprofilemodel->orderBy('last_updated', 'ASC');	
			$studentprofilemodel->where(['studentid'=>$studentid]);	
			$query = $studentprofilemodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			//exit;
			return array();
		}
		
	}

	public function editmyexperience(){ //
		$experienceid = $this->input->post('experienceid',true);
		if($experienceid==0){
			echo $experienceid;
		}else{
			$this->load->model('home_model');
			$postresult = $this->home_model->editexperiencerecord($experienceid);
			//print_r($postresult); exit;
			echo(json_encode(array('formarray' => $postresult[0])));
		}
	}



	//--------------------------------------------------------------------

}
