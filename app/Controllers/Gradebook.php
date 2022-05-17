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
use CodeIgniter\Database\Query;

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

		$data['classes'] = $this->classrecs();
		$data['subjects'] = $this->subjectrecs();
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

		$data['subjects'] = $this->subjectrecs();

        return view('pages/gradebooksetup', $data);
    }

	public function postgradebook()
    {
		$gradebookmodel = new Gradebooks();
		$allvalues = '';

		if($this->request->getMethod() === 'post' && $this->validate([
				// 'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term'

				'studentid.*' => 'required|decimal|required_with[studentgrade.*]',
				'studentno.*' => 'required|required_with[studentid.*]',
				'studentgrade.*' => 'required|decimal|required_with[studentid.*]',
				'sybjectgroup' => 'required',
				'classgroup' => 'required',
				'assessment1'  => 'required',
				'gSession'  => 'required',
				'gTerm'  => 'required',
			])){
				// print_r($this->request->getPost('studentid'));
				// echo '<br>';
				// print_r($this->request->getPost('studentgrade'));
				// exit;

				$studentid = $this->request->getPost('studentid');
				$studentno = $this->request->getPost('studentno');
				$studentgrade = $this->request->getPost('studentgrade');
				$classgroup = $this->request->getPost('classgroup'); //sybjectgroup
				$subjectgroup = $this->request->getPost('sybjectgroup'); //sybjectgroup
				$assessmenttype = $this->request->getPost('assesstype');
				$session = $this->request->getPost('gSession');
				$term = $this->request->getPost('gTerm');

				$savedid = [];
				$failedid = [];
				$failedstudentno = [];
				$failedmessages = [];
				$savedmessages = [];

				$pQuery = $gradebookmodel->prepare(function ($gradebookmodel) {
					$sql = 'INSERT INTO setup_gradebook (id, studentid, assessmentgrade, studentclass, studentsubject, assessmenttype, ssession, term )
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)
					ON DUPLICATE KEY UPDATE 
						id=VALUES(id), 
						studentid=VALUES(studentid), 
						assessmentgrade=VALUES(assessmentgrade), 
						studentclass=VALUES(studentclass), 
						studentsubject=VALUES(studentsubject), 
						assessmenttype=VALUES(assessmenttype), 
						ssession=VALUES(ssession), 
						term=VALUES(term)';

					return (new Query($gradebookmodel))->setQuery($sql);
				});


				for ($i=0; $i < sizeof($studentid); $i++) { 

					try{     

						$id = $studentno[$i].$subjectgroup.$classgroup.$term.$session.$assessmenttype;
						$studentids = $studentno[$i];
						$assessmentgrades = $studentgrade[$i];
						$studentclass = $classgroup;
						$studentsubject = $subjectgroup;
						$assessmenttype = $assessmenttype;
						$ssession = $session;
						$term = $term;


						$sqldata = [
						'id'  => $studentno[$i].$subjectgroup.$classgroup.$term.$session.$assessmenttype,
						'studentid' => $studentno[$i],
						'assessmentgrade' => $studentgrade[$i],
						'studentclass' => $classgroup, //sybjectgroup
						'studentsubject' => $subjectgroup, //sybjectgroup
						'assessmenttype'  => $assessmenttype,
						'ssession'  => $session,
						'term'  => $term,];

						$sqldata1 = [
							$studentno[$i].$subjectgroup.$classgroup.$term.$session.$assessmenttype,
							 $studentno[$i],
							$studentgrade[$i],
							$classgroup, 
							$subjectgroup, 
							$assessmenttype,
							$session,
							$term,];

						//$recsaved = $pQuery->execute($id, $studentids, $assessmentgrades, $studentclass, $studentsubject, $assessmenttype, $ssession, $term);
						$recsaved = $pQuery->_execute($sqldata1);
						
						// $sql1 = 'INSERT INTO menu_sub (id, studentid, assessmentgrade, studentclass, studentsubject, assessmenttype, session, term )
						// VALUES (?, ?, ?, ?, ?, ?, ?, ?)
						// ON DUPLICATE KEY UPDATE 
						// 	studentid=VALUES(studentid), 
						// 	assessmentgrade=VALUES(assessmentgrade), 
						// 	studentclass=VALUES(studentclass), 
						// 	studentsubject=VALUES(studentsubject), 
						// 	assessmenttype=VALUES(assessmenttype), 
						// 	session=VALUES(session), 
						// 	term=VALUES(term)';

						// $pQuery = $gradebookmodel->prepare(function ($gradebookmodel) {
						// 	$sql = 'INSERT INTO menu_sub (id, studentid, assessmentgrade, studentclass, studentsubject, assessmenttype, session, term )
						// 	VALUES (?, ?, ?, ?, ?, ?, ?, ?)
						// 	ON DUPLICATE KEY UPDATE 
						// 		studentid=VALUES(studentid), 
						// 		assessmentgrade=VALUES(assessmentgrade), 
						// 		studentclass=VALUES(studentclass), 
						// 		studentsubject=VALUES(studentsubject), 
						// 		assessmenttype=VALUES(assessmenttype), 
						// 		session=VALUES(session), 
						// 		term=VALUES(term)';

						// 	return (new Query($gradebookmodel))->setQuery($sql);
						// });


						// ///////////////////////////

						// $query = $gradebookmodel->query($sql, [
						// 	'id'  => $studentno[$i].$subjectgroup.$classgroup.$term.$session.$assessmenttype,
						// 	'studentid' => $studentno[$i],
						// 	'assessmentgrade' => $studentgrade[$i],
						// 	'studentclass' => $classgroup, //sybjectgroup
						// 	'studentsubject' => $subjectgroup, //sybjectgroup
						// 	'assessmenttype'  => $assessmenttype,
						// 	'session'  => $session,
						// 	'term'  => $term,
						// ]);

						//$recsaved = $gradebookmodel->getResult($query );



						// $recsaved = $gradebookmodel->save([
						// 	//'username' => $this->request->getPost('username'),
						// 	//'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						// 	//'studentid' => $studentid,
						// 	'id'  => $studentno[$i].$subjectgroup.$classgroup.$term.$session.$assessmenttype,
						// 	'studentid' => $studentno[$i],
						// 	'assessmentgrade' => $studentgrade[$i],
						// 	'studentclass' => $classgroup, //sybjectgroup
						// 	'studentsubject' => $subjectgroup, //sybjectgroup
						// 	'assessmenttype'  => $assessmenttype,
						// 	'session'  => $session,
						// 	'term'  => $term,							
						// ]);

						//$savedmessages[] = $recsaved;
						//$failedmessages[] =  $pQuery->getQueryString();

						

						if($recsaved > 0){
							//echo 1;
							$savedid[] = $studentid[$i];
							$savedmessages[] = $recsaved;
							//echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
						}else{
							$failedid[] = $studentid[$i];
							$failedstudentno[] = $studentno[$i];
							//echo 0;
							//echo json_encode(array("success"=>0, "message"=>'Error saving record'));
						}
						
					}catch(\Exception $e){
						$failedid[] = $studentid[$i];
						$failedstudentno[] = $studentno[$i];
						$failedmessages[] = $pQuery->$e->getMessage(); //$e->getMessage();
						//print_r($e->getMessage());
						//echo json_encode(array("success"=>-2, "message"=>$e->getMessage()));
						//exit;
					}

				}

				if(sizeof($savedid) == sizeof($studentid)){
					//echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
					echo json_encode(array_merge(array("success"=>1, "message"=>'Record saved successfully'),  $savedmessages, $failedmessages));
				}else{
					//$message = 'Failed to save '.json_encode($failedmessages);		
					echo json_encode(array_merge(array("success"=>0, "message"=>'Failed to save'),  $savedmessages, $failedmessages));
				}

				// studentid[], studentgrade[], classgroup, subjectgroup, refhasname, refhashcode, refreshedhash, gSession, gTerm, assessment1, hashurl, gradebooktableurl, editurl, posturl, gradebookid, csrf_test_name
				
				//'gradebookid', 'studentclass', 'studentsubject', 'studentid', 'assessmenttype', 'assessmentgrade', 'session', 'term', 'created_at', 'updated_at'

				//STUDENTNO-SUBJECT-CLASS-TERM-SESSION-ASSESSMENTTYPE

				
				
			}else{
				//$data['errors'] = $this->validation->getErrors();
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				//exit;
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

			'subject' => 'required',
			'class' => 'required',
			'csrf_test_name'  => 'required',

		])){
			
			$subject = $this->request->getGet('subject');
			$class = $this->request->getGet('class');
			//$term = $this->request->getPost('term');
			//$session = $this->request->getPost('session');
			$csrf_test_name = $this->request->getGet('csrf_test_name');

			// echo $class."- Class";
			// echo $subject."- subject"; exit;

			//$model->where('msgtype !=','V');
			//$gradebookmodel->orderBy('created_at', 'ASC');	
			$gradebookmodel->where(['class'=>trim($class), 'subjects'=>trim($subject)]);	
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
