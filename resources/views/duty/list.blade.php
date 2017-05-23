@extends('layouts.app')
@section('content')
<!-- Bootstrap -->
<!--<link href="/css/bootstrap.min.css" rel="stylesheet">-->
<link href="/css/europe_flags/flags.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="banner"  style="display:none;">
          <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="/" class="navbar-brand">Bootply</a>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
              <ul class="nav navbar-nav">
                <li>
                  <a href="#sec"></a>
                </li>
                <li>
                  <a href="#sec">Edit</a>
                </li>
                <li>
                  <a href="#sec">Visualize</a>
                </li>
                <li>
                  <a href="#sec">Prototype</a>
                </li>
              </ul>
            </nav>
          </div>
        </nav>

        <div id="masthead">  
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <h1>Uduty
                  <p class="lead">@lang('App.slogan')</p>
                </h1>
              </div>

              <div class="col-md-5" style="display:none;">
                <div class="well well-lg"> 
                  <div class="row">
                    <div class="col-sm-6">
                      <img src="//placehold.it/180x100" class="img-responsive">
                    </div>
                    <div class="col-sm-6">
                      Some text here
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div><!--/container-->
        </div><!--/masthead-->

        <!--main-->
        <div class="container">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          <div class="row">
            <!--left-->
            <div class="col-md-3" id="leftCol">
              <ul class="nav nav-stacked" id="sidebar">
                <div style="display: none">
                @foreach($countries as $country)
                <li class="country"><img src="blank.gif" class="flag flag-{{$country['code']}}" data-countryId="{{$country['countryId']}}"/>{{$country['nom']}}</li>
                @endforeach
                </div>
              </ul>
            </div><!--/left-->

            <!--right-->
            <div class="col-md-9">
              <div id="dutyContainer">
               @foreach($duties as $duty)
               <div class="col-md-4 duty card" data-country="{{$duty['countryId']}}" data-id="{{$duty['id']}}">          
                <div class="panel panel-default">
                  <div class="panel-heading">                        
                    <h3 class="text-center">{{$duty['nom']}}</h3>
                    <hr>
                    <img src="/images/basket.png" />
                  </div>
                  <div class="panel-body">
                    {{$duty['content']}}

                  </div>              
                  <p class="price_block">
                    @lang('App.duty.localPrice')
                    <span class="price">{{$duty['prix']}}</span></p>
                    <input type="button" class="duty add btn btn-tiny pull-right" value="@lang('App.duty.AddToBasket')" />
                  </div>
                </div>
                @endforeach
              </div>

              <hr>
            </div><!--/right-->
          </div><!--/row-->
        </div><!--/container-->
        @section('scripts')
        <script type="text/javascript">
    //var duties = {!! json_encode($duties) !!};
    var countries = {!! json_encode($countries) !!};
    $(function()
    {

//<li class="country"><img src="blank.gif" class="flag flag-{{$country['code']}}" data-countryId="{{$country['countryId']}}"/>{{$country['nom']}}</li>


      $(countries).each(function(îndex,item){
        var li = document.createElement("li").text(item.nom);    

        var img = (li).createElement('img');
        img = img.addClass(item.flagClass);
        img = img.attr('src','blank.gif');
        img = img.attr('data-countryid',item.countryId);

        $("#sidebar").append(li); 
      })

      $(".country").click(function()
      {
        var countryCode = $(this).find('img').attr('data-countryid');
        $(".duty.card[data-country='" + countryCode + "']").show();        
        $(".duty.card:not(.duty.card[data-country='" + countryCode + "'])").hide();
      });


      $(document).on('click','.duty.add',function()
      {
        var id = $(this).closest('.duty.card').attr('data-id');
        var prix = $(this).closest('.duty.card').find('.price').text();
        var token = $('#token').val();
        var name = $(this).closest('.duty.card').find("h3").text();
        var wishes = $('#wishes').text();

        $.post('/cart',{'id' : id , 'price' : prix,'_token' : token,'name' : name},function(data)
        {
          alert(data);
          $('#wishes').text(++wishes);
        })
      })

    })


    </script>
    @endsection
  </body>
  @endsection
