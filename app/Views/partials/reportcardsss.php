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
              <h5><?= @strtoupper($title) ?></h5>
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
              <div clas="table-responsive">
                <table class="table table-bordered mb-4" style="width:100%">
                  <thead>
                    <tr>
                      <th rowspan="2">SUBJECTS</th>
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
                      <th colspan="5">MARKS OBTAINABLE</th>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th></th>
                      <th>10</th>
                      <th>20</th>
                      <th>20</th>
                      <th>50</th>
                      <th>100</th>
                      <th>100</th>
                      <th>100</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                    <?php  $engrec = mapSubjects($gradebook, "ENG"); ?>
                    <tr>
                      <th>ENGLISH LANGUAGE</th>
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
                    <?php  $litrec = mapSubjects($gradebook, "LIT"); ?>
                    <tr>
                      <th>LITERATURE IN ENGLISH</th>
                      <td class="<?= @($litrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $litreclitrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($litrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($litrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($litrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->exam ?? "-" ?></td>
                      <td class="<?= @($litrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($litrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($litrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $litrec->cumavg2 ?? "-" ?></td>
                      <td><?= $litrec->classavg ?? "-" ?></td>
                      <td><?= $litrec->position ?? "-" ?></td>
                      <td><?= $litrec->remark ?? "-" ?></td>
                      <td><?= $litrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $yourec = mapSubjects($gradebook, "YOR"); ?>
                    <tr>
                      <th>YORUBA</th>
                      <td class="<?= @($yourec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->ca1 ?? "-" ?></td>
                      <td class="<?= @($yourec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->ca2 ?? "-" ?></td>
                      <td class="<?= @($yourec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->ca3 ?? "-" ?></td>
                      <td class="<?= @($yourec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->exam ?? "-" ?></td>
                      <td class="<?= @($yourec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->termsummary ?? "-" ?></td>
                      <td class="<?= @($yourec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($yourec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $yourec->cumavg2 ?? "-" ?></td>
                      <td><?= $yourec->classavg ?? "-" ?></td>
                      <td><?= $yourec->position ?? "-" ?></td>
                      <td><?= $yourec->remark ?? "-" ?></td>
                      <td><?= $yourec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $frcrec = mapSubjects($gradebook, "FRC"); ?>
                    <tr> 
                      <th>FRENCH</th>
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
                      <th>GENERAL MATHEMATICS</th>
                      <td class="<?= @($matrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($matrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($matrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($matrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->exam ?? "-" ?></td>
                      <td class="<?= @($matrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($matrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($matrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $matrec->cumavg2 ?? "-" ?></td>
                      <td><?= $matrec->classavg ?? "-" ?></td>
                      <td><?= $matrec->position ?? "-" ?></td>
                      <td><?= $matrec->remark ?? "-" ?></td>
                      <td><?= $matrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $fmtrec = mapSubjects($gradebook, "FMT"); ?>
                    <tr>
                      <th>FURTHER MATHEMATICS</th>
                      <td class="<?= @($fmtrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($fmtrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($fmtrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($fmtrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->exam ?? "-" ?></td>
                      <td class="<?= @($fmtrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($fmtrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($fmtrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $fmtrec->cumavg2 ?? "-" ?></td>
                      <td><?= $fmtrec->classavg ?? "-" ?></td>
                      <td><?= $fmtrec->position ?? "-" ?></td>
                      <td><?= $fmtrec->remark ?? "-" ?></td>
                      <td><?= $fmtrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $phyrec = mapSubjects($gradebook, "PHY"); ?>
                    <tr>
                      <th>PHYSICS</th>
                      <td class="<?= @($phyrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($phyrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($phyrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($phyrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->exam ?? "-" ?></td>
                      <td class="<?= @($phyrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($phyrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($phyrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $phyrec->cumavg2 ?? "-" ?></td>
                      <td><?= $phyrec->classavg ?? "-" ?></td>
                      <td><?= $phyrec->position ?? "-" ?></td>
                      <td><?= $phyrec->remark ?? "-" ?></td>
                      <td><?= $phyrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $chmrec = mapSubjects($gradebook, "CHM"); ?>
                    <tr>
                      <th>CHEMISTRY</th>
                      <td class="<?= @($chmrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($chmrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($chmrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($chmrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->exam ?? "-" ?></td>
                      <td class="<?= @($chmrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($chmrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($chmrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $chmrec->cumavg2 ?? "-" ?></td>
                      <td><?= $chmrec->classavg ?? "-" ?></td>
                      <td><?= $chmrec->position ?? "-" ?></td>
                      <td><?= $chmrec->remark ?? "-" ?></td>
                      <td><?= $chmrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $biorec = mapSubjects($gradebook, "BIO"); ?>
                    <tr>
                      <th>BIOLOGY</th>
                      <td class="<?= @($biorec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->ca1 ?? "-" ?></td>
                      <td class="<?= @($biorec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->ca2 ?? "-" ?></td>
                      <td class="<?= @($biorec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->ca3 ?? "-" ?></td>
                      <td class="<?= @($biorec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->exam ?? "-" ?></td>
                      <td class="<?= @($biorec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->termsummary ?? "-" ?></td>
                      <td class="<?= @($biorec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($biorec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $biorec->cumavg2 ?? "-" ?></td>
                      <td><?= $biorec->classavg ?? "-" ?></td>
                      <td><?= $biorec->position ?? "-" ?></td>
                      <td><?= $biorec->remark ?? "-" ?></td>
                      <td><?= $biorec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $tdrrec = mapSubjects($gradebook, "TDR"); ?>
                    <tr>
                      <th>TECHNICAL DRAWING</th>
                      <td class="<?= @($tdrrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($tdrrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($tdrrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($tdrrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->exam ?? "-" ?></td>
                      <td class="<?= @($tdrrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($tdrrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($tdrrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $tdrrec->cumavg2 ?? "-" ?></td>
                      <td><?= $tdrrec->classavg ?? "-" ?></td>
                      <td><?= $tdrrec->position ?? "-" ?></td>
                      <td><?= $tdrrec->remark ?? "-" ?></td>
                      <td><?= $tdrrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $georec = mapSubjects($gradebook, "GEO"); ?>
                    <tr>
                      <th>GEOGRAPHY</th>
                      <td class="<?= @($georec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $georec->ca1 ?? "-" ?></td>
                      <td class="<?= @($georec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $georec->ca2 ?? "-" ?></td>
                      <td class="<?= @($georec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $georec->ca3 ?? "-" ?></td>
                      <td class="<?= @($georec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $georec->exam ?? "-" ?></td>
                      <td class="<?= @($georec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $georec->termsummary ?? "-" ?></td>
                      <td class="<?= @($georec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $georec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($georec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $georec->cumavg2 ?? "-" ?></td>
                      <td><?= $georec->classavg ?? "-" ?></td>
                      <td><?= $georec->position ?? "-" ?></td>
                      <td><?= $georec->remark ?? "-" ?></td>
                      <td><?= $georec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $eorec = mapSubjects($gradebook, "ECO"); ?>
                    <tr>
                      <th>ECONOMICS</th>
                      <td class="<?= @($eorec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->ca1 ?? "-" ?></td>
                      <td class="<?= @($eorec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->ca2 ?? "-" ?></td>
                      <td class="<?= @($eorec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->ca3 ?? "-" ?></td>
                      <td class="<?= @($eorec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->exam ?? "-" ?></td>
                      <td class="<?= @($eorec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->termsummary ?? "-" ?></td>
                      <td class="<?= @($eorec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($eorec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $eorec->cumavg2 ?? "-" ?></td>
                      <td><?= $eorec->classavg ?? "-" ?></td>
                      <td><?= $eorec->position ?? "-" ?></td>
                      <td><?= $eorec->remark ?? "-" ?></td>
                      <td><?= $eorec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $agrrec = mapSubjects($gradebook, "AGR"); ?>
                    <tr>
                      <th>AGRICULTURAL SCIENCE</th>
                      <td class="<?= @($agrrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($agrrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($agrrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($agrrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->exam ?? "-" ?></td>
                      <td class="<?= @($agrrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($agrrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($agrrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $agrrec->cumavg2 ?? "-" ?></td>
                      <td><?= $agrrec->classavg ?? "-" ?></td>
                      <td><?= $agrrec->position ?? "-" ?></td>
                      <td><?= $agrrec->remark ?? "-" ?></td>
                      <td><?= $agrrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $nutrec = mapSubjects($gradebook, "NUT"); ?>
                    <tr>
                      <th>FOOD AND NUTRITION</th>
                      <td class="<?= @($nutrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($nutrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($nutrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($nutrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->exam ?? "-" ?></td>
                      <td class="<?= @($nutrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($nutrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($nutrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $nutrec->cumavg2 ?? "-" ?></td>
                      <td><?= $nutrec->classavg ?? "-" ?></td>
                      <td><?= $nutrec->position ?? "-" ?></td>
                      <td><?= $nutrec->remark ?? "-" ?></td>
                      <td><?= $nutrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $artrec = mapSubjects($gradebook, "ART"); ?>
                    <tr>
                      <th>FINE ARTS</th>
                      <td class="<?= @($artrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($artrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($artrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($artrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->exam ?? "-" ?></td>
                      <td class="<?= @($artrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($artrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($artrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $artrec->cumavg2 ?? "-" ?></td>
                      <td><?= $artrec->classavg ?? "-" ?></td>
                      <td><?= $artrec->position ?? "-" ?></td>
                      <td><?= $artrec->remark ?? "-" ?></td>
                      <td><?= $artrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $crkrec = mapSubjects($gradebook, "CRK"); ?>
                    <tr>
                      <th>CHRISTIAN RELIGION KNOWLEDGE</th>
                      <td class="<?= @($crkrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($crkrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($crkrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($crkrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->exam ?? "-" ?></td>
                      <td class="<?= @($crkrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($crkrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($crkrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $crkrec->cumavg2 ?? "-" ?></td>
                      <td><?= $crkrec->classavg ?? "-" ?></td>
                      <td><?= $crkrec->position ?? "-" ?></td>
                      <td><?= $crkrec->remark ?? "-" ?></td>
                      <td><?= $crkrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $govrec = mapSubjects($gradebook, "GOV"); ?>
                    <tr>
                      <th>GOVERNMENT</th>
                      <td class="<?= @($govrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($govrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($govrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($govrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->exam ?? "-" ?></td>
                      <td class="<?= @($govrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($govrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($govrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $govrec->cumavg2 ?? "-" ?></td>
                      <td><?= $govrec->classavg ?? "-" ?></td>
                      <td><?= $govrec->position ?? "-" ?></td>
                      <td><?= $govrec->remark ?? "-" ?></td>
                      <td><?= $govrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $comrec = mapSubjects($gradebook, "COM"); ?>
                    <tr>
                      <th>COMMERCE</th>
                      <td class="<?= @($comrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($comrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($comrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($comrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->exam ?? "-" ?></td>
                      <td class="<?= @($comrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($comrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($comrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $comrec->cumavg2 ?? "-" ?></td>
                      <td><?= $comrec->classavg ?? "-" ?></td>
                      <td><?= $comrec->position ?? "-" ?></td>
                      <td><?= $comrec->remark ?? "-" ?></td>
                      <td><?= $comrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $accrec = mapSubjects($gradebook, "ACC"); ?>
                    <tr>
                      <th>FINANCIAL ACCOUNTING</th>
                      <td class="<?= @($accrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($accrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($accrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($accrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->exam ?? "-" ?></td>
                      <td class="<?= @($accrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($accrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($accrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $accrec->cumavg2 ?? "-" ?></td>
                      <td><?= $accrec->classavg ?? "-" ?></td>
                      <td><?= $accrec->position ?? "-" ?></td>
                      <td><?= $accrec->remark ?? "-" ?></td>
                      <td><?= $accrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $cverec = mapSubjects($gradebook, "CVE"); ?>
                    <tr>
                      <th>CIVIC EDUCATION</th>
                      <td class="<?= @($cverec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->ca1 ?? "-" ?></td>
                      <td class="<?= @($cverec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->ca2 ?? "-" ?></td>
                      <td class="<?= @($cverec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->ca3 ?? "-" ?></td>
                      <td class="<?= @($cverec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->exam ?? "-" ?></td>
                      <td class="<?= @($cverec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->termsummary ?? "-" ?></td>
                      <td class="<?= @($cverec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($cverec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cverec->cumavg2 ?? "-" ?></td>
                      <td><?= $cverec->classavg ?? "-" ?></td>
                      <td><?= $cverec->position ?? "-" ?></td>
                      <td><?= $cverec->remark ?? "-" ?></td>
                      <td><?= $cverec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $cmprec = mapSubjects($gradebook, "CMP"); ?>
                    <tr>
                      <th>COMPUTER</th>
                      <td class="<?= @($cmprec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->ca1 ?? "-" ?></td>
                      <td class="<?= @($cmprec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->ca2 ?? "-" ?></td>
                      <td class="<?= @($cmprec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->ca3 ?? "-" ?></td>
                      <td class="<?= @($cmprec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->exam ?? "-" ?></td>
                      <td class="<?= @($cmprec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->termsummary ?? "-" ?></td>
                      <td class="<?= @($cmprec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($cmprec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $cmprec->cumavg2 ?? "-" ?></td>
                      <td><?= $cmprec->classavg ?? "-" ?></td>
                      <td><?= $cmprec->position ?? "-" ?></td>
                      <td><?= $cmprec->remark ?? "-" ?></td>
                      <td><?= $cmprec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $anhrec = mapSubjects($gradebook, "ANH"); ?>
                    <tr>
                      <th>ANIMAL HUSBANDARY</th>
                      <td class="<?= @($anhrec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->ca1 ?? "-" ?></td>
                      <td class="<?= @($anhrec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->ca2 ?? "-" ?></td>
                      <td class="<?= @($anhrec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->ca3 ?? "-" ?></td>
                      <td class="<?= @($anhrec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->exam ?? "-" ?></td>
                      <td class="<?= @($anhrec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->termsummary ?? "-" ?></td>
                      <td class="<?= @($anhrec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($anhrec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $anhrec->cumavg2 ?? "-" ?></td>
                      <td><?= $anhrec->classavg ?? "-" ?></td>
                      <td><?= $anhrec->position ?? "-" ?></td>
                      <td><?= $anhrec->remark ?? "-" ?></td>
                      <td><?= $anhrec->signs ?? "-" ?></td>
                    </tr>
                    <?php  $ccprec = mapSubjects($gradebook, "CCP"); ?>
                    <tr>
                      <th>CATERING CRAFT PRACTICE</th>
                      <td class="<?= @($ccprec->ca1 < 4) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->ca1 ?? "-" ?></td>
                      <td class="<?= @($ccprec->ca2 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->ca2 ?? "-" ?></td>
                      <td class="<?= @($ccprec->ca3 < 10) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->ca3 ?? "-" ?></td>
                      <td class="<?= @($ccprec->exam < 20) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->exam ?? "-" ?></td>
                      <td class="<?= @($ccprec->termsummary < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->termsummary ?? "-" ?></td>
                      <td class="<?= @($ccprec->lasttermcum < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->lasttermcum ?? "-" ?></td>
                      <td class="<?= @($ccprec->cumavg2 < 40) ? 'text-danger' : 'text-primary' ?>"><?= $ccprec->cumavg2 ?? "-" ?></td>
                      <td><?= $ccprec->classavg ?? "-" ?></td>
                      <td><?= $ccprec->position ?? "-" ?></td>
                      <td><?= $ccprec->remark ?? "-" ?></td>
                      <td><?= $ccprec->signs ?? "-" ?></td>
                    </tr>
                    <tr>
                    <td colspan="5" style="border-top:solid 1px black;"><b>Class Teacher's Remarks:</b> <i>Very Good</i></td>
                      <!-- <td></td> -->
                      <!-- <td></td>
                      <td></td>
                      <td></td>
                      <td></td> -->
                      <td  colspan="7" style="border-top:solid 1px black;"style="border-top:solid 1px black;"><b>Principal's Remarks:</b> <i>Very Good</i></td>
                      <!-- <td></td>
                      <td></td>
                      <td></td> -->
                      <!-- <td></td> -->
                      <!-- <td></td> -->
                    </tr>
                    <!-- <tr> -->
                      <!-- <th colspan="6">Head Teacher's Comment:</th> -->
                      <!-- <td></td> -->
                      <!-- <td></td>
                      <td></td>
                      <td></td>
                      <td></td> -->
                      <!-- <td  colspan="6"><i>Very Good</i></td> -->
                      <!-- <td></td>
                      <td></td>
                      <td></td> -->
                      <!-- <td></td> -->
                      <!-- <td></td> -->
                    <!-- </tr> -->
                  </tbody>                
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  