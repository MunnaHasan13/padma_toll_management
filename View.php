 <?php
  include "connect.php";
  $car_No = $_GET['carid'];
  $owner_No = $_GET['ownerid'];

  $sql1 = "select * from car,owner where car.licence=owner.licence and car.carid=$car_No and owner.ownerid=$owner_No";
  $result1 = mysqli_query($connect, $sql1);
  $rows1 = mysqli_fetch_assoc($result1);
  $owner = $rows1["name"];
  $licence = $rows1["licence"];
  $phone = $rows1["phone"];
  $address = $rows1["address"];
  $car_category = $rows1['category'];
  $toll_amount = $rows1['amount'];
  $car_number = $rows1['car_number'];
  $date = $rows1['date'];
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
   <title>View Details</title>
   <link rel="stylesheet" href="View.css" />
 </head>

 <body>
   <div>
     <h1>Information Details</h1>
     <br>
     <h6>Car Owner Name:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $owner ?></h5>
     <h6>Driving Licence:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $licence ?></h5>
     <h6>Phone Number:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $phone ?></h5>
     <h6>Car Category:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $car_category ?></h5>
     <h6>Toll Amount:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $toll_amount ?></h5>
     <h6>Car Number:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $car_number ?></h5>
     <h6>Entry Date:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $date ?></h5>
     <h6>Address:</h6>
     <h5 style="font-family:courier;font-weight: bold;"><?php echo $address ?></h5>
     <br>
     <a href="index.php" class="text-light"><button class="btn btn-success">BACK
       </button></a>
     <br><br><br>
   </div>
 </body>

 </html>