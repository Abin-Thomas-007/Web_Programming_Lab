<!-- PHP SAME PROGRAM FOR INSERTION, UPDATION, DELETION AND RETRIEVING RECORDS. -->

<?php
require('Connection.php')
?>

<!-- Select PHP Code -->
<?php
$num_roll ="";
$txt_name=$txt_course="";
if (isset($_POST['select'])) {
    $roll = $_POST['roll'];
    $select_query = "SELECT ROLL_NO, FULL_NAME, COURSE FROM student WHERE ROLL_NO='$roll' ";
    $select_result = mysqli_query($con, $select_query);
    if (mysqli_num_rows($select_result) > 0) 
    {
        while ($srow = mysqli_fetch_array($select_result)) 
        {
            $num_roll = $srow['ROLL_NO'];
            $txt_name = $srow['FULL_NAME'];
            $txt_course = $srow['COURSE'];
        }
    } 
    else
    {
        $msg = "NO Results Where Found!!!<br>";
    }
    mysqli_close($con);
}
?>

<!-- Insert PHP Code -->
<?php
if (isset($_POST['insert'])) 
{
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $insert_query = "INSERT INTO student VALUES('$roll','$name','$course')";
    $insert_result = mysqli_query($con, $insert_query);
    if (!$insert_result) 
    {
        $msg = "Insertion Error !!!" . mysqli_error($con);
    } 
    else
    {
         $msg = "Data Insertion Success!!!";
    }
    mysqli_close($con);
}
?>

<!-- Update PHP Code -->
<?php
if (isset($_POST['update'])) 
{
    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $update_query = "UPDATE student SET FULL_NAME='$name',COURSE='$course' WHERE ROLL_NO='$roll'";
    $update_result = mysqli_query($con, $update_query);
    if (!$update_result) 
    {
        $msg = "Updation Error !!!" . mysqli_error($con);
    } 
    else
    {
        $msg = "Data Updation Success!!!";
    }    
    mysqli_close($con);
}
?>

<!-- Delete PHP Code -->
<?php
if (isset($_POST['delete'])) 
{
    $roll = $_POST['roll'];
    $delete_query = "DELETE FROM student WHERE ROLL_NO='$roll'";
    $delete_result = mysqli_query($con, $delete_query);
    if (!$delete_result) 
    {
        $msg = "Deletion Error !!!" . mysqli_error($con);
    } 
    else
    {
        $msg = "Data Deletion Success!!!";
    }
    mysqli_close($con);
}
?>

<!-- Select all PHP Code -->
<?php
if (isset($_POST['selectall'])) 
{
    $selectall_query = "SELECT ROLL_NO, FULL_NAME, COURSE FROM student";
    $select_result = mysqli_query($con, $selectall_query);
    if (mysqli_num_rows($select_result) > 0) 
    {
        while ($asrow = mysqli_fetch_assoc($select_result)) 
        {
            echo "ID: {$asrow['ROLL_NO']} <br>" . "Name: {$asrow['FULL_NAME']} <br>" . "Salary : {$asrow['COURSE']} <br>" .
                "----------------------------------<br>";
        }
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opertions Using PHP</title>
    <link rel="icon" href="Images/lightning.png" type="image/x-icon">
    <style>
        *{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 24px;
        }

        body {
            background-image: url(Images/Ballon_sky.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: larger;
            text-align: center;
        }
    </style>
</head>

<body align="center">
    <h1>Student - Demonstration of PHP MYSQL</h1>
    <br><br>
    <form method="post">
        <label>Roll No:
            &nbsp;<input type="number" name="roll" value="<?php echo $num_roll; ?>">
        </label> <br><br>
        <label>Name:
            <input type="text" name="name" value="<?php echo $txt_name; ?>">
        </label><br><br>
        <label>Course:
            <input type="text" name="course" value="<?php echo $txt_course; ?>">
        </label> <br><br>
        <input type="submit" value="SELECT" name="select">
        <input type="submit" value="INSERT" name="insert">
        <input type="submit" value="UPDATE" name="update">
        <input type="submit" value="DELETE" name="delete">
        <input type="submit" value="SELECT ALL" name="selectall">
        <input type="reset" value="RESET" name="reset">
        <br><br><br>
        <p>
            <?php echo $msg; ?>
        </p>
    </form>
</body>

</html>