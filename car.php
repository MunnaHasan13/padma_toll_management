<?php
include "connect.php";
if (isset($_POST["owner"])) {
    $name = $_POST["name"];
    $licence = $_POST["licence"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "insert into owner(name,licence,phone,address)
    values('$name','$licence','$phone','$address')";
    $result = mysqli_query($connect, $sql);
    if ($result) {
    } else {
        die(mysqli_error($connect));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>Entry New Car</title>
    <?php
    $time_zone = "Asia/Colombo";
    date_default_timezone_set($time_zone);
    $present_date = date("Y-m-d");
    ?>

    <script>
        function get_car_amount() {
            var id = document.getElementById("car_category");
            var car_amount = id.options[id.selectedIndex].text;
            var amount;
            if (car_amount == "Bike") {
                amount = 100;
            }
            if (car_amount == "Car/jeep") {
                amount = 750;
            }
            if (car_amount == "Pick-up/Laxuary jeep") {
                amount = 1200;
            }
            if (car_amount == "Micro Bus") {
                amount = 1300;
            }
            if (car_amount == "Mini Bus") {
                amount = 1400;
            }
            if (car_amount == "Medium Bus") {
                amount = 2000;
            }
            if (car_amount == "Bus") {
                amount = 2400;
            }
            if (car_amount == "Truck(up to 5 tonnes)") {
                amount = 1600;
            }
            if (car_amount == "Truck(5 to 8 tonnes)") {
                amount = 2100;
            }
            if (car_amount == "Truck(8 to 11 tonnes)") {
                amount = 2800;
            }
            if (car_amount == "Truck(three-axle)") {
                amount = 5500;
            }
            if (car_amount == "Trailer(4-axles)") {
                amount = 6000;
            }
            if (car_amount == "Trailer(above 4-axles)") {
                amount = 8000;
            }

            document.getElementById("ok3").value = amount;
        }
    </script>
</head>

<body>
    <h1 class="text-center pt-5">Car Information</h1>
    <div class="container my-5">
        <form method="post" action="post.php">
            <div class="form-group">
                <label>Car Owner Name</label>
                <input type="text" class="form-control" value="<?php echo $name ?>" name="name" placeholder="Enter Car Owner Name" required readonly />
            </div>
            <div class="form-group">
                <label>Driving Licence</label>
                <input type="text" name="licence" value="<?php echo $licence ?>" class="form-control" placeholder="Driving Licence" required readonly />
            </div>
            <div class="form-group">
                <label>Car Category</label>
                <select class="form-control" id="car_category" onchange="get_car_amount();" name="car" required>
                    <option value="">Select Car Category</option>
                    <option value="Bike">Bike</option>
                    <option value="car/jeep">Car/jeep</option>
                    <option value="Pick-up/luxary jeep">Pick-up/Laxuary jeep</option>
                    <option value="Micro bus">Micro Bus</option>
                    <option value="Mini Bus">Mini Bus</option>
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
            </div>
            <div class="form-group">
                <label for="">Toll Amount</label>
                <input type="text" id="ok3" name="amount" readonly class="form-control" />
            </div>
            <div class="form-group">
                <label>Car Number</label>
                <input type="text" name="number" class="form-control" placeholder="Enter Car Number" required />
            </div>
            <div class="form-group">
                <label for="start">Entry date</label>
                <input type="date" id="start" class="form-control" name="dateofcreate" min="<?php echo $present_date ?>" max="2025-04-18" required />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
            </div>
        </form>
    </div>
</body>

</html>