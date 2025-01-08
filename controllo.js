function controllaDataInizio(){
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    let data_inizio = document.modulo1.periodo_inizio.value;

    console.log(data_inizio);
    console.log("asd");

    if(!data_inizio.test(regEx)) {
        return false; //data in formato non valido
    }

    var d = new Date(data_inizio);
    var dNum = d.getTime();

    if(!dNum && dNum !== 0)  // NaN value, Invalid date
        return false;
    
        return d.toISOString().slice(0,10) === dateString;
   }

   function controllaDataFine(){
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    let data_inizio = document.modulo2.periodo_fine.value;
    
    if(!data_inizio.test(regEx)) {
        return false; //data in formato non valido
    }

    var d = new Date(data_inizio);
    var dNum = d.getTime();

    if(!dNum && dNum !== 0)  // NaN value, Invalid date
        return false;
    
        return d.toISOString().slice(0,10) === dateString;
   }