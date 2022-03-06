<!-- WRITE A PROGRAM IN PHP TO CHECK WHETHER A NUMBER IS PALINDROME OR NOT.. -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opertions Using PHP</title>
</head>

<body>
    <?php
    $num_id;
    $txt_name = $txt_sal = "";
    $con = mysqli_connect('localhost:3306', 'root', '', 'accounts');
    if (!$con)
        die("Failed to connect: " . mysqli_connect_error());
    $msg = "Connection Sucess!!!<br>";
    if (isset($_POST['select'])) {
        $id = $_POST['num_id'];
        $sql = "SELECT id,name,salary FROM salary WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $num_id = $row['id'];
                $txt_name = $row['name'];
                $txt_sal = $row['salary'];
            }
        } else
            $msg = "Zero Results!!!<br>";
        mysqli_close($con);
    }
    if (isset($_POST['insert'])) {
        $id = $_POST['num_id'];
        $name = $_POST['txt_name'];
        $salary = $_POST['txt_sal'];
        $sql_1 = "INSERT INTO salary VALUES('$id','$name','$salary')";
        $result_1 = mysqli_query($con, $sql_1);
        if (!$result_1) {
            $msg = "Error !!!" . mysqli_error($con);
        } else
            $msg = "Insertion Success!!!";
        mysqli_close($con);
    }
    if (isset($_POST['update'])) {
        $id = $_POST['num_id'];
        $name = $_POST['txt_name'];
        $salary = $_POST['txt_sal'];
        $sql_2 = "UPDATE salary SET name='$name',salary='$salary' WHERE id='$id'";
        $result_2 = mysqli_query($con, $sql_2);
        if (!$result_2) {
            $msg = "Error !!!" . mysqli_error($con);
        } else
            $msg = "Updation Success!!!";
        mysqli_close($con);
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['num_id'];
        $sql_3 = "DELETE FROM salary WHERE id='$id'";
        $result_3 = mysqli_query($con, $sql_3);
        if (!$result_3) {
            $msg = "Error !!!" . mysqli_error($con);
        } else
            $msg = "Deletion Success!!!";
        mysqli_close($con);
    }
    ?>
    <h1>Demonstration of PHP MYSQL</h1>
    <form method="post">
        ID:<input type="number" name="num_id" value="<?php echo $num_id; ?>"><br>
        Name:<input type="text" name="txt_name" value="<?php echo $txt_name; ?>"><br>
        Salary:<input type="text" name="txt_sal" value="<?php echo $txt_sal; ?>"><br>
        <input type="submit" value="SELECT" name="select">
        <input type="submit" value="INSERT" name="insert">
        <input type="submit" value="UPDATE" name="update">
        <input type="submit" value="DELETE" name="delete">
        <input type="submit" value="SELECT ALL" name="selectall">
        <input type="reset" value="RESET" name="reset">
        <?php echo $msg; ?>
    </form>
    <?php
    if (isset($_POST['selectall'])) {
        $sql_4 = "SELECT id,name,salary FROM salary";
        $result_4 = mysqli_query($con, $sql_4);
        if (mysqli_num_rows($result_4) > 0) {
            while ($row = mysqli_fetch_assoc($result_4)) {
                echo "ID: {$row['id']} <br>" .
                    "Name: {$row['name']} <br>" .
                    "Salary : {$row['salary']} <br>" .
                    "----------------------------------<br>";
            }
        }
        mysqli_close($con);
    }
    ?>

</body>

</html>