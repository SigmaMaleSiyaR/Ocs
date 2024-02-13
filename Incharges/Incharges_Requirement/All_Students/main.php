<?php
include '../../../connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Document</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica", sans-serif;
        }

        #filters {
            margin-left: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>
    <!-- ================================================================================= -->
    <link rel="stylesheet" href="searchBar.css">
    <!--================================================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--================================================================================== -->
</head>

<body>
    <div id="filters" class="dropdown">
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
            <form>
                <input type="text" placeholder="Search by Name or PRN" name="live_search" id="live_search" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- ========================================================================================================== -->
    <!-- ========================================================================================================== -->

    <div class="whole_table">
        <table class="table table-hover text-center">
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
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from status";
                $perPage = 5;
                $start = 0;
                if (isset($_POST['start'])) {
                    $start = $_POST['start'];
                    $start--;
                    $start = $start * $perPage;
                }

                $record = mysqli_num_rows(mysqli_query($connection, $query));
                $page = ceil($record / $perPage);


                $query .= " LIMIT $start,$perPage";

                // echo $query;

                $r = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($r)) {
                ?>
                    <tr>
                        <td> <?php echo $row["PRN"] ?> </td>
                        <td> <?php echo $row["name"] ?> </td>
                        <td> <?php echo $row["Branch"] ?> </td>
                        <td> <?php echo $row["Section"] ?> </td>
                        <td> <?php echo $row["Year_of_grad"] ?> </td>
                        <td> <?php echo $row["HOD_status"] ?> </td>
                        <td> <?php echo $row["fine_status"] ?> </td>
                        <td> <?php echo $row["CC_status"] ?> </td>
                        <td> <?php echo $row["Library_HOD_status"] ?> </td>
                        <td> <?php echo $row["Sports_status"] ?> </td>
                        <td> <?php echo $row["TNP_status"] ?> </td>
                        <td> <?php echo $row["Scholarship_status"] ?> </td>
                        <td> <?php echo $row["Accountant_status"] ?> </td>
                        <td>
                            <a href="../../../Details Page/Details.php?prn='<?php echo $row['PRN']; ?>'">See Details</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fetchbranch, #graduationYear").on('change', function() {
                var branchValue = $("#fetchbranch").val();
                var yearValue = $("#graduationYear").val();
                console.log("ye select kia " + branchValue);
                $.ajax({
                    url: "filter+Search_algorithm.php",
                    type: "POST",
                    data: {
                        'branch': branchValue,
                        'year': yearValue
                    },
                    beforeSend: function() {
                        $(".whole_table tbody").html("<tr><td colspan='14'>Working...</td></tr>");
                    },
                    success: function(data) {
                        $(".whole_table tbody").html(data);
                    }
                });
            });
        });
    </script>
    <!-- ======================================================================================================= -->
    <script src="dropYear.js"></script>
    <!-- ======================================================================================================= -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                // alert(input);

                if (input != "") {
                    $.ajax({
                        url: "filter+Search_algorithm.php",
                        method: "POST",
                        data: {
                            'text': input
                        },

                        beforeSend: function() {
                            $(".whole_table tbody").html("<tr><td colspan='14'>Working...</td></tr>");
                        },
                        success: function(data) {
                            $(".whole_table tbody").html(data);
                        }
                    })
                }
            })
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".pagination button").click(function() {
                $(this).closest("form").submit();
            });
        });
    </script>

</body>

</html>