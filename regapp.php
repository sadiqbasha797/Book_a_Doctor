<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>search</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="bootstrap.min.css" rel="stylesheet">

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <link href="bootstrap.min.css" rel="stylesheet">

      
    <style>
       nav{
      background-color: rgb(20, 44, 100);
    }
        .search {
      padding: 10px;
      display: flex;
    }

    .inp {
      font-size: 18px;
    }

    .bt {
      font-size: 18px;
      border-radius: 4px;
      background-color: rgb(93, 155, 255);
      color: white;
      border-color: rgb(93, 155, 255);
    }

    .ret {
      text-align: center;
      background-image: url("https://img.freepik.com/premium-vector/medical-background-healthcare-technology_120542-1259.jpg?w=1060");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh;
    }
    .navbar-toggler{
      color: white;!important
    }
    </style>
  </head>

  <body class=" ">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
    <div>
      <i class="bi bi-person" style="font-size:25px; color:white;"></i>
      <a class="navbar-brand" href="#" style="color:white;">Profile</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="color:white;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active" >
          <a class="nav-link" href="#" style="color:white;">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:white;">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:white;">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" style="color:white;">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>
    </header>

  
  


  <script>
function toggleDropdown(dropdownId) {
  var dropdown = document.getElementById(dropdownId);
  dropdown.classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

  </script>


<div class="ret">
<style>

   .search {
        padding: 10px;
        display: flex;
      }

      .inp {
        font-size: 18px;
      }

      .bt {
        font-size: 18px;
        border-radius: 4px;
        background-color: rgb(93, 155, 255);
        color: white;
        border-color: rgb(93, 155, 255);;
      }

      .ret {
        text-align: center;
      }

      body {
        font-family: Arial, sans-serif;
        margin: 0;
      }

      .dropdown {
        position: relative;
        display: inline-block;
        width: 80%;
        text-align: center;
      }

      .dropbtn {
        background-color: #a5f7bf;
        color: black;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .right-text {
        margin-left: auto; 
      }

      .dropdown-content {
        display: none;
        background-color: #f9f9f9;
        min-width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        left: 0; 
      }

      .dropdown-content p {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        margin: 0; 
      }

      .dropdown-content a:hover {
        background-color: #f1f1f1;
      }

      .show {
        display: block;
      }

      .left-corner {
        margin: 0;
        resize: none;
        width: 100%;
        border: none;
        outline: none;
        text-align: left;
        padding: 10px;
      }
    .bottom-button{
     background-color: #fdd6ed;
     min-width: 100%;
     height: 40px;
     color: black;
    }
</style>


  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (empty($id) || empty($password)) {
      echo "Please enter both ID and password.";
    } else {
      $conn = mysqli_connect("localhost", "root", "", "extern");

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sanitizedId = mysqli_real_escape_string($conn, $id);
      $sanitizedPassword = mysqli_real_escape_string($conn, $password);

      $query = "SELECT * FROM doctors WHERE id = '$sanitizedId'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
          echo "Login successful!";

          // Retrieve data from the "bookings" table
          $query = "SELECT * FROM bookings WHERE id = '$id'";
          $result = mysqli_query($conn, $query);

          // Check if any bookings were found
          if (mysqli_num_rows($result) > 0) {
            $bookings = array(); // Initialize an array to store the bookings

            while ($booking = mysqli_fetch_assoc($result)) {
              // Access the booking data
              $bookingId = $booking['fname'];
              $bookingDate = $booking['problem'];
              // Access other fields as needed

              // Store the booking data in the array
              $bookings[] = array(
                'id' => $bookingId,
                'date' => $bookingDate
                // Add other fields as needed
              );
            }

            // Sort the bookings array by ID in ascending order
            usort($bookings, function ($a, $b) {
              return intval($a['id']) - intval($b['id']);
            });

            // Display the bookings in numerical order
            foreach ($bookings as $booking) {
              echo '<div class="col">
              <div class="card shadow-sm">    
                <div class="card-body">
                  <h3>Gastroenterologist</h3>
                  <p class="card-text">'.$booking['id'].'</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="gastro.php"><button type="button" class="btn1 btn btn-sm btn-outline-secondary">View</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
              // Display other fields as needed
            }
          } else {
            echo "No bookings found for this user.";
          }
          // Redirect to a different page or perform any other desired actions
        } else {
          echo "Invalid password.";
        }
      } else {
        echo "Invalid ID.";
      }

      // Close the database connection
      mysqli_close($conn);
    }
  }
?>


</div>
</body>
</html>
