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

  #reportcard {
    background: #fff;
    writing-mode: vertical-rl;
    text-orientation:mixed;
  }

  p, th{
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
                  <p>AGE: </p>
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
            <div class="row">
              <div class="table-responsive" class="col-lg-10">
                <table class="table table-bordered mb-4">
                <thead>
                    <tr>
                      <th class="col-lg-2" rowspan="2">SUBJECTS</th>
                      <th><p class="uptab">1ST TEST</p></th>
                      <th><p class="uptab">2ND TEST</p></th>
                      <th><p class="uptab">3RD TEST</p></th>
                      <th><p class="uptab">TEST'S EXAM</p></th>
                      <th><p class="uptab">SUMMARY OF <br>TERM'S WORK</p></th>
                      <th rowspan="2"><p class="uptab">LAST TERM<br>CUMULATIVE</p></th>
                      <th rowspan="2"><p class="uptab"> CUMULATIVE<br>AVERAGE</p></th>
                      <th rowspan="2"><p class="uptab">CLASS AVERAGE</p></th>
                      <th rowspan="2"><p class="uptab">POSITION GRADE<br>IN SUBJECT</p></th>
                      <th rowspan="2"><p class="uptab">SUBJECTS TEACHERS<br>REMARK</p></th>
                      <th rowspan="2"><p class="uptab">SUBJECT TEACHER<br>SIGNATURE</p></th>
                    </tr>
                  </thead>     
                  <tbody>
                    <tr>
                      <td></td>
                      <td colspan="5">MARKS OBTAINABLE</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td class="col-md-1 text-danger">10</td>
                      <td class="col-md-1 text-primary">20</td>
                      <td class="col-md-1">20</td>
                      <td class="col-md-1">50</td>
                      <td class="col-md-1">100</td>
                      <td class="col-md-1">100</td>
                      <td class="col-md-1">100</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php  $engrec = mapSubjects($gradebook, "ENG"); ?>
                    <tr>
                      <td>ENGLISH LANGUAGE</td>
                      <td class="<?= @($engrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($engrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($engrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($engrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->exam ?? "-" ?></td>
                      <td class="<?= @($engrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($engrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($engrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $engrec->cumavg2 ?? "-" ?></td>
                      <td><?= $engrec->classavg ?? "-" ?></td>
                      <td><?= $engrec->position ?? "-" ?></td>
                      <td><?= $engrec->remark ?? "-" ?></td>
                      <td><?= $engrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $yorrec = mapSubjects($gradebook, "YOR"); ?>
                    <tr>
                      <td>YORUBA</td>
                      <td class="<?= @($yorrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($yorrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($yorrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($yorrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->exam ?? "-" ?></td>
                      <td class="<?= @($yorrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($yorrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($yorrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yorrec->cumavg2 ?? "-" ?></td>
                      <td><?= $yorrec->classavg ?? "-" ?></td>
                      <td><?= $yorrec->position ?? "-" ?></td>
                      <td><?= $yorrec->remark ?? "-" ?></td>
                      <td><?= $yorrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $frcrec = mapSubjects($gradebook, "FRC"); ?>
                    <tr> 
                      <td>FRENCH</td>
                      <td class="<?= @($frcrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($frcrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($frcrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($frcrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->exam ?? "-" ?></td>
                      <td class="<?= @($frcrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($frcrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($frcrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $frcrec->cumavg2 ?? "-" ?></td>
                      <td><?= $frcrec->classavg ?? "-" ?></td>
                      <td><?= $frcrec->position ?? "-" ?></td>
                      <td><?= $frcrec->remark ?? "-" ?></td>
                      <td><?= $frcrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $matrec = mapSubjects($gradebook, "MAT"); ?>
                    <tr>
                      <td>MATHEMATICS</td>
                      <td class="<?= @($matrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($matrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($matrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($matrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->exam ?? "-" ?></td>
                      <td class="<?= @($matrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($matrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($yorrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->cumavg2 ?? "-" ?></td>
                      <td><?= $matrec->classavg ?? "-" ?></td>
                      <td><?= $matrec->position ?? "-" ?></td>
                      <td><?= $matrec->remark ?? "-" ?></td>
                      <td><?= $matrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $bstrec = mapSubjects($gradebook, "BST"); ?>
                    <tr>
                      <td>BASIC SCIENCE TECHNOLOGY</td>
                      <td class="<?= @($bstrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($bstrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($bstrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($bstrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->exam ?? "-" ?></td>
                      <td class="<?= @($bstrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($bstrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($bstrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $bstrec->cumavg2 ?? "-" ?></td>
                      <td><?= $bstrec->classavg ?? "-" ?></td>
                      <td><?= $bstrec->position ?? "-" ?></td>
                      <td><?= $bstrec->remark ?? "-" ?></td>
                      <td><?= $bstrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $rnvrec = mapSubjects($gradebook, "RNV"); ?>
                    <tr>
                      <td>RELIGION AND NATIONAL VALUES</td>
                      <td class="<?= @($rnvrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($rnvrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($rnvrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($rnvrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->exam ?? "-" ?></td>
                      <td class="<?= @($rnvrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($rnvrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($rnvrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $rnvrec->cumavg2 ?? "-" ?></td>
                      <td><?= $rnvrec->classavg ?? "-" ?></td>
                      <td><?= $rnvrec->position ?? "-" ?></td>
                      <td><?= $rnvrec->remark ?? "-" ?></td>
                      <td><?= $rnvrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $busrec = mapSubjects($gradebook, "BUS"); ?>
                    <tr>
                      <td>BUSINESS STUDIES</td>
                      <td class="<?= @($busrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($busrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($busrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($busrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->exam ?? "-" ?></td>
                      <td class="<?= @($busrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($busrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($busrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $busrec->cumavg2 ?? "-" ?></td>
                      <td><?= $busrec->classavg ?? "-" ?></td>
                      <td><?= $busrec->position ?? "-" ?></td>
                      <td><?= $busrec->remark ?? "-" ?></td>
                      <td><?= $busrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $ccarec = mapSubjects($gradebook, "CCA"); ?>
                    <tr>
                      <td>C.C.A</td>
                      <td class="<?= @($ccarec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->ca1 ?? "-" ?></td>
                      <td class="<?= @($ccarec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->ca2 ?? "-" ?></td>
                      <td class="<?= @($ccarec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->ca3 ?? "-" ?></td>
                      <td class="<?= @($ccarec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->exam ?? "-" ?></td>
                      <td class="<?= @($ccarec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->termsummary ?? "-" ?></td>
                      <td class="<?= @($ccarec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($ccarec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccarec->cumavg2 ?? "-" ?></td>
                      <td><?= $ccarec->classavg ?? "-" ?></td>
                      <td><?= $ccarec->position ?? "-" ?></td>
                      <td><?= $ccarec->remark ?? "-" ?></td>
                      <td><?= $ccarec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $pvsrec = mapSubjects($gradebook, "PVS"); ?>
                    <tr>
                      <td>PRE-VOCATIONAL STUDIES</td>
                      <td class="<?= @($pvsrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($pvsrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($pvsrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($pvsrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->exam ?? "-" ?></td>
                      <td class="<?= @($pvsrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($pvsrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($pvsrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $pvsrec->cumavg2 ?? "-" ?></td>
                      <td><?= $pvsrec->classavg ?? "-" ?></td>
                      <td><?= $pvsrec->position ?? "-" ?></td>
                      <td><?= $pvsrec->remark ?? "-" ?></td>
                      <td><?= $pvsrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $hisrec = mapSubjects($gradebook, "HIS"); ?>
                    <tr>
                      <td>HISTORY</td>
                      <td class="<?= @($hisrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($hisrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($hisrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($hisrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->exam ?? "-" ?></td>
                      <td class="<?= @($hisrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($hisrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($hisrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $hisrec->cumavg2 ?? "-" ?></td>
                      <td><?= $hisrec->classavg ?? "-" ?></td>
                      <td><?= $hisrec->position ?? "-" ?></td>
                      <td><?= $hisrec->remark ?? "-" ?></td>
                      <td><?= $hisrec->signs ?? "-" ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>                
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <p>Guidance Counsellor's Remarks:</p>
                <br>
                <p>Class Teacher's Remarks:</p>
                <br>
                <p>Principal's Remarks:</p>
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
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
  