<?php
$connect = mysqli_connect('localhost', 'root', '', 'school');

if (!$connect) {
    die('Data base not connected' . mysqli_connect_error());
} else {
    $fetch_query = "SELECT * FROM students";
    $fetch_result = mysqli_query($connect, $fetch_query);

    $fetch_num_row = mysqli_num_rows($fetch_result); //! Count of Rows

    if ($fetch_num_row > 0) {

        while ($fetch_row = mysqli_fetch_assoc($fetch_result)) {
            echo '<pre>';
            echo $fetch_row['student_id'];
            echo $fetch_row['student_name'];
            echo $fetch_row['department'];
            echo $fetch_row['Age'];
            echo '<pre>';
        }

    } else {
        echo 'Record is not found';
    }
}



?>