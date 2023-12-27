<?php
include('config.php');

session_start();
$type1 = $_SESSION["type"];
$username1 = $_SESSION["username"];

if($_POST['update_profile'])
{
    $Mail = $_POST['mail1'];
    $Name = $_POST['name1'];
    $Usn = $_POST['employeeid'];
    $Phno = $_POST['phno1'];
    $Gender = $_POST['gender1'];
    $Dob = $_POST['dob1'];
    $Dept = $_POST['dept1'];

    $sql = "UPDATE employee SET usn='$Usn', name='$Name', mail='$Mail', phno='$Phno', gender='$Gender', DOB='$Dob', dept='$Dept'
    WHERE usn='$Usn'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('User Profile updated succesfully!')</script>";
        header("location:employeeprofile.php");
    }
    else{
        echo "<script>alert('Error')</script>";
    }
    mysqli_close($conn);


}
if(isset($_POST['delete_profile']))
{
    $Mail = $_POST['mail1'];
    $Name = $_POST['name1'];
    $Usn = $_POST['employeeid'];
    $Phno = $_POST['phno1'];
    $Gender = $_POST['gender1'];
    $Dob = $_POST['dob1'];
    $Dept = $_POST['dept1'];

    $sql = "DELETE FROM employee WHERE usn='$Usn' AND name='$Name' AND mail='$Mail' AND phno='$Phno' AND gender='$Gender' AND DOB='$Dob' AND dept='$Dept'";

    if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('User Profile deleted successfully!')</script>";
        header("location: index.php");
        session_destroy();
    }
    else {
        echo "<script>alert('Error')</script>";
    }

    mysqli_close($conn);
}
?>