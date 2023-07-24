<?php $page_title = 'Quiz Master > Create Question'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','quiz_master');
    $resultset = $mysqli->query("SELECT DISTINCT topic FROM topics ORDER BY topic ASC");   
?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}
.hidden {display: none;}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    //if no image is selected, display error message
    if(isset($_GET['createQuestion'])) {
        if($_GET["createQuestion"] == "noFileSelected"){
            echo '<br><h3 align="center" class="bg-danger">ERROR - No image file selected!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createQuestion'])){
        if($_GET["createQuestion"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
    }
  
    ?>
    
    <form action="createTheQuestion.php" method="POST" enctype="multipart/form-data">

        <br>
        <h3 id="title">Create A Question</h3> <br>
        
        <table>
            <tr>
                <td style="width:100px">Topic:</td>
                <td><select name="topic">
                    <?php 
                    while($rows = $resultset->fetch_assoc()){
                        $topic=$rows['topic']; 
                    echo"<option Value='$topic'>$topic</option>";}?>
                    </select></td>
            </tr>
            <tr>
                <td style="width:100px">Question:</td>
                <td><input type="text"  name="question" maxlength="100" size="50" required title="Please enter a question."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 1:</td>
                <td><input type="text"  name="choice_1" maxlength="50" size="50" required title="Please enter answer 1."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 2:</td>
                <td><input type="text"  name="choice_2" maxlength="50" size="50" required title="Please enter answer 2."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 3:</td>
                <td><input type="text"  name="choice_3" maxlength="50" size="50" required title="Please enter answer 3."></td>
            </tr>
            <tr>
                <td style="width:100px">Choice 4:</td>
                <td><input type="text"  name="choice_4" maxlength="50" size="50" required title="Please enter answer 4."></td>
            </tr>
            <tr>
                <td style="width:100px">Answer:</td>
                <td><input type="text"  name="answer" maxlength="50" size="50" required title="Please enter the answer."></td>
            </tr>
            <tr>
                <td style="width:100px">Image:</td>
                <td><input type="file" name="fileToUpload" id="fileToUpload" maxlength="50" size="50" title="Please enter the Image Name."></td>
            </tr>
            <tr>
                <input type="hidden" name="keyword_count" id="keyword_count" value = 0>
            </tr>
        </table>

        <!-- Add keyword textboxes | No require to add keywords -->
        
<tr>
    <td colspan="2">
        <div id="keywordContainer"></div>
        <button type="button" id="addKeyword">Add Keyword</button> 
        <button type="button" class="removeKeyword hidden">Remove Keyword</button>
    </td>
</tr>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Question</button>
        </div>
        <br> <br>

    </form>
</div>

<!-- Add JS for adding and removing keywords -->
<!-- Source used: https://stackoverflow.com/questions/60008639/add-input-fields-on-button-click-with-data-from-php -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- .hidden {display: none;} -->
<!--Source used to avoid duplication of keywords: https://stackoverflow.com/questions/34388638/how-to-avoid-duplicate-options-from-dropdown-array-in-jquery -->
<script> 
//document.ready function loads up the structure of the web site before proceeding with the javascript
$(document).ready(function() {
  var i = 1;
  var selectedKeywords = []; // Array to store selected keywords to prevent duplicate selection of keywords

  //New keyword added to the keyword container div, i variable will start at 1
  $('#addKeyword').click(function() {
    var keywordDropdown = '<div id="row' + i + '"><label for="keyword_' + i + '">Keyword ' + i + '</label>' +
      '<select name="keyword[]" required>' +
      '<option value="">Select a keyword</option>';

    <?php

    //Keywords are stored in this variable to be later displayed on the dropdown box
    $keywordResultSet = $mysqli->query("SELECT DISTINCT keyword FROM keywords ORDER BY keyword ASC");

    //loop thru every single keyword row and displaying it 
    while ($keywordRow = $keywordResultSet->fetch_assoc()) {
      $keyword = $keywordRow['keyword']; //Hashmap or dictionary
      echo "if (!selectedKeywords.includes('$keyword')) {";
      echo "keywordDropdown += '<option value=\'$keyword\'>$keyword</option>';";
      echo "}";
    }
    ?>

    keywordDropdown += '</select></div>';
    $('#keywordContainer').append(keywordDropdown);
    i++;
    //Reveals the remove keyword button when add a keyword
    $('.removeKeyword').removeClass('hidden');
    updateSelectedKeywords(); // Update the selectedKeywords array
  });

  //Removes the keyword dropdown when clicking on this button
  $(document).on('click', '.removeKeyword', function() {
    var button_id = $(this).attr("id");
    i--;
    $('#row' + $('#keywordContainer div').length).remove();
    if (i <= 1) {
      $('.removeKeyword').addClass('hidden');
    }
    updateSelectedKeywords();
  });

  //Updates the selectedKeywords array with the newly selected keywords
  function updateSelectedKeywords() {
    selectedKeywords = []; // Reset the array
    var keywordCount  = 0;
    $('select[name^="keyword"]').each(function() {
      var selectedKeyword = $(this).val();
      if (selectedKeyword !== '') {
        selectedKeywords.push(selectedKeyword);
        keywordCount++;
      }
    });
    $('#keyword_count').val(keywordCount);
    removeSelectedKeywords(); // Call the function to remove the selected keywords
  }

  //remove/hide selected keywords from drop down box
  function removeSelectedKeywords() {
    $('select[name^="keyword"]').each(function() {
      var currentSelect = $(this);
      currentSelect.find('option').show(); // Show all options before removing
      selectedKeywords.forEach(function(keyword) {
        currentSelect.find('option[value="' + keyword + '"]').hide();
      });
    });
  }
});
</script>
<!-- <div id="keywordContainer"></div>
        <button type="button" id="addKeyword">Add Keyword</button> 
        <button type="button" class="removeKeyword hidden">Remove Keyword</button>
</div> -->
