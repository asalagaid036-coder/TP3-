<?php
if (isset($_POST['course'], $_POST['credits'], $_POST['grade'])) {
    $courses = $_POST['course'];
    $credits = $_POST['credits'];
    $grades = $_POST['grade'];
    $totalPoints = 0;
    $totalCredits = 0;

    echo "<table>";
    echo "<tr><th>Course</th><th>Credits</th><th>Grade Points</th><th>Total Points</th></tr>";

    for ($i = 0; $i < count($courses); $i++) {
        $courseName = htmlspecialchars($courses[$i]);
        $cr = floatval($credits[$i]);
        $g = floatval($grades[$i]);

        if ($cr <= 0) continue;

        [span_7](start_span)$pts = $cr * $g;[span_7](end_span)
        $totalPoints += $pts;
        $totalCredits += $cr;

        echo "<tr>
                <td>$courseName</td>
                <td>$cr</td>
                <td>$g</td>
                <td>$pts</td>
              </tr>";
    }
    echo "</table>";

    if ($totalCredits > 0) {
        [span_8](start_span)$gpa = $totalPoints / $totalCredits;[span_8](end_span)
        
        if ($gpa >= 3.7) { $interpretation = "Distinction"; [span_9](start_span)[span_10](start_span)}
        elseif ($gpa >= 3.0) { $interpretation = "Merit"; }[span_9](end_span)[span_10](end_span)
        elseif ($gpa >= 2.0) { $interpretation = "Pass"; [span_11](start_span)[span_12](start_span)}
        else { $interpretation = "Fail"; }[span_11](end_span)[span_12](end_span)

        echo "<p>Your GPA is <strong>" . number_format($gpa, 2) . "</strong> ($interpretation).</p>";
    } else {
        echo "<p>No valid courses entered.</p>";
    }
} else {
    echo "Data not received.";
}
?>
