<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Track Marks</title>
    <link rel="stylesheet" href="../src/CSS/marks.css">
</head>
<body>

<?php include('../Global/Header.php');
?>
        <div class="bg-light" id="container">
            <?php include('../Global/UserHeader.php'); ?>
            <div class="col-md-9 col-lg-10 pl-0 pr-0">
                <div class="jumbotron jumbotron-fluid bg-light mb-0">
                    <div class="container">
                        <h1>Track Your Marks</h1>
                        <!--  Write Your Code From Here -->
                        <form action="" method="post">
                            <input type="text" class="form-control marks-institution-name-input" id="institution-name" placeholder="Institution name" aria-label="Institution Name" aria-describedby="basic-addon2" name="institution-name">
<br>
                            <input type="text" class="form-control marks-semester-name-input" placeholder="Semester name" aria-label="Semester Name" aria-describedby="basic-addon2" name="semester-name">
<br>
                            <input type="text" class="form-control" id="marks-course-number-input" placeholder="Course Name" aria-label="Course Name" aria-describedby="basic-addon2" name='course-name'>
<br>
                            <input type="text" class="form-control" id="marks-course-number-input" placeholder="CGPA" aria-label="CGPA" aria-describedby="basic-addon2" name='cgpa'>
<br>
                            <input id="addBtn" class="btn btn-info w-100 mb-5" type="submit" value="Upload" name="Upload">
<br>
                        </form>
                        <div style="display: none;" id="tableData">

                        </div>   
                    </div> 
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function() {
            LoadData();
            $("#addBtn").click(function(e) {
                e.preventDefault();
                var institutionName = $("input[name='institution-name']").val();
                var semesterName = $("input[name='semester-name']").val();
                var courseName = $("input[name='course-name']").val();
                var cgpa = $("input[name='cgpa']").val();
                var email = "<?php echo $_SESSION['email'];?>";
                if(institutionName == '' || semesterName == '' || courseName == '' || cgpa == '') 
                {
                    alert("Please fill all the fields");
                }
                else
                {
                    let mydata = {
                        institutionName: institutionName,
                        semesterName: semesterName,
                        courseName: courseName,
                        cgpa: cgpa,
                        email: email
                    }
                    $.ajax({
                        url: '../Controller/uploadMarksAction.php?case=add',
                        method: 'POST',
                        data: JSON.stringify(mydata),
                        success: function(data) {
                            alert(data);
                            LoadData();
                        }
                    });
                }
            });
        });

        function LoadData(){
            // reset table data
            $("#tableData").html('');
            $.ajax({
                url: '../Controller/uploadMarksAction.php?case=get',
                method: 'GET',
                dataType: 'json',
                success:function(data){
                    //console.log(data);
                    if(data){
                        x= data;
                    }
                    else{
                        $("#tableData").css("display","none");
                        x = "";
                    }
                    for(i=0;i<x.length;i++){
                        $("#tableData").css("display","block");
                        $("#tableData").append(`<div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Institution Name: <span id="institutionName">${x[i].institution_name}</span></h5>
                                <h5 class="card-title">Semester Name: <span id="semesterName">${x[i].semester_name}</span></h5>
                                <h5 class="card-title">Course Name: <span id="courseName">${x[i].course_name}</span></h5>
                                <h5 class="card-title">CGPA: <span id="cgpa">${x[i].cgpa}</span></h5>
                                <span style="display:none;" id="marksId">${x[i].marksId}</span>
                                <button class="btn btn-danger delBtn">Delete</button>
                            </div>
                        </div>`);
                    }
                }
            });
        }

        $(document).on('click','.delBtn',function(){
            let r=confirm("Are You Sure You Want To Delete This Task?");
            if(r==true){
                let marksId = $(this).parent().find("#marksId").text();
                //console.log(taskId);
                    let mydata = {
                        marksId: marksId,
                    }
                    $.ajax({
                        url: '../Controller/uploadMarksAction.php?case=delete',
                        method: 'POST',
                        data: JSON.stringify(mydata),
                        success: function(data) {
                            alert(data);
                            LoadData();
                        }
                    });
            }
        });
    </script>
</body>
</html>