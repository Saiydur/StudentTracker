<?php
include('../Model/UserBlogPosts.php');
$userEmail=$_SESSION['email'];
$postTitle="";
$postCat="";
$blogText="";
$postTags="";
$postTitleErr="";
$postCatErr="";
$blogTextErr="";
$postTagsErr="";
$flag=1;
$result="";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $strToCatArray[]="";
    $strToTagArray[]="";
    if(isset($_POST['postBlog'])){
        $postTitle=$_POST['postTitle'];
        $postCat=$_POST['postCat'];
        $blogText=$_POST['blogText'];
        $postTags=$_POST['postTags'];
        if(empty($postTitle))
        {
            $flag=0;
            $postTitleErr="Title Required";
        }
        else{
            if(strlen($postTitle)<8)
            {
                $flag=0;
                $postTitleErr="Enter At Least 8 Word";
            }
        }
        if(empty($postCat))
        {
            $flag=0;
            $postCatErr="Categorey Required";
        }
        else{
            $strToCatArray=explode(',',$postCat);
            $countCatArray=count($strToCatArray);
            if($countCatArray<1)
            {
                $flag=0;
                $postCatErr="At least one catergorey need";
            }
        }
        if(empty($blogText))
        {
            $flag=0;
            $blogTextErr="Text Required";
        }
        if(empty($postTags)){
            $flag=0;
            $postTagsErr="Tag Required";
        }
        else{
            $strToTagArray=explode(',',$postTags);
            $countTagArray=count($strToTagArray);
            if($countTagArray<1)
            {
                $flag=0;
                $postCatErr="At least one tag need";
            }
        }

        if($flag==1){
            $blog = new BlogPost($postTitle,$strToCatArray,$blogText,$strToCatArray,$userEmail);
            $blogPost=$blog->InsertBlog();
            if($blogPost)
            {
                $result="Posted successfully by ".$userEmail;
            }
            else{
                $result="Error To Post";
            }
        }
    }
}