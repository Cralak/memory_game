function generateCards(difficulty) {

    let gameBox = document.createElement("div");
    gameBox.id = "gameBox";
    gameBox.class = "gameBox"

    let selector = document.getElementById("selector");
    selector.innerHTML = '';
    selector.appendChild(gameBox);

     {

        let nbs = ["0","0","1","1","2","2","3","3","4","4","5","5"]

        for (let i = 0; i < 4; i++) {
            let row = document.createElement("div");
            row.id = "row" + i;
            row.class = "row";
            gameBox.appendChild(row)
            
            for (let j = 0; j < 4; j++) {
                let card = document.createElement("div");
                item = nbs[Math.floor(Math.random()*nbs.length)];
                card.id = "card" + item;
                nbs.splice(item,1);
                card.class = "card";
                row.appendChild(card);
            }
        }
    }

    if (difficulty == 2){
        let nbs = ["0","0","1","1","2","2","3","3","4","4","5","5","6","6","7","7"]

        for (let i = 0; i < 3; i++) {
            let row = document.createElement("div");
            row.id = "row" + i;
            row.class = "row";
            gameBox.appendChild(row)
            
            for (let j = 0; j < 4; j++) {
                let card = document.createElement("div");
                item = nbs[Math.floor(Math.random()*nbs.length)];
                card.id = "card" + item;
                nbs.splice(item,1);
                card.class = "card";
                row.appendChild(card);
            }
        }
    }

    if (difficulty == 3){
        let nbs = ["0","0","1","1","2","2","3","3","4","4","5","5","6","6","7","7","8","8","9","9"]
    }
}