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
 $sql_txt = "select * from students";
 $result = $conn -> query($sql_txt);
$list = [];
if ($result -> num_rows>0){
    while ($row = $result -> fetch_assoc()){
        $list[] = $row;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Students List</title>
</head>
<style>
    .color tr:nth-child(2n-1){
        background-color: #309dbe;
    }
    .color tr:nth-child(2n+2){
        background-color: #e5d189;
    }
</style>
<body>

<h1 style="text-align: center">Danh Sach Sinh Vien</h1>
<a style="color:#000; margin-left: 630px; background-color: pink; padding: 5px" class="color-primary-key" href="addstudents.php">ADD</a><br><br>

<ul>
    <div class="container">
        <table class="table color">
            <thead>
            <tr class="table-danger">
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Email</th>
                <th>NumberPhone</th>
                <th>Option</th>
            </tr>
            </thead>
            <tbody>
                        <?php foreach ($list as $sv): ?>
            <tr>
                    <td>   <?php echo $sv["studentName"];?></td>
                    <td>   <?php echo $sv["dateOfBirth"];?></td>
                    <td>   <?php echo $sv["address"];?></td>
                    <td>   <?php echo $sv["email"];?></td>
                    <td>   <?php echo $sv["phoneNumber"];?></td>
                    <td>
                        <a style="color:#000;" class="color-primary-key" href="editstudent.php ?id=<?php echo $sv["id"];?>">Edit</a><br>
                        <a style="color:#000;" onclick="return confirm('Are you sure?')" class="color-primary-key" href="deletestudent.php ?id=<?php echo $sv["id"];?>">Delete</a><br>
                    </td>
            </tr>
                        <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</ul>

</body>
</html>
