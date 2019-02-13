var randomNumber = Math.floor(Math.random()*99)+1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');
var guessSubmit = document.querySelector('.guessSubmit');
var guessField = document.querySelector('.guessField');
var guessCount = 1;
var resetButton = document.querySelector('#reset');
var won = 0;
var lost = 0;
var displayScore = document.querySelector('#displayScore');
resetButton.style.display = 'none';
guessField.focus();

function checkGuess(){
    
    console.log("lol");
    //alert('I am a placeholder');
    var userGuess = Number(guessField.value);
    //console.log(userGuess);
    if(userGuess > 99 || userGuess < 1 || isNaN(userGuess)){
        //lastResult.innerHTML = 'Wrong Input!';
        $("#lastResult").html('Wrong Input!');
        lastResult.style.backgroundColor = '#daa9e5';
    }
    else{
        if(guessCount === 1){
        //guesses.innerHTML = 'Previous Guesses: ';
        $("#guesses").html('Previous Guesses: ');
        }
        guesses.innerHTML += userGuess + ' ';
        if(userGuess === randomNumber){
            //lastResult.innerHTML = 'Congratulations! You got it right!';
            $("#lastResult").html('Congratulations! You got it right!');
            lastResult.style.backgroundColor = 'green';
            //lowOrHi.innerHTML = '';
            $("#lowOrHi").html('');
            won++;
            setGameOver();
        }
        else if(guessCount === 7){
            //lastResult.innerHTML = 'Sorry you lost!';
            $("#lastResult").html('Sorry you lost!');
            lost++;
            setGameOver();
        }
        else{
            //lastResult.innerHTML = 'Wrong!';
            $("#lastResult").html('Wrong!');
            lastResult.style.backgroundColor = 'red';
            if(userGuess < randomNumber){
                //lowOrHi.innerHTML = 'Last guess was too low!';
                $("#lowOrHi").html('Last guess was too low!');
            }
            else if(userGuess > randomNumber){
                //lowOrHi.innerHTML = 'Last guess was too high!';
                $("#lowOrHi").html('Last guess was too high!');
            }
        }
    }
    //displayScore.innerHTML = 'Won: ' + won + ' Lost: ' + lost;
    $("#displayScore").html('Won: ' + won + ' Lost: ' + lost);
    guessCount++;
    guessField.value = '';
    guessField.focus();
}
guessSubmit.addEventListener('click', checkGuess);

function setGameOver(){
    guessField.disabled = true;
    guessSubmit.disabled = true;
    resetButton.style.display = 'inline';
    resetButton.addEventListener('click', resetGame);
}

function resetGame(){
    guessCount = 1;
    var resetParas = document.querySelectorAll('.resetParas');
    for(var i=0; i < resetParas.length; i++){
        resetParas[i].textContent = '';
    }
    resetButton.style.display = 'none';
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    lastResult.style.backgroundColor = 'white';
    randomNumber = Math.floor(Math.random()*99)+1;
}
