<?php
class UserInfo 
{
    private $firstName;
    private $lastName;
    private $email;
    private $contactNo;
    private $password;

    function __construct($firstName,$lastName,$email,$contactNo,$password)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->contactNo=$contactNo;
        $this->password=$password;
    }
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
    public function GetFullName()
    {
        return $this->firstName." ".$this->lastName;
    }

    public function InsertDataToJSON()
    {
        if(file_exists('../src/Files/UserInfo.json')){
            $currentData = file_get_contents('../src/Files/UserInfo.json');
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
}
