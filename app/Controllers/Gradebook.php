<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

use App\Models\MenuModel;
use App\Models\Register;
use App\Models\PassReset;
use App\Models\UserProfile;
// use App\Models\EditProfile;
use App\Models\Students;
use App\Models\SessionSetup;
use App\Models\StaffProfile;
use App\Models\UpdateStaffProfile;
use App\Models\StudentProfile;
use App\Models\StaffSetup;
use App\Models\SubjectSetup;
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

class Gradebook extends BaseController
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

    public function gradebooksetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['gradebooksetup'] = "";

		// $data['sessionrecs'] = $this->sessionrecs();
		// $data['termsrecs'] = $this->termsrecs();
		$data['sessionrecs'] = [''];
		$data['termsrecs'] = [''];

        return view('pages/gradebooksetup', $data);
    }

	public function postgradebook()
    {
		$studentprofilemodel = new StudentProfile();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// 'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term'

				'studentclass' => 'required',
				'studentsubject' => 'required',
				'studentid' => 'required',
				'assessmenttype'  => 'required',
				'assessmentgrade'  => 'required',
				'session'  => 'required',
				'term'  => 'required',
			])){
				
				try{                    
                    $recsaved = $studentprofilemodel->insert([
						//'username' => $this->request->getPost('username'),
						'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						'studentclass' => $this->request->getPost('studentclass'),
						'studentsubject' => $this->request->getPost('studentsubject'),
						'studentid' => $this->request->getPost('studentid'),
						'assessmenttype'  => $this->request->getPost('assessmenttype'),
						'assessmentgrade'  => $this->request->getPost('assessmentgrade'),
						'session'  => $this->request->getPost('session'),
						'term'  => $this->request->getPost('term'),
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
				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
				//return view('pages/gradebooksetup', $data);
			}
    }

	public function gradebooktable()
	{
		$session = session();
		$gradebookmodel = new GradebookSetup();
		//$model->where('msgtype !=','V');
		$gradebookmodel->orderBy('last_updated', 'ASC');	
		$query = $gradebookmodel->get();
		$result = $query->getResult();
		//echo json_encode("messagelog"=$result);
		echo json_encode(array('gradebookdata'=>$result));
	}

	public function editgradebook(){
		$session = session();
		$gradebookmodel = new GradebookSetup();
		//$model->where('msgtype !=','V');
		if($this->request->getMethod() === 'post' && $this->validate([
			'studentid' => 'required|integer',			
		])){
			$gradebookid = $this->request->getPost('gradebookid');
			$gradebookmodel->orderBy('last_updated', 'ASC');	
			$gradebookmodel->where(['gradebookid'=>$gradebookid]);	
			$query = $gradebookmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			//exit;
			echo json_encode(array('formarray'=>array()));
			//return array();
		}
		
	}

	public function sessionrecs(){
		$session = session();
		$sessionmodel = new SessionSetup();
		$sessionmodel->orderBy('sessionid', 'ASC');	
		//$sessionmodel->where(['sessionid'=>$sessionid]);	
		$query = $sessionmodel->get();
		$result = $query->getResult();
		return @$result;
		//$result = $query->getResult();
		//echo json_encode(array('formarray'=>$result));
	}

	public function sessionrecs1(){
		$session = session();
		$sessionmodel = new SessionSetup();
		//$model->where('msgtype !=','V');
		if($this->request->getMethod() === 'post' && $this->validate([
			'sessionid' => 'required|integer',			
		])){
			//$sessionid = $this->request->getPost('sessionid');
			$sessionmodel->orderBy('last_updated', 'ASC');	
			//$sessionmodel->where(['sessionid'=>$sessionid]);	
			$query = $sessionmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			//exit;
			echo json_encode(array('formarray'=>array()));
			//return array();
		}		
	}

	public function termsrecs(){
		$session = session();
		$termsmodel = new TermSetup();
		//$model->where('msgtype !=','V');
		if($this->request->getMethod() === 'post' && $this->validate([
			'termid' => 'required|integer',			
		])){
			$termid = $this->request->getPost('termid');
			$termsmodel->orderBy('last_updated', 'ASC');	
			$termsmodel->where(['termid'=>$termid]);	
			$query = $termsmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			//$data['errors'] = $this->validation->getErrors();
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			//exit;
			echo json_encode(array('formarray'=>array()));
			//return array();
		}		
	}

	//--------------------------------------------------------------------

}
