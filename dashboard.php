<?php 
    session_start();

    if(isset($_SESSION["name"])){
    $email = $_SESSION["email"];
    $name = $_SESSION["name"];
    $category = $_SESSION["category"];

        //connection details
        $host="localhost";
        $user="root";
        $pass="";
        $db="letsvikas";

        //actual connection
        $link=mysqli_connect($host,$user,$pass);
        mysqli_select_db($link,$db);

    }else{
        header("Location: signin.php"); 
    }

    if(isset($_POST['logout'])){

        session_destroy();
        header("Location: signin.php"); 
    
    }
    if(isset($_POST['publish'])){

        $text = $_POST['editor'];

        $sql = "INSERT INTO `posts` (`email`,`postID`,`postText`,`likes`)
                VALUES ('".mysqli_real_escape_string($link,$email)."',NULL,'".mysqli_real_escape_string($link,$text)."',0);";
        
        $link->query($sql);

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
     <div class="sidebardash text-center">
        <div class="profpic-c"><img src="imgs/Shouvik.jpg" class="img-fluid profpic"></div>
        <span class="dashname font"><?php echo $name;?></span>
        <span class="dashemail font2"><?php echo $email;?></span>
        <div class="dashoptions">
        <button class="btn btn-light btn1 browse" type="button">Browse

<svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg>
</button>
            <button class="btn btn-light btn1 stats" type="button">Statistics
                
            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-file-bar-graph" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
            <path d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1z"/>
            </svg>

            </button>
            <button class="btn btn-warning btn1 post" type="button">New Post 
            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-border-style" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-4-4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-1z"/>
</svg>
            </button>
            <button class="btn btn-outline-warning btn1 upost" type="button">Uploaded Posts 
            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-border-style" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-4-4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-1z"/>
</svg>
            </button>

            <button class="btn btn-light btn1 don" type="button">Your Donations
            <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-arrow-down-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
</svg>
            </button>
            <button class="btn btn-success btn1 set" type="button">Settings
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
</svg>
            </button>
            <button class="btn btn-primary logout font2" name="logout" type="submit" value="logout">Logout
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5A.5.5 0 0 0 4 8z"/>
</svg>
            </button>
        </div>
     </div>


    <div class="contentarea">
        <div class="browsing">

            <div class="browsedoodle"><img src="imgs/browseimg.svg" class="browseimage"></div>
            <div class="redirect"><a href = "browse.php" class="btn btn-dark btn-lg">Go to LV-Browser >></a></div>

        </div>
        <div class="statistics">
            <div class="row">
                <div class="numpost col-sm-4 font">Posts : 
                <?php 

                    $sql = "SELECT * from  `posts` where `email`='".mysqli_real_escape_string($link,$email)."';";
                    $result = $link->query($sql);
                    echo mysqli_num_rows($result);
                ?>
                </div>
                <div class="numinter col-sm-4 font">Interactions : 1388</div>
                <div class="numlevel col-sm-4 font">Reach Level : 8</div>
            </div>
        <hr style="border:2px solid grey; background-color:grey;" class="dashr">
        </div>

        <div class="postedit">
            <div class="posthead font">New Post</div>
            <div class="editor-c" style="width:100%;">
            <textarea id="editor" style="width:100%;" name="editor"></textarea></div>
                <button class="publish btn btn-primary" type="submit" name="publish" value="publish">PUBLISH
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-upload" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg>
                </button>
        </div>

        <div class="uploaded">
            <div class="uploadedheader font">POSTS</div>
            <table>
                <tr>
                    <th style="font-size:24px; text-align: center;">Post</th>
                    <th style="font-size:24px; text-align: center; padding: 5px;"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hand-thumbs-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16v-1c.563 0 .901-.272 1.066-.56a.865.865 0 0 0 .121-.416c0-.12-.035-.165-.04-.17l-.354-.354.353-.354c.202-.201.407-.511.505-.804.104-.312.043-.441-.005-.488l-.353-.354.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315L12.793 9l.353-.354c.353-.352.373-.713.267-1.02-.122-.35-.396-.593-.571-.652-.653-.217-1.447-.224-2.11-.164a8.907 8.907 0 0 0-1.094.171l-.014.003-.003.001a.5.5 0 0 1-.595-.643 8.34 8.34 0 0 0 .145-4.726c-.03-.111-.128-.215-.288-.255l-.262-.065c-.306-.077-.642.156-.667.518-.075 1.082-.239 2.15-.482 2.85-.174.502-.603 1.268-1.238 1.977-.637.712-1.519 1.41-2.614 1.708-.394.108-.62.396-.62.65v4.002c0 .26.22.515.553.55 1.293.137 1.936.53 2.491.868l.04.025c.27.164.495.296.776.393.277.095.63.163 1.14.163h3.5v1H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg></th>
                    <th style="font-size:24px; padding:10px;">Edit</th>
                    <th style="font-size:24px; padding:10px;">Delete</th>
                </tr>

            <?php 

                $sql = "SELECT * from  `posts` where `email`='".mysqli_real_escape_string($link,$email)."';";
                $stmt = $link->query($sql);
                while($row = mysqli_fetch_row($stmt)){

                    echo '<tr>';
                    echo '<td style="padding-left:10px;">'.$row[2].'</td>';
                    echo '<td style="text-align: center;">'.$row[3].'</td>';
            
            ?>
                <td style="text-align:center; padding: 5px;"><a href="edit.php?id=<?php echo $row[1];?>" class="btn btn-primary">Edit</a></td>
                <td style="text-align:center; padding:5px;"><a href="delete.php?id=<?php echo $row[1];?>"class="btn btn-danger">Delete</a></td>

            <?php 
                echo '</tr>';        
            } ?>
            </table>
        </div>

    </div>
    </form>
    <script type="text/javascript" src="dash.js"></script>
    <script>
        const statbtn = document.querySelector('.stats');
        const postbtn = document.querySelector('.post');
        const upostbtn = document.querySelector('.upost');
        const browsebtn = document.querySelector('.browse');
        const setbtn = document.querySelector('.set');
        const donbtn = document.querySelector('.don');
        const statis = document.querySelector('.statistics');
        const postedit = document.querySelector('.postedit');
        const uploaded = document.querySelector('.uploaded');
        const browsing = document.querySelector('.browsing');

        statis.style.display="none";
        postedit.style.display="none";
        uploaded.style.display="unset";
        browsing.style.display="none";

        statbtn.addEventListener('click',function(){
            statis.style.display="unset";
            postedit.style.display="none";
            uploaded.style.display="none";
            browsing.style.display="none";
        });

        postbtn.addEventListener('click',function(){
            statis.style.display="none";
            postedit.style.display="unset";
            uploaded.style.display="none";
            browsing.style.display="none";
        });

        upostbtn.addEventListener('click',function(){
            statis.style.display="none";
            postedit.style.display="none";
            uploaded.style.display="unset";
            browsing.style.display="none";
        });

        browsebtn.addEventListener('click',function(){
            statis.style.display="none";
            postedit.style.display="none";
            uploaded.style.display="none";
            browsing.style.display="flex";
        });

        setbtn.addEventListener('click',function(){
            statis.style.display="none";
            postedit.style.display="none";
            uploaded.style.display="none";
            browsing.style.display="none";
        });

        donbtn.addEventListener('click',function(){
            statis.style.display="none";
            postedit.style.display="none";
            uploaded.style.display="none";
            browsing.style.display="none";
        });

        CKEDITOR.replace('editor');

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>