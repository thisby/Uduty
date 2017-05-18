@extends('layouts.app')
@section('content')
    <body>  
      <form class="form-inline">
        <div class="form-group row" style="top:50%;position:absolute;left:45%;">
          <div class="col-xm-2">
            <label for="ex1">@lang('App.slogan')</label>
<<<<<<< Updated upstream
            <select class="input-medium bfh-countries" data-country="@lang('Default.lang')" id="continent">
=======
            <select class="input-medium" data-country="@lang('App.lang')" id="continent">
>>>>>>> Stashed changes
              @foreach($continents as $continent)
              <option value="{{$continent->getCode()}}">{{$continent->getName()}}</option>
              @endforeach
            </select>
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
<script src="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">

  $(function()
  {
    $("#continent").change(function()
    {
      var link = "{{ URL::to('/duty/list/') }}/" + $(this).val();
      window.open(link);
    })
  })

</script>
</body>
@endsection
