<?php
$c = mysqli_connect("localhost", "root", "", "extern");
$id = $_POST['id'];
$password = $_POST['password'];
$q = "SELECT fname, lname, num, address, city, specialized, services, id, img,email FROM img WHERE id='$id' and password = '$password' ";

$result = mysqli_query($c, $q);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $data = array(); // Array to store the retrieved data

        while ($row = mysqli_fetch_assoc($result)) {
            $item = array(); // Array to store individual record

            $item['fname'] = $row['fname'];
            $item['lname'] = $row['lname'];
            $item['num'] = $row['num'];
            $item['address'] = $row['address'];
            $item['city'] = $row['city'];
            $item['specialized'] = $row['specialized'];
            $item['services'] = $row['services'];
            $item['id'] = $row['id'];
            $item['img'] = $row['img'];
            $item['email'] = $row['email'];


            $data[] = $item; // Add the record to the data array

            // Display the values
    

            echo' 

             <!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.84.0">
      <title>Registration</title>

      <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

      

      <!-- Bootstrap core CSS -->
  <link href="bootstrap.min.css" rel="stylesheet">
    
      <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      
      </style>

      <style>
    .img{
        height:200px;
        width:200px;
    }
    #address{
        height: 70px;
    }
    #services{
        height:70px;
    }
</style>

      
      <!-- Custom styles for this template -->
      <link href="form-validation.css" rel="stylesheet">
    </head>
    <body class="bg-light">
      
  <div class="container">
    <main>
      <div class="py-5 text-center">
          <img class="mb-4" src="https://img.freepik.com/free-vector/flat-medical-symbol_23-2149496593.jpg?w=740&t=st=1684085323~exp=1684085923~hmac=d44800c1822374c1fa74d7cbc10b909d6898c538dcec4c4dd452595ca3241779" alt="" width="72" height="65">
          <h2>'.$item['fname'].'"&nbsp"'.$item['lname'].'</h2>
        <p class="lead">"Register now and gain access to quality healthcare services at your fingertips!" <br> our team will moniter you every second when you get in touch with us.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Hello DOC!</span>
          </h4>
          <div id="">
          <img src= "data:image/jpeg;base64, ' . $item['img'] . '" alt="Image" class="img"><br><br>
          </div>
          
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Details</h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="fname" placeholder="" value='.$item['fname'].' readonly>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" name="lname" value='.$item['lname'].' readonly>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

             

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="" value='.$item['email'].' readonly>
                <div class="invalid-feedback">
                  Please enter a valid email.
                </div>
              </div>
             

              <div class="col-sm-6">
                  <label for="city" class="form-label">City/Town<span class="text-muted">(use all small letters)</span> </label>
                  <input class="form-control" id="city" name="city"  value='.$item['city'].' readonly>
                  <div class="invalid-feedback">
                    Please select a valid option.
                  </div>
              </div>

              <div class="col-sm-6">
                <label for="address2" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="address2" name="num" placeholder="+91"  value='.$item['num'].' readonly>
                <div class="invalid-feedback">
                  Please enter your Mobile Number.
                </div>
              </div>

              <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" readonly>'.htmlspecialchars($item['address']).'</textarea>
                </div>

              

            <hr class="my-4">

            

            <h4 class="mb-3">Professional Details</h4>

        
            <div class="row gy-3">
              <div class="col-md-6">
                  <label for="sp" class="form-label">Specialized</label>
                  <input class="form-control" id="sp" name="sp"  value='.$item['specialized'].' readonly>
                    
              </div>

              <div class="col-md-6">
                <label for="cc-number" class="form-label">Id number</label>
                <input type="text" class="form-control" id="cc-number" name="id" placeholder=""  value='.$item['id'].' readonly>
              </div>

              <div class="col-12">
                <label for="services" class="form-label">Services</label>
                <textarea type="text" class="form-control" id="services" name="services" readonly>'.htmlspecialchars($item['services']).'</textarea>
                <div class="invalid-feedback">
                Enter your services.
                </div>
            </div>

         

            </div>

           <hr class="my-4">

            <a href="book.html" class="w-100 btn btn-primary btn-lg">Book</a>
          </form >
        </div>
      </div>
    
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2022–2023 Hello DOC!</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>


      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <script src="form-validation.js"></script>
    </body>
  </html>

  ';

            // Output the image
           
        }
    } else {
        echo "No records found.";
    }
} else {
    echo "Error retrieving data: " . mysqli_error($c);
}

mysqli_close($c);
?>
