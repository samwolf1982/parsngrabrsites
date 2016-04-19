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

  console.log($('#trackbar').val());
  var dino=$('#my-final-table').data('dynatable');
  dino.processingIndicator.show();
}

function testClick(argument) {
  // body... send date from n to
$.post('test.php',{
        from: "Donald Duck",
        to: "Duckburg"
    },function (data,status) {
  // body...


//    var dino=$('#my-final-table tr').data('dynatable');
var dino=$('#my-final-table tbody tr');
dino.remove();


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
$('#my-final-table').data('dynatable').dom.update();
         /* console.log('countB '+dino.records.count() );
          var t='{"Дата": "2016-04-18","Время": "20:42:00","Тип": "Комната","Цена": "8000","Адрес": "улица Коненкова 21А","Площадь": "18","Комнат": "2","Метро": "Бибирево","Телефон": "966357","Имя": "НадеждаLOLO"}';
            *///dino.state.push=t;
/*            var $records = t;
    myRecords = JSON.parse(t);
$('#my-final-table').dynatable({
  dataset: {
    records: myRecords
  }
});*/
          
          //  dino.records.updateFromJson=t;



          //  dino.dom.update();
          //dino.remove();
                  //  console.log('countR '+dino.records.count() )

});




}


