<?php
include 'db.php';
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="w-25 mx-auto">
        <h2>Student Details</h2>
        <div class="w-50 mx-auto mt-5">
            <img src="uploads/<?= $row['image']; ?>" class="img-fluid">
        </div>
        <table class="table table-bordered mt-5">
            <tr>
                <th>Name: </th>
                <td><?= $row['name']; ?></td>
            </tr>
            <tr>
                <th>Email </th>
                <td><?= $row['email']; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= $row['phone']; ?></td>
            </tr>
        </table>

        <a href="index.php" class="btn btn-primary mx-auto">Back</a>
    </div>
</body>

</html>