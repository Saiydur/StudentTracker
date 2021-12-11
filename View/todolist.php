<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Todo List</title>
</head>

<body>
    <?php include('../Global/Header.php');?>
    <div class="bg-light">
        <?php include('../Global/UserHeader.php')?>
        <div class="col-md-9 col-lg-10 pl-0 pr-0">
            <div class="jumbotron jumbotron-fluid bg-light mb-0">
                <div class="container">
                    <form action="" method="post">
                        <h1>Enter Your task</h1>
                        <input class="form-control" name="list" type="text" placeholder="Write Your Tasks" /><br>
                        <input id="addBtn" class="btn btn-danger w-100" type="submit" value="Add" name="Add">
                    </form>
                    <h1>Task To Do</h1>
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
                var list = $("input[name='list']").val();
                var email = "<?php echo $_SESSION['email'];?>";
                if(list == ''){
                    alert("Please Enter Your Task");
                }else{
                    let mydata = {
                        list: list,
                        email: email
                    }
                    $.ajax({
                        url: '../Controller/TodoListAddController.php?case=add',
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
                url: '../Controller/TodoListAddController.php?case=get',
                method: 'GET',
                dataType: 'json',
                success:function(data){
                    //console.log(data);
                    if(data){
                        x= data;
                    }
                    else{
                        $("#tableData").css("display","block");
                        x = "";
                    }
                    for(i=0;i<x.length;i++){
                        $("#tableData").css("display","block");
                        $("#tableData").append(`<div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Description: <span id="taskName">${x[i].taskName}</span></h5>
                                <p class="card-text">Task Complete: <span id="taskDone">${x[i].taskDone}</span></p>
                                <span style="display:none;" id="taskId">${x[i].taskId}</span>
                                <button class="btn btn-success editBtn">Mark As Done</button>
                                <button class="btn btn-danger delBtn">Delete</button>
                            </div>
                        </div>`);
                    }
                }
            });
        }
        $(document).on('click','.editBtn',function(){
            let taskName = $(this).parent().find("#taskDone").text();
            let taskId = $(this).parent().find("#taskId").text();
            //console.log(taskId);
            if(taskName == "no"){
                let mydata = {
                    taskId: taskId,
                    taskDone: "yes"
                }
                $.ajax({
                    url: '../Controller/TodoListAddController.php?case=edit',
                    method: 'POST',
                    data: JSON.stringify(mydata),
                    success: function(data) {
                        alert(data);
                        LoadData();
                    }
                });
            }
        });
        $(document).on('click','.delBtn',function(){
            let r=confirm("Are You Sure You Want To Delete This Task?");
            if(r==true){
                let taskId = $(this).parent().find("#taskId").text();
                //console.log(taskId);
                    let mydata = {
                        taskId: taskId,
                    }
                    $.ajax({
                        url: '../Controller/TodoListAddController.php?case=delete',
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