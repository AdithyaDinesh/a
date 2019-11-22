<?php
if (isset($_POST['submit'])) {
    include('conn.php');
    session_start();
        $username=$_POST['email'];
        $password=$_POST['password'];
        $x=md5($password);
        $sql="SELECT * FROM users WHERE email='$username'";
        $result=$db->query($sql) or die($db->error);
        $row = $result->fetch_assoc();
        if ($x===$row['password']) {
                $_SESSION['user']=$row['email'];
                $_SESSION['userId']=$row['id'];
                header("location:../index.php");             
            }else{
                $_SESSION['message'] = "Wrong Username or password!";
                header("location:../index.php");  

            }
        }


?>