<?php
require_once('_config.php');

use Yatzy\Dice;


// GAME INSTRUCTIONS
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

<!DOCTYPE html>
<br><br>
<div id="die1">--</div>
<button id="roll">Roll</button>

<script>
const die1 = document.getElementById("die1");
const roll = document.getElementById("roll");
roll.onclick = function(e) {

  const xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
      if (xmlhttp.status == 200) {
        die1.innerHTML = xmlhttp.responseText;
      }
    }
  };

  xmlhttp.open("GET", "/api.php?action=roll", true);
  xmlhttp.send();
}
</script>