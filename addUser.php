
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mpsn";

 $user_id=$_POST["u_id"];
 $user_name=$_POST["uname"];
 $pass=$_POST["pass"];
 $Role_type=$_POST["roll"];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "INSERT INTO Users (User_id,User_name,Password)VALUES ('$user_id','$user_name','$pass')";
//$sql2="INSERT INTO   Role(Role_id,Roles) VALUES ('$Role_type')";
$sql="select Role_id from role where roles='$Role_type'";
$result = mysqli_query($conn,$sql);
$rid=mysqli_fetch_array($result);
echo $rid[0];

$sql3="INSERT INTO    users_role(User_id,Role_id) VALUES('$user_id',$rid[0])";

if (mysqli_query($conn, $sql1) &&  mysqli_query($conn, $sql3) ) 
{
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);
?>