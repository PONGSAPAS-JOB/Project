<?php

session_start();

if ($_SESSION['id_admin'] == "") {
    header("location: signin.php");
} else {

?>
    <?php
    include_once('functions.php');
    $userdata = new DB_con();
    $updatedata = new DB_con();


    if (isset($_POST['update'])) {
        $id_Area = $_GET['id'];
        $name_Area = $_POST['name_Area'];
        $location_Area = $_POST['location_Area'];
        $info_Area = $_POST['info_Area'];
        $Culture_details = $_POST['Culture_details'];
        $img_Area1 = $_POST['img_Area1'];
        $sql = $updatedata->updateArea($name_Area, $location_Area, $info_Area, $Culture_details, $img_Area1, $id_Area);

        if ($sql) {
            echo "<script>alert('เเก้ไขสถานที่เสร็จสิ้น');</script>";
            echo "<script>window.location.href='Areamanagement.php'</script>";
        } else {
            echo "<script>alert('ไม่สามารถเเก้ไขสถานที่ได้ โปรดลองอีกครั้ง');</script>";
            echo "<script>window.location.href='updateArea.php'</script>";
        }
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
        <title>เเก้ไขสถานที่</title>
    </head>
    <style>
        body {
            margin-top: 0px;
            background-image: url('img/img3.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>

    <body>
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


        <div class="addplace "><a></a></div>
        <div class="container">
            <h1 class="mt-5"> เเก้ไขข้อมูลสถานที่ท่องเที่ยวหลัก </h1>
            <hr>
            <?php

            $id_Area = $_GET['id'];
            $updateArea = new DB_con();
            $sql = $updateArea->fetchonerecordArea($id_Area);
            while ($row = mysqli_fetch_array($sql)) {

            ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="name_Area" class="form-label">ชื่อสถานที่หลัก</label>
                        <input type="text" class="form-control" id="name_Area" name="name_Area" value="<?php echo $row['name_Area']; ?>" aria-describedby="ชื่อสถานที่" required>
                        <span id="areanameavailable"></span>
                    </div>
                    <div class="mb-3">
                        <label for="location_Area" class="form-label">ที่อยู่ของสถานที่</label>
                        <textarea type="text" class="form-control" row="10" id="location_Area" name="location_Area" aria-describedby="ที่อยู่ของสถานที่" required>
                    <?php echo $row['location_Area']; ?>
                    </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="info_Area" class="form-label">ข้อมูลสถานที่</label>
                        <textarea type="text" class="form-control" row="10" id="info_Area" name="info_Area" aria-describedby="ข้อมูลสถานที่" required>
                    <?php echo $row['info_Area']; ?>
                    </textarea>

                    </div>
                    <div class="mb-3">
                        <label for="Culture_details" class="form-label">วัฒนธรรมที่มีในพื้นที่</label>
                        <textarea type="text" class="form-control" row="10" id="Culture_details" name="Culture_details" aria-describedby="วัฒนธรรมที่มีในพื้นที่">
                    <?php echo $row['Culture_details']; ?>
                    </textarea>

                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">รูปภาพสถานที่</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                <?php
            }
                ?>
                <button type="submit" name="update" id="update" class="btn btn-warning">เเก้ไขข้อมูลสถานที่หลักใหม่</button>

                </form>
        </div>






        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    </body>

    </html>

<?php
}
?>