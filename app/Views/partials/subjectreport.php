
<div class="container-fluid">
    <div class="row">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <h4 class="centre-align"> $subjecttesachersname</h4>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <div class="row inv--head-section">
                            <div class="col-12 layout-spacing">
                                <h3 class="in-heading">SCORE SHEET PER SUBJECT</h3>
                            </div>
                            <div class="col-lg-5">
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

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="t-text">Subject: </label> &ast;
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
                                        <th width="10%" scope="col">Registration No</th>
                                        <th width="20%" scope="col">Class List</th>
                                        <th width="7.5%" scope="col">1ST TEST</th>
                                        <th width="7.5%" scope="col">2ND TEST</th>
                                        <th width="7.5%" scope="col">3RD TEST</th>
                                        <th width="7.5%" scope="col">EXAM</th>
                                        <th width="10%" scope="col">TERM SUMMARY</th>
                                        <th width="10%" scope="col">LAST TERM CUMM.</th>
                                        <th width="10%" scope="col">CUMM. AVG.</th>
                                        <th width="10%" scope="col">POSITION</th>
                                    </tr>
                                </thead>
                                <tbody>
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
  