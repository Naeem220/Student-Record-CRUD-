<?php
include 'db.php';
$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($_FILES['image']['name']){
        $image = $_FILES['image']['name'];
        $tmp   = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp,"uploads/".$image);

        mysqli_query($conn,"UPDATE students SET name='$name', email='$email', phone='$phone', image='$image' WHERE id=$id");
    } else {
        mysqli_query($conn,"UPDATE students SET
            name='$name', email='$email', phone='$phone'
            WHERE id=$id");
    }

    header("Location: index.php");
}

if(isset($_POST['del']))
    {
        $del="UPDATE students SET image = '' WHERE id='$id'";
        unlink("uploads/".$row['image']);
        mysqli_query($conn,$del);
        header("Location: edit.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <label>
                Name <br> <input type="text" name="name" value="<?= $row['name']; ?>" class="my-2">
            </label> <br>
            <label>
                Email <br> <input type="email" name="email" value="<?= $row['email']; ?>"class="my-2">
            </label>
            <br>
           <label>
             Phone <br> <input type="text" name="phone" value="<?= $row['phone']; ?>"class="my-2">
           </label>
            <br>
            <label>
                Image  <br>
                <?php 
                if($row['image']!=''){
                ?>
                <div class="w-25 position-relative" >
                    <img src="uploads/<?php echo $row['image'];?>" class="img-fluid">
                    <button class="btn btn-outline-danger position-absolute top-0 end-0 m-2" name="del">⨉</button>

                </div>
                <?php
                }
                else{
                ?>
                    <input type="file" name="image"class="my-2">
                <?php
                }
                ?>
            </label>
            <br><br>
            <button name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</body>

</html>