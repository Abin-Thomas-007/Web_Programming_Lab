<!-- WRITE A PROGRAM IN PHP TO CHECK WHETHER A NUMBER IS PALINDROME OR NOT.. -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome</title>
    <link rel="icon" href="Images/lightning.png" type="image/x-icon">
    <style>
        body {
            padding: 80px;
            background-image: url(Images/Ballon_sky.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: larger;
            text-align: center;
        }

        #main{
            font-size: larger;
        }

        input{
            height: 22px;
            width: 300px;
            border-radius: 7px;
            border-style: none;
        }

        button {
            font-size: 24px;
            width: 50%;
            height: 40px;
            background-color: aqua;
            border-radius: 10px;
            border-style: none;
        }
        button:hover{
            background-color:blueviolet;
        }
    </style>
</head>

<body>
    <center>
        <form action="" method="post">
            <h1 align="center">Program to check whether a number is palindrome or not.</h1>
            <br>
            <div  id="main">
                <label for="">Enter a Number: </label>
                <input type="text" name="num" class="snum"><br><br><br>
                <button type="submit">CHECK</button><br><br>
            </div>
        </form>
    </center>
</body>

</html>

<?php
    if ($_POST) 
    {
        $num = $_POST['num'];
        $reverse = strrev($num);
        if($num ==""){
            echo "Please input a number";
        }
        else if ($num == $reverse){
            echo "The number $num is Palindrome";
        }
        else{
            echo "The number $num is not Palindrome";
        }
    }
?>