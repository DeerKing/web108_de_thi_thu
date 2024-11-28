<?
session_start();
$id = $_GET['id'];
if($id >= 0)
    $nhan_vien = $_SESSION['arr_nhan_vien'][$id]
?>
<table>
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Department</td>
        <td>Position</td>
        <td>Email</td>
        <td>Dob</td>
        <td>Image</td>
       
    </tr>
    <tr>
        <td><?=$id?></td>       
        <td><?php echo $nhan_vien['name']?></td>
        <td><?php echo $nhan_vien['dpartment']?></td>
        <td><?php echo $nhan_vien['position']?></td>
        <td><?php echo $nhan_vien['email']?></td>
        <td><?php echo $nhan_vien['dob']?></td>
        <td><img src="uploads/<?php echo $nhan_vien['image']?>" alt="" height="100"></td>
    </tr>
</table>