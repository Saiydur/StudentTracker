<?php
require_once 'config.php';
class BlogPost{
    private $blogTitle;
    private $blogCategories;
    private $blogText;
    private $blogTags;
    private $userEmail;
    private $blogDate;
    private $config;

    public function __construct($blogTitle,$blogCategories,$blogText,$blogTags,$userEmail,$blogDate)
    {
        $this->blogTitle=$blogTitle;
        $this->blogCategories=$blogCategories;
        $this->blogText=$blogText;
        $this->blogTags=$blogTags;
        $this->userEmail=$userEmail;
        $this->blogDate=$blogDate;
        $this->config=new Config();
    }

    public function InsertBlog()
    {
        if(file_exists('../src/Files/UserBlogs.json')){
            $currentData = file_get_contents('../src/Files/UserBlogs.json');
            $arrayData = json_decode($currentData,true);
            $newData = array(
                'title'=>$this->blogTitle,
                'catergories'=>$this->blogCategories,
                'post'=>$this->blogText,
                'tags'=>$this->blogText,
                'by'=>$this->blogText,
            );

            $arrayData[]=$newData;
            $jsonData = json_encode($arrayData,JSON_PRETTY_PRINT);

            if(file_put_contents('../src/Files/UserBlogs.json',$jsonData)){
                return true;
            }
        }
        else{
            return "File Not Exist";
        }
    }
    //make function which will convert array to string
    public function ConvertArrayToString($array)
    {
        $string="";
        foreach ($array as $key=>$value){
            $string.=$value."\n";
        }
        return $string;
    }
    public function InsertBlogToDB()
    {
        $this->blogCategories=$this->ConvertArrayToString($this->blogCategories);
        $this->blogTags=$this->ConvertArrayToString($this->blogTags);
        $sql ="INSERT INTO `blogs`(`blogTitle`, `blogCategories`, `blogText`, `blogTags`, `userEmail`, `postingDate`) 
        VALUES ('$this->blogTitle','$this->blogCategories','$this->blogText','$this->blogTags','$this->userEmail','$this->blogDate')";
        $results="";
        if($this->config->ExecuteUpdateQuery($sql)){
            $results="Blog Posted Successfully";
        }
        else{
            $results="Connection Problem";
        }
        return $results;
    }

    public function GetAllBlogs()
    {
        $sql ="SELECT * FROM `blogs`";
        $results="";
        if($result=$this->config->ExecuteQuery($sql)){
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
        else{
            $results=null;
        }
        return $results;
    }

}