

function fetchGames(){

    fetch(BASE_URL + 'fetch-games').then(onGameResponse).then(onFetchJson);
    /*fetch(BASE_URL + 'fetch-games')
    .then ((res) => {
        return res.json();
    })
    .then((json) => {
        console.log(json);
        if(!json.length) {
            noResults();
            return;
        }

        const container = document.querySelector(".cards");
        container.innerHTML = '';

        for(let game in json){
            const card = document.createElement("div");
            card.classList.add('card');

            card.dataset.id = json[game].ID;
            card.dataset.game = json[game].GAME;

            const image = document.createElement("img");
            image.classList.add('image');
            image.src = json[game].IMAGE;
            card.appendChild(image);

            const info_box = document.createElement("div");
            info_box.classList.add('info');
            card.appendChild(info_box);

            const name = document.createElement("div");
            name.classList.add('name');
            name.innerText = json[game].NAME;
            info_box.appendChild(name);

            const score = document.createElement("div");
            score.classList.add("score");
            score.innerText = json[game].SCORE;
            info_box.appendChild(score);

            if(score.innerText >= 80) score.classList.add('high_score');
            else if(score.innerText < 80 && score.innerText >= 40) score.classList.add('mid_score');
            else score.classList.add('low_score');

            const deleteForm = document.createElement('div');
            deleteForm.classList.add("delete");
            card.appendChild(deleteForm);
            deleteForm.addEventListener('click',removeGame);


            container.appendChild(card);
        }
    });*/
}

function onFetchJson(json) {
    console.log(json);
    if(!json.length) {
        noResults();
        return;
    }

    const container = document.querySelector(".cards");
    container.innerHTML = '';

    for(let game in json){
        const card = document.createElement("div");
        card.classList.add('card');

        card.dataset.id = json[game].ID;
        card.dataset.game = json[game].GAME;

        const image = document.createElement("img");
        image.classList.add('image');
        image.src = json[game].IMAGE;
        card.appendChild(image);

        const info_box = document.createElement("div");
        info_box.classList.add('info');
        card.appendChild(info_box);

        const name = document.createElement("div");
        name.classList.add('name');
        name.innerText = json[game].NAME;
        info_box.appendChild(name);

        const score = document.createElement("div");
        score.classList.add("score");
        score.innerText = json[game].SCORE;
        info_box.appendChild(score);

        if(score.innerText >= 80) score.classList.add('high_score');
        else if(score.innerText < 80 && score.innerText >= 40) score.classList.add('mid_score');
        else score.classList.add('low_score');

        const deleteForm = document.createElement('div');
        deleteForm.classList.add("delete");
        card.appendChild(deleteForm);
        deleteForm.addEventListener('click',removeGame);


        container.appendChild(card);
    }
}

function onGameResponse(response) {
    return response.json();
}

function onGameData(json) {
    console.log(json);
    fetchGames();
}

function removeGame(event) {
    console.log('Cancellazione');
    const card = event.currentTarget.parentNode;
    const game_id = card.dataset.id;
    fetch(BASE_URL + 'remove-game/'+ game_id);
    fetchGames();
    
}


function noResults() {
    const container = document.querySelector(".cards");
    container.innerHTML = '';
    const nores = document.createElement('div');
    nores.className = "nores";
    const title = document.createElement('h1');
    title.textContent = "Nessun risultato.";
    nores.appendChild(title);
    container.appendChild(nores);
}

fetchGames();

