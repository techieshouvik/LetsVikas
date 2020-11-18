<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browsing-LetsVikas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="dashboard.css" >
    <link rel="stylesheet" type="text/css" href="style.css" >
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    
    <nav class="fixed-top blueback">
        <div class="font logo"><h1><strong>LetsVikas</strong></h1></div>
        <div>
            <a href="signin.php" class="btn btn-light">Login</a>&nbsp
            <a href="signup.php" class="btn btn-warning">Signup</a>
        </div>
    </nav>
    <div id="extraspcontop"></div>
    <div class="browsingcontent">
            <form method="POST">
                <div class="searcher">
                    <div class="searchhead font">LV-Search</div>
                    <input type="text" class="searchbar" id="search" placeholder="search words / phrases...">
                </div>
            </form>
            <div class="content" id="postarea"></div>
    </div>
    <script type="text/javascript">

        $("#search").on("keyup",function(){
        
            var search_term = $(this).val();
            
            $.ajax({
                url: "ajax-live-search.php",
                type: "POST",
                data: {search: search_term},
                success: function(data){
                    $("#postarea").html(data);
                }
            });

        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>