<?php
require_once 'config.php';
class UserInfo 
{
    private $firstName;
    private $lastName;
    private $email;
    private $contactNo;
    private $password;
    private $config;

    /**
     * UserInfo constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $contactNo
     * @param $password
     */
    function __construct($firstName,$lastName,$email,$contactNo,$password)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->contactNo=$contactNo;
        $this->password=$password;
        $this->config=new Config();
    }
    //getters
    public function GetFirstName()
    {
        return $this->firstName;
    }
    public function GetLastName()
    {
        return $this->lastName;
    }
    public function GetEmail()
    {
        return $this->email;
    }
    public function GetPassword()
    {
        return $this->password;
    }
    public function GetContactNo()
    {
        return $this->contactNo;
    }
    /**
     * @return mixed;
     */
    public function GetFullName()
    {
        return $this->firstName." ".$this->lastName;
    }

    public function InsertDataToJSON()
    {
        $filedict = '../src/Files/UserInfo.json';
        if(file_exists($filedict)){
            $currentData = file_get_contents($filedict);
            $arrayData = json_decode($currentData,true);
            $newData = array(
                'firstName'=>$this->GetFirstName(),
                'lastName'=>$this->GetLastName(),
                'fullName'=>$this->GetFullName(),
                'contactNo'=>$this->GetContactNo(),
                'email'=>$this->GetEmail(),
                'password'=>$this->GetPassword(),
            );

            $arrayData[]=$newData;
            $jsonData = json_encode($arrayData,JSON_PRETTY_PRINT);

            if(file_put_contents('../src/Files/UserInfo.json',$jsonData)){
                return true;
            }
        }
        else{
            return "File Not Exist";
        }
    }
    
    /**
     * @return bool
     * Check Email Exist or Not
     * If Email Exist then return false
     * If Email Not Exist then return true
     */
    public function CheckEmailExist()
    {
        $sql = "SELECT * FROM userinfo WHERE email = '$this->email'";
        $result = $this->config->ExecuteQuery($sql);
        $flag="";
        if($result->num_rows>0){
            $flag = false;
        }
        else{
            $flag=true;
        }
        return $flag;
    }

    /**
     * 
     * @return int
     * Generate Unique Id
     * if table row = 0 then return 1
     * if table row > 0 then return last row id + 1
     */
    public function GenerateUniqueId()
    {
        $sql = "SELECT uID from userinfo ORDER BY uID desc LIMIT 0,1";
        $result = $this->config->ExecuteQuery($sql);
        $id=0;
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            $id = $row['uID']+1;
        }
        else{
            $id=1;
        }
        return $id;
    }

    /**
     * @return String as Result
     * Insert Data to Database
     */
    public function InsertDataToDB()
    {
        if($this->CheckEmailExist()){
            $result = "";
            $id = $this->GenerateUniqueId();
            $sql = "INSERT INTO userinfo(uID,firstName,lastName,email,contactNo,password,fullName) VALUES('$id','$this->firstName','$this->lastName','$this->email','$this->contactNo','$this->password','{$this->GetFullName()}')";
            $result = $this->config->ExecuteUpdateQuery($sql);
            if($result){
                $result="Registration Successfully";
            }
            else{
                $result="Connection Problem";
            }
        }
        else{
            $result="Email Already Exist";
        }
        return $result;
    }
}