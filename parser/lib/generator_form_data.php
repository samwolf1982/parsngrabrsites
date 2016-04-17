<?php 


//city 507 -moscov   sec 1 rentliv 2 sale live  3 bisnes rent 4 bisnes sale
function generator_form_data($city="1628",$section="1",$datefrom="6/03/2016",$dateto="7/03/2016",$csrf="TUdydWt1cHcZNjdCGgUUGCMGBD1bGTEkLzAKPDkSAkEPFCQXMz9IMg==")
{
	# code...
$b=["_csrf"=>$csrf
,"searchFilter[city]"=>$city
,"searchFilter[section]"=>$section
,"searchFilter[source]"=>""
,"searchFilter[dateFrom]"=>$datefrom
,"searchFilter[dateTo]"=>$dateto
,"searchFilter[type]"=>""
,"searchFilter[district]"=>""
,"searchFilter[metro]"=>""
,"searchFilter[latitudeFrom]"=>""
,"searchFilter[latitudeTo]"=>""
,"searchFilter[longitudeFrom]"=>""
,"searchFilter[longitudeTo]"=>""
,"searchFilter[roomsFrom]"=>""
,"searchFilter[roomsTo]"=>""
,"searchFilter[squareFrom]"=>""
,"searchFilter[squareTo]"=>""
,"searchFilter[floorFrom]"=>""
,"searchFilter[floorTo]"=>""
,"searchFilter[floorsFrom]"=>""
,"searchFilter[floorsTo]"=>""
,"searchFilter[priceFrom]"=>""
,"searchFilter[priceTo]"=>""
,"searchFilter[description]"=>""
,"searchFilter[address]"=>""];
	return $b;
}
//city 507 -moscov   sec 1 rentliv 2 sale live  3 bisnes rent 4 bisnes sale
function generator_form_datawithoutkey($city="1628",$section="1",$datefrom="6/03/2016",$dateto="7/03/2016")
{
	# code...
$b=[
"searchFilter[city]"=>$city
,"searchFilter[section]"=>$section
,"searchFilter[source]"=>""
,"searchFilter[dateFrom]"=>$datefrom
,"searchFilter[dateTo]"=>$dateto
,"searchFilter[type]"=>""
,"searchFilter[district]"=>""
,"searchFilter[metro]"=>""
,"searchFilter[latitudeFrom]"=>""
,"searchFilter[latitudeTo]"=>""
,"searchFilter[longitudeFrom]"=>""
,"searchFilter[longitudeTo]"=>""
,"searchFilter[roomsFrom]"=>""
,"searchFilter[roomsTo]"=>""
,"searchFilter[squareFrom]"=>""
,"searchFilter[squareTo]"=>""
,"searchFilter[floorFrom]"=>""
,"searchFilter[floorTo]"=>""
,"searchFilter[floorsFrom]"=>""
,"searchFilter[floorsTo]"=>""
,"searchFilter[priceFrom]"=>""
,"searchFilter[priceTo]"=>""
,"searchFilter[description]"=>""
,"searchFilter[address]"=>""];
	return $b;
}


 ?>