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
    for (let i = 0; i < 2; i++) {
        for (let j = 0; j < 8 + (difficulty * 4); j++) {
            nbs.unshift(j);
        }
    }

    for (let i = 0; i < 4; i++) {
        let row = document.createElement("div");
        row.id = i;
        row.className = "row";
        gameBox.appendChild(row);

        for (let j = 0; j < 4 + (difficulty * 2); j++) {
            let card = document.createElement("div");
            item = Math.floor(Math.random() * nbs.length);

            card.id = nbs[item];
            card.className = "card";
            nbs.splice(item, 1);

            row.appendChild(card);

            let cardBack = document.createElement("img")
            cardBack.src = "../../assets/images/cartes/card_back.png";
            card.appendChild(cardBack);

        }
    }
    console.log(nbs);
}