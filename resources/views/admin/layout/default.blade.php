<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/user-management-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Sep 2023 11:56:18 GMT -->
<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>FullyPrint</title>
<link rel="icon" href="img/mini_logo.png" type="image/png">
<meta name="csrf-token" content="{{ csrf_token() }}">


<link rel="stylesheet" href="{!! asset('admin/assets/css/bootstrap1.min.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/themefy_icon/themify-icons.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/niceselect/css/nice-select.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/owl_carousel/css/owl.carousel.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/gijgo/gijgo.min.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/font_awesome/css/all.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('assets/vendors/tagsinput/tagsinput.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/datepicker/date-picker.css') !!}" />
<link rel="stylesheet" href="{!! asset('admin/assets/vendors/vectormap-home/vectormap-2.0.2.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/scroll/scrollable.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/datatable/css/responsive.dataTables.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('admin/assets/vendors/datatable/css/buttons.dataTables.min.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/text_editor/summernote-bs4.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/morris/morris.css') !!}">

<link rel="stylesheet" href="{!! asset('admin/assets/vendors/material_icon/material-icons.css') !!}" />

<link rel="stylesheet" href="{!! asset('admin/assets/css/metisMenu.css') !!}">

<link rel="stylesheet" href="{!! asset('admin/assets/css/style1.css') !!}" />
<link rel="stylesheet" href="{!! asset('admin/assets/css/colors/default.css') !!}" id="colorSkinCSS">
<style>

    .table {

        padding-top: 3%;

    }
    .cs_modal .modal-body input, .cs_modal .modal-body .nice_Select {

        border: 1px solid black;
    
    color: black;
    }
    .form-control{
        border: 1px solid black;
    
    color: black;
}
.ck{
    border: 1px solid black;
    color: black;
    

}
.ck p{
    color: black !important;
}

.select2-container--default .select2-selection--single .select2-selection__placeholder {
    
    
    color: black;
}

.select2-container--default .select2-selection--single {
    
    border: 1px solid black !important;
    border-radius: 4px;
}
    /* Hide the default file input */
#featured_img {
  display: none;
}
#productGallery{
    display: none;
}


/* Style the custom label */
.custom-label {
  display: inline-block;
  padding: 10px 20px;
  background-color: #fbaf1c; /* Background color */
  color: white; /* Text color */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer;
  font-size: 14px;
  text-align: center;
}

/* Add hover effect for the custom label */
.custom-label:hover {
  background-color: #000201;
}




.custom-labels {
  display: inline-block;
  padding: 10px 20px;
  background-color: #fbaf1c; /* Background color */
  color: white; /* Text color */
  border-radius: 5px; /* Rounded corners */
  cursor: pointer;
  font-size: 14px;
  text-align: center;
}

/* Add hover effect for the custom label */
.custom-labels:hover {
  background-color: #000201;
}

    
    </style>

</head>

<body class="crm_body_bg">


@include('admin.layout.sidebar')


<section class="main_content dashboard_part large_header_bg">



@include('admin.layout.header')




<div  class="main_content_iner overly_inner">


@yield('admin.content')



</div>
</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


<script>


$(document).ready(function() {
    // Toggle the low stock notification menu
    $('#lowStockBell').on('click', function() {
        // Check if the low stock menu is already active
        if ($('.low-stock-menu').hasClass('active')) {
            // If it's active, deactivate it (close the menu)
            $('.low-stock-menu').removeClass('active').slideUp();
        } else {
            // Otherwise, deactivate any other active menu (close other menus)
            $('.Menu_NOtification_Wrap.active').removeClass('active').slideUp();
            
            // Activate and show the low stock menu
            $('.low-stock-menu').addClass('active').slideDown();
        }
    });
});

    
    var soundPlayed = false;  // Flag to track if the sound has been played
    var sound = new Audio('/admin/sound/notification.mp3'); // Path to your notification sound file
    var isUserInteracted = false; // Flag to track user interaction for sound
    var isNotificationEnabled = true; // Flag to enable/disable notifications

    // Wait for user interaction to allow sound playback
    $(document).on('click', function() {
        isUserInteracted = true;
    });

    // Function to update the notification bell with the latest orders
   

    // Toggle sound on click of the bell icon
    $('#orderBell').on('click', function() {
        if (isNotificationEnabled) {
            // Disable notifications and stop sound
            isNotificationEnabled = false;
            sound.pause();  // Stop the sound
            sound.currentTime = 0;  // Reset sound to start
            $(this).find('img').attr('src', '/admin/assets/bell-solid.svg'); // Optionally, change bell icon to indicate muted
        } else {
            // Enable notifications again
            isNotificationEnabled = true;
            $(this).find('img').attr('src', '/admin/assets/img/icon/bell.svg'); // Restore original bell icon
        }
    });










































    $(document).ready(function () {
    $('#make').change(function () {
        let make = $(this).val();
        $('#model').prop('disabled', true).html('<option value="">Loading...</option>');
        if (make) {
            $.get('/get-models/' + make, function (data) {
                $('#model').html('<option value="">Select Model</option>').prop('disabled', false);
                $.each(data, function (index, model) {
                    $('#model').append('<option value="' + model + '">' + model + '</option>');
                });
            });
        }
    });

    $('#model').change(function () {
        let make = $('#make').val();
        let model = $(this).val();
        $('#year').prop('disabled', true).html('<option value="">Loading...</option>');
        if (make && model) {
            $.get('/get-years/' + make + '/' + model, function (data) {
                $('#year').html('<option value="">Select Year</option>').prop('disabled', false);
                $.each(data, function (index, year) {
                    $('#year').append('<option value="' + year + '">' + year + '</option>');
                });
            });
        }
    });

    $('#year').change(function () {
        let make = $('#make').val();
        let model = $('#model').val();
        let year = $(this).val();
        $('#fuel, #engine').prop('disabled', true).html('<option value="">Loading...</option>');
        if (make && model && year) {
            $.get('/get-fuel-engine/' + make + '/' + model + '/' + year, function (data) {
                $('#fuel').html('<option value="">Select Fuel</option>').prop('disabled', false);
                $('#engine').html('<option value="">Select Engine</option>').prop('disabled', false);
                $.each(data, function (fuel, engines) {
                    $('#fuel').append('<option value="' + fuel + '">' + fuel + '</option>');
                    engines.forEach(engine => {
                        $('#engine').append('<option value="' + engine + '">' + engine + '</option>');
                    });
                });
            });
        }
    });
});

</script>









</body>
@include('admin.layout.footer')







</html>