<?php
      if(isset($_POST['submit'])) {
            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');

            if (in_array($fileActualExt, $allowed)) {
                  if ($fileError === 0) {
                        if ($fileSize < 5000000) {
                              $fileNewName = uniqid('', true).".".$fileActualExt;

                              $fileDestination = '../src/uploads/'.$fileNewName;
                              move_uploaded_file($fileTmpName, $fileDestination);
                              echo "File Uploaded Successfully<br>";
                              echo "<a href='../View/uploadNotes.php'>Back</a>";
                        } else {
                              echo "Your file is too big!";
                        }
                  } else {
                        echo "There was an error uploading your file!";
                  }
            } else {
                  echo "You can not upload files of this type.<br>";
                  echo "<a href='../View/uploadNotes.php'>Back</a>";
            }
      }