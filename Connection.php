<!-- Connection PHP Code -->
<?php
$con = mysqli_connect('localhost', 'root', '', 'accounts');
if (!$con)
{
    die("Failed to connect: " . mysqli_connect_error());
} 
else 
{
    $msg = "Database Connection Sucessfully established🎉<br>";
}
?>