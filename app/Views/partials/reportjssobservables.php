<?php
 function mapSubjects($subj, $code){
   foreach($subj as $grade){
      if(in_array($code, $grade)){
        return (object)$grade;
      }
    }
    return false;
 }
 $engrec = mapSubjects($gradebook, "ENG");
 //var_dump($studentview);

?>
<style>
   .uptab{
    writing-mode: vertical-rl;
    /* writing-mode: sideways-lr;  */
    text-orientation: mixed;
    padding-left: 0px;
    margin: 0px;
  }

  #reportcar {
    background: #fff;
    writing-mode: vertical-rl;
    text-orientation:mixed;
  }
  p{
    margin: 0px;
  }

  @media print {

        html, body {
        height:100%; 
        margin: 0 !important; 
        padding: 0 !important;
        overflow: hidden;
        }

        #accordionExample{
        display:none;
        }

  }
</style>
<div class="container">
  <div class="row">
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
      <div class="statbox widget box box-shadow">
        <div class="widget-header">
          <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
              <h4>JUNIOR SECONDARY SCHOOL, TERMINAL REPORT</h4>
            </div>                 
          </div>
        </div>
        <div class="widget-content widget-content-area">
          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
          <div class="row">
              <div class="col-lg-12">
                <p>NAME OF STUDENT: <b><?= strtoupper($studentview->fullname ?? "-") ?></b></p>
              </div>

              <div class="col-lg-3">
                  <p>CLASS: <b><?= strtoupper($studentview->class ?? "-") ?></b></p>
              </div>
              
              <div class="col-lg-3">
                  <p>GENDER: <b><?= strtoupper($studentview->gender ?? "-") ?></b></p>
              </div>

              <div class="col-lg-3">
                <?php
                if(isset($studentview->dob)){
                  $dateOfBirth = $studentview->dob;
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                  //echo 'Age is '.$diff->format('%y');
                }
                    
                ?>
                  <p>AGE: <?= $diff->format('%y') ?? '' ?></p>
              </div>
              <div class="col-lg-3">
                  <p>HOUSE:</p>
              </div>
              <div class="col-lg-3">
                  <p>NEXT TERM BEGINS:</p>
              </div>
              <div class="col-lg-3">
                  <p>NO. IN CLASS:</p>
              </div>
              <div class="col-lg-3">
                  <p>TERM: <b><?= strtoupper($studentview->termname ?? "-") ?></b></p>
              </div>
              <div class="col-lg-3">
                  <p>SESSION: <b><?= strtoupper($studentview->sessionname ?? "-") ?></b></p>
              </div>
            </div>
            <br>  

        <div class="widget-content widget-content-area">
          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <!-- <div class="mg-lg-b-20"></div> -->
            <div class="row">
            <div class="col-lg-9">
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>OBSERVABLE TRAITS' RATING</h4>
                    </div>                 
                  </div>
                </div>
                <!-- <div class="row mg-b-5 justify-content-center"><h4>AFFECTIVE AREAS</h4></div> -->
                <div class="table-responsive">
                  <table id="reportcard" class="table table-bordered mg-b-0">
                    <tbody>
                    <tr>
                        <th scop="row"></th>
                        <td>5</td>
                        <td>4</td>
                        <td>3</td>
                        <td>2</td>
                        <td>1</td>
                      </tr>
                      <tr>
                        <th scop="row">Punctuality</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Neatness</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Politeness</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Honesty</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Relationship with others</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Leadership</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Emotional Stability</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Health</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Attitude to School Work</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Attentiveness</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scop="row">Perseverance</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->
              </div>
              <div class="col-lg-3">
                <!-- <br> -->
                <br>
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>GRADE</h4>
                    </div>                 
                  </div>
                </div>
                <!-- <div class="row mg-b-1">&nbsp; &nbsp; &nbsp;<h5>GRADE</h5></div> -->
                <div class="table-responsive">
                  <table i="reportcard" class="table mg-b-0">
                    <tbody>
                      <tr>
                        <th scop="row">5 &nbsp; Excellent</th>
                        <td>&lbrack;A&rbrack;</td>
                      </tr>
                      <tr>
                        <th scop="row">4 &nbsp; Good</th>
                        <td>&lbrack;B&rbrack;</td>
                      </tr>
                      <tr>
                        <th scop="row">3 &nbsp; Average</th>
                        <td>&lbrack;C&rbrack;</td>
                      </tr>
                      <tr>
                        <th scop="row">2 &nbsp; Fair</th>
                        <td>&lbrack;D&rbrack;</td>
                      </tr>
                      <tr>
                        <th scop="row">1 &nbsp; Poor</th>
                        <td>&lbrack;E&rbrack;</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->                  
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  