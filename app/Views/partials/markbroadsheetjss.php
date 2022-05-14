<style>
   .uptab{
    writing-mode: vertical-rl;
    writing-mode: sideways-lr; 
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



</style>
<div class="container-fluid">
    <div class="row">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <!-- <div class="widget-header">
                    <h4 class="centre-align"> $subjecttesachersname</h4>
                </div> -->
                <div class="widget-content widget-content-area">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row inv--head-section">
                            <div class="col-12 layout-spacing">
                                <h3 class="in-heading">MARKS BROAD SHEET FOR JSS CLASSES</h3>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="t-text">Session: </label> &ast;
                                    <div class="form-group">

                                        <select class="selectpicker form-control" id="assesstype" name="assesstype" required>
                                            <option value='' selected>--Choose One--</option>
                                            <option value="ca1">CA1</option>
                                            <option value="ca2">CA2</option>
                                            <option value="ca3">CA3</option>
                                            <option value="exam">EXAM</option>                                                       
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="t-text">Term: </label> &ast;
                                    <div class="form-group">

                                        <select class="selectpicker form-control" id="assesstype" name="assesstype" required>
                                            <option value='' selected>--Choose One--</option>
                                            <option value="ca1">CA1</option>
                                            <option value="ca2">CA2</option>
                                            <option value="ca3">CA3</option>
                                            <option value="exam">EXAM</option>                                                       
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="t-text">Class: </label> &ast;
                                    <div class="form-group">

                                        <select class="selectpicker form-control" id="assesstype" name="assesstype" required>
                                            <option value='' selected>--Choose One--</option>
                                            <option value="ca1">CA1</option>
                                            <option value="ca2">CA2</option>
                                            <option value="ca3">CA3</option>
                                            <option value="exam">EXAM</option>                                                       
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="t-text">Class Teacher: </label> &ast;
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Name of Teacher - Autoload" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="t-text">Action: </label> &ast;
                                    <div class="form-group">
                                        <input type="button" class="btn btn-primary" id="btnSelect" name="btnSelect" value="Select" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="table table-hover">
                            <table id="gradebooktable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="7.5%" scope="col">Student No</th>
                                        <th width="20%" scope="col">Class List</th>
                                        <th width="5%" scope="col"><p class="uptab">ENGLISH <br> LANGUAGE</p></th>
                                        <th width="5%" scope="col"><p class="uptab">YORUBA</p></th>
                                        <th width="5%" scope="col"><p class="uptab">FRENCH</p></th>
                                        <th width="5%" scope="col"><p class="uptab">MATHEMATICS</p></th>
                                        <th width="5%" scope="col"><p class="uptab">BASIC SCIENCE <br> AND TECH. </p></th>
                                        <th width="5%" scope="col"><p class="uptab">HISTORY</p></th>
                                        <th width="5%" scope="col"><p class="uptab">PREVOCATIONAL <br> STUDIES</p></th>
                                        <th width="5%" scope="col"><p class="uptab">NATIONAL <br> VALUES</p></th> 
                                        <th width="5%" scope="col"><p class="uptab">BUSINESS <br> STUDIES</p></th>
                                        <th width="5%" scope="col"><p class="uptab">CCA</p></th>
                                        <th width="5%" scope="col"><p class="uptab">CHRISTIAN <br> RELIGIOUS <br> KNOWLEDGE</p></th>
                                        <th width="5%" scope="col"><p class="uptab">TOTAL NO. <br> OF PASSES</p></th>
                                        <th width="7.5%" scope="col"><p class="uptab">REMARKS</p></th>
                                        <th width="10%" scope="col"><p class="uptab">FOLLOW-UP <br> ACTION</p></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><b>CLASS AVERAGE</b></td>
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
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary mb-4 mr-2 btn-lg" id="btnsubmit" name="btnAssessment1" value="Submit">Update Table</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  