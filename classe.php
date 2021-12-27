<?php
    class Main{
        private $db;
        public function __construct($db)
        {
            $this->db = $db;
        }
        public function login()
        {
            if (isset($_POST["login"])) {
                $user  = addslashes(strip_tags($_POST["username"]));
                $password = addslashes(strip_tags($_POST["password"]));
                if (!empty($user) && !empty($password)) {
                   
                     $sql = "SELECT * FROM users WHERE user = :user and password = :password ;";
                    $prepare = $this->db->prepare($sql);
                    $prepare->execute(array('user'=>$user, 'password'=>$password));
                    $row = $prepare->rowCount();
                    if ($row) {
                        $data = $prepare->fetch();
                        $_SESSION["username"] = $data["user"];
                        $_SESSION["username"] = true;
                        header("location:home.php");
                }else{
                     echo'username or password are wrong'; 
                      
                    }  }else {
                        echo"please enter ur info  in fields ";
                  
                }
            }
        }

  
    public function singup()
    {
        if (isset($_POST["singup"])) {
            $user = addslashes(strip_tags($_POST["username"]));
            $password = addslashes(strip_tags($_POST["password"]));
            if (!empty($user) && !empty($password)) {
                $query = "SELECT * FROM users WHERE user = :user ;";
                $pre = $this->db->prepare($query);
                $pre->bindValue(':user',$user);
                $pre->execute();
                $rows = $pre->rowCount();
                if ($rows) {
                    echo"this name is already existed";
                }else {
                    $sql = "INSERT INTO users (user, password) VALUES (:user, :password);";
                $str = $this->db->prepare($sql);
                $str->execute(array("user"=>$user, "password"=>$password));
                $row = $str->rowCount();
                if ($row) {
                    $data = $str->fetch();
                    $_SESSION["username"] = $data["user"];
                    $_SESSION["username"] = true;
                    header("location:home.php");
                }else {
                    echo"somethig wrong";
                }

                }


            }else {
                echo"enter ur data";
            }
            
        }
    
    } 
}
?>