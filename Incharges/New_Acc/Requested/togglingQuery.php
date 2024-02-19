<?php
session_start();
$Dept = $_SESSION['Department'];
$department = "";

switch ($_SESSION['Department']) {
    case 'Fine Department':
        $department = "fine_status";
        $reviewed = "Review_fine";
        break;
    case 'Computer Center':
        $department = "CC_status";
        $reviewed = "Review_CC";
        break;
    case 'Library':
        $department = "Library_HOD_status";
        $reviewed = "Review_Library";
        break;
    case 'Sports':
        $department = "Sports_status";
        $reviewed = "Review_Sports";
        break;
    case 'Training & Placement':
        $department = "TNP_status";
        $reviewed = "Review_TNP";
        break;
    case 'Scholarship':
        $department = "Scholarship_status";
        $reviewed = "Review_Scholarship";
        break;
    case 'Account':
        $department = "Accountant_status";
        $reviewed = "Review_Accountant";
        break;
    case 'First Year Department':
        $department = "HOD_status";
        $reviewed = "Review_HOD";
        break;
    case 'Computer Engineering':
        $department = "HOD_status";
        $reviewed = "Review_HOD";
        break;
    case 'Electrical Engineering':
        $department = "HOD_status";
        $reviewed = "Review_HOD";
        break;
    case 'Civil Engineering':
        $department = "HOD_status";
        $reviewed = "Review_HOD";
        break;
    case 'Mechanical Engineering':
        $department = "HOD_status";
        $reviewed = "Review_HOD";
        break;
    default:
        // Handle default case if necessary
        break;
}


include '../../../connection/connection.php';
// Connect to the database and handle errors appropriately

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prn_passed = $_POST["prn"];

    // Your SQL query
    $toggleSQL = "UPDATE `status` SET `$reviewed` = '1' WHERE PRN = '$prn_passed'";
    echo $toggleSQL;
    // Execute the query
    $result = $connection->query($toggleSQL);

    if ($result) {
        echo "Update successful"; // Send a response back to the client if needed
    } else {
        echo "Update failed";
    }
}
?>
<script>
    <?php
    if ($result) {
    ?>
        console.log("Update successful");
    <?php
    } else {
    ?>
        alert('Error in fetching details,try again after sometime');
    <?php
    }
    ?>
</script>