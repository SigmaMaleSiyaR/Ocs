<!-- ye tab page ko reload karta hai jab swayam incharge status change kare -->
<!-- called by js of checkbox_input.php -->
<?php
session_start();
$Dept = $_SESSION['Department'];
$department = "";

switch ($_SESSION['Department']) {
    case 'Fine Department':
        $department = "fine_status";
        break;
    case 'Computer Center':
        $department = "CC_status";
        break;
    case 'Library':
        $department = "Library_HOD_status";
        break;
    case 'Sports':
        $department = "Sports_status";
        break;
    case 'Training & Placement':
        $department = "TNP_status";
        break;
    case 'Account':
        $department = "Accountant_status";
        break;
    case 'First Year Department':
        $department = "HOD_status";
        break;
    case 'Computer Engineering':
        $department = "HOD_status";
        break;
    case 'Electrical Engineering':
        $department = "HOD_status";
        break;
    case 'Civil Engineering':
        $department = "HOD_status";
        break;
    case 'Mechanical Engineering':
        $department = "HOD_status";
        break;
    case 'Scholarship':
        $department = "Scholarship_status";
        break;
    default:
        // Handle default case if necessary
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include '../../../connection/connection.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $prn = $_POST["prn"];
        $checkboxValue = $_POST["checkboxValue"];

        // Update the database - Example using MySQLi
        $updateSQL = "UPDATE status SET $department = $checkboxValue WHERE PRN = '$prn'";
        $result = $connection->query($updateSQL);

        if ($result === false) {
            // Query execution failed, handle the error
            die("Update failed: " . $connection->error);
        }


        include 'query.php';
        $r = mysqli_query($connection, $query);

        if (!$r) {
            die("Invalid query: " . $connection->error);
        }

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
                <!-- Accountant Department -->
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
                    <a href="../../../Details Page/Details.php?prn='<?php echo $row['PRN']; ?>'">See Details</a>
                </td>
            </tr>

    <?php
        } //closing of while

        // Close the database connection
        include "../../../connection/break.php";
    }
    ?>
</body>

</html>