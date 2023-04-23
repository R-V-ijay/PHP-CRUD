<?php

$connect = mysqli_connect('localhost', 'root', '', 'school');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $fetch_query = "SELECT student_name, department, Age FROM students WHERE student_id = $id";
    $fetch_result = mysqli_query($connect, $fetch_query);
    $num_row = mysqli_num_rows($fetch_result);

    if ($num_row == 1) {
        $row = mysqli_fetch_assoc($fetch_result);
        $student_name = $row['student_name'];
        $department = $row['department'];
        $age = $row['Age'];

        ?>
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
            <form class="container mt-5" action="add_new.php" method="GET">
                <input type="hidden" name="id" value="<?= $id ?>" />
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $student_name ?>" </div>
                    <div class="mb-3">
                        <label class="form-label">Department</label>
                        <input type="text" class="form-control" name="department" value="<?= $department ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" value="<?= $age ?>">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Update" name="submit" />
            </form>
        </body>

        </html>
    <?php } else {
        echo 'record not found';
    }
} else {
    echo 'Your are not allowed';
}
?>