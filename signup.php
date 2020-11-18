<?php 

session_start();

$host="localhost";
$user="root";
$pass="";
$db="letsvikas";

$link=mysqli_connect($host,$user,$pass);

mysqli_select_db($link,$db);

$error="";

if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])){
    
    $name=$_POST['name'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $category=$_POST['category'];
    if(!$email){
        
        $error .= '<span> Email field </span>';
        
    }
    if (email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $error .= "<span> <strong>Invalid email</strong></span>";
        
    }
    if(!$name){
        
        $error .= '<span> | Name field </span>';
        
    }if(!$password){
        
        $error .= '<span> | Password field </span>';
        
    }
    else if(strlen($password)<8){
        
        $error .= '<span> | Password too short!(minimum 8 characters)</span>';
    }
    if($error=="" && $name && $password && $email){
        $sql="SELECT * from user where email='".mysqli_real_escape_string($link,$email)."' limit 1";
    
        $result=mysqli_query($link,$sql);
    
        if(mysqli_num_rows($result)==0){
        
            $salt="lhgahs623bjkj";
            $hash=md5(trim($salt.$password));
            
            $sql = "INSERT INTO `user` (`name`, `category`, `email`, `password`)
            VALUES ('".mysqli_real_escape_string($link,$name)."', '".mysqli_real_escape_string($link,$category)."', '".mysqli_real_escape_string($link,$email)."', '".mysqli_real_escape_string($link,$hash)."');";

            if($link->query($sql) == true){
                $error ='<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SUCCESS</strong> - You Have been Registered!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';

                $_SESSION["name"]=$_POST["name"];
                $_SESSION["category"]=$_POST["category"];
                $_SESSION["email"]=$_POST["email"];

                header("Location: dashboard.php");

            }else{
                $error ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>OOPS!</strong> There was an Error! Try Again Later!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }

        }else{
            $error='<div class="alert alert-danger alert-dismissible fade show" role="alert">Account with this Email ID already exists! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
    }else if($error!=""){
        
        $error ='<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid input(s) :'.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
    
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>LetsVikas</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
        <link href="style.css" rel="stylesheet">
        
        <!--Google Font-->
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    </head>
    <body style="background-color: #169DB2 ">

        <!--NavBar-->
        <nav class="fixed-top blueback">
            
            <div class="font logo"><h1><strong>LetsVikas</strong></h1></div>
            <a href="index.html"><img src="imgs/backbutton.png"></a>
        </nav>
        <!--End of Navbar-->
        
        <div id="extraspcontop"></div>
        <div class="container-fluid breadcrumbcontainer">
            
            <div class="container">
                    <strong>
                    <ol class="breadcrumb font">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account</li>
                    </ol>
                </strong>
            </div>
        
        </div>
        <div id="error"><? echo $error; ?></div>
        <div class="container-fluid">
        
            <div class="container card bgwhite">
                <br>
                <h1><strong class="font">Ohh! So you are New? <span class="welcome">Welcome!!!</span></strong></h1>
                <h4 class="font2">Fill in some simple details and Register NOW!</h4>
                
                <div class="container-fluid">
                    
                    <form method="post">
                        
                    <div class="form-group row">
                        <label for="newName" class="col-sm-2 col-form-label font"><h5><strong>Full Name</strong></h5></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="newName" placeholder="name" name="name">
                            <small id="namehelpblock" class="form-text text-muted">
                            If you are a NGO or a Startup - provide the Full Name  of the NGO/StartUP.
                        </small>
                        </div>
                        
                    </div>
                     <div class="form-group row">
                         <label for="category" class="col-sm-2 col-form-label font"><h5><strong>Category</strong></h5></label>
                        <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                            <option>NGO</option>
                            <option>StartUP</option>
                            <option>Individual</option>
                        </select>
                        </div>
                        </div>   
                    <div class="form-group row">
                        <label for="newEmail" class="col-sm-2 col-form-label font"><h5><strong>Email</strong></h5></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="newEmail" placeholder="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newPassword" class="col-sm-2 col-form-label font"><h5><strong>Password</strong></h5></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="newPassword" placeholder="New password" name="password">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be 8-20 characters long, 
                            contain letters and numbers, and must not contain spaces, 
                            special characters, or emoji.
                        </small>
                        </div>
                        
                    </div>
                        
                        <button class="btn btn-dark btn-md font" type="submit"><h5>SignUP</h5></button><br><br>
                        
                    </form>
                </div>
                <h5 class="font pinkbg card orstatement"><strong>OR<br>Already have an account?<a href="signin.php" class="btn btn-primary signuplink">Sign In</a></strong></h5>
                <br>
            </div>
        
        </div>
        <br>
        <div class="footer container-fluid">
		
            
            <div class="row">
                <h5 class="font col-sm-6 center"><strong class="whitecolor">Copyrights Reserved by LetsVikas</strong></h5>
            
                <div class="col-sm-6 center">
                    <a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-linkedin"></a>
					<a href="#" class="fa fa-youtube"></a>
					<a href="#" class="fa fa-instagram"></a>
                </div>
            </div>
            <br>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
        
            $("form").submit(function(event) {
                    
                var error="";
                
                if($("#newName").val()==""){
                        
                    error+="<span> Name field </span>";
                        
                }
                if($("#newEmail").val()==""){
                        
                    error+="<span> | Email field </span>";
                        
                }
                if($("#newPassword").val()==""){
                        
                    error+="<span> | Password field </span>";
                        
                }
                if(error!=""){
                    $("#error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid input(s) :'+error+' is required!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    return false;
                }else{
                    return true;
                }
                                 
            });
        
        </script>
    </body>
    
</html>