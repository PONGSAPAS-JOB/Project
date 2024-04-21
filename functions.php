<?php

    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','theawkanmai_7');


    class DB_con {
        public $dbcon; 

        function __construct(){
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            
            $this->dbcon = $conn;

            if (mysqli_connect_error()){
                echo "Failed to connect to MySQL" . mysqli_connect_error();
            }
            
        }

        public function usernameavailable($username) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM manager WHERE username = '$username' ");
            return $checkuser;
        }
        public function emailavailable($useremail) {
            $checkemailuser = mysqli_query($this->dbcon, "SELECT email FROM manager WHERE email = '$useremail' ");
            return $checkemailuser;
        }

        public function registration($username,$useremail,$phone,$password ) {
            $reg = mysqli_query($this->dbcon , "INSERT INTO manager(username,email,phone,password) VALUE('$username','$useremail','$phone','$password')");
            return $reg;
        }

        public function signin($username, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT Id_manager, username  FROM manager WHERE username = '$username' AND password = '$password' " );
            return $signinquery;
        }


//สถานที่
        public function placesnameavailable($name_places) {
            $checkplaces = mysqli_query($this->dbcon, "SELECT name_places FROM places_info WHERE name_places = '$name_places' ");
            return $checkplaces;
        }

        public function addplaces($name_places,$details_places,$contact_places,$id_manager) {
            $adpl = mysqli_query($this->dbcon , "INSERT INTO places_info(name_places, details_places, contact_places ,id_manager) VALUE('$name_places','$details_places','$contact_places','$id_manager')");
            return $adpl;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM places_info");
            return $result;

        }

        public function fetchdataowner($id_manager) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM places_info WHERE id_manager='$id_manager'");
            return $result;

        }

        public function fetchonerecord($id_places) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM places_info WHERE id_places = '$id_places' ");
            return $result;

        }

    

        public function updateplaces($name_places,$details_places,$contact_places, $id_places) {
            $result = mysqli_query($this->dbcon, "UPDATE places_info SET 
                    name_places = '$name_places',
                    details_places = '$details_places',
                    contact_places = '$contact_places'
                    WHERE id_places = '$id_places'
                    ");
                    return $result;
        }


        public function deleteplaces($id_places) {
            $deleteplaces = mysqli_query($this->dbcon, "DELETE FROM places_info WHERE id_places = '$id_places'");
            return $deleteplaces;
        }




    }

?>