<?php
include "connect.php";
if (isset($_POST["car"])) {
    $name = $_POST["name"];
    $licence = $_POST["licence"];
    $category = $_POST["car"];
    $amount = $_POST["amount"];
    $number = $_POST["number"];
    $date = $_POST["dateofcreate"];

    $sql = "insert into car(name,licence,category,amount,car_number,date)
    values('$name','$licence','$category','$amount','$number','$date')";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header("location:index.php");
    } else {
        die(mysqli_error($connect));
    }
}
