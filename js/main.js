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
  url: 'fill/rentlive.php',
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




