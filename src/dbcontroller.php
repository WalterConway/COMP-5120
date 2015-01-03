<?php
include 'dbconnect.php';


function getTables(){
$con = connectToDB();
/* query */
$query = "show tables";
$result = mysqli_query($con, $query);

/* fetch result */
$count = 0;
$resultsArray = array();
while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
array_push($resultsArray,$row[0]);
}
mysqli_close($con);
return $resultsArray;
}

function selectAllFromTable($tableName){
$con = connectToDB();
/* query */
$query = "select * from $tableName";
$result = mysqli_query($con, $query);
mysqli_close($con);
return $result;
}


function getHtmlTable($rs){
 // receive a record set and print
 // it into an html table
 $out = '<table>';
 while ($field = $rs->fetch_field()) $out .= "<th>".$field->name."</th>";
 while ($linea = $rs->fetch_assoc()) { $out .= "<tr>";
 foreach ($linea as $valor_col) $out .= '<td>'.$valor_col.'</td>';
 $out .= "</tr>";
 } $out .= "</table>";
 return $out; 

}

function sqlQuery($SQLQuery){
	if(!empty($SQLQuery) && isset($SQLQuery)) {
		$pos = stripos($SQLQuery, 'drop');
		if($pos === false){
			$con = connectToDB();
			mysqli_set_charset($con, "utf8");
			/* query */
			$query = stripslashes($SQLQuery);
			$result = mysqli_query($con, $query);
			if($result === FALSE) {
			echo "<script>";
			echo "document.getElementById(\"queryResultBox\").style.backgroundColor=\"red\";";
			echo "</script>";
//var_dump($query);
    			die("Error executing statement: ".  mysqli_error($con) );
			}else {
			/* fetch result */
			//var_dump($result);
			$count = 0;
			$resultsArray = array();

/*while($row = mysqli_fetch_assoc($result)) {   
        foreach ($row as $col => $val) {
            echo $col." = ".$val."<br>";
        }
    }*/
echo getHtmlTable($result); 

			//var_dump(mysqli_fetch_fields($result));
			while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
				array_push($resultsArray,$row[1]);
			}
			}
			mysqli_close($con);
			return $resultsArray;
		} else{
			echo "<script>";
			echo "document.getElementById(\"queryResultBox\").innerHTML = \"Can not use DROP!\";";
			echo "document.getElementById(\"queryResultBox\").style.backgroundColor=\"red\";";
			echo "</script>";
		}
	} else {
			echo "<script>";
			echo "document.getElementById(\"queryResultBox\").innerHTML = \"Empty Result!\";";
			echo "</script>";
	}
}

?>