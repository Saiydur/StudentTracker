function courseNameCGPA() {
      var inputNumber = document.getElementById('marks-course-number-input').value;

      if (inputNumber > 7) {
            alert('Course number can\'t be greater than 7');
      }   
      else if (inputNumber < 1) {
            alert('Course number can\'t be less than 1');
      }
      else {
            for (var i = 0; i < inputNumber; i++) {
                  var wholeForm = document.createElement('div');
                  wholeForm.setAttribute('id', 'marks-css');

                        
                  wholeForm.setAttribute('style', 'margin:20px;');


                  var form = document.createElement('form');
                  form.setAttribute('method', 'post');
                  form.setAttribute('class', 'needs-validation');
         
                        
                  var formRowDiv = document.createElement('div');
                  formRowDiv.setAttribute('class', 'form-row');
                  formRowDiv.setAttribute('id', 'form-row-div');
   
                        
                  var courseNameDiv = document.createElement('div');
                  courseNameDiv.setAttribute('class', 'col-md-4');
                  courseNameDiv.setAttribute('class', 'mb-3');
                  courseNameDiv.setAttribute('class', 'course-name-div');
                  courseNameDiv.setAttribute('style', 'margin:5px;');
                        
      
                  var courseNameInput = document.createElement('input');
                  courseNameInput.setAttribute('type', 'text');
                  courseNameInput.setAttribute('class', 'form-control');
                  courseNameInput.setAttribute('id', 'validationCustom01');
                  courseNameInput.setAttribute('name', 'Course Name');
                  courseNameInput.setAttribute('placeholder', 'Enter Course Name');
                  courseNameInput.setAttribute('style', 'padding:10px;');
                  courseNameInput.required = true;

                        
                  var cgpaDiv = document.createElement('div');
                  cgpaDiv.setAttribute('class', 'col-md-4');
                  cgpaDiv.setAttribute('class', 'mb-3');
                  cgpaDiv.setAttribute('class', 'cgpa-div');
                  cgpaDiv.setAttribute('style', 'margin:5px;');
      
                  var cgpaInput = document.createElement('input');
                  cgpaInput.setAttribute('type', 'number');
                  cgpaInput.setAttribute('class', 'form-control');
                  cgpaInput.setAttribute('id', 'validationCustom02');
                  cgpaInput.setAttribute('name', 'CGPA');
                  cgpaInput.setAttribute('placeholder', 'Enter CGPA');
                  cgpaInput.setAttribute('style', 'padding:10px;');
                  cgpaInput.required = true;
      
      
                  courseNameDiv.appendChild(courseNameInput);
                  
                  cgpaDiv.appendChild(cgpaInput);
      
      
                  formRowDiv.appendChild(courseNameDiv);
                  formRowDiv.appendChild(cgpaDiv);
      
      
                  form.appendChild(formRowDiv);

                  wholeForm.appendChild(form);
      
                  document.getElementById('container').appendChild(wholeForm);
            }

            var buttonDiv = document.createElement('div');
            buttonDiv.setAttribute('class', 'col-md-4');
            buttonDiv.setAttribute('class', 'mb-3');
            buttonDiv.setAttribute('class', 'button-div');
            buttonDiv.setAttribute('style', 'margin:5px;');
            buttonDiv.setAttribute('id', 'submit-button');

            var submitButton = document.createElement('button');
            submitButton.setAttribute('type', 'submit');
            submitButton.setAttribute('class', 'btn btn-primary');
            submitButton.setAttribute('style', 'margin:20px;');
            submitButton.innerHTML = 'Submit';

            buttonDiv.appendChild(submitButton);
            document.getElementById('container').appendChild(buttonDiv);
      }
}

const courseNumberSubmit = () => {
      document.getElementById('submit-course-number').style.display = 'none';
}