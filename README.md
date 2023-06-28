# QuizMasterDB
MySQL Database persistence and PHP server side processing to pure Javascript QuizMaster Application done at SILC.


Some high-level requirements:

[1] Python, Java, PHP, MySQL - can be any of the primary topics

[2] Each topic will have a bunch of keywords.

For example, for Python topics, the following can be keywords.
- variables
- data types
- conditions
- for
- range
- while
- lists
- tuples
- sets
- dictionary
- file IO
- exceptions

[3] Each question is tagged with one or more keywords
Based on the keyword, Instructors shall be able to retrieve the relevant questions from the Question Bank.

[4] Each question can optionally be associated with a code snippet (which is basically a image snap).
These images are stored in the server's local directory.

[5] We want to support some learning order as a static guidance so that students can get an idea of the order in which they take quizzes.

[6] CRUD of topic; CRUD of keyword; CRUD of question.

[7] Bugs / Features / Enhancements: Feel free to add those to https://github.com/sjasthi/QuizMasterDB/issues
We will review to see whether that can be taken up in the current semester or not.

[8] We need to present / administer the quizzes to the visitors based on three criteria (on the web)
-- Selection of topics 
-- Selection of the Keywords (present a list of key words; Users select upto three keywords; System selects the questions)
-- Random Number (10, 15, 20, 25)

------------------>

[9] Just like Kahoot is providing the APIs, QuizMasterDB can also provide REST APIs to fetch the data from the database into JSON format which can be consumed by other client applications.

[10] QuizMaster integration to Kahoot will 
* fetch/get the data from the database (php --> database; python --> database access; python --> REST APIs using PHP; Python --> REST APIs using python)
* talking to Kahoot APIs (using the data that is fetched, we create the kahoot quiz)

  [11] QuizMaster integration to Power Point will
  * generate a Power Point with Q & A for offline printing and for administering the quiz in the classroom.




