

let cardtotal = 0;

let chosenTheme;

let wrongGuess = 0;
let goodGuess = 0;

let score = 0;

let startTime = 0;
let intervalID;
let seconds;
let minutes;
let dif;

document.cookie = "score =" + score + "; SameSite=None; Secure";
document.cookie = "dif =" + dif + "; SameSite=None; Secure";



function generateCards(difficulty, theme) {



    startTimer();

    chosenTheme = theme;

    let gameBox = document.createElement("div");
    gameBox.id = "gameBox";
    gameBox.className = "gameBox"

    let selector = document.getElementById("selector");
    selector.innerHTML = '';

    let gameBoxContainer = document.createElement("div");
    gameBoxContainer.className = "gameBoxContainer";
    gameBoxContainer.id = "gameBoxContainer";

    let timerBox = document.createElement("div");
    timerBox.id = "timer";

    selector.appendChild(gameBoxContainer);
    gameBoxContainer.appendChild(gameBox);
    gameBoxContainer.appendChild(timerBox);



    let nbs = [];
    for (let i = 1; i < 3; i++) {
        for (let j = 1; j < 9 + (difficulty * 4); j++) {
            nbs.unshift(j);
        }
    }

    cardtotal = nbs.length;

    let count = 0
    for (let i = 1; i < 5; i++) {
        let row = document.createElement("div");
        row.id = i;
        row.className = "row";
        gameBox.appendChild(row);

        for (let j = 1; j < 5 + (difficulty * 2); j++) {
            count++;

            let cardDiv = document.createElement("div");
            item = Math.floor(Math.random() * nbs.length);
            cardDiv.className = "cardDiv";

            let cardImg = document.createElement("img")
            cardImg.src = "../../assets/images/cartes/card_back.png";
            cardImg.className = "cardImg";
            cardImg.setAttribute("name", nbs[item])
            cardImg.id = "card" + count;

            cardDiv.addEventListener('click', () => {
                flipCard(cardDiv);
            });
            row.appendChild(cardDiv);
            cardDiv.appendChild(cardImg);
            nbs.splice(item, 1);
        }
    }
}

let card1 = null;
let card2 = null;
let cardCount = 0;

function flipCard(cardDiv) {
    cardImg = cardDiv.firstChild;
    if (cardImg.name != "invalid") {
        if (card1 == null) {
            card1 = cardImg;
            card1.classList.add("animation");
            setTimeout(function () {
                card1.src = "../../assets/images/themes/" + chosenTheme + "/image" + card1.name + ".png";
                cardCount++;
            }, 100)

        } else if (card2 == null) {
            if (card1 != cardImg) {
                card2 = cardImg;

                card2.classList.add("animation");

                setTimeout(function () {
                    card2.src = "../../assets/images/themes/" + chosenTheme + "/image" + card2.name + ".png";
                    cardCount++;
                }, 100);


                setTimeout(function() {
                    if (card1.name == card2.name && cardCount >= 2) {
                        card1.style.visibility = "hidden";
                        card2.style.visibility = "hidden";
                        card1.setAttribute("name", "invalid");
                        card2.setAttribute("name", "invalid");
                        card1 = null;
                        card2 = null;
                        document.getElementsByName("invalid").length == cardtotal ? showScore() : "";
                        goodGuess++;
                    } else {

                        card1.classList.add("animation2");
                        card2.classList.add("animation2");

                        setTimeout(function(){
                            card1.src = "../../assets/images/cartes/card_back.png";
                            card2.src = "../../assets/images/cartes/card_back.png";
                            card1.classList.remove("animation");
                            card2.classList.remove("animation");
                            setTimeout(function(){
                                card1.classList.remove("animation2");
                                card2.classList.remove("animation2");
                                card1 = null;
                                card2 = null;
                                cardCount = 0;
                                wrongGuess++;
                            }, 100);

                        },100);
                    }
                }, 800);
            }
        }
    }
}

function getDifTheme(){
    dif = document.getElementById("difficulty");
    dif = dif.options[dif.selectedIndex].id
    theme = document.getElementById("theme");
    theme = theme.options[theme.selectedIndex].id
    generateCards(dif,theme);
}

function showScore(){
    score = (-wrongGuess*1000 +goodGuess*3000)-(seconds*50)-(minutes*3000);
    endTimer();

    console.log(dif, score);


    $.ajax({
        url: "../../utils/envoyerScore.php",
        type: "post",
        data: {
          dif: dif,
          score: score,
        },
        success: function (data) {
          console.log("réussie");
        },
      });

    setTimeout(function(){
    window.alert("Félicitation, vous avez fait " + score + " points !");
    gameBox = document.getElementById("gameBox");
    gameBox.innerHTML = "";
    restartButton = document.createElement("button");
    restartButton.innerText = "RESTART";
    restartButton.setAttribute("type","button");
    restartButton.setAttribute("onclick","returnToSelect()");
    restartButton.className = "bouton";
    gameBox.appendChild(restartButton);
    },1000);
}

function returnToSelect(){
    window.location.href = "";
}

function startTimer(){
    if (!intervalID) {
      startTime = new Date().getTime();
      intervalID = setInterval(updateTimer, 1);
    }
}

function endTimer(){
    if (intervalID) {
      clearInterval(intervalID);
      intervalID = null;
    }
}

function updateTimer(){
    let currentTime = new Date().getTime();
    let elapsedTime = currentTime - startTime;
    minutes = Math.floor(elapsedTime / 60000);
    seconds = Math.floor((elapsedTime % 60000) / 1000);
    let milliseconds = elapsedTime % 1000;
    let timerDisplay = document.getElementById("timer");
    timerDisplay.innerText = `${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}:${String(milliseconds).padStart(3, "0")}`;
}