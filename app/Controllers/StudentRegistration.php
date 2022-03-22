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

class StudentRegistration extends BaseController
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

    public function studentByClass(){
		$session = session();
		$studentprofilemodel = new StudentProfile();    


		if($this->request->getMethod() === 'get' && $this->validate([
			'sentClassId' => 'required',			
		])){
			$sentClassId = $this->request->getGet('sentClassId');
			$studentprofilemodel->orderBy('last_updated', 'ASC');	
			$studentprofilemodel->where(['class'=>$sentClassId]);	
			$query = $studentprofilemodel->get();
			$result = $query->getResult();
			echo json_encode(array('students'=>$result));
			//echo json_encode($result);
		}  
    }	


	//--------------------------------------------------------------------

}
