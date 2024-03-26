<?php
// index.php

include("second.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sequence Calculator</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
            background-color: #f2f2f2;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        label {
            margin-right: 10px;
        }

        input {
            padding: 8px;
            margin-right: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<form method="post" action="first.php">
        <label for="start">Start:</label>
        <input type="text" name="start" >

        <label for="finish">Finish:</label>
        <input type="text" name="finish" >

        <input type="submit" value="Submit">
    </form>

</body>

<?php

if (!empty($_POST["start"]) && !empty($_POST["finish"])) {

    $calculator = new SequenceCalculator();
    $histogram = $calculator->calculateHistogram((int)$_POST["start"], (int)$_POST["finish"]);
    
    $maxCount = 0;
    
    foreach ($histogram as $number) {
        if ($number[1] > $maxCount) {
            $maxCount = $number[1];
        }
    }
    
    echo "<p>Histogram:</p>";
    echo "<ul>";
    
    foreach ($histogram as $number) {
        $barWidth = ($number[1] / $maxCount) * 100;
        $height = 500 / sizeof($histogram);
        $height = $height . "px";
        echo "<li style='list-style: none;'>";
        echo "<div style='position: relative;transform: translateX(100px); height:{$height}; width:{$barWidth}%; background-color:#4CAF50'>";
        echo "<div style='position: absolute; left: 0;transform: translateX(-100px);height:100px; width:100px'>{$number[0]}: {$number[1]} times</div>";
        echo "</div>";
        echo "</li>";
        
    }
    
    echo "</ul>";
    
    

} elseif (!empty($_POST["start"])) {
    $calculator = new SequenceCalculator();
    $from = (int)$_POST["start"];
    $sequence = $calculator->generateSequence($from);

    echo '<p>List:</p>';
    echo '<ul>';
    echo '<li>' . $_POST["start"] . '</li>';
    foreach ($sequence['numbers'] as $number) {
        echo '<li>' . $number . '</li>';
    }
    echo '</ul>';

    // Printing max and count in a paragraph
    echo '<p>Max: ' . $sequence['max'] . '</p>';
    echo '<p>Count: ' . $sequence['count'] . '</p>';
}

?>

</html>
