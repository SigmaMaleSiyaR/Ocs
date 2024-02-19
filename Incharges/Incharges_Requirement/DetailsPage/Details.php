<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <!-- ================================================================================================ -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <!-- ================================================================================================ -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- ================================================================================================ -->
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <!-- ================================================================================================ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- ================================================================================================ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script async="" data-id="five-server" data-file="c:\xampp\htdocs\Mini Project 1\Details.html" type="application/javascript" src="/fiveserver.js"></script> -->
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <?php
    // Establish a connection to the database
    include '../../../connection/connection.php';
    if (isset($_GET['prn'])) {
        // Retrieve the PRN value from the URL
        $prnParam = $_GET['prn'];
        $sql = "SELECT * FROM student WHERE PRN = $prnParam"; // Modify this query based on your database schema
        $result = $connection->query($sql);


        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Extract data from the database and assign it to variables
            $firstname = $row['Firstname'];
            $middlename = $row['Middlename'];
            $lastname = $row['Lastname'];
            $college_email = $row['college_email'];
            $phone_no = $row['mobile'];
            $Year_of_Study = $row['Year_of_study'];
            $Branch = $row['Branch'];
            $Section = $row['Section'];
            $Year_of_graduation = $row['Year_of_grad'];
            $PRN = $row['PRN'];
            $Enrollment_No = $row['Enrollment_no'];
            $Date_of_Birth = $row['DOB'];
            $Place_of_Birth = $row['POB'];
            $Nationality = $row['Nationality'];
            $Last_college_attended_prior_to_BIT = $row['L-Clg'];
            $Academic_year_of_admission_in_BIT = $row['YOAdm'];
            $Religion = $row['religion'];
            $Category = $row['category'];
            $Reason_for_TC = $row['desc'];
            $Caution_Money_Status = $row['CauMonStatus'];
    ?>

            <?php
            include 'address.php';
            //  jo adhura address connection.php me di hai usko ... ....agla comment padho
            $basicAddress = FETCH_SRC;
            ?>
            <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        <div class="profile-img">
                            <img src="
                                <?php
                                // ...concatination ki madat se pura kia
                                if (!empty($basicAddress) && !empty($row['ProfilePhoto'])) {
                                    echo  $basicAddress . $row['ProfilePhoto'];
                                } else {
                                    echo  'img/profile picture of person in glasses and orange shirt.png';
                                }

                                ?>
                                " alt="Profile Picture">
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <ul>
                                    <h5>
                                        <?php echo $firstname . " " . $middlename . " " . $lastname ?>
                                    </h5>
                                </ul>
                                <ul>
                                    <p class="profile-rating">STATUS : <span id="status">6/8</span></p>
                                </ul>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item ">

                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="profile-work">
                                <p>College Email-ID</p>
                                <a href="mailto@co.2021.arwarade@bitwardha.ac.in"><?php echo $college_email ?></a><br>
                                <p>Phone No.</p>
                                <a href=""><?php echo $phone_no ?></a><br>
                            </div>
                        </div>



                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>University Roll No.(PRN)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $PRN ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Enrollment No.</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Enrollment_No  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Year of Study</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Year_of_Study  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Branch</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Branch  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Section</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Section  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Year of Graduation</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Year_of_graduation  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Date of Birth</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Date_of_Birth  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Place of Birth</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Place_of_Birth  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nationality</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Nationality  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Last college attended prior to BIT</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Last_college_attended_prior_to_BIT  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Academic Year of admission in BIT</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Academic_year_of_admission_in_BIT  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Religion/Race</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Religion  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Category</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo  $Category  ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        <?php
        }
    } else {
        echo "no prn fetched";
    }
    // Close the database connection
    include "../../../connection/break.php";
        ?>
</body>

</html>