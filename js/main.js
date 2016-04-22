// Help fun

/*//  show all methods
var dino=$('#my-final-table2').data('dynatable');
console.log(Object.getOwnPropertyNames(dino));
 !!!!!!!!!!!!!!!
console.dir(dino);
*/

var globalstate=1; // 1 2 3 4
//   жесткая проверка  в конце устаановить +
var next_if_present='false';
// next_if_present='true';


$( document ).ready(function() {
   $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });




$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);


// начальная загрузка таб
 changetable();
 //var d={'data':JSON.stringify([$('#trackbar').val()])};
 //console.log(d);
//replaseDataindinatable('#my-final-table','rentlive.php',d);

//$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val());
//-------------
// автоматически проверяет последний день
//var d={'next_if_present': JSON.stringify( next_if_present)};
var d={'next_if_present': next_if_present}; // первий раз ненадо дни автоматом 2 

$.ajax({
  url: 'indexworkerrent_live.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера
      console.log('indexworkerrent_live OK');
     // console.log(data);
  }
});

var d={'next_if_present': next_if_present}; // первий раз ненадо дни автоматом 2 

$.ajax({
  url: 'indexworkerrent_bissnes.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера
      console.log('indexworkerrent_bissnes OK');
     // console.log(data);
  }
});
var d={'next_if_present': next_if_present}; // первий раз ненадо дни автоматом 2 

$.ajax({
  url: 'indexworkersale_living.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера
      console.log('indexworkersale_living OK');
     // console.log(data);
  }
});
var d={'next_if_present': next_if_present}; // первий раз ненадо дни автоматом 2 

$.ajax({
  url: 'indexworkersale_bissnes.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера
      console.log('indexworkersale_bissnes OK');
     // console.log(data);
  }
});
//------------



//---------------------
// все следующие проверки в пхп идут меннее жостко
next_if_present='false';


// таймер 
  // Handler for .ready() called.
var myVar = setInterval(function() {

$.ajax({
  url: 'indexworkerrent_live.php',
  data: next_if_present,
   type: 'POST',
   data: {'next_if_present': next_if_present},
  success: function(data){ 
      console.log('gtimer rent live OK');
  }
});



}, 240000);
  // Handler for .ready() called.
var myVar2 = setInterval(function() {

$.ajax({
  url: 'indexworkersale_living.php',
   type: 'POST',
   data: {'next_if_present': next_if_present},
  success: function(data){
      console.log('timer  sale live OK');
  }
});



}, 240000);
var myVar3 = setInterval(function() {

$.ajax({
  url: 'indexworkerrent_bissnes.php',
   type: 'POST',
   data: {'next_if_present': next_if_present},
  success: function(data){
      console.log('timer  rent bis  OK');
  }
});



}, 240000);
var myVar24= setInterval(function() {

$.ajax({
  url: 'indexworkersale_bissnes.php',
   type: 'POST',
   data: {'next_if_present': next_if_present},
  success: function(data){
      console.log('gtimer sale bis OK');
  }
});



}, 240000);
//var timer=setTimeout(function() { console.log("timer 896");}, 1000); // 1000 1 sec
   



});






//  track bar
  function onChangeTrackBar() {
    //console.log($('#trackbar').val());
document.getElementById('trackBarValue').innerHTML = $('#trackbar').val();
  }

function ontrackup(argument) {
  // body...

// send value
 var d={'data':JSON.stringify([$('#trackbar').val()])};
 //console.log(d);
//replaseDataindinatable('#my-final-table','rentlive.php',d);


/* var where='rent_living';
  if (globalstate==1) { where='rent_living';} 
  else if(globalstate==2) {where='rent_business'}*/

$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);
//console.log($("#tocv").attr('href'));
changetable();
}

// обновить
function testClick(argument) {
// начальная загрузка таб
 var d={'data':JSON.stringify([$('#trackbar').val()])};
 //console.log(d);
replaseDataindinatable('#my-final-table','rentlive.php',d);
/*// take data from url
replaseDataindinatable('#my-final-table','rentlive.php',5);



  // body... send date from n to
$.post('test.php',{
        from: "Donald Duck",
        to: "Duckburg"
    },function (data,status) {
  // body...


//    var dino=$('#my-final-table tr').data('dynatable');
var dino=$('#my-final-table tbody tr');
dino.remove();








});
*/



}


function replaseDataindinatable(idtable,fromurl,datasend) {
  // body...
/*
var $records = fromurl;
   myRecords = JSON.parse($records);*/
console.log(fromurl+"  "+datasend)

$.ajax({
  url: fromurl,
  type:'POST',
  data: datasend, 
  success: function(data){
      //console.log('to db OK11111');
        console.log(data);
             console.log('replace table');
     

    myRecords = JSON.parse(data);
                        

  var dynatable = $(idtable).dynatable({ 
    dataset: { records: myRecords } }, 
    { features: { pushState: false }}).data("dynatable");
                        dynatable.settings.dataset.originalRecords =  myRecords;
                        dynatable.process();  



  }
});


}


function tocv(argument) {
   // body...
 var d={'data':JSON.stringify([$('#trackbar').val()])};
   $.ajax({
  url: 'rentlive.php',
  data: d,
  type:"POST",
  success: function(data){
                console.log(data);
                console.log("ok");
  }
});
 
 }

 function changetable(argument) {
   // body...




 var d={'data':JSON.stringify([$('#trackbar').val()]),'globalstate': globalstate};


 //d={'data':JSON.stringify([7])};

/* var where='rentlive.php';
  if (globalstate==1) { where='rentlive.php';} 
  else if(globalstate==2) {where='rentBissnes.php'}
     else if(globalstate==3) {where='rentBissnes.php'}
       else if(globalstate==4) {where='rentBissnes.php'}*/
        

 //console.log(d);
replaseDataindinatable('#my-final-table',wherego(),d);

 }

 function rentbissnes(argument) {
   // body...
   globalstate=2;

  
$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);
   changetable();

$('#desc').text('Аренда комерческой');
 }
 function rentlive(argument) {
   // body...
   globalstate=1;



$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);
   changetable();
   $('#desc').text('Аренда жилой ');
 }

 function salelive(argument) {
   // body...
   globalstate=3;


$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);
   changetable();
   $('#desc').text('Продажа жилой');
 }
  function salebissnes(argument) {
   // body...
   globalstate=4;


$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val()+"&type="+globalstate);
   changetable();
 $('#desc').text('Продажа комерческой');
 }


// на основе глобальной переменоой определяем куда делать запрос сейчас 4
function wherego(argument) {
  // body...
  var where='rentlive.php';


return where;
}
// type tab  
















function scan(argument) {
  // body...

  var r =$('#scan').val();
    //  console.log("SCAN "+r);
// rent live  жесткая проверка
var d={'next_if_present': 'true', 'day': $('#scan').val() };
 
 // 1
$.ajax({
  url: 'indexworkerrent_live.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера

      $( "#dialog" ).dialog( "open" );
  }
});
//2
$.ajax({
  url: 'indexworkersale_living.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера

      $( "#dialog" ).dialog( "open" );
  }
});
//3
$.ajax({
  url: 'indexworkersale_bissnes.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера

      $( "#dialog" ).dialog( "open" );
  }
});
//4
$.ajax({
  url: 'indexworkerrent_bissnes.php',
   type: 'POST',
   data: d,
  success: function(data){
    // запуск таймера

      $( "#dialog" ).dialog( "open" );
  }
});



}