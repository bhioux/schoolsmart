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
use App\Models\ReportCardJss;
use App\Models\ReportCardSss;
use App\Models\ApplicationForm;
use App\Models\StudentProfileView;
use \App\Models\StaffProfileView;
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

		if(isset($_SESSION['category']) && strtoupper($_SESSION['category']) =='STUDENT' ){
			$this->currentuser = $_SESSION['username'];
			$studentprofile = new StudentProfileView();
			$studentprofile->where(['regno'=>$this->currentuser]);	
			$query = $studentprofile->get();
			$result = $query->getResult();
			$this->studentview = $student = $result[0];
			$this->class = $student->class;
		}else{
			$this->currentuser = $_SESSION['username'];
			$studentprofile = new StaffProfileView();
			$studentprofile->where(['regno'=>$this->currentuser]);	
			$query = $studentprofile->get();
			$result = $query->getResult();
			$this->studentview = $student = $result[0];
			$this->class = $student->class ?? '';
		}
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

	public function postregistration()
    {
		$studentprofilemodel = new StudentProfile();
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
				
				try{
                    
                    $recsaved = $studentprofilemodel->insert([
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
					]);
					$this->session->setFlashdata('savedmsg', 'Record saved successfully');
					//$data['token'] = csrf_hash();	
					$data['savedmsg'] = 'Record saved successfully';
					//return view('pages/users', $data);
					//return redirect()->to(site_url("/"));
					//print_r($recsaved);
					if($recsaved > 0){
						//echo 1;
                        echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
					}elseif($recsaved == 0){
						//echo -1;
                        echo json_encode(array("success"=>-1, "message"=>'Record saved FAILED'));
					}else{
						//echo 0;
                        echo json_encode(array("success"=>0, "message"=>'Error saving record'));
					}
					exit;
				}catch(\Exception $e){
					//print_r($e->getMessage());
                    echo json_encode(array("success"=>-2, "message"=>$e->getMessage()));
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
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
				//return view('pages/gradebooksetup', $data);
			}
    }

    public function updateregistration()
    {
		$studentprofilemodel = new StudentProfile();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// `studentid`, `passport`, `surname`, `othernames`, `dob`, `class`, `hometown`, `lga`, `stateoforigin`, `nationality`, `nin`, `gender`, `height`, `weight`, `fathername`, `fatheroccupation`, `mothername`, `motheroccupation`, `fatherpermaddress`, `fatherphonenumber`, `motherpermaddress`, `motherphonenumber`, `guardianname`, `guardianoccupation`, `guardianpermaddress`, `guardianphonenumber`, `familytype`, `familysize`, `positioninfamily`, `noofbrothers`, `noofsisters`, `parentreligion`, `disability`, `bloodgroup`, `genotype`, `vision`, `hearing`, `speech`, `generalvitality`, `classgiven`, `classgroup`, `last_updated`

				//'passport' => 'required',
				'studentid' => 'required',
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
			
                try{	
                    $recsaved = $studentprofilemodel->save([
                        'studentid' => $this->request->getPost('studentid'),
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
                    ]);				
                    $this->session->setFlashdata('savedmsg', 'Record saved successfully');	
                    $data['savedmsg'] = 'Record saved successfully';
                    //return view('pages/users', $data);
                    //return redirect()->to(site_url("/"));
                    //print_r($recsaved);
                    if($recsaved > 0){
                        //echo 1;
                        echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
                    }elseif($recsaved == 0){
                        echo json_encode(array("success"=>-1, 'Failed to Save Record'));
                        //echo -1;
                    }else{
                        //echo 0;
                        echo json_encode(array("success"=>0, "message"=>'Error Saving Record'));
                    }
                    exit;
                }catch(\Exception $e){
                    //print_r($e->getMessage());
                    echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
                    exit;
                }

				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
				//return view('pages/gradebooksetup', $data);
			}
    }

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
