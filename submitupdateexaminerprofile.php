<?php
include('config.php');

session_start();
$type1 = $_SESSION["type"];
$username1 = $_SESSION["username"];

if($_POST['update_profile'])
{
    $Mail = $_POST['mail1'];
    $Pw = $_POST['pw1'];
    $Name = $_POST['name1'];
    $Usn = $_POST['examinerid'];
    $Phno = $_POST['phno1'];
    $Gender = $_POST['gender1'];
    $Dob = $_POST['dob1'];
    $Dept = $_POST['dept1'];

    $sql = "UPDATE examiner SET examinerid='$Usn', name='$Name', mail='$Mail', phno='$Phno', gender='$Gender', DOB='$Dob', dept='$Dept', pw='$Pw'
    WHERE examinerid='$Usn'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('User Profile updated succesfully!')</script>";
        header("location:examinerprofile.php");
    }
    else{
        echo "<script>alert('Error')</script>";
    }
    mysqli_close($conn);

}
?>