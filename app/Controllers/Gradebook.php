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
use App\Models\Gradebooks;
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
		$data['hashcode'] = $this->refreshcsrf();
		$data['sessionrecs'] = $this->sessionrecs();
		$data['termrecs'] = $this->termrecs();
		$data['classes'] = $this-> classrecs();
		$data['subjects'] = $this-> subjectrecs();
		//$data['adminmenu'] = $menu->asObject()->findAll();
		return view('pages/home', $data);
	}

    public function gradebooksetup()
    {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['gradebooksetup'] = "";

		$data['hashcode'] = $this->refreshcsrf();
		$data['sessionrecs'] = $this->sessionrecs();
		$data['termrecs'] = $this->termrecs();
		$data['classes'] = $this-> classrecs();
		$data['subjects'] = $this-> subjectrecs();

        return view('pages/gradebooksetup', $data);
    }

	public function postgradebook()
    {
		$gradebookmodel = new Gradebooks();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// 'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term'

				'studentid.*' => 'required|required_with[studentgrade.*]',
				'studentgrade.*' => 'required',
				'sybjectgroup' => 'required',
				'classgroup' => 'required',
				'assessment1'  => 'required',
				'gSession'  => 'required',
				'gTerm'  => 'required',
			])){
				// studentid[], studentgrade[], classgroup, subjectgroup, refhasname, refhashcode, refreshedhash, gSession, gTerm, assessment1, hashurl, gradebooktableurl, editurl, posturl, gradebookid, csrf_test_name
				try{                    
                    $recsaved = $gradebookmodel->insert([
						//'username' => $this->request->getPost('username'),
						'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						'studentid' => $this->request->getPost('studentid'),
						'studentgrade' => $this->request->getPost('studentgrade'),
						'classgroup' => $this->request->getPost('classgroup'), //sybjectgroup
						'sybjectgroup' => $this->request->getPost('sybjectgroup'), //sybjectgroup
						'assessment1'  => $this->request->getPost('assessment1'),
						'gSession'  => $this->request->getPost('gSession'),
						'gTerm'  => $this->request->getPost('gTerm'),
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
		//$session = $this->request->getGet('session');
		//$term  = $this->request->getGet('term');

		if($this->request->getMethod() === 'get' && $this->validate([
			// 'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term'

			// http://schoolsmart.test/gradebook/gradebooktable?subject=&class=&term=2&session=3&csrf_test_name=ec738cc0fcaadb5081e6786ca1ad2867&_=1643793937684

			'class' => 'required',
			'csrf_test_name'  => 'required',

		])){
			
			//$subject = $this->request->getPost('subject');
			$class = $this->request->getGet('class');
			//$term = $this->request->getPost('term');
			//$session = $this->request->getPost('session');
			$csrf_test_name = $this->request->getGet('csrf_test_name');

			//echo $class."- Class"; exit;

			//$model->where('msgtype !=','V');
			//$gradebookmodel->orderBy('created_at', 'ASC');	
			$gradebookmodel->where(['studentclass'=>trim($class)]);	
			$query = $gradebookmodel->get();
			$result = $query->getResult();
			//echo json_encode("messagelog"=$result);
			echo json_encode(array('gradebookdata'=>$result));
			
		}else{
			//print_r($this->validation->getErrors());
			//$data['savedmsg'] = $failed =  $this->validation->getErrors();
			//print_r($failed);
			echo json_encode(array('gradebookdata'=>array()));
			// exit;
			//return view('pages/gradebooksetup', $data);
		}

		
		
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

	function refreshcsrf(){
		$csrfName = csrf_token();
    	$csrfHash = csrf_hash();  
		return $csrfHash;
	}

	public function sessionrecs(){
		$session = session();
		$sessionmodel = new SessionSetup();
		$sessionmodel->orderBy('sessionid', 'ASC');	
		$sessionmodel->where(['activeflag'=>1]);	
		$query = $sessionmodel->get();
		$result = $query->getResult();
		return @$result[0];
	}

	public function termrecs(){
		$session = session();
		$termmodel = new TermSetup();
		$termmodel->orderBy('termid', 'ASC');	
		$termmodel->where(['activeflag'=>1]);	
		$query = $termmodel->get();
		$result = $query->getResult();
		return @$result[0];
	}

	public function classrecs(){
		$session = session();
		$classmodel = new ClassSetup();
		$classmodel->orderBy('classid', 'ASC');	
		//$sessionmodel->where(['sessionid'=>$sessionid]);	
		$query = $classmodel->get();
		$result = $query->getResult();
		return @$result;
	}

	public function subjectrecs(){
		$session = session();
		$subjectmodel = new SubjectSetup();
		$subjectmodel->orderBy('subjectid', 'ASC');	
		//$sessionmodel->where(['sessionid'=>$sessionid]);	
		$query = $subjectmodel->get();
		$result = $query->getResult();
		return @$result;
	}

	public function sessionrecs2(){
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

	public function termsrecs2(){
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
