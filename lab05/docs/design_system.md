# Yatzy Game Design

## Fonts
- **Primary Font:** Arial, sans-serif
- **Secondary Font:** Georgia, serif

## Colours
- **Primary Colour:** `#ffffff` (White)
- **Secondary Colour:** `#000000` (Black)

## Dice Look & Feel
- 1 side of the die will show at a time
- A number will show on the dice instead of dots
- White square for the die, black number

## Game Components
> [!NOTE]
> The header will include the game title Yatzy.
> The footer will contain the year the web game was made and the author.
1. To start a new game, the user should call the method startGame() in the console (not yet implemented)
2. The first player will call rollDice() and follow the prompts.
3. Once they have rolled three times, they will call endTurn() and the next player will repeat step 2 (not yet implemented).
    - Repeat steps 2-3 until all players have gone
4. To view the scoreboard at any time, call displayState()
5. The game ends when each player has gone 5 times. The player with the highest score wins the game
