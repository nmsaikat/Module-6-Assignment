<?php

function getGrade($mark) {
    switch (true) {
        case ($mark > 100 || $mark < 0):
            return 'Invalid';
        case ($mark >= 80):
            return 'A+';
        case ($mark >= 70):
            return 'A';
        case ($mark >= 60):
            return 'A-';
        case ($mark >= 50):
            return 'B';
        case ($mark >= 40):
            return 'C';
        case ($mark >= 34):
            return 'D';
        default:
            return 'F';
    }
}

function calculateResults($subjects) {
    if (count($subjects) !== 5) {
        return "Please provide marks for 5 subjects.<br>";
    }

    $totalMarks = 0;
    $invalidMarks = false;

    foreach ($subjects as $subject => $mark) {
        if ($mark > 100 || $mark < 0) {
            $invalidMarks = true;
        }
        $grade = getGrade($mark);
        echo "Subject: $subject, Marks: $mark, Grade: $grade<br>";
        $totalMarks += $mark;
    }

    if ($invalidMarks) {
        return "Invalid marks detected.<br>";
    }

    $averageMarks = $totalMarks / count($subjects);
    $averageGrade = getGrade($averageMarks);

    return "Total Marks: $totalMarks<br>Average Marks: " . number_format($averageMarks, 2) . "<br>Final Grade: $averageGrade<br>";
}


$studentMarks = [
    "Mathematics" => 85,
    "English" => 72,
    "Physics" => 65,
    "Chemistry" => 58,
    "History" => 45
];

echo calculateResults($studentMarks);
