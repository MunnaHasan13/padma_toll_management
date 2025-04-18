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
    <link rel="stylesheet" href="font.css" />
    <title>Searching and Sorting</title>
</head>

<body>
    <h1 class="text-center pt-5">Padma Bridge Toll Management</h1>
    <div class="container pt-5 pt-5">
        <table class="table border">
            <thead>
                <tr>
                    <th>
                        <?php
                        $selected_sort = "";
                        $selected_sort_with = "name";
                        if (isset($_GET['select_sorting'])) {
                            if ($_GET['select_sorting'] == "Ascending") {
                                $selected_sort = "ASC";
                            } elseif ($_GET['select_sorting'] == "Descending") {
                                $selected_sort = "DESC";
                            }
                        }
                        if (isset($_GET['sort_with'])) {
                            if ($_GET['sort_with'] == "onwer") {
                                $selected_sort_with = "name";
                            } elseif ($_GET['sort_with'] == "amount") {
                                $selected_sort_with = "amount";
                            }
                        }
                        if ($selected_sort == "ASC") {
                            if ($selected_sort_with == "name") {
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:blue;">Sorting Car Owner Name by Ascending(A-Z)</h3>';
                            } elseif ($selected_sort_with == "amount") {
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:blue;">Sorting Toll Amount by Ascending(A-Z)</h3>';
                            }
                        }
                        if ($selected_sort == "DESC") {
                            if ($selected_sort_with == "name") {
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:blue;">Sorting Car Owner Name by Descending(Z-A)</h3>';
                            } elseif ($selected_sort_with == "amount") {
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:blue;">Sorting Toll Amount by Descending</h3>';
                            }
                        }
                        if (isset($_GET['search_with'])) {
                            if (isset($_GET['input'])) {
                                $search = $_GET['search_with'];
                                $item = $_GET['input'];
                                if ($search == "name") {
                                    $selected = "Car Owner Name";
                                }
                                if ($search == "licence") {
                                    $selected = "Driving Licence";
                                }
                                if ($search == "phone") {
                                    $selected = "Phone Number";
                                }
                                if ($search == "car_number") {
                                    $selected = "Car Number";
                                }
                                echo '<h3 class="text-center" style="font-family:courier;font-weight: bold; color:blue;">Search ' . $selected . ' for ' . $item . '</h3>';
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
        <table class="table table-bordered table-striped table-condensed">
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
                $sql2 = "select sum(amount) as amount from car";
                $result2 = mysqli_query($connect, $sql2);
                $total = mysqli_fetch_assoc($result2);

                $selected_sort = "";
                $selected_sort_with = "name";
                if (isset($_GET['select_sorting'])) {
                    if ($_GET['select_sorting'] == "Ascending") {
                        $selected_sort = "ASC";
                    } elseif ($_GET['select_sorting'] == "Descending") {
                        $selected_sort = "DESC";
                    }
                    $sql = "select * from car,owner where car.licence=owner.licence order by car.$selected_sort_with $selected_sort";
                }
                if (isset($_GET['sort_with'])) {
                    if ($_GET['sort_with'] == "onwer") {
                        $selected_sort_with = "name";
                    } elseif ($_GET['sort_with'] == "amount") {
                        $selected_sort_with = "amount";
                    }
                    $sql = "select * from car,owner where car.licence=owner.licence order by car.$selected_sort_with $selected_sort";
                }
                if (isset($_GET['search_with'])) {
                    if (isset($_GET['input'])) {
                        if ($_GET['search_with'] == 'phone') {
                            $search = $_GET['search_with'];
                            $item = $_GET['input'];
                            $sql = "select * from car,owner where car.licence=owner.licence and owner.$search=$item";
                            $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence and owner.$search='$item'";
                            $result2 = mysqli_query($connect, $sql2);
                            $total = mysqli_fetch_assoc($result2);
                        } else {
                            $search = $_GET['search_with'];
                            $item = $_GET['input'];
                            $sql = "select * from car,owner where car.licence=owner.licence and car.$search='$item'";
                            $sql2 = "select sum(amount) as amount from car,owner where car.licence=owner.licence and car.$search='$item'";
                            $result2 = mysqli_query($connect, $sql2);
                            $total = mysqli_fetch_assoc($result2);
                        }
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