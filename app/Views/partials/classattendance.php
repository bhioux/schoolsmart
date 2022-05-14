<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="container">
    <div class="row">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <h4 class="centre-align"> $classtesachersname</h4>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <form class="needs-validation was-validated" name="frmstprofile" id="frmstprofile">
                            <div class="row inv--head-section">
                                    <!-- <input id="basicFlatpickr5" name="attendancedate" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required> -->
                                <div class="col-12 layout-spacing">
                                    <h3 class="in-heading">CLASS ATTENDANCE SHEET</h3>
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
                                        <label for="t-text">Select Date: </label> &ast;
                                        <input id="attendancedate" name="attendancedate" class="form-control flatpickr flatpickr-input active" type="date" placeholder="Select Date.." required>
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
                                            <th width="20%" scope="col">Registration No</th>
                                            <th width="40%" scope="col">Class List</th>
                                            <th width="15%" scope="col">Gender</th>
                                            <th width="15%" scope="col">Class</th>
                                            <th width="10%" scope="col">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <label class="switch">
                                            <input type="checkbox" role="switch" id="switch">
                                            <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <!-- <td><input type="checkbox" role="switch"></td> -->
                                        <!-- <td><input type="checkbox" role="switch" id="switch"></td> -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary mb-4 mr-2 btn-lg" id="btnsubmit" name="btnAssessment1" value="Submit">Update Table</button>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $('a').on('click', function (e) {
        e.preventDefault();
        var $href = $(this).attr('href');
        $(this).addClass('active');

        $('#' + $href).addClass('active'); // this is what you need to do
    });
</script>