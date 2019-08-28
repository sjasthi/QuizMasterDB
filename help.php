
<?php $page_title = 'Quiz Master > Help'; ?>
<?php include('header.php'); ?>

<html>
    <head>
        <title>QuizMaster > Help</title>
    </head>
    <style>
        #image {
            width: 100px;
            height: 100px;
            padding: 20px 20px 20px 20px;
        }
        #table_2 {
            margin-left: auto;
            margin-right: auto;
        }
        #silc {
            width: 300;
            height: 85;
        }
        #welcome {
            text-align: center;
        }
        #table_1 {
            border-spacing: 200px 0px;
        }
        #directions {
            text-align: center;
        }
        h2{
            text-align: center; 
        }
        p{
            text-align: center; 
        }
        h5{
            text-align: center; 
        }
        
        #title {
        text-align: center;
        color: darkgoldenrod;
        }

    </style>
    <body>
   
<h2 id="title">Welcome to the QuizMaster Website!</strong></h2>
<h5>Summer 2019.ICS325.Version 2.0</h5>
<p>Each of the icons on the home page represents a topic. When you mouse over any of the icons, the name of the topic will be shown. Click on any of them to take a short quiz.</p>
<p>Each topic has 5 or 10 questions, in&nbsp;a random order each time. After answering all questions on the quiz and hitting "submit", your score will shown! You can always click on the silc icon to go back to the main page.</p>
<p><img src="Images/help/icons.jpg" alt="icons" width="600" height="400"><p>
<p>While logged in as an Admin, users will be able to add additional quiz questions and topics. Admin users will also be able to modify and delete existing questions. All of the quiz questions are being stored on MYSQL database.</p>
<p>The number of questions per test and the the number of quiz icons per row on the home page can be changed by the admin.</p>
<p>This site was updated to PHP format by the students of course ICS 325 summer 2019, Metro State University.</p>

</html>