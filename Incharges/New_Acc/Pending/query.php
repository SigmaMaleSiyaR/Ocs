<?php
// session_start();
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

// $query = "select * from status where $department = 0 and $reviewed = 1";

// Get filter and search parameters
$filterBranch = isset($_GET['fetchbranch']) ? $_GET['fetchbranch'] : '';
$filterYear = isset($_GET['graduationYear']) ? $_GET['graduationYear'] : '';
$searchText = isset($_GET['live_search']) ? $_GET['live_search'] : '';


$perPage = 5;
$start = 0;
if (isset($_POST['start'])) {
    $start = $_POST['start'];
    $start--;
    $start = $start * $perPage;
}


// Modify your SQL query based on the parameters
$query = "SELECT * FROM status WHERE $department = 0 AND $reviewed = 1";

if (!empty($filterBranch)) {
    $query .= " AND Branch = '$filterBranch'";
}

if (!empty($filterYear)) {
    $query .= " AND Year_of_grad = '$filterYear'";
}

if (!empty($searchText)) {
    $query .= " AND (`name` LIKE '%$searchText%' OR PRN LIKE '%$searchText%')";
}

$record = mysqli_num_rows(mysqli_query($connection, $query));
$page = ceil($record / $perPage);


$query .= " LIMIT $start,$perPage";

// echo $query;
