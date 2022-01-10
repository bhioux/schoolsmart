<script>
  $(function(){
    'use strict'

    // Toggle Switches
    $('.az-toggle').on('click', function(){
      $(this).toggleClass('on');
    })

    // Input Masks
    $('#dateMask').mask('99/99/9999');
    $('#phoneMask').mask('(999) 999-9999');
    $('#ssnMask').mask('999-99-9999');

    // Color picker
    $('#colorpicker').spectrum({
      color: '#17A2B8'
    });

    $('#showAlpha').spectrum({
      color: 'rgba(23,162,184,0.5)',
      showAlpha: true
    });

    $('#showPaletteOnly').spectrum({
        showPaletteOnly: true,
        showPalette:true,
        color: '#DC3545',
        palette: [
            ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
            ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
        ]
    });

    // Datepicker
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

    $('#datepickerNoOfMonths').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      numberOfMonths: 2
    });

    $(document).ready(function(){
      $('.select2').select2({
        placeholder: 'Choose one'
      });

      $('.select2-no-search').select2({
        minimumResultsForSearch: Infinity,
        placeholder: 'Choose one'
      });
    });

    $('.rangeslider1').ionRangeSlider();

    $('.rangeslider2').ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550
    });

    $('.rangeslider3').ionRangeSlider({
        type: 'double',
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: '$'
    });

    $('.rangeslider4').ionRangeSlider({
        type: 'double',
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250
    });

  });

  $('#modaldemo2').on('shown.bs.modal', function() {
    console.log('test')
    //$('.fc-datepicker').css('z-index','1600');
    
    // $('.fc-datepicker').datepicker({
    //   showOtherMonths: true,
    //   selectOtherMonths: true
    // });

    /*$('.fc-datepicker').datepicker({
      format: "dd/mm/yyyy",
      startDate: "01-01-2015",
      endDate: "01-01-2020",
      todayBtn: "linked",
      autoclose: true,
      todayHighlight: true,
      container: '#myModal modal-body'
    });*/
  });
  //$("#lastModifiedDateFilter").daterangepicker({ parentEl: "#divChooseDossier .modal-body" })
</script>