<?php
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "mahila");
    session_start();
    if(isset($_SESSION['company_id'])){
        $sql = "SELECT * FROM job_listing WHERE company_id=$_SESSION[id]";
        $results = mysqli_query($conn,$sql);
        echo "    <table>";
        while($row = mysqli_fetch_array($results)){
            if($row['userid'] != null){
                $userinfo = mysqli_query($conn,"SELECT * FROM user_table WHERE userid='$row[userid]'");
            $user = mysqli_fetch_array($userinfo);
            echo "        <tr>
            <td>$user[username]</td>
            <td>$row[job_title]</td>
            </tr>";}
        }  
        echo "</table>";
?>
        <button onclick="window.location.href='ABC_company.php'";>BACK</button>
<?php
    }else{
        session_unset();
        session_destroy();
        mysqli_close($conn);
        header("Location: Companylogin.html");
      }
    mysqli_close($conn);
?>