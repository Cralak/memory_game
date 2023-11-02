let cardtotal = 0;

function generateCards(difficulty) {

    let gameBox = document.createElement("div");
    gameBox.id = "gameBox";
    gameBox.className = "gameBox"

    let selector = document.getElementById("selector");
    selector.innerHTML = '';

    let gameBoxContainer = document.createElement("div");
    gameBoxContainer.className = "gameBoxContainer";
    gameBoxContainer.id = "gameBoxContainer";

    selector.appendChild(gameBoxContainer);
    gameBoxContainer.appendChild(gameBox);



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
            card1.src = "../../assets/images/cartes/sematary/image" + card1.name + ".png";
            cardCount++;
        } else if (card2 == null) {
            if (card1 != cardImg) {
                card2 = cardImg;
                card2.src = "../../assets/images/cartes/sematary/image" + card2.name + ".png";
                cardCount++;

                setTimeout(function () {
                    if (card1.name == card2.name) {
                        console.log("test");
                        card1.style.visibility = "hidden";
                        card2.style.visibility = "hidden";
                        card1.setAttribute("name", "invalid");
                        card2.setAttribute("name", "invalid");
                    } else if (cardCount >= 2) {
                        card1.src = "../../assets/images/cartes/card_back.png";
                        card2.src = "../../assets/images/cartes/card_back.png";
                    }
                    card1 = null;
                    card2 = null;
                    cardCount = 0;

                    document.getElementsByName("invalid").length == cardtotal ? window.location.replace('http://www.savewalterwhite.com/') : "";
                }, 1000)
            }
        }
    }
}

function flipCardAnime(id) {
    let x = document.getElementById("card")
    x.style.marginLeft = "300px"
    x.style.transition = "1s"
}

function terminer() {
    window.alert()
}

$.ajax({
    type: "POST",
    url: "database.php",
    data:{score: score},
    success
})