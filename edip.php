  </td>
  <td>

    <?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mpsn";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM `department`";
$deptname=$_POST["deptname"];
$result1 = mysqli_query($connect, $query);
$result2 = mysqli_query($connect, $query);
$options = "";
while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}

?>
<html>
    
    <body>

        <select>
            <?php echo $options;?>
        </select>

    </body>

</html>
</td>
