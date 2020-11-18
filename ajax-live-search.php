<?php
    $search_value = $_POST["search"];

    //connection details
    $host="localhost";
    $user="root";
    $pass="";
    $db="letsvikas";

    //actual connection
    $link=mysqli_connect($host,$user,$pass) or die("Connection Failed");
    mysqli_select_db($link,$db);

    $sql = "SELECT * from `posts` WHERE `postText` like '%{$search_value}%';";

    $result = mysqli_query($link,$sql) or die("SQL Query Failed");
    $op = '<table>
    <tr>
        <th style="font-size:24px; text-align: center;" class="authhead">Sr.No</th>
        <th style="font-size:24px; text-align: center;">Post</th>
        <th style="font-size:24px; text-align: center;">Category</th>
    </tr>
    ';
    $cnt = 1;
    if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){

            $op.="<tr><td class='authdata' style='font-size:24px; text-align: center;'>{$cnt}</td><td>{$row['postText']}</td><td>{$row['email']}</td></tr>";
            $cnt+=1;
        }
        mysqli_close($link);
        $op.="</table>";
        echo $op;
    }
    else{
        echo "<h2 style='font-size:24px; text-align: center;'>No records found.</h2>";
    }

?>