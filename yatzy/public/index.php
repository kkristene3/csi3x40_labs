<?php
require_once('_config.php');

use Yatzy\Dice;

$d = new Dice();

/*
for ($i=1; $i<=5; $i++) {
  echo "ROLL {$i}: {$d->roll()}<br>";
}
*/

echo "<h1>Yatzy Game<br></h1>";
echo "<p>The player will roll 5 dices. they will have the option to keep the dice or reroll them up to 3 times.</p>";
echo "<p>When they have rolled 3 times, the game status will be displayed.</p>";
echo "<p>Go to the console for prompts asking if you want to keep the dice or not.</p>";

// run yatzy game here
$game = new YatzyGame();
for ($i = 0; $i < 3; $i++) {
    $game->rollDice();
    echo "next roll...<br>";
}
?>


