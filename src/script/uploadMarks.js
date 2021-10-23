

function courseNameCGPA() {
      let inputNumber = document.getElementById('marks-course-number-input').value;


      if (inputNumber > 10 || inputNumber < 0) {
            alert('Course number can\'t be less than 0 or greater than 10');
      }   
            else {
                  for (let i = 0; i < inputNumber; i++) {
                        var form = document.createElement('form');
                        form.setAttribute('method', 'post');
                        form.setAttribute('class', 'needs-validation')
                        
                        var formRowDiv = document.createElement('div');
                        formRowDiv.setAttribute('class', 'form-row');
      
                        var courseNameDiv = document.createElement('div');
                        courseNameDiv.setAttribute('class', 'col-md-4');
                        courseNameDiv.setAttribute('class', 'mb-3');
                        courseNameDiv.setAttribute('class', 'course-name-div')
      
      
                        var courseNameInput = document.createElement('input');
                        courseNameInput.setAttribute('type', 'text');
                        courseNameInput.setAttribute('class', 'form-control');
                        courseNameInput.setAttribute('id', 'validationCustom01');
                        courseNameInput.setAttribute('name', 'Course Name');
                        courseNameInput.setAttribute('placeholder', 'Enter Course Name');
                        courseNameInput.setAttribute('value', inputNumber);
                        courseNameInput.required = true;
      
                        var cgpaDiv = document.createElement('div');
                        cgpaDiv.setAttribute('class', 'col-md-4');
                        cgpaDiv.setAttribute('class', 'mb-3');
                        cgpaDiv.setAttribute('class', 'cgpa-div')
      
      
                        var cgpaInput = document.createElement('input');
                        cgpaInput.setAttribute('type', 'number');
                        cgpaInput.setAttribute('class', 'form-control');
                        cgpaInput.setAttribute('id', 'validationCustom02');
                        cgpaInput.setAttribute('name', 'CGPA');
                        cgpaInput.setAttribute('placeholder', 'Enter CGPA');
                        cgpaInput.setAttribute('value', 'Otto');
                        cgpaInput.required = true;
      
      
                        courseNameDiv.appendChild(courseNameInput);
                  
                  
                        cgpaDiv.appendChild(cgpaInput);
      
      
                        formRowDiv.appendChild(courseNameDiv);
                        formRowDiv.appendChild(cgpaDiv);
      
      
                        form.appendChild(formRowDiv);
      
      
                        document.getElementsByTagName("body")[0].appendChild(form);
                        
            }
      }
}

