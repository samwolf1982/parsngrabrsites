// Help fun

/*//  show all methods
var dino=$('#my-final-table2').data('dynatable');
console.log(Object.getOwnPropertyNames(dino));
 !!!!!!!!!!!!!!!
console.dir(dino);
*/

function rentLive(argument) {

// SELECT `day` as `День` , `time` as `Время` FROM `rent_living` WHERE 1


//v='[{"band":"Weezer","song":"El Scorcho"}, {"band": "Chevelle", "song": "Family System"} ]';
/*var $records = v;
    myRecords = $.parseJSON($records);
$('#my-final-table').dynatable({
  dataset: {
    records: myRecords
  }
});*/


$.ajax({
  url: 'rentlive.php',
  success: function(data){
                console.log(data);
    $('#my-final-table').dynatable({
      dataset: {
        records: $.parseJSON(data)
      }
    });
  }
});

};

$( document ).ready(function() {
// fill test 
var s='[{"band": "Weezer", "song": "El Scorcho"}, {"band": "Chevelle", "song": "Family System"} ]';

var $records =s;
    myRecords = JSON.parse(s);
$('#my-final-table2').dynatable({
  dataset: {
    records: myRecords
  }
});
// начально значение для дня
$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val());

// начальная загрузка таб
 var d={'data':JSON.stringify([$('#trackbar').val()])};
 //console.log(d);
replaseDataindinatable('#my-final-table','rentlive.php',d);

//$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val());
//-------------

  // Handler for .ready() called.
var myVar = setInterval(function() {

$.ajax({
  url: 'indexworker.php',
  success: function(data){
      console.log('to db OK');
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
replaseDataindinatable('#my-final-table','rentlive.php',d);

$("#tocv").attr("href", "tocv.php?day="+$('#trackbar').val());
//console.log($("#tocv").attr('href'));

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


$.ajax({
  url: fromurl,
  type:'POST',
  data: datasend, 
  success: function(data){
     // console.log('to db OK');
       //console.log(data);
       //console.log('to db OK');

    myRecords = JSON.parse(data);
                        

  var dynatable = $(idtable).dynatable({ 
    dataset: { records: myRecords } }, 
    { features: { pushState: false }}).data("dynatable");
                        dynatable.settings.dataset.originalRecords =  myRecords;
                        dynatable.process();  



  }
});


/*
       var s='[{"band": "Weezer2lorem", "song": "loremEl Scorcho2"}, {"band": "Chevelle2", "song": "Family System2"} ]';
var $records =s;
    myRecords = JSON.parse(fromurl);
                        

 var dynatable = $(idtable).dynatable({ 
    dataset: { records: myRecords } }, 
    { features: { pushState: false }}).data("dynatable");
                        dynatable.settings.dataset.originalRecords =  myRecords;
                        dynatable.process();  */

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

