<?php
include 'dbcontroller.php';
?>
<html>
<head>
<title>Database Systems Project</title>
<style type="text/css">
	      body, html {
	          height: 100%;
	          margin: 0;
	          -webkit-font-smoothing: antialiased;
	          font-weight: 100;
	          background: #aadfeb;

	          font-family: helvetica;
	      }
#query_box{
text-align:center;
float: left;
border-radius: 5px;
margin:10px;
padding:10px;
background-color: #08C;
}


#queryResultBox{
float: right;
border-radius: 5px;
background-color: #08C;
width: 700px;
margin: 10px;

}
</style>

</head>
<body>

<div id="query_box">
<form id="qry-form" role="form" method="post" action="bottom.php">
<textarea name="query" rows="10" cols="50"></textarea>
<br>
<button type="submit" class="btn">Submit</button>
</form>
</div>

<div id="queryResultBox">
<?php
if(!empty($_POST)){
$postResult = $_POST['query'];
$result = sqlQuery($postResult);
$maxItemCount = sizeof($result);
for($index = 0; $index < $maxItemCount; $index++){
echo $result[$index];
}
}
?>
</div>
</body>
</html>
