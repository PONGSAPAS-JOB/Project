<?php

include_once('functions.php');

if (isset($_GET['del'])) {
    $id_places = $_GET['del'];
    $deletedata = new DB_con();
    
    // ตรวจสอบบทบาทของผู้ใช้งาน
    if ($_SESSION['Id_manager'] == 'Id_manager') {
        $sql = $deletedata->deleteplaces($id_places);

        if ($sql) {
            echo "<script>alert('ลบสถานที่เสร็จสิ้น');</script>";
            echo "<script>window.location.href='myplaces.php'</script>";
        }
    } elseif ($_SESSION['id_admin'] == 'id_admin') {
        $sql = $deletedata->deleteplaces($id_places);

        if ($sql) {
            echo "<script>alert('ลบสถานที่เสร็จสิ้น');</script>";
            echo "<script>window.location.href='areaandplacesMG.php'</script>";
        }
    }
}