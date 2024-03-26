<?php
include("./functions.php");
$arithmeticProgression = array();
$sequenceCalculator = array();
$from = NULL;
$to = NULL;
if (!empty($_POST["start"]) && !empty($_POST["finish"])) {
    $sequenceCalculator = new SequenceCalculator();

    $from = (int) $_POST["start"];
    $to = (int) $_POST["finish"];
    $arithmeticProgression = $sequenceCalculator->arithmeticProgression($from, 2, $to);
} elseif (!empty($_POST["start"])) {
    $sequenceCalculator = new SequenceCalculator();
    $from = (int) $_POST["start"];
}
// Example of using the arithmetic progression method

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>OOP task solve</title>
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

    <form method="post" action="http://localhost:2000/ziad.php">
        <label for="start">Start:</label>
        <input type="text" name="start">

        <label for="finish">Finish:</label>
        <input type="text" name="finish">

        <input type="submit" value="Submit">
    </form>
    <?php if (count($arithmeticProgression) > 0) {
        $sequenceCalculator->plural($from, $to);
        ?>
        <p>Arithmetic Progressionv (step +2):</p>
        <ul>
            <?php foreach ($arithmeticProgression as $term) { ?>
                <li>
                    <?php echo $term ?>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
    <?php if ($sequenceCalculator && $to == NULL) { ?>
        <p>List:</p>
        <ul>
            <li>
                <?php echo $from ?>
            </li>
            <?php foreach ($sequenceCalculator->singular($from)['numbers'] as $number) { ?>
                <li>
                    <?php echo $number ?>
                </li>
            <?php } ?>
        </ul>
        <p>
            <?php echo 'Max: ' . $sequenceCalculator->singular($from)['max'] ?>
        </p>
        <p>
            <?php echo 'Count: ' . $sequenceCalculator->singular($from)['count'] ?>
        </p>
    <?php } ?>
    </ul>


</body>

</html>