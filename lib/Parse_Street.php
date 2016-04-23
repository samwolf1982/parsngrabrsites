<?php


/**
 *  класс для разделение улиц и номера дома также бульват и проулок
 */
class ParseStreet {
	public $sql;
	public $link;
	public $host;
	public $user;
	public $pass;
	public $dbname;
	public $linke;
	function __construct($sql1, $h, $u, $p, $dn) {
		# code...
		$this->sql = $sql1;
		$this->host = $h;
		$this->user = $u;
		$this->pass = $p;
		$this->dbname = $dn;
	}

	public function convertString($row) {
		# code...
		$result = array();

		$house = null;
		$adress = $row['street'];
		$arr = preg_split("/[(Бульвар)|(б)]ульвар|(П)ереулок|(п)ереулок/", $row['street']);
		//echo $row['street']."<br>";
		if (count($arr) > 1) {
			echo "<br>";
			//print_r($arr);
			// echo '<br>Result: '. $row['street'].':    ';
			//.    print_r($arr);
			$adress = $arr[0];
			//   echo "Adress:  $adress <br>";
			$t = $arr[1];
			$matches = array();
			$colect = array();
			$line = preg_replace_callback(
				'|\d{1,3}|',
				function ($matches) use (&$colect) {

					$colect[] = $matches[0];
					return ($matches[0]);
				},
				trim($arr[1])
			);
			// echo $line;
			if (count($colect) > 0) {
				//echo "<br><br>--------UP<br>";
				//   echo Debuger::dumper($matches[0]);
				//echo print_r($matches);
				$house = $colect[0];
				//   echo $row['street'] ."  :::::: ".$colect[0];
				//     echo "<br>-------DOWN";

			}

		}
//      доделать
		if ($house == null) {
			$arr = preg_split("/(улица.)|(улица,)|( ул.)|( ул,)|( ул:)|( ул\s)/", $row['street']);
			//echo $row['street']."<br>";
			if (count($arr) > 1) {
				//   адрес
				//echo "<br>".$row['street']."::::: ".$arr[0]."----".$arr[1] ;
				if (strlen($arr[1]) > 1) {
					//	echo "string";
					// первое число в второй частиї
					$colect = array();
					$line = preg_replace_callback('|([0-9]*)|',
						function ($matches) use (&$colect) {
							//                                     echo " OK ".$matches[0];
							$colect[] = $matches[0];
							return ($matches[0]);
						}, trim($arr[1]));
					// echo $line;
					if (count($colect) > 0) {
						//echo "<br><br>--------UP<br>";
						//   echo Debuger::dumper($matches[0]);
						//echo print_r($matches);
						$house = $colect[0];
						$adress = $arr[0];
						//   echo $row['street'] ."  :::::: ".$colect[0];
						//     echo "<br>-------DOWN";
						//echo "<br>".$row['street']."::::: ".$house."----".$adress ;
					}

				}

			}

		}
		if ($house != null) {

//echo "<br>".$row['street']."::::: ".$house."----".$adress ;
			// end while
		} else {
			$house = $adress;
		}

		$result[] = $row['street'];
		$result[] = $house;
		$result[] = $adress;
//echo "<br>".$row['street']."::::: ".$house."----".$adress ;

	}

	// full parse 3 stage
	public function parseBulvarPereulokStreet() {
		# code...
		// $rows = mysqli_query($link,$sql);

		$this->linke = mysqli_connect($this->host, $this->user, $this->pass);

		//printf("Select вернул %d строк.\n", mysqli_num_rows($result));
		mysqli_set_charset($this->linke, "utf8"); //
		mysqli_select_db($this->linke, $this->dbname); //,'testwp1'
		$rows = mysqli_query($this->linke, $this->sql);

// loop over the rows, outputting them
		while ($row = mysqli_fetch_assoc($rows)) {

//    1)  поиск ул ./;.,  возможно бульвар.
			$this->convertString($row);

		}

		// mysqli_free_result($result);

	}
	public function conect() {
		# code...
		$this->linke = mysqli_connect($this->host, $this->user, $this->pass);

//print_r( mysqli_character_set_name ( $link ));
		//mysql_set_charset($link, "utf8");

		//printf("Select вернул %d строк.\n", mysqli_num_rows($result));
		mysqli_set_charset($this->linke, "utf8"); //
		mysqli_select_db($this->linke, $this->dbname); //,'testwp1'

	}

}

?>