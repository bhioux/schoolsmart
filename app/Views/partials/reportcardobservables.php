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
              <h4><?= @strtoupper($title) ?></h4>
            </div>                 
          </div>
        </div>
        <div class="widget-content widget-content-area">
          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <div class="row">
              <div class="col-lg-7">
                <h5>TERM: <b><?= strtoupper($studentview->termname ?? "-") ?></b></h5>
              </div>
              <div class="col-lg-5">
                  <h5>SESSION: <b><?= strtoupper($studentview->sessionname ?? "-") ?></b></h5>
              </div>
              <div class="col-lg-12">
                <p>NAME OF STUDENT: <b><?= strtoupper($studentview->fullname ?? "-") ?></b></p>
              </div>

              <div class="col-lg-7">
                  <p>CLASS: <b><?= strtoupper($studentview->class ?? "-") ?></b></p>
              </div>
              <div class="col-lg-5">
                  <p>GENDER: <b><?= strtoupper($studentview->gender ?? "-") ?></b></p>
              </div>

              <div class="col-lg-7">
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
              <div class="col-lg-5">
                  <p>HOUSE:</p>
              </div>
              <div class="col-lg-7">
                  <p>NEXT TERM BEGINS:</p>
              </div>
              <div class="col-lg-5">
                  <p>NO. IN CLASS:</p>
              </div>
            </div>
            <br>  

            <!-- <div class="row">
              <div class="col-lg-6">
                <p><b>Guidance Counsellor's Remarks:</b></p>
                <br>
                <p><b>Class Teacher's Remarks:</b></p>
                <br>
                <p><b>Principal's Remarks:</b></p>
              </div>
              <div class="col-lg-3">
                <p><i>Signature</i></p>
                <br> 
                <p><i>Signature</i></p>
                <br> 
                <p><i>Signature</i></p>
              </div>
              <div class="col-lg-3">
                <p><i>Date:</i></p>
                <br>
                <p><i>Date:</i></p>
                <br>
                <p><i>Date:</i></p>
              </div>
            </div> -->
          </div>
        </div>
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
                <div class="widget-content widget-content-area">
                  <div class="table-responsive">
                    <table id="reportcard" class="table table-bordered mg-b-0">
                      <tbody>
                      <tr>
                          <th cope="row"></th>
                          <td>5</td>
                          <td>4</td>
                          <td>3</td>
                          <td>2</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <th scope="row">Punctuality</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Attendance in Class</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Reliability</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Neatness</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Politeness</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Honesty</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Relationship with Staff</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Relationship with Students</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Self Control</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Spirit of Cooperation</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Sense of Responsibility</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Attentiveness</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Initiative</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Organisational Ability</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Perseverance</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Fluency</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Games</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Sports</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Drawing and Painting</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Musical Skills</th>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">Handling of Tools</th>
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
              </div>
              <div class="col-lg-3">
                <!-- <br> -->
                <br>
                <div class="widget-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>KEY TO RATINGS</h4>
                    </div>                 
                  </div>
                </div>
                <!-- <div class="row mg-b-1">&nbsp; &nbsp; &nbsp;<h5>GRADE</h5></div> -->
                <div class="table-responsive">
                  <table id="reportcard" class="table mg-b-0">
                    <tbody>
                      <tr>
                        <th scope="row">5 &nbsp;Maintain an excellent degree of observable traits</th>
                        <!-- <td>&lbrack;A&rbrack;</td> -->
                      </tr>
                      <tr>
                        <th scope="row">4 &nbsp; Maintain a high level of observable traits</th>
                        <!-- <td>&lbrack;B&rbrack;</td> -->
                      </tr>
                      <tr>
                        <th scope="row">3 &nbsp; Acceptable level of observable traits</th>
                        <!-- <td>&lbrack;C&rbrack;</td> -->
                      </tr>
                      <tr>
                        <th scope="row">2 &nbsp; Show minimal level of observable traits</th>
                        <!-- <td>&lbrack;D&rbrack;</td> -->
                      </tr>
                      <tr>
                        <th scope="row">1 &nbsp; Has no regard of observable traits</th>
                        <!-- <td>&lbrack;E&rbrack;</td> -->
                      </tr>
                    </tbody>
                  </table>
                </div><!-- table-responsive -->

                <div class="widget-content widget-content-area">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>GRADE</h4>
                  </div> 
                  <div class="table-responsive">
                    <table id="reportcard" class="table mg-b-0">
                      <tbody>
                        <tr>
                          <th scope="row">0 - 39</th>
                          <td>&lbrack;F9&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">40 - 44</th>
                          <td>&lbrack;E8&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">45 - 49</th>
                          <td>&lbrack;D7&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">50 - 54</th>
                          <td>&lbrack;C6&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">55 - 59</th>
                          <td>&lbrack;C5&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">60 - 64</th>
                          <td>&lbrack;C4&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">65 - 69</th>
                          <td>&lbrack;B3&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">70 - 74</th>
                          <td>&lbrack;B2&rbrack;</td>
                        </tr>
                        <tr>
                          <th scope="row">75 - ABOVE</th>
                          <td>&lbrack;A1&rbrack;</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- table-responsive -->  
                </div>
              </div>
            </div>

            <!-- <br>
            <div class="row">
              <div class="col-lg-12">
                <p>Award Prize Won: <span></span></p>
                <p>Date of Vacation: <span></span></p>
                <p>Date of Resumption: <span></span></p>
                <p>Class Teacher's Comment: <span></span></p>
                <div class="row">
                  <div class="col-lg-7">
                    <p>HEAD TEACHER'S NAME:</p>
                  </div>
                  <div class="col-lg-5">
                    <p>Date:</p>
                  </div>
                  <div class="col-lg-7">
                    <p>PARENT'S/GUARDIAN'S NAME:</p>
                  </div>
                  <div class="col-lg-5">
                    <p>Date</p>
                  </div>
                  <div class="col-lg-7">
                    <p>Class Teacher's Comments:</p>
                  </div>
                  <div class="col-lg-5">
                    <p>Date</p>
                  </div>
                  <div class="col-lg-7">
                    <p>Next Semester Begins:</p>
                  </div>
                  <div class="col-lg-5">
                    <p>Next Semester Ends</p>
                  </div>
                </div>
              </div>
            </div> -->
    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  