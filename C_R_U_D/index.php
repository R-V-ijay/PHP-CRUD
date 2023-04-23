<style>
    body {
        width: 100%;
        min-height: 100vh;

    }

    table {
        margin: 100px auto;
    }

    th,
    td {

        padding: 10px;
        width: 100px;
        height: 50px !important;
        background-color: lightblue;
    }

    th {
        text-align: left;
    }

    a {

        font-weight: bold;
    }
</style>


<?php
$connect = mysqli_connect('localhost', 'root', '', 'school');

if (!$connect) {
    die('Data base not connected' . mysqli_connect_error());
} else {
    $fetch_query = "SELECT * FROM students";
    $fetch_result = mysqli_query($connect, $fetch_query);

    $fetch_num_row = mysqli_num_rows($fetch_result); //! Count of Rows

    if ($fetch_num_row > 0) {
        echo "<table>
                <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Age</th>
                <th>Delete</th>
                <th>Update</th>
                </tr>
                </thead>
                <tbody>
                ";
        while ($fetch_row = mysqli_fetch_assoc($fetch_result)) {
            $id = $fetch_row['student_id'];
            echo '<tr>';
            echo '<td>' . $fetch_row['student_id'] . ' </td>';
            echo '<td>' . $fetch_row['student_name'] . '</td>';
            echo '<td>' . $fetch_row['department'] . '</td>';
            echo '<td>' . $fetch_row['Age'] . '</td>';
            echo '<td><a href="delete.php?id=' . $id . ' " onclick="return confrim(\'Are sure to delete this?\')">Delete</a></td>';
            echo '<td><a href="update_form.php?id=' . $id . ' " >Update</a></td>';
            echo '</tr>';

        }
        echo "<tr>
        <td></td>
        <td></td>
        <td> </td>
        <td><a href=add_new.php>Add New Values</a> </td>
        <td> </td>
        <td> </td>
        </tr>";
        echo "</tbody></table>";

    } else {
        echo 'Record is not found';
        echo '<a href="add_new.php">Add New Record</a>';
    }
}


?>