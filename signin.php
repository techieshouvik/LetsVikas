<?php 

session_start();

$error="";//error variable

if(isset($_SESSION["name"])){
    header("Location: dashboard.php"); 
}

//connection details
$host="localhost";
$user="root";
$pass="";
$db="letsvikas";

//actual connection
$link=mysqli_connect($host,$user,$pass);
mysqli_select_db($link,$db);

if(isset($_POST['password']) and isset($_POST['email'])){
    
    $password=$_POST['password'];
    $email=$_POST['email'];
    if(!$email){
        
        $error .= '<span> Email field </span>';
        
    }
    else if (email and !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $error .= "<span> <strong>Invalid email</strong></span>";
        
    }if(!$password){
        
        $error .= '<span> | Password field </span>';
        
    }
    if($error=="" && $password && $email){
        $salt="lhgahs623bjkj";
        $hash=md5(trim($salt.$password));

        $sql="SELECT * from user where `email`='".mysqli_real_escape_string($link,$email)."' and `password`='".mysqli_real_escape_string($link,$hash)."' limit 1";
    
        $result=mysqli_query($link,$sql);
    
        if(mysqli_num_rows($result)==0){
        
            $error='<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Credentials!<button type="button" 
            class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
        }else{
            
            $name=mysqli_query($link,"SELECT `name` from user where `email`='".mysqli_real_escape_string($link,$email)."';");
            $categ=mysqli_query($link,"SELECT `categ` from user where `email`='".mysqli_real_escape_string($link,$email)."';");
            $n=mysqli_fetch_array($name);
            $c=mysqli_fetch_array($categ);

            $_SESSION["email"]=$_POST["email"];
            $_SESSION["name"]=$n[0];
            $_SESSION["category"]=$c[0];
            header("Location: dashboard.php");

        }
    }else if($error!=""){
        
        $error ='<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid input(s) :'.$error.'<button type="button" 
        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
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
        <div id="error"><?php echo $error; ?></div>
        <div class="container-fluid">
        
            <div class="container card bgwhite">
                <br>
                <h1><strong class="font">Already have an <span class="welcome">account?</span></strong></h1>
                <h4 class="font2">Just Login and get going!</h4>
                
                <div class="container-fluid">
                    
                    <form method="post">
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label font"><h5><strong>Email</strong></h5></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font"><h5><strong>Password</strong></h5></label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="password" name="password">
                        </div>
                    </div>
                        <button class="btn btn-dark btn-md font"><h5>SignIN</h5></button><br><br>
                        <a href="" class="font2 btn btn-outline-danger btn-md"><h5><strong>Forgot Password?</strong></h5></a>
                        
                    </form>
                    <br>
                </div>
                <h5 class="font pinkbg card orstatement"><strong>OR<br>Dont have an account?<a href="signup.php" class="btn btn-primary signuplink">Sign Up</a></strong></h5>
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