<?php
class User{
    private $email;
    private $password;

    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

    public function GetUser()
    {
        $result = " ";
        if(file_exists('../src/Files/UserInfo.json')){
            $currentData = file_get_contents('../src/Files/UserInfo.json');
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
}