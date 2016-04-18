<?php
header("Content-type: text/plain; charset=windows-1251");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);


$v='[
  {
    "band": "Weezer",
    "song": "El Scorcho"
  },
  {
    "band": "Chevelle",
    "song": "Family System"
  }
]';

$v='{
  "records": [
    {
      "someAttribute": "I am record one",
      "someOtherAttribute": "Fetched by AJAX"
    },
    {
      "someAttribute": "I am record two",
      "someOtherAttribute": "Cuz it s awesome"
    },
    {
      "someAttribute": "I am record three",
      "someOtherAttribute": "Yup, still AJAX"
    }
  ],
  "queryRecordCount": 3,
  "totalRecordCount": 3}';
echo json_encode($v);

  ?>

