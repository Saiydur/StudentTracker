<?php
require_once 'config.php';
class User{
    private $email;
    private $password;
    private $config;
    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
        $this->config=new Config();
    }

    public function GetUser()
    {
        $filedict='../src/Files/UserInfo.json';
        $result = " ";
        if(file_exists($filedict)){
            $currentData = file_get_contents($filedict);
            $parseData = json_decode($currentData,true);
            if($parseData!=null){
            foreach($parseData as $data){
                if($data['email']==$this->email){
                    if($data["password"]==$this->password){
                        $result="True";
                        break;
                    }
                    else{
                        $result="Incorrect Password";
                    }
                }
                else{
                    $result="Email Not Found";
                }
            }
        }
        else{
            $result="No Data In File";
        }
        }
        else{
            $result="File Not Found";
        }
        return $result;
    }

    public function GetUserFromDB()
    {
        $sql="SELECT * FROM userlist WHERE email='$this->email' and password='$this->password'";
        if($result=$this->config->ExecuteQuery($sql)){
            $rows=$result->fetch_assoc();
            $result = $rows;
        }
        else{
            $result=null;
        }
        return $result;
    }
}