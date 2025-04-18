<?php
$time_zone = "Asia/Colombo";
date_default_timezone_set($time_zone);
$present_date = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Operations</title>
</head>

<body>
    <h1 class="text-center pt-5">Padma Bridge Toll Operations</h1>
    <div class="container pt-5 pt-5">
        <table class="table border">
            <tr>
                <th class="text-right">
                    <a href="index.php" class="text-light"><button name="cancel" class="btn btn-secondary">GO BACK</button></a>
                </th>
            </tr>
        </table>
    </div>
    <div class="container">
        <form method="GET" action="sorting_searching.php">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">
                            <h5>SORTING</h5>
                        </th>
                        <th scope="col">
                            <select class="form-control " name="sort_with" required>
                                <option value="">
                                    Select an Object
                                </option>
                                <option value="owner" <?php if (isset($_GET['sort_with']) && $_GET['sort_with'] == "owner") {
                                                            echo "selected";
                                                        } ?>>Car Owner Name</option>
                                <option value="amount" <?php if (isset($_GET['sort_with']) && $_GET['sort_with'] == "amount") {
                                                            echo "selected";
                                                        } ?>>Toll Amount</option>
                            </select>
                        </th>
                        <th scope="col">
                            <h5>ORDER BY</h5>
                        </th>
                        <th scope="col">
                            <select class="form-control " name="select_sorting" required>
                                <option value="">Select Order</option>
                                <option value="Ascending" <?php if (isset($_GET['select_sorting']) && $_GET['select_sorting'] == "Ascending") {
                                                                echo "selected";
                                                            } ?>>Ascending</option>
                                <option value="Descending" <?php if (isset($_GET['select_sorting']) && $_GET['select_sorting'] == "Descending") {
                                                                echo "selected";
                                                            } ?>>Descending</option>
                            </select>
                        </th>
                        <th scope="col " class="text-right">
                            <button type="submit" class="text-right btn btn-info" name="submit">SHOW</button>
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
        <form method="GET" action="sorting_searching.php">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">
                            <h5>SEARCH</h5>
                        </th>
                        <th scope="col">
                            <select class="form-control " name="search_with" required>
                                <option value="">
                                    Select an Object
                                </option>
                                <option value="name" <?php if (isset($_GET['search_with']) && $_GET['search_with'] == "owner") {
                                                            echo "selected";
                                                        } ?>>Car Owner Name</option>
                                <option value="licence" <?php if (isset($_GET['search_with']) && $_GET['search_with'] == "licence") {
                                                            echo "selected";
                                                        } ?>>Driving Licence</option>
                                <option value="phone" <?php if (isset($_GET['search_with']) && $_GET['search_with'] == "phone") {
                                                            echo "selected";
                                                        } ?>>Phone Number</option>
                                <option value="car_number" <?php if (isset($_GET['search_with']) && $_GET['search_with'] == "car_number") {
                                                                echo "selected";
                                                            } ?>>Car Number</option>
                            </select>
                        </th>
                        <th scope="col">
                            <h5>BY</h5>
                        </th>

                        <th scope="col">
                            <input type="text" name="input" class="form-control" placeholder="Enter Input" required />
                        </th>
                        <th scope="col " class="text-right">
                            <button type="submit" class="text-right btn btn-info" name="submit">SHOW</button>
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
        <form method="GET" action="calculating.php">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">
                            <h5>CALCULATE TOTAL TOLL AMOUNT OF</h5>
                        </th>
                        <th>
                            <select class="form-control" id="car_category" name="car" required>
                                <option value="">Select Car Category</option>
                                <option value="Bike">Bike</option>
                                <option value="car/jeep">Car/jeep</option>
                                <option value="Pick-up/luxary jeep">Pick-up/Laxuary jeep</option>
                                <option value="Micro bus">Micro Bus</option>
                                <option value="Mini bus">Mini Bus</option>
                                <option value="Medium Bus">Medium Bus</option>
                                <option value="Bus">Bus</option>
                                <option value="Truck(Up to 5 Tonnes)">Truck(up to 5 tonnes)</option>
                                <option value="Truck(5 to 8 tonnes)">Truck(5 to 8 tonnes)</option>
                                <option value="Truck(8 to 11 tonnes)">Truck(8 to 11 tonnes)</option>
                                <option value="Truck(three-axle)">Truck(three-axle)</option>
                                <option value="Trailer(4-axles)">Trailer(4-axles)</option>
                                <option value="Trailer(above 4-axles)">
                                    Trailer(above 4-axles)
                                </option>
                            </select>
                        </th>
                        <th>
                            <h5>ON DAY</h5>
                        </th>
                        <th scope="col">
                            <input type="date" id="start" class="form-control" name="datewithcar" min="2022-06-25" max="<?php echo $present_date ?>" value="" required />
                        </th>
                        <th scope="col " class="text-right">
                            <button type="submit" class=" btn btn-info" name="submit">Calculate</button>
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
        <form method="GET" action="calculating.php">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">
                            <h5>CALCULATE TOTAL TOLL AMOUNT OF DAY</h5>
                        </th>
                        <th scope="col">
                            <input type="date" id="start" class="form-control" name="dateofone" min="2022-06-25" max="<?php echo $present_date ?>" value="" required />
                        </th>
                        <th scope="col " class="text-right">
                            <button type="submit" class=" btn btn-info" name="submit">Calculate</button>
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
        <form method="GET" action="calculating.php">
            <table class="table border">
                <thead>
                    <tr>
                        <th scope="col">
                            <h5>CALCULATE TOTAL TOLL AMOUNT FROM DATE</h5>
                        </th>
                        <th scope="col">
                            <input type="date" id="start" class="form-control" name="startdate" min="2022-06-25" max="<?php echo $present_date ?>" value="" required />
                        </th>
                        <th scope="col">
                            <h5>TO </h5>
                        </th>
                        <th scope="col">
                            <input type="date" id="start" class="form-control" name="lastdate" min="2022-06-25" max="<?php echo $present_date ?>" value="" required />
                        </th>
                        <th scope="col " class="text-right">
                            <button type="submit" class=" btn btn-info" name="submit">Calculate</button>
                        </th>
                    </tr>
                </thead>
            </table>
            <br><br><br>
    </div>
</body>

</html>