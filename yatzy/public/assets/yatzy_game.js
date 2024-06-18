class Yatzy_Game {

    constructor() {
        this.rollNumber = 0; // track what roll the user is on
        this.diceValues = [0, 0, 0, 0, 0]; // Current values of the 5 dices
        this.keptDice = [false, false, false, false, false]; // true = kept, false = rerolled
    }

    /* roll dice 5 times per roll; allow three rolls */
    rollDice() {
        if (this.rollNumber < 3) {
            for (let i = 0; i < 5; i++) { // roll 5 dice
                if (!this.keptDice[i]) {
                    this.diceValues[i] = rollDie(); // roll dice again if user doesn't keep it
                }
            }
            this.rollNumber++; // increase roll count
            this.promptKeepDice(); // prompt user after each roll

            this.checkReroll(); // if user wanted a reroll, reroll the dice and save new value

            this.displayState(); // display all information
            this.resetRolls(); // reset the dices
        } else {
            console.log("You have rolled 3 times already!");
        }
    }

    /* asks user if they want to keep the roll */
    promptKeepDice() {
        for (let i = 0; i < 5; i++) {
            let keepDiceInput = prompt(`You rolled a ${this.diceValues[i]}! Do you want to keep it? (Y/N)`);
            if (keepDiceInput) {
                try {
                    this.keptDice[i] = (keepDiceInput.toUpperCase() === "Y");
                } catch (error) {
                    alert("Invalid input. Please enter a Y or N.");
                }
            }
        }
    }

    /* prints out the current state of the game */
    displayState() {
        console.log("CURRENT GAME DATA:");
        console.log(`You are on roll number: ${this.rollNumber}`);
        console.log(`Current values of each dice: ${this.diceValues}`);
        console.log(`Rolls kept: ${this.keptDice}`);
    }

    /* reset the dice values after each roll */
    resetRolls() {
        this.diceValues = [0, 0, 0, 0, 0]
        this.keptDice = [false, false, false, false, false];
    }

    /* check if user requested a re-roll */
    checkReroll() {
        for (let i = 0; i < 5; i++) {
            if (!this.keptDice[i]) {
                this.diceValues[i] = rollDie();
                alert(`Rerolled value on dice ${i+1} is a ${this.diceValues[i]}!`);
            }
        }
    }
}

// create a global game instance for console interaction
const game = new Yatzy_Game();
window.rollDice = () => game.rollDice();
window.displayState = () => game.displayState();
