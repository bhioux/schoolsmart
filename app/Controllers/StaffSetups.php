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

class StaffSetups extends BaseController
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

	public function staffprofile()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['studentprofile'] = "";
        return view('pages/staffprofile', $data);
    }


	public function staffsetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['registration'] = "";
        return view('pages/staffsetup', $data);
    }

	public function poststaff()
    {
		$staffsetupmodel = new StaffSetup();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				//'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

				//'passport' => 'required',
				'surname' => 'required',
				//'empno' => 'required',
				'othernames' => 'required',
				'dob' => 'required',
				'hometown'  => 'required',
				'lga'  => 'required',
				'stateoforigin' => 'required',
				'permanentaddress' => 'required',
                'nin' => 'required',
                'email' => 'required',
                'phonenumber' => 'required',
                'position' => 'required',
				'sex' => 'required',
				'ethnicity'  => 'required',
				'religion'  => 'required',
				'weight'  => 'required',
				'height' => 'required',
				'disability' => 'required',
				'bloodgroup' => 'required',
				'genotype' => 'required',
				'vision'  => 'required',
				'hearing'  => 'required',
				'speech'  => 'required',
				'generalvitality' => 'required',
				'nationality' => 'required',
				'nextofkin' => 'required',
				'nextofkinrelationship' => 'required',
				'nextofkinnin'  => 'required',
				'nextofkinoccupation'  => 'required',
				'nextofkinaddress'  => 'required',
				'nextofkinphonenumber' => 'required',
				'startedon' => 'required',
				'courseofstudy' => 'required',
				'qualification' => 'required',
				'dateofaward'  => 'required',
				
			])){
				
				try{                    
                    $recsaved = $staffsetupmodel->insert([
						//'username' => $this->request->getPost('username'),
						'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						'empno' => $this->request->getPost('empno'),
						'surname' => $this->request->getPost('surname'),
						'othernames' => $this->request->getPost('othernames'),
						'dob' => $this->request->getPost('dob'),
						'hometown'  => $this->request->getPost('hometown'),
						'lga'  => $this->request->getPost('lga'),
						'stateoforigin' => $this->request->getPost('stateoforigin'),
						'permanentaddress' => $this->request->getPost('permanentaddress'),
						'nin' => $this->request->getPost('nin'),
						'email' => $this->request->getPost('email'),
						'phonenumber'  => $this->request->getPost('phonenumber'),
						'position'  => $this->request->getPost('position'),
						'gender'  => $this->request->getPost('sex'),
						'ethnicity' => $this->request->getPost('ethnicity'),
						'religion' => $this->request->getPost('religion'),
						'weight' => $this->request->getPost('weight'),
						'height' => $this->request->getPost('height'),
						'disability'  => $this->request->getPost('disability'),

                        //'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

                        
						'bloodgroup'  => $this->request->getPost('bloodgroup'),
						'genotype'  => $this->request->getPost('genotype'),
						'vision' => $this->request->getPost('vision'),
						'hearing' => $this->request->getPost('hearing'),
						'speech' => $this->request->getPost('speech'),
						'generalvitality' => $this->request->getPost('generalvitality'),
						'nationality'  => $this->request->getPost('nationality'),
						'nextofkin'  => $this->request->getPost('nextofkin'),
						'nextofkinrelationship'  => $this->request->getPost('nextofkinrelationship'),
						'nextofkinnin' => $this->request->getPost('nextofkinnin'),
						'nextofkinoccupation' => $this->request->getPost('nextofkinoccupation'),
						'nextofkinaddress' => $this->request->getPost('nextofkinaddress'),
						'nextofkinphonenumber' => $this->request->getPost('nextofkinphonenumber'),
						'startedon'  => $this->request->getPost('startedon'),
						'courseofstudy'  => $this->request->getPost('courseofstudy'),
						'qualification'  => $this->request->getPost('qualification'),
						'dateofaward'  => $this->request->getPost('dateofaward'),

					]);
					$this->session->setFlashdata('savedmsg', 'Record saved successfully'); 
					$data['savedmsg'] = 'Record saved successfully';

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
				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
				//return view('pages/gradebooksetup', $data);
			}
    }

    public function updatestaff()
    {
		$staffsetupmodel = new StaffSetup();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				//'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

				//'passport' => 'required',
				'surname' => 'required',
				//'empno' => 'required',
				'othernames' => 'required',
				'dob' => 'required',
				'hometown'  => 'required',
				'lga'  => 'required',
				'stateoforigin' => 'required',
				'permanentaddress' => 'required',
                'nin' => 'required',
                'email' => 'required',
                'phonenumber' => 'required',
                'position' => 'required',
				'sex' => 'required',
				'ethnicity'  => 'required',
				'religion'  => 'required',
				'weight'  => 'required',
				'height' => 'required',
				'disability' => 'required',
				'bloodgroup' => 'required',
				'genotype' => 'required',
				'vision'  => 'required',
				'hearing'  => 'required',
				'speech'  => 'required',
				'generalvitality' => 'required',
				'nationality' => 'required',
				'nextofkin' => 'required',
				'nextofkinrelationship' => 'required',
				'nextofkinnin'  => 'required',
				'nextofkinoccupation'  => 'required',
				'nextofkinaddress'  => 'required',
				'nextofkinphonenumber' => 'required',
				'startedon' => 'required',
				'courseofstudy' => 'required',
				'qualification' => 'required',
				'dateofaward'  => 'required',

			])){
			
                try{	
                    $recsaved = $staffsetupmodel->save([

                        'staffid' => $this->request->getPost('staffid'),
                        'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						'empno' => $this->request->getPost('regno'),
						'surname' => $this->request->getPost('surname'),
						'othernames' => $this->request->getPost('othernames'),
						'dob' => $this->request->getPost('dob'),
						'hometown'  => $this->request->getPost('hometown'),
						'lga'  => $this->request->getPost('lga'),
						'stateoforigin' => $this->request->getPost('stateoforigin'),
						'permanentaddress' => $this->request->getPost('permanentaddress'),
						'nin' => $this->request->getPost('nin'),
						'email' => $this->request->getPost('email'),
						'phonenumber'  => $this->request->getPost('phonenumber'),
						'position'  => $this->request->getPost('position'),
						'gender'  => $this->request->getPost('sex'),
						'ethnicity' => $this->request->getPost('ethnicity'),
						'religion' => $this->request->getPost('religion'),
						'weight' => $this->request->getPost('weight'),
						'height' => $this->request->getPost('height'),
						'disability'  => $this->request->getPost('disability'),

                        //'staffid', 'empno', 'surname', 'othernames', 'dob', 'hometown', 'lga', 'stateoforigin', 'permanentaddress', 'nin', 'email', 'phonenumber', 'position', 'gender', 'ethnicity', 'religion', 'weight', 'height', 'disability', 'bloodgroup', 'genotype', 'vision', 'hearing', 'speech', 'generalvitality', 'nationality', 'nextofkin', 'nextofkinrelationship', 'nextofkinnin', 'nextofkinoccupation', 'nextofkinaddress', 'nextofkinphonenumber', 'startedon', 'courseofstudy', 'qualification', 'dateofaward', 'lastupdate'

                        
						'bloodgroup'  => $this->request->getPost('bloodgroup'),
						'genotype'  => $this->request->getPost('genotype'),
						'vision' => $this->request->getPost('vision'),
						'hearing' => $this->request->getPost('hearing'),
						'speech' => $this->request->getPost('speech'),
						'generalvitality' => $this->request->getPost('generalvitality'),
						'nationality'  => $this->request->getPost('nationality'),
						'nextofkin'  => $this->request->getPost('nextofkin'),
						'nextofkinrelationship'  => $this->request->getPost('nextofkinrelationship'),
						'nextofkinnin' => $this->request->getPost('nextofkinnin'),
						'nextofkinoccupation' => $this->request->getPost('nextofkinoccupation'),
						'nextofkinaddress' => $this->request->getPost('nextofkinaddress'),
						'nextofkinphonenumber' => $this->request->getPost('nextofkinphonenumber'),
						'startedon'  => $this->request->getPost('startedon'),
						'courseofstudy'  => $this->request->getPost('courseofstudy'),
						'qualification'  => $this->request->getPost('qualification'),
						'dateofaward'  => $this->request->getPost('dateofaward'),

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
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
				//return view('pages/gradebooksetup', $data);
			}
    }

	public function stafftable()
	{
		$session = session();
		$staffsetupmodel = new StaffSetup();
		//$model->where('msgtype !=','V');
		$staffsetupmodel->orderBy('lastupdate', 'ASC');	
		$query = $staffsetupmodel->get();
		$result = $query->getResult();
		//echo json_encode("messagelog"=$result);
		echo json_encode(array('staffdata'=>$result));
	}

	public function editstaff(){
		$session = session();
		$staffsetupmodel = new StaffSetup();
		//$model->where('msgtype !=','V');
		if($this->request->getMethod() === 'post' && $this->validate([
			'staffid' => 'required|integer',			
		])){
			$staffid = $this->request->getPost('staffid');
			$staffsetupmodel->orderBy('lastupdate', 'ASC');	
			$staffsetupmodel->where(['staffid'=>$staffid]);	
			$query = $staffsetupmodel->get();
			$result = $query->getResult();
			//$result[0][] = csrf_hash();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			//exit;
			return array();
		}
		
	}

	function refreshcsrf(){
		$csrfName = csrf_token();
    	$csrfHash = csrf_hash();  
		return $csrfHash;
	}


	//--------------------------------------------------------------------

}
