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
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-md-10 offset-3">

        <h1>Laravel Receipe search</h1>
        
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
</body>
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
              console.log(data)
           }
        });

    });
</script>








</html>