<?php
$severName = "localhost";
$userName = "root";
$password = "";
$dbName = "t2108m";
// connect db
$conn = new mysqli($severName,$userName,$password,$dbName);
if($conn -> connect_error){
    die($conn -> connect_error);
}
$sql_txt = "select * from students where id=".$_GET["id"];
$result = $conn -> query($sql_txt);
$student = null;
if ($result -> num_rows>0){
    while ($row = $result -> fetch_assoc()){
        $student = $row;
    }
}
if ($student == null){
    die("Student Not Found");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Student</title>
</head>

<body>
<div class="container">
    <div class=" row justify-content-around">
        <form action="updatestudent.php?id=<?php echo $student["id"];?>" method="post" class="col-md-6 bg-light p-3 my-3">
            <h2 class="text-center h3 py-3">Edit Student</h2>
            <div class="form-group">
                <label for="name1">Name:</label>
                <input type="text" value="<?php echo $student["studentName"];?>" required class="form-control" id="name1" placeholder="Full Name" name="name1">
            </div>
            <div class="form-group">
                <label for="date1">Date:</label>
                <input type="date" value="<?php echo $student["dateOfBirth"];?>" required class="form-control" id="date1" placeholder="Date Of Birth" name="date1">
            </div>
            <div class="form-group">
                <label for="address1">Address:</label>
                <input type="text" value="<?php echo $student["address"];?>" required class="form-control" id="address1" placeholder="Address" name="address1">
            </div>
            <div class="form-group">
                <label for="email1">Email:</label>
                <input type="email" value="<?php echo $student["email"];?>" class="form-control" id="email1" placeholder="Email" name="email1">
            </div>
            <div class="form-group">
                <label for="phone1">Phone:</label>
                <input type="tel" value="<?php echo $student["phoneNumber"];?>" required class="form-control" id="phone1" placeholder="Number Phone" name="phone1">
            </div><br>
            <button  type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>

</div>
</body>
</html>