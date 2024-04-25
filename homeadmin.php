<?php

    session_start();

    if ($_SESSION['id_admin'] == "") {
        header("location: signin.php");

    } else {

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
    <title>หน้าหลัก admin</title>
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
    width: 8% ;
    height: 8%;
    margin-right: 3%;
    margin-bottom: -10%;
  
  }

</style>



<nav class="navbar navbar-expand-lg navbar-light bg-warning " style="position: fixed;">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
      <span class="app-name">Theaw-kan-mai App</span>
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
      <a class="navbar-brand " href="#">Welcome,  </a> 
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




/* .containercard{
    margin-top: 60px;
  } */



</style>





</body>
</html>


<?php
    }
?>