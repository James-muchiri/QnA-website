@include('admin/head')
@include('admin/sidebar')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<div id="right-panel" class="right-panel">
<style>

#regForm {
  background-color: #ffffff;

  font-family: Raleway;
  padding: 40px;

}

h1 {
  text-align: center;
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

#preview img{
  padding: 10px;
}
#fileList > div > label > span:last-child {
    color: red;
    display: inline-block;
    margin-left: 7px;
    cursor: pointer;
}
#fileList input[type=file] {
    display: none;
}
#fileList > div:last-child > label {
    display: inline-block;
    width: 23px;
    height: 23px;
    font: 16px/22px Tahoma;
    color: orange;
    text-align: center;
    border: 2px solid orange;
    border-radius: 50%;
}
</style>

@include('admin/header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard | Questions</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">

    <div class="col-sm-12">
        @if (Session::has('success'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span>   {{ Session::get('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
    <div class="col-sm-12">




  <div class="col-sm-12">
    <form id="regForm" action="/store_question" method="POST" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
                   <div class="tab">
                    <h2>New Question:</h2>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Category:</label>
                    <select class="form-select form-control" name="category" aria-label="Default select example" required>
                      <option selected class="example">Category</option>
                      @foreach ($category as $cat)
                      <option value="{!! $cat['name'] !!}">{!! $cat['name'] !!}</option>
                                                   @endforeach
              </select>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Question Descriptionn</label>
                    <input type="text" class="form-control" id="pdf" name="description" required>
                  </div>
                 <div class="form-group" >
                      <div>
                        <label for="exampleInputEmail1" class="form-label">Questions here:</label>
                          <textarea id="txtarea" name="question"></textarea>
                        
                    </div>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Upload questions files here:</label>
                      <div id="fileList">
                        <div>
                            <input id="fileInput_0" type="file" name="file[]" />
                            <label for="fileInput_0">+</label>      
                        </div>
                    </div>
                  
                    </div>



                   

            </div>
            <div class="tab">
                <h2>Answer:</h2>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Answer Privew</label>
                    <input type="text" class="form-control" id="recipient-name" name="preview" required>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Answer type:</label>
                    <select class="form-select form-control" onchange="AnswerCheck(this);" name="type2" aria-label="Default select example" required>
                        <option  selected>Select</option>
                      <option value="image1" >image</option>
                      <option value="pdf1" >pdf / document</option>

                      <option value="answer">text editor</option>



              </select>
                  </div>

              

                    <div class="form-group" >
                      <div>
                          <textarea id="txtarea2" name="answer"></textarea>
                          <input type="button" id="btnValue2" value="Get Value" />
                          <div id="divkarea2"></div>
                    </div>

                      </div>
                      <div class="form-group">
                        <div id="files">
                          <input type="file" name="file1[]" />
                      </div>

                      
                    </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Answer Prize</label>
                    <input type="text" class="form-control" id="recipient-name" name="price" required>
                  </div>
                  <div class="form-group">
                    
                  </div>
            </div>


            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                <button type="submit" id="submitBtn" class="btn btn-primary" style="display: none;">Save Question</button>

              </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
                         </div>
          </form>





</div>



                </div>
                <script src = "https://code.jquery.com/jquery-3.3.1.min.js" > </script>
                <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
                   <script type = "text/javascript">
                   tinymce.init({
                    selector: 'textarea',
                    width: 850,
                    height: 300,
                    theme: "silver",
                    init_instance_callback : function(editor) {
    var freeTiny = document.querySelector('.tox .tox-notification--in');
    freeTiny.style.display = 'none';
    }
                   });
                   $(document).ready(function() {
    $('#btnValue').click(function() {
    $("#divkarea").html("");
    var content = tinymce.get("txtarea").getContent();
    $("#divkarea").html(content);
    });
    });



                    </script>

<script>



var fileInput = document.getElementById('fileInput_0');
var filesList =  document.getElementById('fileList');  
var idBase = "fileInput_";
var idCount = 0;

var inputFileOnChange = function() {

    var existingLabel = this.parentNode.getElementsByTagName("LABEL")[0];
    var isLastInput = existingLabel.childNodes.length<=1;

    if(!this.files[0]) {
        if(!isLastInput) {
            this.parentNode.parentNode.removeChild(this.parentNode);
        }
        return;
    }

    var filename = this.files[0].name;

    var deleteButton = document.createElement('span');
    deleteButton.innerHTML = '&times;';
    deleteButton.onclick = function(e) {
        this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
    }
    var filenameCont = document.createElement('span');
    filenameCont.innerHTML = filename;
    existingLabel.innerHTML = "";
    existingLabel.appendChild(filenameCont);
    existingLabel.appendChild(deleteButton);
    
    if(isLastInput) {   
        var newFileInput=document.createElement('input');
        newFileInput.type="file";
        newFileInput.name="file[]";
        newFileInput.id=idBase + (++idCount);
        newFileInput.onchange=inputFileOnChange;
        var newLabel=document.createElement('label');
        newLabel.htmlFor = newFileInput.id;
        newLabel.innerHTML = '+';
        var newDiv=document.createElement('div');
        newDiv.appendChild(newFileInput);
        newDiv.appendChild(newLabel);
        filesList.appendChild(newDiv);
    } 
}

fileInput.onchange=inputFileOnChange;




$("#files").on("change", "input", function(event){
    $('#files').append('<input type="file" name="file1[]"/>')
});

           
</script>
              











<script type = "text/javascript">
    tinymce.init({
     selector: 'textarea2',
     width: 850,
     height: 300,
     theme: "silver",
     init_instance_callback : function(editor) {
var freeTiny = document.querySelector('.tox .tox-notification--in');
freeTiny.style.display = 'none';
}
    });
    $(document).ready(function() {
$('#btnValue2').click(function() {
$("#divkarea2").html("");
var content = tinymce.get("txtarea").getContent();
$("#divkarea2").html(content);
});
});



     </script>















<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("submitBtn").style.display = "inline";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
        document.getElementById("nextBtn").style.display = "inline";
        document.getElementById("submitBtn").style.display = "none";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = true;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>
@include('admin/footer')
