<?php 
class Account {

    private $con;
    private $errorArray;
    
    
        public function __construct($con){
            $this->con = $con;
            $this->errorArray = array();
        }

        public function login($un,$pw){
            $pw = md5($pw);

            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$un' AND password = '$pw'");

            if(mysqli_num_rows($query) == 1){
                return true;
            }
            else{
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em,$em2);
        $this->validatePassword($pw,$pw2);

        if(empty($this->errorArray) == true){
            //Inserting data into database
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
        }
        else{
            return false;
        }
    }


    public function getError($error){
        //Check if the error exists in the error array
        //if it does, run the error function
        if(!in_array($error, $this->errorArray)){
            $error = "";       
        }
        return "<span class='errorMessage'>$error</span>"; 


    }

            private function insertUserDetails($un, $fn, $ln, $em, $pw){
                    $encryptedPw = md5($pw);
                    $profilePic = "assets/images/profilePics/cena.jpg";
                    $date = date("Y-m-d");


                        //$result will return true or false after querying
                    $result = mysqli_query($this->con,"INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw','$date', '$profilePic')");
                    return $result;
            }

            private function validateUsername($un){
                    if (strlen($un) > 25 || strlen($un) < 5){
                        array_push($this->errorArray, "Username must be between 5 and 25 characters");
                        return;
                    }
                    //todo: check if username exists
                    $checkUsername = mysqli_query($this->con , "SELECT username FROM users WHERE username = '$un'");
                    if(mysqli_num_rows($checkUsername)!=0)//returns how many usernames in db match $un
                    {
                      //if any matches add the error in the array
                        array_push($this->errorArray, Constants::$usernameTaken);
                        return;
                    }
            }
            
            private function validateFirstName($fn){
                if (strlen($fn) > 25 || strlen($fn) < 2){
                    array_push($this->errorArray, "Fisrtname must be between 2 and 25 characters");
                    return;
                }
            }
            
            private function validateLastName($ln){
                if (strlen($ln) > 25 || strlen($ln) < 2){
                    array_push($this->errorArray, "Lastname must be between 2 and 25 characters");
                    return;
                }
            }
    
            private function validateEmails($em,$em2){
                if ($em != $em2){
                    array_push($this->errorArray, "Emails must be the same");
                    return;
                }
                if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
                    array_push($this->errorArray, "Email is invalid");
                    return;
                }
                $checkEmail = mysqli_query($this->con , "SELECT email FROM users WHERE email = '$em'");
                    if(mysqli_num_rows($checkEmail)!=0)//returns how many emails in db match $em
                    {
                      //if any matches add the error in the array
                        array_push($this->errorArray, Constants::$emailTaken);
                        return;
                    }
            

                //todo: check that username hasnt been taken
            }
    
            private function validatePassword($pw,$pw2){
                if ($pw!= $pw2){
                    array_push($this->errorArray, "Passwords do not match");
                    return;
                }
                if(preg_match("/[^a-zA-Z0-9]/", $pw)){
                    array_push($this->errorArray, "Password can only contain letters and numbers");
                    return;
                }

                if (strlen($pw) > 30 || strlen($pw) < 5){
                    array_push($this->errorArray, "Password must be between 5 and 30 characters");
                    return;
                }
            }
    
 }
?>