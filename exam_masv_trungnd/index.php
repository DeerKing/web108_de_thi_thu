<?php 
session_start();
if(isset($_SESSION['arr_nhan_vien'])){
    $arr_nhan_vien = $_SESSION['arr_nhan_vien'];
}else 
    $arr_nhan_vien = [];
    // print_r($arr_nhan_vien);
?>
<!doctype html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>Danh sách nhân viên</h1>
    <a href="create.php">Thêm nhân viên</a>
    <hr>
    <table border="1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Department</td>
            <td>Position</td>
            <td>Email</td>
            <td>Dob</td>
            <td>Image</td>
            <td>Show</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        if(is_array($arr_nhan_vien)){
            foreach($arr_nhan_vien as $id=>$row){
                if (is_array($row)) {
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['dpartment']?></td>
                    <td><?php echo $row['position']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['dob']?></td>
                    <td>
                        <img src="uploads/<?php echo $row['image']?>" alt="" height="100">
                    </td>
                    <td><a href="show.php?id=<?=$row['id']?>">Show</a></td>
                    <td><a href="edit.php?id=<?=$row['id']?>">Sửa</a></td>
                    <td><a href="delete.php?id=<?=$row['id']?>">Xóa</a></td>
                </tr>
                <?php 
                }
            }
        }?>
    </table>

</body>