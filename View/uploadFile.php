<?php
include_once '../Model/config.php';
session_start();
$email = $_SESSION['email'];
$conn = new Config();
      if(isset($_POST['submit'])) {
            $file = $_FILES['file'];

            $fileName = basename($_FILES["file"]["name"]);
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');

            $noteTitle = $_POST['title'];
            $noteDesc = $_POST['textarea'];

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 5000000) {
                              $fileNewName = uniqid('', true).".".$fileActualExt;

                              $fileDestination = '../src/uploads/'.$fileNewName;
                              move_uploaded_file($fileTmpName, $fileDestination);
                              $sqlGetUserId = "SELECT uID FROM userinfo WHERE email='$email'";
                              if($result = $conn->ExecuteQuery($sqlGetUserId)){
                                    $row = mysqli_fetch_assoc($result);
                                    $userId = $row["uID"];
                                    $sql = "INSERT INTO `uploadnotes`(`notes`, `userID`, `notesTitle`, `noteFile`) VALUES ('$noteDesc','$userId','$noteTitle','$file')";
                                    $result = $conn->ExecuteUpdateQuery($sql);
                                    if($result)
                                    {
                                          echo "File Added Successfully";
                                          header("Location: ./uploadNotes.php?upload=success");
                                    }
                                    else
                                    {
                                          echo "File Not Added";
                                          header("Location: ./uploadNotes.php?upload=error");
                                    } 
                              }
                              else{
                                    echo "User Not Found";
                                    header("Location: ./uploadNotes.php?upload=error");
                              }
                        } else {
                              echo "Your file is too big!";
                              header("Location: ./uploadNotes.php?upload=error");
                        }
                  } else {
                        echo "There was an error uploading your file!";
                        header("Location: ./uploadNotes.php?upload=error");
                  }
            } else {
                  echo "You can not upload files of this type.<br>";
                  header("Location: ./uploadNotes.php?upload=error");
            }
      }