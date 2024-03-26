<?php
// functions.php

class SequenceCalculatorBase {
    protected function generateSequence($from) {
        $max = $from;
        $count = 0;
        $response = array();
        $response[] = $from;

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

        return array('numbers' => $response, 'max' => $max, 'count' => $count);
    }
}

class SequenceCalculator extends SequenceCalculatorBase {
    public function calculateHistogram($from, $to) {
        $histogram = array();

        for ($i = $from; $i <= $to; $i++) {
                $sequence = $this->generateSequence($i);
                $histogram[] = [$sequence['numbers'][0], $sequence['count']];
        }
        

        return $histogram;
    }
}

?>
