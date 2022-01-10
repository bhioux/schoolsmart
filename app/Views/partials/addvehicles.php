<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link href="plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
<link href="plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">
<!--  END CUSTOM STYLE FILE  -->

<!-- SELECT `caryear``chasisno``regno``carcolour``carbrand``carmodel``cartype``carregid` FROM `car_registration`-->

<div id="breadcrumbBasic" class="col-xl-12 col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">

            <nav class="breadcrumb-one float-left">
                <a href="vehicleslist">List of Registered Vehicles</a>
            </nav>

            <nav class="breadcrumb-one float-right" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="vehicleslist">Back</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page"><span>UI Kit</span></li> -->
                </ol>
            </nav>
        </div>
    </div>
</div>
<form id="frmobj">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">                                
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Add a new Vehicle</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="form-group mb-4">
                        <label>Cartype</label>
                        <input type="text" class="form-control" name="cartype" id="cartype" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Carmodel</label>
                        <input type="text" class="form-control" name="carmodel" id="carmodel" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Carbrand</label> <small> (Driver's Lastname)</small>
                        <input type="text" class="form-control" name="carbrand" id="carbrand" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Car Colour</label>
                        <input type="text" class="form-control" name="carcolour" id="carcolour" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Registration No</label>
                        <input type="text" class="form-control" name="registrationno" id="registrationno" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Chasis No</label>
                        <input type="text" class="form-control" name="chasisno" id="chasisno" placeholder="" required>
                    </div>
                    <div class="form-group mb-4">
                        <label>Car Year</label>
                        <input type="text" class="form-control" name="caryear" id="caryear" placeholder="" required>
                    </div>

                    <!-- <div class="form-group mb-4 mt-3">
                        <label>Drivers License Upload</label><small> (Upload Scanned Drivers License)</small>
                        <input type="file" class="form-control-file" id="licenseimg">
                    </div> -->

                </div>
            </div>
        </div>                   
        
    </div>
    <div class="row">
        <div class="col-lg-2 offset-lg-5 layout-spacing"> <br>
            <button type="submit" class="btn btn-primary" name="wp-submit" value="">Add Vehicle</button>
        </div>
    </div>     
</form>


<script>
    $(document).ready(function(){
        
        $("form#frmobj").submit(function(event){						 
            //disable the default form submission
            event.preventDefault();		  				
            let formdata = $("form").serialize();
            $.post("<?php echo site_url('/users/createaccount'); ?>",formdata).done(function(data){
                if(data==1){
                    alert("Car Added Successfully");
                    resetentry();
                    document.getElementById("carregid").focus();
                }else{
                    alert(data);
                }
            });
        });			
    });

//   SELECT `caryear``chasisno``regno``carcolour``carbrand``carmodel``cartype` FROM `car_registration`

    function resetentry(){
        $('#cartype').val('');
        $('#carmodel').val('');
        $('#carbrand').val('');
        $('#carcolour').val('');
        $('#regno').val('');
        $('#chasisno').val('');
        $('#caryear').val('');		
    }

</script>        
        