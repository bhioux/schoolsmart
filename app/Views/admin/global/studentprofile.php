<?php
//var_dump($guardians); exit;
?>
<form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">
  
  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <!-- START CRUD PROPERTY SETTIGS  -->
        <input type="hidden" name="studentprofileid" id="studentprofileid" value="">     
        <input type="hidden" name="recordid" id="recordid" value="">     
        <input type="hidden" name="colname" id="colname" value="studentprofileid">
        <!-- END CRUD PROPERTY SETTIGS  -->

        <label class="az-content-label mg-b-5">surname</label>        
        <input class="form-control" placeholder="surname" name="surname" id="surname" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->                
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">other names</label>
        <input class="form-control" placeholder="firstname" name="firstname" id="firstname" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->                
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">homeaddress</label>
        <input class="form-control" placeholder="homeaddress" name="homeaddress" id="homeaddress" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->                
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">telephone</label>
        <input class="form-control" placeholder="telephone" name="telephone" id="telephone" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->               
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">email</label>
        <input class="form-control" placeholder="email" name="email" id="email" value="" type="email">
      </div><!-- form-group -->
    </div><!-- col -->               
  </div><!-- row -->

  <div class="row row-md">

    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">Gender</label>
        <select class="form-control select2" name="sex" id="sex">
          <option label="Choose one"></option>
          <option value="male">male</option>
          <option value="female">female</option>
        </select>
      </div>
    </div>       

    <div class="col">
      <label class="az-content-label mg-b-5">date of birth</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
            </div>
          </div>
          <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" id="dob" name="dob">
        </div>
    </div><!-- col -->            
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">place of birth</label>
        <input class="form-control" placeholder="placeofborth" name="placeofborth" id="placeofborth" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->               
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">ethnicity</label>
        <select class="form-control select2" name="ethnicity" id="ethnicity">
          <option label="Choose one"></option>
        </select>
      </div>
    </div> 

    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">religion</label>
        <select class="form-control select2" name="religion" id="religion">
          <option label="Choose one"></option>
        </select>
      </div>
    </div> 
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">weight</label>
        <input class="form-control" placeholder="weight" name="weight" id="weight" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col --> 

    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">height</label>
        <input class="form-control" placeholder="height" name="height" id="height" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col -->               
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">physical challenge</label>
        <input class="form-control" placeholder="physicalchallenge" name="physicalchallenge" id="physicalchallenge" value="" type="text">
      </div><!-- form-group -->
    </div><!-- col --> 

    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">blood group</label>
        <select class="form-control select2" name="bloodtype" id="bloodtype">
          <option label="Choose one"></option>
        </select>
      </div><!-- form-group -->
    </div><!-- col -->               
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">genotype</label>
        <select class="form-control select2" name="genotype" id="genotype">
          <option label="Choose one"></option>
        </select>
      </div><!-- form-group -->
    </div><!-- col -->   

    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">passport photograph</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div><!-- form-group -->
    </div><!-- col --> 

    <!-- col -->               
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      <div class="form-group has-success mg-b-0">
        <label class="az-content-label mg-b-5">Parent/Guardian</label>
        <select class="form-control select2" name="guardianname" id="guardianname">
          <option label="Choose one"></option>
          <?php
            //var_dump($guardians); exit;
            $parents = json_decode($guardians);
            foreach($parents as $record){
              echo '<option value="'.$record->parentsprofileid.'">'.ucwords($record->firstname." ".$record->surname).'</option>';
            }
          ?>
          <!-- <option label="Choose one"></option>
          <option value="male">male</option>
          <option value="female">female</option> -->
        </select>
      </div>
    </div>                
  </div><!-- row -->

  <div class="row row-md">
    <div class="col">
      &nbsp;
    </div>
    <div class="col text-right">
      <div class="form-group has-success mg-b-0"><br>
        <button class="btn btn-az-secondary btn-md" name="btnreset" id="btnreset">Reset</button>
        <button class="btn btn-az-primary btn-md" name="btnsubmit" id="btnsubmit">Submit</button>
      </div><!-- form-group -->
    </div>
  </div><!-- col -->


<!-- 
`studentprofileid`, `surname`, `firstname`, `homeaddress`, `telephone`, `sex`, `dob`, `placeofborth`, `ethnicity`, `religion`, `weight`, `height`, `physicalchallenge`, `bloodtype`, `illnesssuffered`, `allergies`, `distancetoschool`, `guardianname`, `guardianrelationship`, `guardianoccupation`, `guardiangrade`, `guardianaddress`, `guradiantelephone`, `prevacadrecords`, `prevschool`, `leavingdate`, `grades`, `results`, `observation`, `currentgrade`, `refdate`
-->             

</form>