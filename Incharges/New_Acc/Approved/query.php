<?php
// session_start();
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

$perPage = 5;
$start = 0;
if (isset($_POST['start'])) {
    $start = $_POST['start'];
    $start--;
    $start = $start * $perPage;
}

$query = "select * from status where $department = 1";

$filterBranch = isset($_POST['fetchbranch']) ? $_POST['fetchbranch'] : '';
$filterYear = isset($_POST['graduationYear']) ? $_POST['graduationYear'] : '';
$searchText = isset($_POST['live_search']) ? $_POST['live_search'] : '';


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
