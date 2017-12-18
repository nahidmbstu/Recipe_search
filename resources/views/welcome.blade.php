<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.5 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">

        <div class="row">

                   <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Recipe search
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>

            <div class="col-md-10 offset-3">

        <h1> Receipe search</h1>
        
        <form >
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="enter a recipe Name" required="">
            </div>
            
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
                
            </div>

            
        </div>
    
    </div>

    <table id="table" class="table table-bordered" >
        
    </table>

  <script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e){
        e.preventDefault();

        var name = $("input[name=name]").val();

        $.ajax({
           type:'POST',
           url:"{{ url('/search') }}",
           data:{name:name},
           success:function(data){

            console.log(data.success)

            var data = data.success;

            var len = data.hits.length;

            console.log(len);  // len is 10

            var tableHtml = "";

            for (var i = 0 ; i <= len-1 ; i ++)

            {
              
              tableHtml += "<tr>";
              tableHtml += "<td>" + data.hits[i].recipe.label +"</td>" ;
              tableHtml += "<td><img src= "+ data.hits[i].recipe.image +"></td>";
tableHtml += "<td><a href= " + data.hits[i].recipe.url + ">details</a></td>";
               tableHtml += "<td><a href= '{{url('/add')}}/" + data.hits[i].recipe.label + "'> add to favotite</a></td>";
              tableHtml += "<tr>";

            }

            $("#table").html(tableHtml);

           }
        });

    });
  </script>









</body>



</html>