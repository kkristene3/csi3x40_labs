<?php

class YatzyGame {
    private $rollNumber; // track what roll the user is on
    private $diceValues; // Current values of the 5 dice
    private $keptDice; // true = kept, false = rerolled

    public function __construct() {
        $this->rollNumber = 0;
        $this->diceValues = [0, 0, 0, 0, 0];
        $this->keptDice = [false, false, false, false, false];
    }

    /* roll dice 5 times per roll; allow three rolls */
    public function rollDice() {
        if ($this->rollNumber < 3) {
            for ($i = 0; $i < 5; $i++) { // roll 5 dice
                if (!$this->keptDice[$i]) {
                    $this->diceValues[$i] = $this->rollDie(); // roll dice again if user doesn't keep it
                }
            }
            $this->rollNumber++; // increase roll count
            $this->promptKeepDice(); // prompt user after each roll

            $this->checkReroll(); // if user wanted a reroll, reroll the dice and save new value

            echo $this->displayState(); // display all information
            $this->resetRolls(); // reset the dice
        } else {
            echo "You have rolled 3 times already!\n";
        }
    }

    /* asks user if they want to keep the roll */
    private function promptKeepDice() {
        for ($i = 0; $i < 5; $i++) {
            $keepDiceInput = readline("You rolled a {$this->diceValues[$i]}! Do you want to keep it? (Y/N) ");
            if ($keepDiceInput) {
                try {
                    $this->keptDice[$i] = (strtoupper($keepDiceInput) === "Y");
                } catch (Exception $e) {
                    echo "Invalid input. Please enter a Y or N.\n";
                }
            }
        }
    }

    /* prints out the current state of the game */
    public function displayState() {
        $output = "<div>";
        $output .= "<h3>CURRENT GAME DATA:</h3>";
        $output .= "<p>You are on roll number: {$this->rollNumber}</p>";
        $output .= "<p>Current values of each dice: " . implode(", ", $this->diceValues) . "</p>";
        $output .= "<p>Rolls kept: " . implode(", ", array_map(function($val) { return $val ? 'true' : 'false'; }, $this->keptDice)) . "</p>";
        $output .= "</div>";
        return $output;
    }

    /* reset the dice values after each roll */
    private function resetRolls() {
        $this->diceValues = [0, 0, 0, 0, 0];
        $this->keptDice = [false, false, false, false, false];
    }

    /* check if user requested a re-roll */
    private function checkReroll() {
        for ($i = 0; $i < 5; $i++) {
            if (!$this->keptDice[$i]) {
                $this->diceValues[$i] = $this->rollDie();
                echo "Rerolled value on dice " . ($i + 1) . " is a {$this->diceValues[$i]}!<br>";
            }
        }
    }

    /* simulate a dice roll */
    private function rollDie() {
        return rand(1, 6);
    }
}

?>
