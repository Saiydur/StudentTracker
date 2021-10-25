<?php 
      $message = '';
      $error = '';

      if (isset($_POST['submit'])) {
            if (empty($_POST['title'])) {
                  $error = "Title can't be empty!";
            } else {
                  if (file_exists('../src/Files/uploadNotes.json')) {
                        $current_data = file_get_contents('../src/Files/uploadNotes.json');

                        $array_data = json_decode($current_data, true);

                        $extra = array (
                              'title' => $_POST['title'],
                              'note' => $_POST['textarea']
                        );

                        $array_data[] = $extra;
                        $final_data = json_encode($array_data);

                        if (file_put_contents('../src/Files/uploadNotes.json', $final_data)) {
                              $message = 'Uploaded successfully!';
                        }
                  } else {
                        $error = 'JSON file doesn\'t exist.';
                  }
            }
      }