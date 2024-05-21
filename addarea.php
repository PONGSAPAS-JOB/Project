<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php

session_start();

if ($_SESSION['id_admin'] == "") {
    header("location: signin.php");
} else {

?>
    <?php
    include_once('functions.php');
    $userdata = new DB_con();

    if (isset($_POST['insert'])) {
        $name_Area = $_POST['name_Area'];
        $location_Area = $_POST['location_Area'];
        $info_Area = $_POST['info_Area'];
        $Culture_details = $_POST['Culture_details'];
        $img_Area1 = $_POST['img_Area1'];


        $sql = $userdata->addarea($name_Area, $location_Area, $info_Area, $Culture_details, $img_Area1);

        if ($sql) {
            // echo "<script>alert('Add Area Success!');</script>";
            // echo "<script>window.location.href='areaandplacesMG.php'</script>";
            echo   "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Add Area Success!',
                        text: 'กำลังบันทึกข้อมูลสถานที่',
                        icon: 'success',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'areaandplacesMG.php';
                    });
                });
            </script>";
        } else {
            // echo "<script>alert('Add Area Failed!');</script>";
            // echo "<script>window.location.href='addarea.php'</script>";
            echo   "<script>
                $(document).ready(function() {
                    Swal.fire({
                        title: 'Add Area Failed!',
                        text: 'ไม่สามารถเพิ่มสถานที่ได้ โปรดลองอีกครั้ง!',
                        icon: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'addarea.php';
                    });
                });
            </script>";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script type="text/javascript" src="https://api.longdo.com/map/?key=[03c26c7c6f22c8b6d4ad6ce20cc8bd10]"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
        <title>เพิ่มข้อมูลสถานที่ท่องเที่ยวหลัก</title>
    </head>
    <style>
        body {
            margin-top: 0px;
            background-image: url('img/img4.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>

    <body onload="init();">
        <style>
            @font-face {
                font-family: 'Lily Script One';
                src: url('path_to_font_files/linly-script.woff2') format('woff2'),
                    url('path_to_font_files/linly-script.woff') format('woff');

            }

            a {
                font-family: 'Lily Script One', cursive;
            }

            .navbar {
                position: fixed;
                top: 0;
                width: 100%;
                /* Ensures the navbar spans the full width of the viewport */
                z-index: 1000;
                /* Ensure the navbar appears above other content */
                overflow: hidden;
            }


            .navbar-nav {
                margin-left: 21%;
                flex-grow: 1;
                justify-content: center;

            }

            .navbar-nav .nav-item {
                margin-left: 10%;
                align-items: center;
                justify-content: center;

            }

            .collapse .navbar-collapse {
                margin-left: 10%;
                align-items: center;
                justify-content: center;
            }

            .navbar-brand {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .navbar-brand .app-name {
                margin-bottom: -5px;
            }

            .navbar-brand .app-desc {
                font-size: 12px;
            }

            .rounded-circle {
                width: 8%;
                height: 8%;
                margin-right: 3%;
                margin-bottom: -10%;



            }
        </style>



        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <span class="app-name">Theaw-kan-mai App </span>
                    <span class="app-desc">Location information management application</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="homeadmin.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="areaandplacesMG.php">Area/Places Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="white-space: nowrap;" aria-current="page" href="memberMG.php">Member Management</a>
                        </li>


                    </ul>
                    <div>

                        <form class="d-flex justify-content-end ">
                            <a class="navbar-brand " href="#">Welcome, </a>
                            <a class="navbar-brand" href="#">
                                <span class="app-name"><?php echo $_SESSION['username']; ?></span>
                                <span class="app-desc">ผู้ดูเเลระบบ</span>

                            </a>
                            <img src="img/pro.jpg" class="rounded-circle " alt="...">


                            <a class="btn btn-success" type="submit" href="logout.php">ออกจากระบบ</a>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <style>
            .container {
                margin-top: 40px;
                width: 100%;
                /* Set the initial width */
                max-width: 1000px;
                margin-top: 10px;

            }

            #map {
                height: 50%;
            }

            .addplace {
                margin-top: 100px;
                /* Adjusted margin-top to create space between button and cards */
                width: 200px;
                /* Set button width */
                margin-left: 1255px;
                margin-right: auto;
                display: block;
                /* Make the button a block-level element to center it */
                text-align: center;
                /* Center text within the button */
            }
        </style>
        <script>
            function init() {
                var map = new longdo.Map({
                    placeholder: document.getElementById('map')
                });
            }
        </script>
        <?php
        include_once('functions.php');
        $fetchdataarea = new DB_con();
        $sql = $fetchdataarea->fetchdataarea();


        ?>
        <div class="addplace "><a></a></div>
        <div class="container">
            <h1 class="mt-5"> เพิ่มข้อมูลสถานที่ท่องเที่ยวหลัก </h1>
            <hr>

            <form method="post">
                <div class="mb-3">
                    <label for="name_Area" class="form-label">ชื่อสถานที่หลัก</label>
                    <input type="text" class="form-control" id="name_Area" name="name_Area" aria-describedby="ชื่อสถานที่" onblur="nameareacheck(this.value)" required>
                    <span id="areanameavailable"></span>
                </div>
                <div id="map"></div>
                <div class="mb-3">
                    <label for="latitude_Area" class="form-label">Latitude ของสถานที่</label>
                    <input type="text" class="form-control" id="latitude_Area" name="latitude_Area" aria-describedby="Latitude ของสถานที่" required>
                </div>
                <div class="mb-3">
                    <label for="longitude_Area" class="form-label">Longitude ของสถานที่</label>
                    <input type="text" class="form-control" id="longitude_Area" name="longitude_Area" aria-describedby="Longitude ของสถานที่" required>
                </div>
                <div class="mb-3">
                    <label for="address_Area" class="form-label">ที่อยู่ เลขที่ ซอย ถนน</label>
                    <input type="text" class="form-control" id="address_Area" name="address_Area" aria-describedby="ที่อยู่ เลขที่" required>
                </div>
                <div class="mb-3">
                    <label for="sub_dis_Area" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" id="sub_dis" name="sub_dis" aria-describedby="ตำบล" required>
                </div>
                <div class="mb-3">
                    <label for="dis_Area" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" id="dis_Area" name="dis_Area" aria-describedby="อำเภอ" required>
                </div>
                <div class="mb-3">
                    <label for="provi_Area" class="form-label">จังหวัด</label>
                    <input type="text" class="form-control" id="provi_Area" name="provi_Area" aria-describedby="จังหวัด" required>
                </div>
                <div class="mb-3">
                    <label for="post_code" class="form-label">รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" id="post_code" name="post_code" aria-describedby="รหัสไปรษณีย์" required>
                </div>
                <div class="mb-3">
                    <label for="info_Area" class="form-label">ข้อมูลสถานที่</label>
                    <textarea type="text" class="form-control" row="10" id="info_Area" name="info_Area" aria-describedby="ข้อมูลสถานที่" required>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="activityinfo_Area" class="form-label">กิจกรรมที่น่าสนใจ</label>
                    <textarea type="text" class="form-control" row="10" id="activityinfo_Area" name="activityinfo_Area" aria-describedby="กิจกรรมที่น่าสนใจ" required>
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="name_Area" class="form-label"></label>
                    <select class="form-select" id="name_Area" name="name_Area" aria-describedby="ชื่อสถานที่หลัก" required>
                        <!-- Add option elements for each main location -->
                        <option value="" disabled selected>โปรดเลือกสถานที่</option>
                        <?php
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <!-- Ensure to echo the value of name_Area -->
                            <option value='<?php echo $row['name_Area']; ?>'><?php echo $row['name_Area']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="has_map_Area" class="form-label">ลิ้งค์เเผนที่</label>
                    <input type="text" class="form-control" id="has_map_Area" name="has_map_Area" aria-describedby="ลิ้งค์เเผนที่" required>
                </div>
                <div class="mb-3">
                    <label for="phonenum_Area" class="form-label">เบอร์โทรศัพท์ สถานที่</label>
                    <input type="text" class="form-control" id="phonenum_Area" name="phonenum_Area" aria-describedby="เบอร์โทรศัพท์ สถานที่" required>
                </div>
                <div class="mb-3">
                    <label for="email_Area" class="form-label">Email สถานที่</label>
                    <input type="text" class="form-control" id="email_Area" name="email_Area" aria-describedby="Email สถานที่" required>
                </div>
                <div class="mb-3">
                    <label for="url_Area" class="form-label">Link สถานที่ เพิ่มเติม</label>
                    <input type="text" class="form-control" id="url_Area" name="url_Area" aria-describedby="Link สถานที่ เพิ่มเติม" required>
                </div>
                <hr>
                <h2 class="mt-5"> เวลาที่เปิด-ปิด </h2>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                    <label for="ontime_Mon" class="form-label">เวลาเปิด-ปิด วันจันทร์</label>
                    <input type="text" class="form-control" id="ontime_Mon" name="ontime_Mon" aria-describedby="เวลาเปิด-ปิด วันจันทร์" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Tue" class="form-label">เวลาเปิด-ปิด วันอังคาร</label>
                    <input type="text" class="form-control" id="ontime_Tue" name="ontime_Tue" aria-describedby="เวลาเปิด-ปิด วันอังคาร" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Wed" class="form-label">เวลาเปิด-ปิด วันพุธ</label>
                    <input type="text" class="form-control" id="ontime_Wed" name="ontime_Wed" aria-describedby="เวลาเปิด-ปิด วันพุธ" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Thu" class="form-label">เวลาเปิด-ปิด วันพฤหัสบดี</label>
                    <input type="text" class="form-control" id="ontime_Thu" name="ontime_Thu" aria-describedby="เวลาเปิด-ปิด วันพฤหัสบดี" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Fri" class="form-label">เวลาเปิด-ปิด วันศุกร์</label>
                    <input type="text" class="form-control" id="ontime_Fri" name="ontime_Fri" aria-describedby="เวลาเปิด-ปิด วันศุกร์" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Sat" class="form-label">เวลาเปิด-ปิด วันเสาร์</label>
                    <input type="text" class="form-control" id="ontime_Sat" name="ontime_Sat" aria-describedby="เวลาเปิด-ปิด วันเสาร์" required>
                </div>
                <div class="mb-3">
                    <label for="ontime_Sun" class="form-label">เวลาเปิด-ปิด วันอาทิตย์</label>
                    <input type="text" class="form-control" id="ontime_Sun" name="ontime_Sun" aria-describedby="เวลาเปิด-ปิด วันอาทิตย์" required>
                </div>
                <div class="mb-3">
                    <label for="Access_Status" class="form-label">สถานะการเข้าใช้บริการ</label>
                    <input type="text" class="form-control" id="Access_Status" name="Access_Status" aria-describedby="สถานะการเข้าใช้บริการ" required>
                </div>
                <div class="mb-3">
                    <label for="price_in" class="form-label">ค่าเข้าใช้บริการ (ถ้ามี)</label>
                    <input type="text" class="form-control" id="price_in" name="price_in" aria-describedby="ค่าเข้าใช้บริการ" required>
                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">รูปภาพสถานที่</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <button type="submit" name="insert" id="insert" class="btn btn-warning">เเก้ไขข้อมูลสถานที่หลักใหม่</button>

            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            function nameareacheck(val) {
                $.ajax({
                    type: 'POST',
                    url: 'checkarea_available.php',
                    data: 'name_Area=' + val,
                    success: function(data) {
                        $('#areanameavailable').html(data);
                    }
                });

            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>

    </html>

<?php
}
?>