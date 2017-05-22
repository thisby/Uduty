@extends('layouts.app')
@section('content')
    <body>  
      <form class="form-inline">
        <div class="form-group row" style="top:50%;position:absolute;left:45%;">
          <div class="col-xm-2">
            <label for="ex1">@lang('App.slogan')</label>
            <select class="input-medium" data-country="@lang('App.lang')" id="continent">
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

@section('scripts')
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
@endsection
</body>
@endsection
