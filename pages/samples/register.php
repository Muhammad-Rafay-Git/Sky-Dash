<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

              <?php
              include '../../connection.php';

              // Create database if it doesn't exist
              $data_base = "CREATE DATABASE IF NOT EXISTS skydash";

              if (mysqli_query($conn, $data_base)) {
                echo 'Database successfully created';
              } else {
                echo 'Database not successfully created';
                mysqli_error($conn);
              }

              // Select the database
              mysqli_select_db($conn, 'skydash');

              // Create table if it doesn't exist (add profile column)
              $table_created = "CREATE TABLE IF NOT EXISTS management (
                  id int auto_increment PRIMARY KEY,
                  username VARCHAR(50),
                  email VARCHAR(100),
                  country VARCHAR(100),
                  password VARCHAR(100),
                  profile VARCHAR(255)
              )";

              if (mysqli_query($conn, $table_created)) {
                echo 'Table successfully created';
              } else {
                echo 'Table not successfully created';
                mysqli_error($conn);
              }

              // Insert data into the table if the form is submitted
              if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $country = $_POST['country'];
                $password = $_POST['password'];

                // Handle file upload first
                $profilePath = '';
                if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
                  $imageName = $_FILES['profile']['name'];
                  $imageTemp = $_FILES['profile']['tmp_name'];

                  // Move file to outside uploads folder
                  $uploadDir = '../../uploads/';
                  $movePath = $uploadDir . basename($imageName);

                  // Save only the web-accessible path to DB
                  $profilePath = 'uploads/' . basename($imageName);

                  // Ensure upload directory exists
                  if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                  }

                  // Move the uploaded file
                  if (move_uploaded_file($imageTemp, $movePath)) {
                    // success
                  } else {
                    $profilePath = ''; // fallback if upload fails
                  }
                }

                $query = "INSERT INTO management (username, email, country, password, profile)
              VALUES ('$username','$email', '$country', '$password', '$profilePath')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                  echo 'Successfully submitted into database';
                } else {
                  echo 'ERROR: ' . mysqli_error($conn);
                }
              }
              ?>

              <form class="pt-3" method="POST" action="register.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="country" required>
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Canada</option>
                    <option>Australia</option>
                    <option>France</option>
                    <option>Japan</option>
                    <option>China</option>
                    <option>Brazil</option>
                    <option>South Africa</option>
                    <option>Italy</option>
                    <option>Spain</option>
                    <option>Mexico</option>
                    <option>Netherlands</option>
                    <option>Sweden</option>
                    <option>Norway</option>
                    <option>Finland</option>
                    <option>Switzerland</option>
                    <option>Belgium</option>
                    <option>Poland</option>
                    <option>Turkey</option>
                    <option>South Korea</option>
                    <option>Indonesia</option>
                    <option>Malaysia</option>
                    <option>Philippines</option>
                    <option>Thailand</option>
                    <option>Vietnam</option>
                    <option>Singapore</option>
                    <option>New Zealand</option>
                    <option>Portugal</option>
                    <option>Greece</option>
                    <option>Ireland</option>
                    <option>Denmark</option>
                    <option>Austria</option>
                    <option>Czech Republic</option>
                    <option>Hungary</option>
                    <option>Romania</option>
                    <option>Ukraine</option>
                    <option>Russia</option>
                    <option>Belarus</option>
                    <option>Kazakhstan</option>
                    <option>Uzbekistan</option>
                    <option>Saudi Arabia</option>
                    <option>United Arab Emirates</option>
                    <option>Qatar</option>
                    <option>Oman</option>
                    <option>Bahrain</option>
                    <option>Kuwait</option>
                    <option>Egypt</option>
                    <option>Morocco</option>
                    <option>Tunisia</option>
                    <option>Algeria</option>
                    <option>Libya</option>
                    <option>Jordan</option>
                    <option>Lebanon</option>
                    <option>Syria</option>
                    <option>Iraq</option>
                    <option>Yemen</option>
                    <option>Pakistan</option>
                    <option>Bangladesh</option>
                    <option>Sri Lanka</option>
                    <option>Afghanistan</option>
                    <option>Maldives</option>
                    <option>Bhutan</option>
                    <option>Nepal</option>
                    <option>Myanmar</option>
                    <option>Laos</option>
                    <option>Cambodia</option>
                    <option>Brunei</option>
                    <option>Timor-Leste</option>
                    <option>Hong Kong</option>
                    <option>Taiwan</option>
                    <option>Macau</option>
                    <option>North Korea</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                </div>
                <div class="form-group mb-5">
                  <input type="file" name="profile" accept="image/*">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="terms" required>
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>