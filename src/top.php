<?php
include 'dbcontroller.php';
?>
<html>
		<script type="text/javascript" src="css/animate.min.css"></script>
    	<link href='css/animate.min.css' rel='stylesheet' type='text/css'>

<head>
<title>Database Systems Project</title>
<style type="text/css">
#box{
display:block;
height:200px;
width:100%;
}
	      body, html {
	          height: 100%;
	          margin: 0;
	          -webkit-font-smoothing: antialiased;
	          font-weight: normal;
	          background: #aadfeb;

	          font-family: helvetica;
	      }
	      
	      .tabs input[type=radio] {
	          position: absolute;
	          top: -9999px;
	          left: -9999px;
	      }
	      .tabs {
	        width: 100%;
	        float: none;
	        list-style: none;
	        position: relative;
	        padding: 0;

	      }
	      .tabs li{
	        float: left;
	      }
	      .tabs label {
	          display: block;
	          padding: 20px 5px;
	          border-radius: 2px 2px 0 0;
	          color: #08C;
	          font-size: 15px;
	          font-weight: normal;
	          font-family: 'Roboto', helveti;
	          background: rgba(255,255,255,0.2);
	          cursor: pointer;
	          position: relative;
	          top: 3px;
	          -webkit-transition: all 0.2s ease-in-out;
	          -moz-transition: all 0.2s ease-in-out;
	          -o-transition: all 0.2s ease-in-out;
	          transition: all 0.2s ease-in-out;
	      }
	      .tabs label:hover {
	        background: rgba(255,255,255,0.5);
	        top: 0;
	      }
	      
	      [id^=tab]:checked + label {
	        background: #08C;
	        color: white;
	        top: 0;
	      }
	      
	      [id^=tab]:checked ~ [id^=tab-content] {
	          display: block;
	      }
	      .tab-content{
	        z-index: 2;
	        display: none;
	        text-align: left;
	        width: 100%;
	        font-size: 15px;
	        line-height: 140%;
	        padding-top: 10px;
	        background: #08C;
	        padding: 15px;
	        color: white;
	        position: absolute;
	        top: 53px;
	        left: 0;
	        box-sizing: border-box;
	        -webkit-animation-duration: 0.5s;
	        -o-animation-duration: 0.5s;
	        -moz-animation-duration: 0.5s;
	        animation-duration: 0.5s;
	      }
</style>

</head>
<body>

<div class="container" id="box">
<div class="main">
<ul class="tabs">

<?php
$arrayOfTables = getTables();
$arrayLength = count($arrayOfTables);

for($x=0; $x < $arrayLength; $x++){

echo "<li><input type=\"radio\" checked name=\"tabs\" id=\"tab";
echo $x+1;
echo "\">";
echo "<label for=\"tab".($x + 1)."\">";
echo $arrayOfTables[$x];
echo "</label><div id=\"tab-content".($x + 1)."\" class=\"tab-content animated fadeIn\">";
echo getHTMLTable(selectAllFromTable($arrayOfTables[$x]));
echo "</div></li>";
}
?>
</ul>
</div>
</div>


</body>

</html>
