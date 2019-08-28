<?php $page_title = 'Quiz Master > About'; ?>
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> JavaScript Quiz (About) </title>
</head>

<style>
    .image {
        width: 200px;
        height: 200px;
        padding: 20px 20px 20px 20px;
    }

    .table_2 {
        margin-left: auto;
        margin-right: auto;
    }

    #title {
        text-align: center;
        color: darkgoldenrod;
    }

    #table_1 {
        border-spacing: 100px 0px;
    }

    .directions {
        text-align: center;
        padding: 20px 40px 0px 40px;
        color: darkgreen;
    }

    .description {
        padding: 0px 40px 0px 0px;
        color: darkgoldenrod;
    }

    #silc {
        width: 300;
        height: 85;
    }

    .Name {
        color: darkgreen;
    }
</style>

<body>
    <!--this is the tool bar-->

    <h2 id="title">About Us</h2>
    <h4 class="directions">This Quiz Master project was created in the 2018-2019 school year by ICS 325 Internet Application Development class Students. Each of us have picked up a topic and prepared a set of 10-20 questions. We have then plugged in those questions into the Quiz Master application we have developed in the class. We used GitHub to download the master baseline and to ingegrate our changes. Take the quiz and test your knowledge about India and its culture. Enjoy! <br> </h4>
    <h4 class="directions">Click on each image to learn more about us.</h4>
</body>

<script>

    //Everyonce can fill in their own information:
    //Href is for more specific bio if they want to incorportate one.

    function Student(href, name, image_src, description) {
        this.href = href;
        this.name = name;
        this.image_src = image_src;
        this.description = description;

        this.toString = function () {
            document.write("<table class = 'table_2'>");
            document.write("<tr>");
            document.write("<td><a href ='" + this.href + "' title = '" + this.name + "'><image class = 'image' src='" + this.image_src + "'></image></a></td>");
            document.write("<td><h2 class = 'Name'>" + this.name + "</h2><h4 class = 'description'>" + this.description + "</h4></td>");
            document.write("</tr></table>");
        }
    }



var s1 = new Student(
      "https://www.linkedin.com/in/alex-rader-68653b16a/",
      "Alex Rader",
      "Images/about_images/alex.png",
      "Alex is currently a senior at Metro State University. He works full time as a PC/Analyst for a small company in Saint Paul. He lives in Saint Paul with his girlfriend and two dogs."
      );


    var s2 = new Student(
      "https://www.linkedin.com/in/david-jaqua-98b9a0156/",
      "David Jaqua",
      "Images/about_images/david.png",
      "David is currently a senior at Metro State University completing his last course to graduate with a BS in Computer Science. He's working full-time at Target Headquarters as a software Engineer. He lives in Forest Lake MN with his mother and sister."
      );

      var s3 = new Student(
      "https://www.linkedin.com/in/sip-xayaxang-746430179/",
      "Sip Xayaxang",
      "Images/about_images/sip.png",
      "Sip is a senior at Metro State University. He has one more semester to complete BS degree in Computer Information Technology. He is working fulltime at District 916 schools as a Database Administrator. He lives in Saint Paul with his wife and three kids."
      );

      var s4 = new Student(
      "",
      "Siva Jasthi",
      "Images/about_images/siva.jpg",
      "Dr. Jasthi is the primary instrutor for CS2 (JavaScript) class. He has been working in the software industry in different capacities for the last 25 years. He is currently working as a Consultant in Siemens PLM Software Inc. For the last 18 years, he is serving as adjunct faculty in the Department of Computer Sciences and Cyber Security at Metropolitan State University (MN, USA). For the last 12 years, he has been an active volunteer at School of India for Languages and Culture (SILC) and offered his services as a Telugu Teacher, Webmaster, Principal, and President. He is currently serving on the SILC board of directors as Director of Technology. He is building a five-level Digital Literacy program for middle and high school students at SILC."
      );


    function printoutStudents() {
        return s1.toString() + 
               s2.toString() + 
               s3.toString() + 
               s4.toString();
    }

    printoutStudents();
</script>
