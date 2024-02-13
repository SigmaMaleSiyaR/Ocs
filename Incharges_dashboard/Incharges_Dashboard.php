<?php
session_start();
if ($_SESSION['loggedin'] == "true") {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style_Incharges_dashboard.css">
    <title>Your Dashboard</title>
  </head>

  <body>
    <div class="sbar">
      <?php
      if (isset($_SESSION['ID'])) {
        $userId = $_SESSION['ID'];

        // echo $userId;

        if ($userId == 12) {
          include "sidebar admin/sidebar.php";
        } else {
          include "sidebar/sidebar.php";
        }
      ?>
    </div>
    <div class="content">
      <div class="nbar">
        <?php
        include "sidebar/navbar.php";
        ?>
      </div>

      <!-- this is main division - Written by Atharva -->

      <div class="mainContent">
      <?php

        include "../connection/connection.php";

        // echo $userId;

        $sql = "SELECT * FROM incharges WHERE ID = $userId";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $Name = $row['Name'];
            $Department = $row['Department'];
          }
        }
      }
      ?>
      <div class="welcome">
        <h2>
          Welcome <?php echo $Name; ?>
        </h2>
        <h4>
          Incharge : <?php echo $Department; ?>
        </h4>
      </div>
      <br>
      <div id="overlay">
        <div class="row">
          <!-- <div class="row custom-card-margin"> -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="flashcard" id="requested">
              <!-- Card content -->
              <div class="card-body">
                <!-- Card body content -->
                <div class="row">
                  <h3 class="col-md-12 col-sm-12 col-xs-12">Requested</h3>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-12" style="position: relative">
                    <div class="circle">
                      <?php
                      $review_status = "";

                      // Determine the attribute based on the user ID
                      switch ($userId) {
                        case 1:
                          $review_status = "Year_of_study = 1";
                          $review_status .= " and Review_HOD"; // Concatenation for case 1
                          break;
                        case 2:
                          $review_status = "Branch ='Computer Engineering'";
                          $review_status .= " and Review_HOD"; // Concatenation for case 2
                          break;
                        case 3:
                          $review_status = "Branch ='Electrical Engineering'";
                          $review_status .= " and Review_HOD"; // Concatenation for case 3
                          break;
                        case 4:
                          $review_status = "Branch ='Civil Engineering'";
                          $review_status .= " and Review_HOD"; // Concatenation for case 4
                          break;
                        case 5:
                          $review_status = "Branch ='Mechanical Engineering'";
                          $review_status .= " and Review_HOD"; // Concatenation for case 5
                          break;
                        case 6:
                          $review_status = "Review_fine";
                          break;
                        case 7:
                          $review_status = "Review_CC";
                          break;
                        case 8:
                          $review_status = "Review_Library";
                          break;
                        case 9:
                          $review_status = "Review_Sports";
                          break;
                        case 10:
                          $review_status = "Review_TNP";
                          break;
                        case 11:
                          $review_status = "Review_Scholarship";
                          break;
                        case 12:
                          $review_status = "Review_Accountant";
                          break;
                      }

                      // Build the SQL query based on the attribute
                      $requested = "SELECT COUNT(*) AS count FROM status WHERE $review_status = 0";
                      $result = $connection->query($requested);
                      if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="side-line"></div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="flashcard" id="approved">
              <!-- Card content -->
              <div class="card-body">
                <!-- Card body content -->
                <div class="row">
                  <h3 class="col-md-12 col-sm-12 col-xs-12">Approved</h3>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                    <div class="circle">
                      <?php
                      $Approval = "";

                      // Determine the attribute based on the user ID
                      switch ($userId) {
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                          $Approval = "HOD_status";
                          break;
                        case 6:
                          $Approval = "fine_status";
                          break;
                        case 7:
                          $Approval = "CC_status";
                          break;
                        case 8:
                          $Approval = "Library_status";
                          break;
                        case 9:
                          $Approval = "Sports_status";
                          break;
                        case 10:
                          $Approval = "TNP_status";
                          break;
                        case 11:
                          $Approval = "Scholarship_status";
                          break;
                        case 12:
                          $Approval = "Accountant_status";
                          break;
                      }
                      $approved = "SELECT COUNT(*) AS count FROM status WHERE $review_status = 1 and $Approval=1";
                      $result = $connection->query($approved);
                      if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="side-line"></div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="flashcard" id="pending">
              <!-- Card content -->
              <div class="card-body">
                <!-- Card body content -->
                <div class="row">
                  <h3 class="col-md-12 col-sm-12 col-xs-12">Pending</h3>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-4 col-xs-4" style="position: relative">
                    <div class="circle">
                      <?php
                      $pending = "SELECT COUNT(*) AS count FROM status WHERE $review_status = 1 and $Approval=0";
                      $result = $connection->query($pending);
                      if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="side-line"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row" id="overlay">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="flashcard" id="benefited">
            <?php
            include "User counter.php";
            ?>
            <!-- <div class="row">
              <h3 class="col-md-12 col-sm-12 col-xs-12">Number of Benefited Students</h3>
            </div>
            <hr>
            <div class="row">
              <h3 class="col-md-12 col-sm-12 col-xs-12">1200</h3> Add number of benefited students here in plce of 1200 -->
          </div>
        </div>
      </div>

      </div>
    </div>
    </div>
    <script src="../JS/sidebarToggle.js"></script>
  </body>

  </html>
<?php
} else {
  // echo "focus";
  header("Location: ../error/msg_redirect.html");
}
?>