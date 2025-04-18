 <?php
    include "connect.php";
    $owner_No = $_GET['update_owner'];
    $car_No = $_GET['update_car'];


    $sql1 = "select * from car,owner where car.licence=owner.licence and owner.ownerid=$owner_No";
    $result1 = mysqli_query($connect, $sql1);
    $rows1 = mysqli_fetch_assoc($result1);
    $owner = $rows1["name"];
    $car_category = $rows1['category'];
    $toll_amount = $rows1['amount'];
    $get_date = $rows1['date'];
    $licence = $rows1['licence'];
    $phone = $rows1['phone'];
    $car_number = $rows1['car_number'];
    $address = $rows1['address'];

    $time_zone = "Asia/Colombo";
    date_default_timezone_set($time_zone);
    $present_date = date("Y-m-d");

    if (isset($_POST["updateowner"])) {
        $name = $_POST["name"];
        $licence = $_POST["licence"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $sql = "update owner set ownerid=$owner_No,name='$name',licence='$licence', phone='$phone',address='$address' where owner.ownerid=$owner_No";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            header("location:update_car.php?update_car=$car_No&name=$name&licence=$licence");
        } else {
            die(mysqli_error($connect));
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <title>Update Owner</title>
 </head>

 <body>
     <h1 class="text-center pt-5">Update Car Owner Information</h1>
     <div class="container my-5">
         <form method="post">
             <div class="form-group">
                 <label>Car Owner Name</label>
                 <input type="text" class="form-control" value="<?php echo $owner ?>" name="name" placeholder="Car Owner Name" required />
             </div>
             <div class="form-group">
                 <label>Driving Licence</label>
                 <input type="text" name="licence" value="<?php echo $licence ?>" class="form-control" placeholder="Driving Licence" required />
             </div>
             <div class="form-group">
                 <label>Phone Number</label>
                 <input type="number" name="phone" value="<?php echo $phone ?>" class="form-control" placeholder="Phone Number" required />
             </div>
             <div class="form-group">
                 <label>Address</label>
                 <input type="text" name="address" value="<?php echo $address ?>" class="form-control" placeholder="Enter Address" required />
             </div>
             <div class="form-group">
                 <a href="index.php" class="text-light"><button type="button" class="btn btn-secondary">Cancel</button></button></a>
                 <button type="submit" class="btn btn-primary" name="updateowner">Next</button>
             </div>
         </form>
     </div>
 </body>

 </html>