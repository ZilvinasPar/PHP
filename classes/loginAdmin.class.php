<?php
require_once "../config/session.php";
Session::checkLogin();
require_once "../config/config.php";
require_once "../helpers/helpers.php";


class loginAdmin
{
    private $db;
    private $help;

    public function __construct()
    {
        $this->db = new Database();
        $this->help = new Helper();
    }

    public function adminLogin($admin_email, $admin_password){
        $admin_email = $this->help->validation($admin_email);
        $admin_password = $this->help->validation($admin_password);
        
        $admin_email = mysqli_real_escape_string($this->db->link, $admin_email);
        $admin_password = mysqli_real_escape_string($this->db->link, $admin_password);


        if(empty($admin_email)|| empty($admin_password)){
            $loginMessage = "<p>Login as Password cannot be empty!</p>";
            return $loginMessage;
        }else{
            $query = "SELECT * FROM e_admin WHERE admin_email = '".$admin_email."' AND admin_password = '".$admin_password."'";
            $result = $this->db->getRow($query);

            if($result->num_rows > 0){
                $val = $result->fetch_assoc();
                Session::set("adminLogin", true);
                Session::set("admin_name", $val['admin_name']);
                Session::set("admin_username", $val['admin_username']);
                Session::set("admin_email", $val['admin_email']);
                Session::set("admin_password", $val['admin_password']);
                Session::set("access_level", $val['access_level']);
                header("Location: index.php");
            }else{
                $loginMessage = "<p style='text-align: center;'>Username or Password do not match!</p><br>";
                return $loginMessage;
            }
        }
    }

}
