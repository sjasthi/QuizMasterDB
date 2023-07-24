<?php

include_once 'db_configuration.php';

if (isset($_POST['keyword'])) {
    $keyword = mysqli_real_escape_string($db, $_POST['keyword']);

    // Get the keyword ID for deletion from the question_keywords table
    $getKeywordID = "SELECT id FROM keywords
                        WHERE keyword = '$keyword'";

    $result = mysqli_query($db, $getKeywordID);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $keywordID = $row['id']; // Extract the keyword ID from the result row

        // Delete from the keywords table
        $deleteKeywords = "DELETE FROM keywords
                             WHERE keyword = '$keyword'";

        if (mysqli_query($db, $deleteKeywords)) {
            // Delete from the question_keywords table using the keyword ID
            $deleteQuestionKeywords = "DELETE FROM question_keywords
                                         WHERE keyword_id = '$keywordID'";

            if (mysqli_query($db, $deleteQuestionKeywords)) {
                header('location: keywords_list.php?keywordDeleted=Success');
                exit();
            }
		}
	}
}
?>

