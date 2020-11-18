<?php 
    session_start();
    //connection details
    $host="localhost";
    $user="root";
    $pass="";
    $db="letsvikas";

    //actual connection
    $link=mysqli_connect($host,$user,$pass);
    mysqli_select_db($link,$db);

    if(isset($_POST['save'])){
        $text = $_POST['editor'];
        $sql = "UPDATE `posts` set `postText`='".$text."' where `postID`='".$_GET['id']."';";
        $link->query($sql);
        header("Location: dashboard.php"); 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - LetsVikas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="dashboard.css" >
    <link rel="stylesheet" type="text/css" href="style.css" >
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
</head>
<body>
    <form method="POST">
     <!--NavBar-->
     <nav class="fixed-top blueback">
        <div class="font logo"><h1><strong>LetsVikas-Dashboard</strong></h1></div>
     </nav>
        <!--End of Navbar-->
     <div id="extraspcontop"></div>

    <div class="contentedit">

        <div class="postedit">
            <br>
            <div class="posthead font">Edit Post</div>
            <div class="editor-c" style="width:100%;">
            <textarea id="editor" style="width:100%;" name="editor"><?php 
                $idofpost = $_GET['id'];
                $sql = "SELECT `postText` from `posts` where `postID`='".$idofpost."';";
                $res = $link->query($sql);
                $row = mysqli_fetch_row($res);
                echo $row[0];
            ?></textarea></div>
                <button class="publish btn btn-primary" type="submit" name="save" value="save">SAVE & EXIT
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                </svg>
                </button>
        </div>
    </div>
    </form>
    <script>

        CKEDITOR.replace('editor');

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>