<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Calculating</title>
</head>

<body>
    <h1 class="text-center pt-5">Padma Bridge Toll Management</h1>
    <div class="container pt-5 pt-5">
        <table class="table border">
            <thead>
                <tr>
                    <th>
                        <?php
                        if (isset($_GET['car'])) {
                            if (isset($_GET['datewithcar'])) {
                                $car = $_GET['car'];
                                $car_with_date = $_GET['datewithcar'];
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:red;">Total ' . $car . ' of The Date ' . $car_with_date . '</h3>';
                            }
                        }
                        if (isset($_GET['dateofone'])) {
                            $selected_date = $_GET['dateofone'];
                            echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:red;">Total Toll Amount of The Date ' . $selected_date . '</h3>';
                        }
                        if (isset($_GET['startdate'])) {
                            if (isset($_GET['lastdate'])) {
                                $start_date = $_GET['startdate'];
                                $last_date = $_GET['lastdate'];
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:red;">Total Toll Amount of The Date From ' . $start_date . ' to ' . $last_date . '</h3>';
                            }
                        }
                        ?>
                    </th>
                    <th scope="col" class="text-right">
                        <a href="operations.php" class="text-light"><button class="btn btn-secondary">Back</button></a>
                    </th>
                </tr>
            </thead>
        </table>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Car Owner Name</th>
                    <th>Phone</th>
                    <th>Driving Licence</th>
                    <th>Car Category</th>
                    <th>Toll Amount</th>
                    <th>Car Number</th>
                    <th>Address</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['car'])) {
                    if (isset($_GET['datewithcar'])) {
                        $car = $_GET['car'];
                        $car_with_date = $_GET['datewithcar'];
                        $sql = "select * from car,owner where car.licence=owner.licence and car.category='$car' and car.date='$car_with_date'";

                        $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence and car.category='$car' and car.date='$car_with_date'";
                        $result2 = mysqli_query($connect, $sql2);
                        $total = mysqli_fetch_assoc($result2);
                    }
                }
                if (isset($_GET['dateofone'])) {
                    $each_day = $_GET['dateofone'];
                    $sql = "select * from car,owner where car.licence=owner.licence and date='$each_day'";
                    $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence and date='$each_day'";
                    $result2 = mysqli_query($connect, $sql2);
                    $total = mysqli_fetch_assoc($result2);
                }
                if (isset($_GET['startdate'])) {
                    if (isset($_GET['lastdate'])) {
                        $start_date = $_GET['startdate'];
                        $last_date = $_GET['lastdate'];
                        $sql = "select * from car,owner where car.licence=owner.licence and date between '$start_date' and '$last_date'";

                        $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence and date between '$start_date' and '$last_date'";
                        $result2 = mysqli_query($connect, $sql2);
                        $total = mysqli_fetch_assoc($result2);
                    }
                }
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    $i = 0;
                    $j = 0;
                    while ($rows = mysqli_fetch_assoc($result)) {
                        $i++;
                        $owner_no = $rows['ownerid'];
                        $car_no = $rows['carid'];
                        $name = $rows['name'];
                        $licence = $rows['licence'];
                        $phone = $rows['phone'];
                        $category = $rows['category'];
                        $amount = $rows['amount'];
                        $car_number = $rows['car_number'];
                        $address = $rows['address'];
                        $date = $rows['date'];
                        echo '
                        <tr>
                        <td class="table-active">' . $i .  '</td>
                        <td class="table-primary">' . $name . '</td>
                        <td class="table-primary">' . $phone . '</td>
                        <td class="table-primary">' . $licence . '</td>
                        <td class="table-warning">' . $category . '</td>
                        <td class="table-success">' . $amount . '</td>
                        <td class="table-danger">' . $car_number . '</td>
                        <td class="table-primary">' . $address . '</td>
                        <td class="table-info">' . $date . '</td>
                        </tr>
                        ';
                    }
                    if ($i == 0) {
                        header("location: no_item_found.html");
                    }
                }
                ?>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th scope="col">Total Toll(TK):</th>
                    <th scope="col"><?php echo $total['amount'] ?></th>
                    <th></th>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
</body>

</html>