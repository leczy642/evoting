<html>
<head>
<title></title>
<style type="text/css">

#apDiv1 {
	position: absolute;
	left: 406px;
	top: 32px;
	width: 341px;
	height: 375px;
	z-index: 1;
	background-color:#fff;
	border-radius:18px;
	border:1px solid;
	
}
   body{
	   font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	   font-size:14px;
	   background-color:#e6e4df;
	   text-transform:uppercase;
	   }
	   
	 .btn{
		 display:inline-block;
		 color:#fff;	
		 background:#db3222;
		 padding: 8px 16px;	 
		 }
</style>

</style>
</head>
<body>
<div id="#apDiv1" class="side-bar">
<h1>Opinion poll</h1>
<p>who is the best rapper for 2013?</p>
<form method="post" action="">
<input type="radio" name="vote" value="drake">Drake</input><br/>
<input type="radio" name="vote" value="eminem">Eminem</input><br/>
<input type="radio" name="vote" value="mi">MI</input><br/>
<input type="submit" name="submit" value="display results" class="btn"></input>

</form>
<div>
<?php 
$connect=mysql_connect("localhost","root","");
$select=mysql_select_db("tutorials");
$vote=@$_POST['vote'];
$submit=@$_POST['submit'];
 
 if($submit){
 
    $query=mysql_query("UPDATE poll SET num_votes=num_votes+1 WHERE candidate='$vote'");
	
	$display=mysql_query("SELECT * FROM poll");
	$count=mysql_num_rows($display);
	
	if($count!=0){
	 while($row=mysql_fetch_assoc($display)){
	 $candidate=$row['candidate'];
	 $num_votes=$row['num_votes'];
	 @$total_votes+=$row['num_votes'];
	
	  echo("$candidate---$num_votes<br/>");
	 }
      echo("total---$total_votes");	
	}
 }

?>
<div>
</div>
</body>
</html>