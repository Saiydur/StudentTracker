<?php
class BlogPost{
    private $blogTitle;
    private $blogCategories;
    private $blogText;
    private $blogTags;
    private $userEmail;

    public function __construct($blogTitle,$blogCategories,$blogText,$blogTags,$userEmail)
    {
        $this->blogTitle=$blogTitle;
        $this->blogCategories=$blogCategories;
        $this->blogText=$blogText;
        $this->blogTags=$blogTags;
        $this->userEmail=$userEmail;
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
                'tags'=>$this->blogTags,
                'by'=>$this->userEmail,
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
}