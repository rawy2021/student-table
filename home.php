<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    #conect with database
    $host="localhost";
    $user="root";
    $pass="";
    $db="student1";
    $con=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con ,"select * from student");
    
    #button variable
    $id=" ";
    $name=" ";
    $address=" ";
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['address'])){
        $address = $_POST['address'];
    }
    $sqls="";
    if(isset($_POST['add'])){
        $sqls="insert into student value($id,'$name','$address')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls="delete from student where name='$name'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }

    
    
    
    
    
    
    ?>



    <div id="mother">
        <form action="" method="POST">

        <!--control panel--->
            <aside>
                <div id="div">
                    <img src="https://assets.clever.com/website/regular_website_content/BTS2020_SpotIllo_StudentHome.png" alt="website logo" width="200">
                    <h3>admin panel</h3>
                    <label for="">student number</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label for="">student name</label><br>
                    <input type="text" name="name" id ="name"><br>
                    <label for="">student address</label><br>
                    <input type="text" name="address" id="address"><br><br>
                    <button name="add">student add</button>
                    <button name="del">student delet</button>
                </div>
            </aside>

            <!--show student data--->
            <main>
                <table id="tbl">
                    <tr>
                        <th>serial number</th>
                        <th>student name</th>
                        <th>student address</th>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>" .$row['name']."</td>";
                        echo "<td>" .$row['address']."</td>";
                        echo "</tr>";

                    }
                    
                    ?>
                </table>
            </main>

        </form>
    </div>
</body>
</html>