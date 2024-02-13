<?php
include '../../../connection/connection.php';
session_start();
$userId = $_SESSION['ID'];
$Dept = $_SESSION['Department'];
// echo $Dept;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../Incharges_Requirement/All_Students/searchBar.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-yZ13XalF9uZy3kA7P4N1Q1LIeM0W8aaIe1aLTrUqjcgGx2mH7W4xl1PLOJKP+8B" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- ^^^this is css for search icon-->

    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            font-family: "Helvetica", sans-serif;
        }

        #filters {
            margin-left: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
    <form method="get" id="filters" class="dropdown">
        <span>Fetch result by &nbsp;&nbsp;</span>
        <select name="fetchbranch" id="fetchbranch" class="btn btn btn-secondary dropdown-toggle-split">
            <option value="" disabled="" selected="">Select Filter</option>
            <option value="Computer Engineering">Computer Engineering</option>
            <option value="Electrical Engineering">Electrical Engineering</option>
            <option value="Mechanical Engineering">Mechanical Engineering</option>
            <option value="Civil Engineering">Civil Engineering</option>
        </select>
        <!-- ======================================================== -->
        <select name="graduationYear" id="graduationYear" class="btn btn btn-secondary dropdown-toggle-split">
            <option value="" disabled="" selected="">Select Year of Graduation</option>
            <!-- options are provided through dropYear.js -->
        </select>
        <!-- ========================================================= -->
        <div class="search-container">
            <!-- Remove the nested <form> tag -->
            <input type="text" placeholder="Search by Name or PRN" name="live_search" id="live_search" />
            <button type="submit"><i class="bi bi-search" aria-hidden="true"></i></button>
        </div>
        <br>
        <!-- Move the submit button outside the search-container div -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary d-flex justify-content-center">Submit</button>
        </div>
    </form>


    <div class="">
        <table class="table table-stripped table-hover text-center">
            <thead>
                <tr>
                    <th>PRN</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Section</th>
                    <th>Year_of_grad</th>
                    <th>HOD_Status</th>
                    <th>Fine</th>
                    <th>CC_Lab</th>
                    <th>Library</th>
                    <th>Sports</th>
                    <th>T&P</th>
                    <th>Scholarship</th>
                    <th>Accountant</th>
                    <th></th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody id="try">
                <?php
                include 'query.php';
                $r = mysqli_query($connection, $query);

                // Function to print 'y' or 'n' based on the value
                function printYN($value)
                {
                    return ($value == 1) ? '✅' : '❌';
                }

                while ($row = mysqli_fetch_assoc($r)) {
                ?>

                    <tr>
                        <td> <?php echo $row["PRN"] ?> </td>
                        <td> <?php echo $row["name"] ?> </td>
                        <td> <?php echo $row["Branch"] ?> </td>
                        <td> <?php echo $row["Section"] ?> </td>
                        <td> <?php echo $row["Year_of_grad"] ?> </td>

                        <!--  HOD  Status-->
                        <td> <?php
                                if ($Dept == "First Year Department" || $Dept == "Computer Engineering" || $Dept == "Civil Engineering" || $Dept == "Civil Engineering" || $Dept == "Civil Engineering") {
                                    include 'checkbox_input.php';
                                    generateCheckboxInput($row["PRN"], $row["HOD_status"]);
                                } else {
                                    echo printYN($row["HOD_status"]);
                                }
                                ?>
                        </td>

                        <!-- Fine Department -->
                        <td> <?php
                                if ($Dept == "Fine Department") {
                                    include 'checkbox_input.php';
                                    generateCheckboxInput($row["PRN"], $row["fine_status"]);
                                } else {
                                    echo printYN($row["fine_status"]);
                                }
                                ?>
                        </td>

                        <!-- CC Department -->
                        <td>
                            <?php
                            if ($Dept == "Computer Center") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["CC_status"]);
                            } else {
                                echo printYN($row["CC_status"]);
                            }
                            ?>
                        </td>

                        <!-- Library Department -->
                        <td>
                            <?php
                            if ($Dept == "Library") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["Library_HOD_status"]);
                            } else {
                                echo printYN($row["Library_HOD_status"]);
                            }
                            ?>
                        </td>

                        <!-- Sports Department -->
                        <td>
                            <?php
                            if ($Dept == "Sports") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["Sports_status"]);
                            } else {
                                echo printYN($row["Sports_status"]);
                            }
                            ?>
                        </td>

                        <!-- T&P Department -->
                        <td>
                            <?php
                            if ($Dept == "Training & Placement") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["TNP_status"]);
                            } else {
                                echo printYN($row["TNP_status"]);
                            }
                            ?>
                        </td>

                        <!-- Scholarship department -->
                        <td>
                            <?php
                            if ($Dept == "Scholarship") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["Scholarship_status"]);
                            } else {
                                echo printYN($row["Scholarship_status"]);
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if ($Dept == "Account") {
                                include 'checkbox_input.php';
                                generateCheckboxInput($row["PRN"], $row["Accountant_status"]);
                            } else {
                                echo printYN($row["Accountant_status"]);
                            }
                            ?>
                        </td>
                        <td>
                            <a onclick="toggleQuery('<?php echo $row['PRN']; ?>')" href="../../../Details Page/Details.php?prn='<?php echo $row['PRN']; ?>'">See Details</a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $page && $page > 1; $i++) { ?>
                    <li class="page-item">
                        <form id="paginationForm<?php echo $i; ?>" method="post">
                            <input type="hidden" name="start" value="<?php echo $i; ?>">
                            <button type="submit" class="page-link"><?php echo $i; ?></button>
                        </form>
                    </li>
                <?php } ?>
            </ul>
        </nav>

    </div>

    <!-- <script src="RefreshPage.js"></script> -->
    <script src="../../Incharges_Requirement/All_Students/dropYear.js"></script>
    <!-- <script src="refreshPage.js"></script> -->
</body>

</html>