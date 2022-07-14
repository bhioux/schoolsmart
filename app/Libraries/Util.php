<?php namespace App\Libraries;

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
use App\Models\StudentProfileView;
use App\Models\GradebookView;
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

class Util
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

	public function selectaffectiverating1($default){
		$sel = '';
		$sel .= '<option hidden>Rate Students</option>';
		for($i=5;$i>0;$i--){
			if($i=$default){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$sel .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		echo $sel;
	}

	public function selectaffectiverating($default){
		$sel = "";
		$sel .= "<option hidden>Rate Students</option>";
		for($i=5; $i>0; $i--){
			if($i==$default){
				$selected = 'selected';
			}else{
				$selected = '';
			}
			$sel .= "<option value='".$i."' " .$selected. ">".$i."</option>";
		}
		return $sel;
	}


	//--------------------------------------------------------------------

}
