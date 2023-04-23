<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>form</title>
</head>

<body>
    <form class="container mt-5" method="GET">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Department</label>
            <input type="text" class="form-control" name="department">
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age">
        </div>

        <input type="submit" class="btn btn-primary" value="submit" name="submit" />
    </form>
</body>

</html>


<?php

$connect = mysqli_connect('localhost', 'root', '', 'school');

if (!$connect) {
    die('Data base not connected' . mysqli_connect_error());
} else {


    if (isset($_GET['submit']) && $_GET['submit'] == 'submit') {
        $full_name = $_GET['name'];
        $department = $_GET['department'];
        $age = $_GET['age'];

        $insert_query = "INSERT INTO students(student_name,department,Age) VALUES('$full_name','$department','$age')";

        $insert_result = mysqli_query($connect, $insert_query);
        if ($insert_result) {
            echo "new data added";

        } else {
            echo "cann't add new data";
        }

        header('Location: index.php');

    } else if (isset($_GET['submit']) && $_GET['submit'] == 'Update') {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $dep = $_GET['department'];
        $age = $_GET['age'];

        $update_query = "UPDATE students SET student_name='$name',department='$dep',Age='$age' WHERE student_id = '$id'";
        $update_result = mysqli_query($connect, $update_query);
        if ($update_result) {
            echo "Data Updated successfully";
            header('Location: index.php');
        } else {
            echo "cann't Update data";
        }
    }
}

?>