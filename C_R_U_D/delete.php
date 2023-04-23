<?php
$connect = mysqli_connect('localhost', 'root', '', 'school');

if (!$connect) {
    die('Data base not connected' . mysqli_connect_error());
} else {


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_query = "DELETE FROM students WHERE student_id =$id";

        $delete_result = mysqli_query($connect, $delete_query);
        if ($delete_query) {
            echo "Data deteled successfully";
            header('Location: index.php');
        } else {
            echo "cann't delete data";
        }


    }
}


?>