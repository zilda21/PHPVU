 <?php


class SequenceCalculator
{
    

    public function arithmeticProgression($start, $commonDifference, $n)
    {
        
        $n=floor(($n-$start)/$commonDifference);


        $progression = array();
        $currentTerm = $start;

        for ($i = 0; $i <= $n; $i++) {
            $progression[] = $currentTerm;
            $currentTerm += $commonDifference;
        }

        return $progression;
    }
    private function printResult($start, $result)
    {
        echo '<p>List:</p>';
        echo '<ul>';
        echo '<li>' . $start . '</li>';
        foreach ($result['numbers'] as $number) {
            echo '<li>' . $number . '</li>';
        }
        echo '</ul>';

        // Printing max and count in a paragraph
        echo '<p>Max: ' . $result['max'] . '</p>';
        echo '<p>Count: ' . $result['count'] . '</p>';
    }

    public function singular($f)
    {
        $from = $f;
        $max = $from;
        $count = 0;
        $response = array();

        while ($from != 1) {
            if ($from % 2 == 0) {
                $from /= 2;
            } else {
                $from = 3 * $from + 1;
            }
            if ($from > $max) {
                $max = $from;
            }
            $count++;
            $response[] = $from;
        }

        $result = array('numbers' => $response, 'max' => $max, 'count' => $count);
        return $result;
    }

    public function plural($f, $t)
    {
        $from = $f;
        $to = $t;
        $result = array();

        for ($i = $from; $i <= $to; $i++) {
            $num = $i;
            $max = $i;
            $count = 0;
            while ($num != 1) {
                if ($num % 2 == 0) {
                    $num /= 2;
                } else {
                    $num = 3 * $num + 1;
                }
                if ($num > $max) {
                    $max = $num;
                }
                $count++;
            }

            $response = array('number' => $i, 'max' => $max, 'count' => $count);
            $result[] = $response;
        }

        $this->printMinMax($result);
        $this->printAllResults($result);
    }


    private function printMinMax($result)
    {
        $cc = 0;
        $max = 0;
        foreach ($result as $item) {
            $cc++;
            if ($item['count'] > $max) {
                $max = $item['count'];
                break;
            }
        }
        $item = $result[$cc - 1];
        echo '<div>';
        echo '<p>Max</p>';
        echo '<p>Number: ' . $item['number'] . '</p>';
        echo '<p>Max: ' . $item['max'] . '</p>';
        echo '<p>Count: ' . $item['count'] . '</p>';
        echo '</div><br>';

        $cc = 0;
        $minc = $result[0]['number'];
        foreach ($result as $item) {
            $cc++;
            if ($item['count'] < $max) {
                $max = $item['count'];
                break;
            }
        }
        $item = $result[$cc - 1];
        echo '<div>';
        echo '<p>Min</p>';
        echo '<p>Number: ' . $item['number'] . '</p>';
        echo '<p>Max: ' . $item['max'] . '</p>';
        echo '<p>Count: ' . $item['count'] . '</p>';
        echo '</div><br>';
    }

    private function printAllResults($result)
    {
        foreach ($result as $item) {
            echo '<div>';
            echo '<p>Number: ' . $item['number'] . '</p>';
            echo '<p>Max: ' . $item['max'] . '</p>';
            echo '<p>Count: ' . $item['count'] . '</p>';
            echo '</div><br>';
        }
    }
}
?>