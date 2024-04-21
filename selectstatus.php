<?php 
    session_start();
    include_once('functions.php');
    $userdata = new DB_con();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
body {
    margin-top: 60px;
  background-image: url('img/img1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<style>

      
@font-face {
    font-family: 'Lily Script One';
    src: url('path_to_font_files/linly-script.woff2') format('woff2'), 
        url('path_to_font_files/linly-script.woff') format('woff');

    }
    
h1{
    opacity: 1;
    font-size: 34px;
    font-family: 'Lily Script One', cursive; 
}
h2{
    font-size: 40px;
    font-family: 'Lily Script One', cursive; 
}
h6{
    font-size: 20px;
    font-family: 'Lily Script One', cursive; 
}
button{
    
    font-family: 'Lily Script One', cursive; 
}

input{
    background-color:#FFFFFF;
}

    @import url('https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap');
    .containerbg{
        
          width: 100%; /* Set the initial width */
        max-width: 400px; /* Set the maximum width */
        height: 53vh; /* Allow the height to adjust proportionally */
        margin: 0 auto; /* Center the container */
        transition: transform 0.3s ease; /* Smooth transition when scaling */
        overflow: hidden; 
        margin-top: 0;
        opacity: 0.8;
        border-radius: 20px;
  background-color: #f0f0f0;
  padding: 20px;

}
    .logo{    
        width: 20%;
        opacity: 0.7;
        
    }
   
    .title{
        margin-top: 3%;
        margin-left: 20px;
    }
    .detail{
        margin-left: 20px;
        font-size: 15px;
    }
    .subtitile{
        margin-left: 36%;
        margin-top: 5%;
        margin-bottom: 1rem;
       

    }
    #loginMG{  /*css แบบId*/ 
        font-size: 20px;
    }
    #loginAD{  /*css แบบId*/ 
        font-size: 20px;
    }
    #login{  /*css แบบId*/ 
        font-size: 20px;
    }
    .username{
        margin-top:2rem;
         margin-left: auto;
         margin-right: auto;
         
        
    }
    .form-control{
        width: 80%;
        margin-left: auto;
         margin-right: auto;
         margin-top: 1rem;
         background-color:#FFFFFF;
    }
    .btn{
        
        width: 80%;
        margin-left: 10%;
         margin-right: auto;
         margin-top: 1rem;
         margin-bottom: 1rem;
    }
    #createaccount{
        margin-left: 34%;
       
    }
    .create{
        margin-top: 5%;
    }
    .foget{
        margin-top: 3%;
        margin-left: 65%;
    }
    
</style>
<body >


    <div class = "containerbg" >
    <div class = "title">
        <h1>
            “ Theaw-kan-mai App ”
        </h1>
        <div class ="detail">
        Location information management website
        </div>
        <div class = "subtitile">
            <h2 id="login">
            Login With
            </h2>
            </div>
        

            <button id="loginMG" name="loginMG" class="btn btn-warning" onclick="window.location.href='signinmanager.php'">Manager Account</button>

    
        <hr>

        <button  href="index.php" id="loginAD" name="loginAD" class="btn btn-warning" >Admin Account</button>
       
        
        </div>
        
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</body>
</html>