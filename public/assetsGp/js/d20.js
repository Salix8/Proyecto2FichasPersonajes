$(document).ready(()=>{

    let classd20 = $(`.d20`);
    let i;

    for (i = 0; i < classd20.length; i++) { 
        $(`.d20`).on(`click`, function() {
            let tirada = d20();
            console.log(`${tirada} + ${this.innerHTML} = ` + (tirada + parseInt(this.innerHTML)));
        });
        break;
    }

});


function random(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}

function d20() {
    return Math.floor((Math.random() * (20 - 1 + 1)) + 1);
}

