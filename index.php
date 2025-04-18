<?php
include "connect.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="font.css" />
    <title>Main Page</title>
</head>

<body class="table-condensed">
    <h1 class="text-center pt-5">Padma Bridge Toll Management</h1>
    <div class="container pt-5">
        <table class="table table-bordered table-striped table-primary">
            <tr>
                <th scope="col">
                    <a href="owner.php" class="text-light"><button class="btn btn-primary">Entry New Car</button></a>
                </th>
                <th scope="col" class="text-right">
                    <a href="operations.php" class="text-dark"><button class="btn btn-warning">All Operations</button></a>
                </th>
            </tr>
        </table>
        <table class="table table-bordered table-striped table-sm table-condensed">
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
                    <th class="text-center">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence";
                $result2 = mysqli_query($connect, $sql2);
                $total = mysqli_fetch_assoc($result2);

                $sql = "select * from car,owner where car.licence=owner.licence";
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
                        <td class="text-center table-secondary">
                                <a href="view.php?carid=' . $car_no . '&ownerid=' . $owner_no . '" class="text-light"><button class="btn btn-success btn-sm">Details</button></a>
                                <a href="update_owner.php?update_owner=' . $owner_no . '&update_car=' . $car_no . '" class="text-light"><button class="btn btn-primary btn-sm">Update</button></a>
                                <a href="delete_warning.php?carid=' . $car_no . '&ownerid=' . $owner_no . '" class="text-light"><button class="btn btn-danger btn-sm btn-sm">Delete</button></a>
                        </td>
                        </tr>
                        ';
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