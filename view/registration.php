<?php
require('../app/classLoad.php');
session_start();

?>


<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Multi Step Registration Form Using JQuery Bootstrap in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  .box
  {
   width:800px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#fff;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  </style>
 </head>
 <body>
 <br />
  <div class="container box">
   <br />
   <h2 align="center">Step Registration Form </h2><br />
   <?php  if(isset($_SESSION['actionMessage']))
                  {echo $_SESSION['actionMessage'] ;}
                  else { echo false; }
      ?>
   <form method="post" id="register_form" action="../app/Dispatcher.php" >
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Step1</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Step2</a>
     </li>
    
    </ul>
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="login_details">
      <div class="panel panel-default">
       <div class="panel-heading">Step 1</div>
       <div class="panel-body">
        <!-- FIRST NAME -->
        <div class="form-group">
         <label>Enter First Name</label>
         <input type="text" name="first_name" id="first_name" class="form-control" />
         <span id="error_first_name" class="text-danger"></span>
        </div>
        <!-- LAST NAME -->
        <div class="form-group">
         <label>Enter Last Name</label>
         <input type="text" name="last_name" id="last_name" class="form-control" />
         <span id="error_last_name" class="text-danger"></span>
        </div>
        <!-- Email -->
        <div class="form-group">
         <label>Enter Email Address</label>
         <input type="text" name="email" id="email" class="form-control" />
         <span id="error_email" class="text-danger"></span>
        </div>
        
        <br />
        <div align="center">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Step2</div>
       <div class="panel-body">
        <div class="form-group">
         <!-- Adress -->
         <div class="form-group">
         <label>Adress</label>
         <input type="text" name="adress" id="adress" class="form-control" />
         <span id="error_adress" class="text-danger"></span>
        </div>
         <!-- Street number -->
         <div class="form-group">
         <label>Street</label>
         <input type="text" name="street_number" id="street_number" class="form-control" />
         <span id="error_street_number" class="text-danger"></span>
        </div>
         <!-- zip code -->
         <div class="form-group">
         <label>Zip Code</label>
         <input type="text" name="zip_code" id="zip_code" class="form-control" />
         <span id="error_zip_code" class="text-danger"></span>
        </div>
         <!-- city -->
         <div class="form-group">
         <label>City</label>
         <input type="text" name="city" id="city" class="form-control" />
         <span id="error_city" class="text-danger"></span>
         <input type="hidden" name="action" value="add" />
         <input type="hidden" name="source" value="registration" />
        </div-->
       
        <br />
        <div align="center">
        
         <!--button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button-->
         <!--button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button-->
        </div>
        <div align="center">
         
         <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
        </div>
        <br />
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="contact_details">
      <div class="panel panel-default">/
       <div class="panel-heading">Fill Contact Details</div>
       <div class="panel-body">
        
        <br />
       </div>
      </div>
     </div>
    </div>
   </form>
  </div>
 </body>
</html>

<?php session_destroy(); ?>
<script>
$(document).ready(function(){
  
  $('#btn_login_details').click(function(){
  
  var error_email = '';
  var error_password = '';
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if($.trim($('#email').val()).length == 0)
  {
   error_email = 'Email is required';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
      if (!filter.test($('#email').val()))
      {
        error_email = 'Invalid Email';
        $('#error_email').text(error_email);
        $('#email').addClass('has-error');
      }
      else
      {
        error_email = '';
        $('#error_email').text(error_email);
        $('#email').removeClass('has-error');
      }
  }
  
  if($.trim($('#first_name').val()).length == 0)
  {
    error_first_name = 'First Name is required';
    $('#error_first_name').text(error_first_name);
    $('#first_name').addClass('has-error');
    }
    else
    {
    error_first_name = '';
    $('#error_first_name').text(error_first_name);
    $('#first_name').removeClass('has-error');
  }

  if($.trim($('#last_name').val()).length == 0)
  {
    error_last_name = 'Last Name is required';
    $('#error_last_name').text(error_last_name);
    $('#last_name').addClass('has-error');
    }
    else
    {
    error_last_name = '';
    $('#error_last_name').text(error_last_name);
    $('#last_name').removeClass('has-error');
  }
  if(error_email != '' || error_first_name != ''  || error_last_name != '' )
      // if(error_email != '' )
      {
        return false ;
        // console.log(2);
      }
      else
      {
        
        $('#list_login_details').removeClass('active active_tab1');
        $('#list_login_details').removeAttr('href data-toggle');
        $('#login_details').removeClass('active');
        $('#list_login_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
      }

    });
      $('#previous_btn_personal_details').click(function(){
      $('#list_personal_details').removeClass('active active_tab1');
      $('#list_personal_details').removeAttr('href data-toggle');
      $('#personal_details').removeClass('active in');
      $('#list_personal_details').addClass('inactive_tab1');
      $('#list_login_details').removeClass('inactive_tab1');
      $('#list_login_details').addClass('active_tab1 active');
      $('#list_login_details').attr('href', '#login_details');
      $('#list_login_details').attr('data-toggle', 'tab');
      $('#login_details').addClass('active in');
  });
    
  $('#btn_contact_details').click(function(){

    var error_adress = '';
    var error_street_number ='';
    var error_zip_code ='';
    var error_city = '';
    
  if($.trim($('#adress').val()).length == 0)
  {
    error_adress = 'Adress is required';
    $('#error_adress').text(error_adress);
    $('#adress').addClass('has-error');
    }
    else
    {
    error_adress = '';
    $('#error_adress').text(error_adress);
    $('#adress').removeClass('has-error');
  }
  
 
  if($.trim($('#street_number').val()).length == 0)
  {
    error_street_number = 'Street is required';
    $('#error_street_number').text(error_street_number);
    $('#street_number').addClass('has-error');
    }
    else
    {
    error_street_number = '';
    $('#error_street_number').text(error_street_number);
    $('#street_number').removeClass('has-error');
  }
   
 
  if($.trim($('#zip_code').val()).length == 0)
  {
    error_zip_code = 'Zip is required';
    $('#error_zip_code').text(error_zip_code);
    $('#zip_code').addClass('has-error');
    }
    else
    {
    error_zip_code = '';
    $('#error_zip_code').text(error_zip_code);
    $('#zip_code').removeClass('has-error');
  }
   
   if($.trim($('#city').val()).length == 0)
  {
    error_city = 'City is required';
    $('#error_city').text(error_city);
    $('#city').addClass('has-error');
    }
    else
    {
    error_city = '';
    $('#error_city').text(error_city);
    $('#city').removeClass('has-error');
  }
  if(error_adress != '' || error_street_number != '' ||  error_zip_code !='' ||  error_city !='' )
      // if(error_email != '' )
      {
       // return false ;
       
      }
      else
      {
        $('#btn_contact_details').attr("disabled", "disabled");
        $(document).css('cursor', 'prgress');
        $("#register_form").submit();
      }
    
  });
  

});
/*$('#previous_btn_personal_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
  });
});*/
</script>

