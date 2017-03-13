#Connect Four Game#

##Implementation##

* It's written in PHP.
* It has composer dependicies.
* Composer.json alerts heroku that it is PHP. 
* To run tests: phpunit --configuration="./phpunit.xml" --bootstrap="./bootstrap.php" 
* It deploys to Heroku.
* To deploy:  git push heroku master |  heroku ps:scale web=1 
* To launch: heroku open
* Master is deployed too: https://thawing-everglades-15674.herokuapp.com
* All state is passed in and out, none is stored. 
* Computer is the name of the AI. If you want the AI to decide your move, let the name be Computer. 

##Classes:##

* GamesPieces: holds the Count and How many Pieces per User
* User: Name, Color and Power to drop
* GameBoard: Holds where the data is

* You'll need to call GameBoard before any Users. 
* Gamepieces is instantited in User. 

##ROUTES

###GET /start/{name}/{color}/{column}###
####Live Endpoint: https://thawing-everglades-15674.herokuapp.com/start/Hello/blue/4 ####
Endpoint to call to start a game
* Name is the name of uers
* Color is the color of the tiles
* Column is the Number of column that your droping the first tile in (Should be one through 7 only)
You start out with a blank board of six rows and seven columns

Should return something like:
```
{
  "row": 1,
  "leftPieces": 20,
  "state": {
    "1": {
      "1": "",
      "2": "",
      "3": "",
      "4": "blue",
      "5": "",
      "6": "",
      "7": ""
    },
    "2": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "3": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "4": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "5": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "6": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    }
  }
}
```
###POST /play###
#### Live endpoint https://thawing-everglades-15674.herokuapp.com/play ####
POST play is where you'll continue to play, with either a User given name or Computer to idetify the AI. 

Post file looks like this, and returns the same as Get. 
```
{
  "name": "Computer",
  "color": "black",
  "column": "1",
  "state": {
    "1": {
      "1": "blue",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "2": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "3": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "4": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "5": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    },
    "6": {
      "1": "",
      "2": "",
      "3": "",
      "4": "",
      "5": "",
      "6": "",
      "7": ""
    }
  }
}
```
