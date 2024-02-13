<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>Collapsible sidebar using Bootstrap 4</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous" />
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="../css/style_dashboard.css">

  <!-- Font Awesome JS -->
  <script defer="" src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer="" src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  session_start();

  // include 'login_form.php';
  // Establish a connection to the database
  if (isset($_SESSION['loggedin']) && isset($_SESSION['PRN'])) {
    $PRN = $_SESSION['PRN'];

    include '../connection/connection.php';

    $sql = "SELECT * FROM status WHERE PRN = $PRN";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
      //  Output data of each row
      while ($row = $result->fetch_assoc()) {
        $HOD_status = $row['HOD_status'];
        $fine_status = $row['fine_status'];
        $CC_status = $row['CC_status'];
        $Library_HOD_status = $row['Library_HOD_status'];
        $Sports_status = $row['Sports_status'];
        $TNP_status = $row['TNP_status'];
        $Scholarship_status = $row['Scholarship_status'];
        $Accountant_status = $row['Accountant_status'];
        $Review_HOD = $row['Review_HOD'];
        $Review_fine = $row['Review_fine'];
        $Review_CC = $row['Review_CC'];
        $Review_Library = $row['Review_Library'];
        $Review_Sports = $row['Review_Sports'];
        $Review_TNP = $row['Review_TNP'];
        $Review_Scholarship = $row['Review_Scholarship'];
        $Review_Accountant = $row['Review_Accountant']; ?>

        <div class="wrapper">
          <!-- Sidebar Holder -->
          <nav id="sidebar">
            <div class="sidebar-header">
              <h3>Clear Gate</h3>
            </div>
            <!-- Student Profile -->
            <div class="student-profile">
              <img src="
                  <?php

                  $basicAddress = "http://127.0.0.1/Online Clearance System/uploads/";
                  $sql2 = "SELECT ProfilePhoto FROM student WHERE PRN = $PRN"; // Modify this query based on your database schema
                  $result2 = $connection->query($sql2);
                  // Output data of each row
                  while ($row2 = $result2->fetch_assoc()) {

                    if (!empty($basicAddress) && !empty($row2['ProfilePhoto'])) {
                      echo  $basicAddress . $row2['ProfilePhoto'];
                    } else {
                      echo  '../images/ProfilePicture.png';
                    }
                  }

                  ?>
              " alt="Profile Picture" class="profile-picture" />
            </div>

            <ul class="list-unstyled components">
              <li>
                <a href="../Details Page/Details.php?prn=<?php echo urlencode($PRN); ?>">Account</a>
              </li>

              <li>
                <a href="#">Dashboard</a>
              </li>

              <li>
                <a href="#">Settings</a>
              </li>
            </ul>

            <ul class="list-unstyled CTAs">
              <li>
                <a href="#">Notifications</a>
              </li>
              <li>
                <a href="#">Logout</a>
              </li>
            </ul>
          </nav>

          <!-- Page Content Holder -->
          <div id="content">
            <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="navbar-btn">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
                <div class="welcome">
                  <h3>
                    Welcome,
                    <?php echo $row['name']; ?>
                  </h3>
                  <h5>PRN : <?php echo $PRN ?></h5>
                  <h5>
                    Branch :
                    <?php echo $row['Branch'] ?>
                  </h5>
                </div>
              </div>
            </nav>
            <!-- =================== -->
            <div id="overlay"></div>
            <div class="row">
              <!-- <div class="row custom-card-margin"> -->
              <div class="col-md-4">
                <div class="flashcard" id="Mycard1">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">HOD</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-12" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage1" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="flashcard" id="Mycard2">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">
                        Fine Department
                      </h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage2" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="flashcard" id="Mycard3">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">
                        Computer Center
                      </h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage3" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add more cards as needed -->
              <!-- </div> -->

              <!-- <div class="row custom-card-margin"> -->
              <div class="col-md-4">
                <div class="flashcard" id="Mycard4">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">Library</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage4" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="flashcard" id="Mycard5">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">Sports</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage5" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="flashcard" id="Mycard6">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">
                        T&P Department
                      </h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage6" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Add more cards as needed -->
              <!-- </div> -->

              <!-- <div class="row custom-card-margin"> -->
              <div class="col-md-4">
                <div class="flashcard" id="Mycard7">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">Scholarship</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage7" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="flashcard" id="Mycard8">
                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Card body content -->
                    <div class="row">
                      <h3 class="col-md-12 col-sm-12 col-xs-12">
                        Accountant Department
                      </h3>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                        <img src="../images/pending.png" alt="cross" id="cardImage8" style="height: 50px; width: 50px; float: right" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- </div> -->
            </div>


      <?php
      }
      // Close the database connection
      $connection->close();
    }
  } else {
    echo "0 results";
  } ?>
          </div>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        <script src="../JS/Dashboard JS/script1.js" type="text/javascript"></script>

        <!-- ----------------------------------------------------------------------------------------- -->
        <!-- customised card color changing -->
        <!-- Php is used here to throw php variables towards external JS file(CardColorChanger.js) -->
        <?php
        // Output PHP variables as JSON
        echo '<script>';
        echo 'var phpVars = ' . json_encode([
          'HOD_status' => $HOD_status,
          'fine_status' => $fine_status,
          'CC_status' => $CC_status,
          'Library_HOD_status' => $Library_HOD_status,
          'Sports_status' => $Sports_status,
          'TNP_status' => $TNP_status,
          'Scholarship_status' => $Scholarship_status,
          'Accountant_status' => $Accountant_status,
          'Review_HOD' => $Review_HOD,
          'Review_fine' => $Review_fine,
          'Review_CC' => $Review_CC,
          'Review_Library' => $Review_Library,
          'Review_Sports' => $Review_Sports,
          'Review_TNP' => $Review_TNP,
          'Review_Scholarship' => $Review_Scholarship,
          'Review_Accountant' => $Review_Accountant,
        ]) . ';';
        echo '</script>';
        ?>

        <script src="../JS/Dashboard JS/CardColorChanger.js" type="text/javascript"></script>
        <!-- ------------------------------------------------------------------ -->
</body>

</html>