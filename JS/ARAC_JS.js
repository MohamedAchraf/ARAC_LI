var TotalResult = 0;

function verif(id1, id2) {
    var answer = document.getElementById(id1);
    var correct = document.getElementById(id2);
    if (answer.value.localeCompare(correct.value) === 0) {
        answer.style.backgroundColor = "darkgreen";
    } else {
        answer.style.backgroundColor = "red";
    }
}




function verif_component(id, nb) {
    var test = false;  
    var tmp  ;
    var i = 0;
    
    TotalResult++;
    if(TotalResult === nb)
        test = true;
    

    if (test === true) {        
        for (i = 0; i < parseInt(nb); i++) {
            tmp = parseInt(id)+i;        
            document.getElementById(tmp.toString()).style.backgroundColor = "darkgreen";
            TotalResult = 0;
        }
    }
}