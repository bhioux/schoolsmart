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
use App\Models\TermSetup;
use App\Models\PopulateClass;
use App\Models\AssignClasses;
use App\Models\ParentsProfile;
use App\Models\GradebookSetup;
use App\Models\Registration;
use App\Models\ReportCardNur;
use App\Models\ReportCardPry;
use App\Models\ApplicationForm;

//setup models
use App\Models\SessionModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AffectiveAreaModel;


//use App\Models\DateTime;
use CodeIgniter\Controller;

class Setup extends BaseController
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
	//sessions
	public function session() {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['session'] = "";
        return view('pages/session', $data);
    }

	public function sessiontable() {
		$session = session();
		$sessionmodel = new SessionModel();
		$query = $sessionmodel->get();
		$result = $query->getResult();
		echo json_encode(array('sessiontabledata'=>$result));
	}

	public function postsession() {
		$session = session();
		$sessionmodel = new SessionModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				//'session_code', 'session_duration'
				'sessioncode' => 'required',
				'sessionduration' => 'required'
			])){
				$sessioncode = $this->request->getPost('sessioncode');
				$sessionmodel->where(array('session_code'=>$sessioncode));	
				$query = $sessionmodel->get();
				$result = $query->getRow();
				if(!(is_object($result))){
					try{
						$recsaved = $sessionmodel->insert([
							//'csrf_test_name' => $this->request->getPost('csrf_test_name'),
							'session_code' => $this->request->getPost('sessioncode'),
							'session_duration' => $this->request->getPost('sessionduration')	
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
				}else {
					echo json_encode(array("success"=>2, "message"=>'Record already exist'));
				}
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }

	public function editsession() {
		$session = session();
		$sessionmodel = new SessionModel();
		if($this->request->getMethod() === 'post' && $this->validate([
			'session_id' => 'required',			
		])){
			$session_id = $this->request->getPost('session_id');
			$sessionmodel->where(['session_id'=>$session_id]);	
			$query = $sessionmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			return array();
		}
	}	

	public function updatesession() {
		$session = session();
		$sessionmodel = new SessionModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				//'sessioncode' => 'required',
				'sessionduration' => 'required'
			])){
                try{	
                    $recsaved = $sessionmodel->save([
                        //'csrf_test_name' => $this->request->getPost('csrf_test_name'),
                        'session_id' => $this->request->getPost('sessionid'),
                        //'session_code' => $this->request->getPost('sessioncode'),
                        'session_duration' => $this->request->getPost('sessionduration'),
                    ]);				
                    $this->session->setFlashdata('savedmsg', 'Record saved successfully');	
                    $data['savedmsg'] = 'Record saved successfully';
                    if($recsaved > 0){
                        echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
                    }elseif($recsaved == 0){
                        echo json_encode(array("success"=>-1, 'Failed to Save Record'));
                    }else{
                        echo json_encode(array("success"=>0, "message"=>'Error Saving Record'));
                    }
                    exit;
                }catch(\Exception $e){
                    echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
                    exit;
                }
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }

	//classes
	public function class() {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['session'] = "";
        return view('pages/class', $data);
    }	

	public function classtable() {
		$session = session();
		$classmodel = new ClassModel();
		$query = $classmodel->get();
		$result = $query->getResult();
		echo json_encode(array('classtabledata'=>$result));
	}	

	public function postclass() {
		$session = session();
		$classmodel = new ClassModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				// 'class_id', 'class_type', 'class_group', 'class_fullname'
				// `classid`, `classtype`, `classname`, `classgroup`
				'classtype' => 'required',
				'classgroup' => 'required',
				'classname' => 'required'
			])){
				$classname = $this->request->getPost('classname');
				$classgroup = $this->request->getPost('classgroup');
				$classmodel->where(array('classname'=>$classname, 'classgroup'=>$classgroup));	
				$query = $classmodel->get();
				$result = $query->getRow();
				if(!(is_object($result))){
					try{
						$recsaved = $classmodel->insert([
							//'csrf_test_name' => $this->request->getPost('csrf_test_name'),
							'class_type' => $this->request->getPost('classtype'),
							'classgroup' => $this->request->getPost('classgroup'),
							'classname' => $this->request->getPost('classname')	
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
				}else {
					echo json_encode(array("success"=>2, "message"=>'Record already exist'));
				}
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }	

	public function editclass() {
		$session = session();
		$classmodel = new ClassModel();
		if($this->request->getMethod() === 'post' && $this->validate([
			'class_id' => 'required',			
		])){
			$class_id = $this->request->getPost('class_id');
			$classmodel->where(['classid'=>$class_id]);	
			$query = $classmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			return array();
		}
	}
	
	public function updateclass() {
		$session = session();
		$classmodel = new ClassModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				// 'class_id', 'class_type', 'class_group', 'class_fullname'
				// `classid`, `classtype`, `classname`, `classgroup`
				'classid' => 'required',
				'classtype' => 'required',
				'classgroup' => 'required',
				'classname' => 'required'
			])){
				$classname = $this->request->getPost('classname');
				$classgroup = $this->request->getPost('classgroup');
				$classmodel->where(array('classname'=>$classname, 'classgroup'=>$classgroup));	
				$query = $classmodel->get();
				$result = $query->getRow();
				if(!(is_object($result))){
	                try{	
	                    $recsaved = $classmodel->save([
	                        //'csrf_test_name' => $this->request->getPost('csrf_test_name'),
							//'class_id' => $this->request->getPost('classid'),
							'class_type' => $this->request->getPost('classtype'),
							'classgroup' => $this->request->getPost('classgroup'),
							'classname' => $this->request->getPost('classname')	
	                    ]);				
	                    $this->session->setFlashdata('savedmsg', 'Record saved successfully');	
	                    $data['savedmsg'] = 'Record saved successfully';
	                    if($recsaved > 0){
	                        echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
	                    }elseif($recsaved == 0){
	                        echo json_encode(array("success"=>-1, 'Failed to Save Record'));
	                    }else{
	                        echo json_encode(array("success"=>0, "message"=>'Error Saving Record'));
	                    }
	                    exit;
	                }catch(\Exception $e){
	                    echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
	                    exit;
	                }					
				}else {
					echo json_encode(array("success"=>2, "message"=>'Record already exist'));
				}

      //           try{	
      //               $recsaved = $classmodel->save([
      //                   //'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						// 'class_id' => $this->request->getPost('classid'),
						// 'class_type' => $this->request->getPost('classtype'),
						// 'class_group' => $this->request->getPost('classgroup'),
						// 'class_fullname' => $this->request->getPost('classname')	
      //               ]);				
      //               $this->session->setFlashdata('savedmsg', 'Record saved successfully');	
      //               $data['savedmsg'] = 'Record saved successfully';
      //               if($recsaved > 0){
      //                   echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
      //               }elseif($recsaved == 0){
      //                   echo json_encode(array("success"=>-1, 'Failed to Save Record'));
      //               }else{
      //                   echo json_encode(array("success"=>0, "message"=>'Error Saving Record'));
      //               }
      //               exit;
      //           }catch(\Exception $e){
      //               echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
      //               exit;
      //           }
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }		

	//subjects
	public function subjects() {
        $menu = new MenuModel();
		$data['header'] = "";
        $data['mainnav'] = "";        
        $data['session'] = "";
        return view('pages/subjects', $data);
    }		

	public function subjectstable() {
		$session = session();
		$subjectsmodel = new SubjectModel();
		$query = $subjectsmodel->get();
		$result = $query->getResult();
		echo json_encode(array('subjectstabledata'=>$result));
	}		

	public function postsubjects() {
		$session = session();
		$subjectsmodel = new SubjectModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				// 'class_id', 'class_type', 'class_group', 'class_fullname'
				 //`subjectid`, `subjectname`, `subjectcode`, `subjectdescription`
				'subjectname' => 'required',
				'subjectcode' => 'required',
				'subjectdescription' => 'required'
			])){
				$subjectcode = $this->request->getPost('subjectcode');
				$subjectsmodel->where(array('subject_code'=>$subjectcode));	
				$query = $subjectsmodel->get();
				$result = $query->getRow();
				if(!(is_object($result))){
					try{
						$recsaved = $subjectsmodel->insert([
							//'csrf_test_name' => $this->request->getPost('csrf_test_name'),
							'subjectname' => $this->request->getPost('subjectname'),
							'subjectcode' => $this->request->getPost('subjectcode'),
							'subjectdescription' => $this->request->getPost('subjectdescription')	
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
				}else {
					echo json_encode(array("success"=>2, "message"=>'Record already exist'));
				}
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }	

	public function editsubjects() {
		$session = session();
		$subjectsmodel = new SubjectModel();
		if($this->request->getMethod() === 'post' && $this->validate([
			'subjectsid' => 'required',			
		])){
			$subjects_id = $this->request->getPost('subjectsid');
			$subjectsmodel->where(['subjectid'=>$subjects_id]);	
			$query = $subjectsmodel->get();
			$result = $query->getResult();
			echo json_encode(array('formarray'=>$result[0]));
		}else{
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			return array();
		}
	}	

	public function updatesubjects() {
		$session = session();
		$subjectsmodel = new SubjectModel();
		if($this->request->getMethod() === 'post' && $this->validate([
				// 'class_id', 'class_type', 'class_group', 'class_fullname'
				'subjectsid' => 'required',
				'subjectname' => 'required',
				//'subjectcode' => 'required',
				'subjectdescription' => 'required'
			])){
                try{	
                    $recsaved = $subjectsmodel->save([
                        //'csrf_test_name' => $this->request->getPost('csrf_test_name'),
						'subjectid' => $this->request->getPost('subjectsid'),
						'subjectname' => $this->request->getPost('subjectname'),
						//'subject_code' => $this->request->getPost('subjectcode'),
						'subjectdescription' => $this->request->getPost('subjectdescription')	
                    ]);				
                    $this->session->setFlashdata('savedmsg', 'Record saved successfully');	
                    $data['savedmsg'] = 'Record saved successfully';
                    if($recsaved > 0){
                        echo json_encode(array("success"=>1, "message"=>'Record saved successfully'));
                    }elseif($recsaved == 0){
                        echo json_encode(array("success"=>-1, 'Failed to Save Record'));
                    }else{
                        echo json_encode(array("success"=>0, "message"=>'Error Saving Record'));
                    }
                    exit;
                }catch(\Exception $e){
                    echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
                    exit;
                }
			}else{
				$data['savedmsg'] = $failed =  $this->validation->getErrors();
				//print_r($failed);
                echo json_encode(array("success"=>-2, "message"=>$failed));
				exit;
			}
    }	


	public function fetchAffectiveArea() {
		$session = session();
		$affectiveareamodel = new AffectiveAreaModel();
		if($this->request->getMethod() === 'post' && $this->validate([
			'regNo' => 'required',			
		])){
			$regNo = $this->request->getPost('regNo');
                try{	
					$affectiveareamodel->where(['regno'=>$regNo]);	
					$query = $affectiveareamodel->get();
					$result = $query->getResult();
					echo json_encode($result[0]);				
                    exit;
                }catch(\Exception $e){
					echo 0;	
                    exit;
                }
		}else{
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			return array();
		}
	}

	public function affectiveArea() {
		$session = session();
		$affectiveareamodel = new AffectiveAreaModel();
		if($this->request->getMethod() === 'get' && $this->validate([
			'sentClassId' => 'required',			
		])){
			$sentClassId = $this->request->getGet('sentClassId');
			//$affectiveareamodel->orderBy('last_updated', 'ASC');	
			$affectiveareamodel->where(['class'=>$sentClassId]);	
			$query = $affectiveareamodel->get();
			$result = $query->getResult();
			echo json_encode(array('affectiveareantabledata'=>$result));
			//echo json_encode($result[0]);
		}else{
			$data['savedmsg'] = $failed =  $this->validation->getErrors();
			return array();
		}
	}

	public function updateAffectiveArea() {
		$session = session();
		$affectiveareamodel = new AffectiveAreaModel();
		if($this->request->getMethod() === 'post' && $this->request->getPost('punctuality') !='Rate Students'){
			$regNo = $this->request->getPost('regNo');
			$affectiveareamodel->where(array('regno'=>$regNo));	
			$query = $affectiveareamodel->get();
			$result = $query->getRow();
			if(!(is_object($result))){
				try{
					$recsaved = $affectiveareamodel->insert([
						'studentid' => $this->request->getPost('studentIdX'),
						'regno' => $regNo,
						'session' => $this->request->getPost('session'),
						'term' => $this->request->getPost('term'),
						'class' => $this->request->getPost('classId'),
						'punctuality' => $this->request->getPost('punctuality'),
						'neatness' => $this->request->getPost('neatness'),
						'politeness' => $this->request->getPost('politeness'),
						'honesty' => $this->request->getPost('honesty'),
						'relationshipwithstaffs' => $this->request->getPost('relwithstaff'),
						'relationshipwithothers' => $this->request->getPost('relwithothers'),
						'leadership' => $this->request->getPost('leadership'),
						'emotionalstability' => $this->request->getPost('emotionalstability'),
						'health' => $this->request->getPost('health'),
						'attitudetoschoolwork' => $this->request->getPost('attitude'),
						'attentiveness' => $this->request->getPost('attentiveness'),
						'persevearance' => $this->request->getPost('perseverance'),
						'attendanceinclass' => $this->request->getPost('attendance'),
						'reliability' => $this->request->getPost('reliability'),
						'selfcontrol' => $this->request->getPost('selfcontrol'),
						'cooperation' => $this->request->getPost('cooperation'),
						'responsibility' => $this->request->getPost('responsibility'),
						'initiative' => $this->request->getPost('initiative'),
						'organisationalability' => $this->request->getPost('orgability'),
						'fluency' => $this->request->getPost('fluency'),
						'games' => $this->request->getPost('games'),
						'sports' => $this->request->getPost('sports'),
						'drawingandpainting' => $this->request->getPost('drawing'),
						'musicalskills' => $this->request->getPost('music'),
						'handlingoftools' => $this->request->getPost('handlingtools')
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
				//echo json_encode(array("success"=>2, "message"=>'Record already exist'));
                try{	
                    $recsaved = $affectiveareamodel->save([
                    	'studentid' => $this->request->getPost('studentIdX'),
                    	'regno' => $regNo,
						'session' => $this->request->getPost('session'),
						'term' => $this->request->getPost('term'),
						'class' => $this->request->getPost('classId'),
						'punctuality' => $this->request->getPost('punctuality'),
						'neatness' => $this->request->getPost('neatness'),
						'politeness' => $this->request->getPost('politeness'),
						'honesty' => $this->request->getPost('honesty'),
						'relationshipwithstaffs' => $this->request->getPost('relwithstaff'),
						'relationshipwithothers' => $this->request->getPost('relwithothers'),
						'leadership' => $this->request->getPost('leadership'),
						'emotionalstability' => $this->request->getPost('emotionalstability'),
						'health' => $this->request->getPost('health'),
						'attitudetoschoolwork' => $this->request->getPost('attitude'),
						'attentiveness' => $this->request->getPost('attentiveness'),
						'persevearance' => $this->request->getPost('perseverance'),
						'attendanceinclass' => $this->request->getPost('attendance'),
						'reliability' => $this->request->getPost('reliability'),
						'selfcontrol' => $this->request->getPost('selfcontrol'),
						'cooperation' => $this->request->getPost('cooperation'),
						'responsibility' => $this->request->getPost('responsibility'),
						'initiative' => $this->request->getPost('initiative'),
						'organisationalability' => $this->request->getPost('orgability'),
						'fluency' => $this->request->getPost('fluency'),
						'games' => $this->request->getPost('games'),
						'sports' => $this->request->getPost('sports'),
						'drawingandpainting' => $this->request->getPost('drawing'),
						'musicalskills' => $this->request->getPost('music'),
						'handlingoftools' => $this->request->getPost('handlingtools')
                    ]);				
                    $this->session->setFlashdata('savedmsg', 'Record updated successfully');	
                    $data['savedmsg'] = 'Record updated successfully';
                    if($recsaved > 0){
                        echo json_encode(array("success"=>1, "message"=>'Record updated successfully'));
                    }elseif($recsaved == 0){
                        echo json_encode(array("success"=>-1, 'Failed to updated Record'));
                    }else{
                        echo json_encode(array("success"=>0, "message"=>'Error updateding Record'));
                    }
                    exit;
                }catch(\Exception $e){
                    echo json_encode(array("success"=>0, "message"=>$e->getMessage()));
                    exit;
                }				
			}
		}else{
			//empty fields 
			echo 'empty fields posted';
		}
	}


}
