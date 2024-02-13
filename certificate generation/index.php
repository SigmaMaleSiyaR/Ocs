<?php
include "../connection/connection.php";

if (isset($_POST['prn'])) {
    // Retrieve the PRN value from the POST data
    $prnParam = $_POST['prn'];

    // Fetch student data from the database
    $sql = "SELECT * FROM student WHERE PRN = $prnParam";
    $result = $connection->query($sql);

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row['Firstname'] . " " . $row['Middlename'] . " " .  $row['Lastname'];
        $prn = $row['PRN'];
        $Year_of_Study = $row['Year_of_study'];
        $Branch = $row['Branch'];
        $Section = $row['Section'];

        // Create image
        $font = "Raleway-Regular.ttf";
        $image = imagecreatefromjpeg("format.jpg");
        $color = imagecolorallocate($image, 181, 243, 243);
        imagettftext($image, 40, 0, 500, 850, $color, $font, $name);
        $date = date('Y-m-d');
        imagettftext($image, 40, 0, 570, 1200, $color, $font, $date);

        // Set content type to force download
        header('Content-Type: application/octet-stream');
        // Set a filename for the downloaded image
        header('Content-Disposition: attachment; filename="Clearance_status.jpg"');

        // Save the image to a temporary file
        $temp_file = tempnam(sys_get_temp_dir(), 'certificate_');
        imagejpeg($image, $temp_file);
        imagedestroy($image);

        // Output the temporary file
        readfile($temp_file);

        // Remove the temporary file
        unlink($temp_file);
    }
    // Include any necessary cleanup or additional actions here
    include "../connection/break.php";
} else {
    echo "No PRN parameter provided.";
}
