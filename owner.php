<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <title>Entry New Car</title>
</head>

<body>
  <h1 class="text-center pt-5">Car Owner Information</h1>
  <div class="container my-5">
    <form method="post" action="car.php">
      <div class="form-group">
        <label>Car Owner Name</label>
        <input type="text" class="form-control" name="name" placeholder="Car Owner Name" required />
      </div>
      <div class="form-group">
        <label>Driving Licence</label>
        <input type="text" name="licence" class="form-control" placeholder="Driving Licence" required />
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="number" name="phone" class="form-control" placeholder="Phone Number" required />
      </div>
      <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter Address" required />
      </div>
      <div class="form-group">

        <a href="index.php" class="text-light"><button type="button" class="btn btn-secondary">Cancel</button>
          </button></a>

        <button type="submit" class="btn btn-primary" name="owner">
          Next
        </button>
      </div>
    </form>
  </div>
</body>

</html>