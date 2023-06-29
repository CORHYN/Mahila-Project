<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "mahila");
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $token = $_SESSION['token'];
    $result = mysqli_query($con, "SELECT tokenid FROM user_table WHERE userid='$userid'");
    $row = mysqli_fetch_array($result);
    if ($row['tokenid'] == $token) {
    } else {
        session_unset();
        session_destroy();
        mysqli_close($con);
        header("Location:login.html");
        exit();
    }
} else {
    session_unset();
    session_destroy();
    mysqli_close($con);
    header("Location:login.html");
    exit();
}
?>
<?php

if (isset($_POST['submit']) && isset($_FILES['my_file'])) {
    echo "<pre>";
    print_r($_FILES['my_file']);
    echo "</pre>";

    $img_name = $_FILES['my_file']['name'];
    $img_size = $_FILES['my_file']['size'];
    $tmp_name = $_FILES['my_file']['tmp_name'];
    $error = $_FILES['my_file']['error'];

    if ($error === 0) {
        if ($img_size > 125000) { // file size limit to 1mb
            $em = "your file is too large!";
            header("Location:profile.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png", "pdf");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG", true) . '.' . $img_ex_lc;
                $results = mysqli_query($con, "SELECT * FROM resumes WHERE userid=$userid");
                if (mysqli_affected_rows($con) > 0) {
                    $row = mysqli_fetch_array($results);
                    $img_location = "$row[resumes]";
                    if (!unlink("uploads/".$img_location)) {
                        $em = "File is missing from the server";
                        header("Location:profile.php?error=$em");
                    }else{}
                    mysqli_query($con,"DELETE FROM resumes WHERE userid=$userid;");
                }
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                mysqli_query($con, "INSERT INTO resumes(userid, resumes) VALUES ($userid,'$new_img_name')");
            } else {
                $em = "File type not supported";
                header("Location:profile.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occured!";
        header("Location:profile.php?error=$em");
    }
} else {
    header("Location:profile.php");
    exit();
}

mysqli_close($con);
header("Location:profile.php");
exit();
?>