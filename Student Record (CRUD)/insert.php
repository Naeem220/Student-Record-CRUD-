<?php
include 'db.php';

if(isset($_POST['submit'])){
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $image = $_FILES['image']['name'];
    $tmp   = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "uploads/".$image);

    $sql = "INSERT INTO students(name,email,phone,image)
            VALUES('$name','$email','$phone','$image')";
    mysqli_query($conn,$sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            Name: <br> <input type="text" name="name" required><br><br>
            Email: <br><input type="email" name="email" required><br><br>
            Phone: <br><input type="text" name="phone" required><br><br>
            Image: <br><input type="file" name="image" required><br><br>
            <button name="submit" class="btn btn-primary btn-lg">Save</button>
        </form>
    </div>
</body>

</html>