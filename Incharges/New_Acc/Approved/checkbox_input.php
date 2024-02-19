<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .d-flex {
            gap: 20px;
        }
    </style>
    <?php
    if (!function_exists('generateCheckboxInput')) {
        function generateCheckboxInput($prn, $status)
        {
            echo
            '   
                <form id="myForm_' . $prn . '" class="d-flex flex-row" action="update_status.php" method="post">
                    <input type="checkbox" name="status[' . $prn . ']" value="1" ' . ($status ? 'checked' : '') . ' ">
                    <button type="button" class="btn btn-outline-success" data-toggle="button" aria-pressed="false" autocomplete="off" onclick="submitForm(\'' . $prn . '\')">Confirm</button>
                </form>
            ';
        }
    }
    ?>



    <script>
        function submitForm(prn) {

            var checkboxValue = document.getElementsByName("status[" + prn + "]")[0].checked ? 1 : 0;
            // Make an AJAX request
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Replace the entire table body with the updated content
                    document.getElementById("try").innerHTML = xhr.responseText;
                }
            };
            //jaise hi incharge confirm button dabaega table refresh ho jaega
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("prn=" + prn + "&checkboxValue=" + checkboxValue);
        }
    </script>
</body>

</html>