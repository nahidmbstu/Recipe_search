

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    


        <title>Laravel</title>

        <!-- Fonts -->
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
          <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

           


        <div class="container" style="padding-top: 100px;">
            <div class="row">

            <style type="text/css" style="width: 100%;">


            #item{


                width: 70%;
                float: left;





            }


            #submit{

                 width: 30%;
                float: right;


            }
                

            </style>

            <form action="" method="POST">

                <input type="text" name="item" class="form-control" id="item" placeholder="Please enter a item name" >
                <input type="submit" class="btn btn-primary" name="search" id="submit" value="search">




            </form>
            </div>


            <div class="row">




    <script>


        $( document ).ready(function() {

           

    console.log("dssdsdsdsdsdsd");

  

});

</script>
                  <script type="text/javascript">
        
           
                $("#submit").click(function(event) 

                {
                    event.preventDefault();
                   

                    var itemname= $("#item").val();

                    console.log(itemname)

                    var url = "https://api.edamam.com/search?q="+itemname+"&app_id=2adad5a5&app_key=a3ccffac74bf59ec1f1cadb32b6dfb61";


                    $.ajax({
                        type: "POST",
                        url: url,

                        data: {
                            name:itemname 
                        },
                        success: function (data) {

                            console.log(data);
                            console.log(data.hits[0].recipe.label);

                            var len = data.hits.length;

                            console.log(len);  // len is 10

                            var tableHtml = "";


                            for (var i = 0 ; i <= len-1 ; i ++) 

                            {


                     

  tableHtml += "<tr>";
  tableHtml += "<td>" + data.hits[i].recipe.label +"</td>" ;
  tableHtml += "<td><img src= "+ data.hits[i].recipe.image +"></td>";
  tableHtml += "<td>  <a href="+ data.hits[i].recipe.url + ">Detalis</a></td>";
  tableHtml += "<td>" + "<button id= "+"favorite"+">add to favorite</button>" + "</td>";
  tableHtml += "<tr>";


                            }


                    document.getElementById("table").innerHTML = tableHtml;


                




                           
                        }
                    });
                 });



            
        </script>





       <table id='table' class="table table-striped">




       <table>

       <div>


         



        


       




    </body>
</html>
