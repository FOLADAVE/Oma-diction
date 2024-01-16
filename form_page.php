<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = strip_tags(trim($_POST["firstName"]));
    $middleName = strip_tags(trim($_POST["middleName"]));
    $surname = strip_tags(trim($_POST["surname"]));
    $gradeClass = strip_tags(trim($_POST["gradeClass"]));
    $age = strip_tags(trim($_POST["age"]));
    $gender = strip_tags(trim($_POST["gender"]));
    $parentWhatsapp = filter_var(trim($_POST["parentWhatsapp"]), FILTER_SANITIZE_NUMBER_INT);

    $schoolName = strip_tags(trim($_POST["schoolName"]));
    $schoolAddress = strip_tags(trim($_POST["schoolAddress"]));
    $schoolWhatsapp = filter_var(trim($_POST["schoolWhatsapp"]), FILTER_SANITIZE_NUMBER_INT);

    $poetryRecitationChoice = strip_tags(trim($_POST["poetryRecitationChoice"]));
    $authorOfRecitation = strip_tags(trim($_POST["authorOfRecitation"]));

    $pronouncerRelease = strip_tags(trim($_POST["pronouncerRelease"]));
    $pronouncerSign = strip_tags(trim($_POST["pronouncerSign"]));
    $pronouncerDate = strip_tags(trim($_POST["pronouncerDate"]));

    if (empty($firstName) || empty($middleName) || empty($surname) || empty($gradeClass) || empty($age) || empty($gender) || empty($parentWhatsapp) ||
        empty($schoolName) || empty($schoolAddress) || empty($schoolWhatsapp) || empty($poetryRecitationChoice) || empty($authorOfRecitation) ||
        empty($pronouncerRelease) || empty($pronouncerSign) || empty($pronouncerDate)) {
        http_response_code(400);
        echo "Please fill out all required fields.";
        exit;
    }

    $recipient = "partnerships@omadiction.pro";
    $subject = "New Student Enrollment Form Submission";
    $email_content = "First Name: $firstName\n";
    $email_content .= "Middle Name: $middleName\n";
    $email_content .= "Surname: $surname\n";
    $email_content .= "Grade/Class: $gradeClass\n";
    $email_content .= "Age: $age\n";
    $email_content .= "Gender: $gender\n";
    $email_content .= "Parent WhatsApp: $parentWhatsapp\n\n";

    $email_content .= "School Details\n";
    $email_content .= "Name of School: $schoolName\n";
    $email_content .= "Address: $schoolAddress\n";
    $email_content .= "School WhatsApp: $schoolWhatsapp\n\n";

    $email_content .= "Poetry Recitation Details\n";
    $email_content .= "Poetry Recitation Choice: $poetryRecitationChoice\n";
    $email_content .= "Author Of Poetry Recitation Choice: $authorOfRecitation\n\n";

    $email_content .= "Pronouncer's Details\n";
    $email_content .= "I release to attend the 2024 OMA DICTION AWARDS COMPETITION: $pronouncerRelease\n";
    $email_content .= "Sign: $pronouncerSign\n";
    $email_content .= "Date: $pronouncerDate\n";

    $headers = "From: Student Enrollment Form Submission";

    if (mail($recipient, $subject, $email_content, $headers)) {
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
