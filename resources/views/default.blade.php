<!DOCTYPE html>
<html lang="en">
<<<<<<< Updated upstream
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uduty - Ou nous transportez vous ? </title>
=======
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>
>>>>>>> Stashed changes

  <style type="text/css">
    video#bgvid {
      position: fixed; right: 0; bottom: 0;
      min-width: 100%; min-height: 100%;
      width: auto; height: auto; z-index: -100;
      background: url(polina.jpg) no-repeat;
      background-size: cover;
    }
  </style>


  <!-- Bootstrap --> 
  <!-- Latest compiled and minified CSS -->

  <link rel="stylesheet" href="js/BootstrapFormHelpers/dist/css/bootstrap-formhelpers.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>  
      <form class="form-inline">
        <div class="form-group row" style="top:50%;position:absolute;left:45%;" >
          <div class="col-xm-2">
            <label for="ex1">{{ __('Default.slogan') }}</label>
            <select class="input-medium bfh-countries" data-country="@lang('Default.lang')" id="countries"></select>
          </div>
        </div>
      </form>
  <!--
  <video autoplay loop poster="polina.jpg" id="bgvid">
    <source src="video/shop.webm" type="video/webm">   
  </video>
-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/BootstrapFormHelpers/dist/js/bootstrap-formhelpers.js"></script>
<script src="js/BootstrapFormHelpers/js/bootstrap-formhelpers-selectbox.js"></script>
<script src="js/BootstrapFormHelpers/js/lang/@lang('Default.lang')/bootstrap-formhelpers-countries.@lang('Default.lang').js"></script>
<script src="js/BootstrapFormHelpers/js/bootstrap-formhelpers-countries.js"></script>

<script type="text/javascript">

  $(function()
  {
    $("#countries").change(function()
    {
      var link = "{{ URL::to('/duty/list/') }}/" + $(this).val();
      window.open(link);
    })
  })

</script>
</body>
