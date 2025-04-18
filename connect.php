<?php
$connect = new mysqli("localhost", "root", "", "toll_management");
if (!$connect) {
    die(mysqli_error($connect));
}
