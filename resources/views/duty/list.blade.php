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
                @foreach($countries as $country)
                <li class="country"><img src="blank.gif" class="flag flag-{{$country['code']}}" data-countryId="{{$country['countryId']}}"/>{{$country['nom']}}</li>
                @endforeach
              </ul>
            </div><!--/left-->

            <!--right-->
            <div class="col-md-9">
              <div style="display:none;">
                <h2 id="sec0">Content</h2>
                <p>
                  At Bootply we like to build simple Bootstrap templates that utilize the code Bootstap CSS without a lot of customization. Sure you can 
                  find a lot of Bootstrap themes and inspiration, but these templates tend to be heavy on customization.</p>

                  <hr>
                  <p>
                    Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut.              
                    Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut!</p>

                    <h2 id="sec1">Content</h2>
                    <p>
                      Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                      dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut.
                    </p>
                  </div>
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
                <div style="display:none;">
                  <h2 id="sec2">Section 2</h2>
                  <p>
                    Rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut!
                  </p>
                  <div class="row">
                    <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
                    <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
                    <div class="col-md-4"><img src="//placehold.it/300x300" class="img-responsive"></div>
                  </div>

                  <hr>

                  <h2 id="sec3">Section 3</h2>
                  <p>
                    Images are responsive sed @mdo but sum are more fun peratis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                    dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                    sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                    Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut..</p>
                    <p>
                      Fos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                      sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                      Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut..</p>


                      <h2 id="sec4">Section 4</h2>
                      <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, 
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia cor magni dolores 
                        eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, 
                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut.</p>
                      </div>

                    </div><!--/right-->
                  </div><!--/row-->
                </div><!--/container-->
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <!--<script src="/js/bootstrap.min.js"></script>-->

                <script type="text/javascript">
    //var duties = {!! json_encode($duties) !!};
    $(function()
    {
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

        $.post('/shop',{'id' : id , 'price' : prix,'_token' : token,'name' : name},function(data)
        {
          alert(data);
          $('#wishes').text(++wishes);
        })
      })

    })


  </script>

</body>
@endsection
