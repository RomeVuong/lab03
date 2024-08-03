<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name'] ?? '');  
    $gender = htmlspecialchars($_POST['gender'] ?? '');  
    $degree = htmlspecialchars($_POST['degree'] ?? '');  
	$browser = htmlspecialchars($_POST['browser'] ?? ''); 
	$editor = htmlspecialchars($_POST['editor'] ?? ''); 
    $lecture_rating = htmlspecialchars($_POST['lecture_rating'] ?? ''); 
    $lab_rating = htmlspecialchars($_POST['lab_rating'] ?? ''); 
    $feedback = htmlspecialchars($_POST['feedback'] ?? '');  

    $data = "Name: $name\n";
    $data .= "Gender: $gender\n";
    $data .= "Degree: $degree\n";
	$data .= "Browser: $browser\n";
	$data .= "Editor: $editor\n";
    $data .= "Lecture Rating: $lecture_rating\n";
    $data .= "Lab Rating: $lab_rating\n";
    $data .= "Feedback: $feedback\n\n";

    $file = fopen("survey_data.txt", "a");
    if ($file) {
        fwrite($file, $data);
        fclose($file);
        header("Location: thank_you.html"); 
        exit();
    } else {
        echo "Error saving your feedback. Please try again.";
    }
} else {
    echo "No data submitted.";
}
?>