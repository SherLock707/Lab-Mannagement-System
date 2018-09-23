<?php
	session_start();
	if(!isset($_SESSION['name'])){
	header('Location: login.php', true);
	}
$Name = $_SESSION['name'];
include("../common/header.php");
include("../connection/connect.php");
?>
<div class="col-sm-8">
<h3><span class='glyphicon glyphicon-calendar'></span> Day's time table</h3>
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

   <br>
   <br>
    <form action="datepick.php" class="form-horizontal" method="GET" style="padding-right: 798px;">
        <div class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
        <input class="form-control" id="date" name="date" placeholder="DD-MM-YYYY" type="text"/><br><br>
		<button class="btn btn-md btn-primary btn-block glyphicon glyphicon-cog" type="submit"> 
<strong>Generate</strong></button>
       </div>
    </form>
<?php
if(isset($_GET['date']))
{
echo"<h4><span class='glyphicon glyphicon-globe'></span> ".date('d M Y', strtotime($_GET['date']))."</h4>";
$day=date('w', strtotime($_GET['date']))+1;
?>
<center>
<table class="table table-striped table-hover table-bordered">
    <thead>
      <tr class=" info">
        <th><span class='glyphicon glyphicon-time'></span> Day/Time <span class='glyphicon glyphicon-calendar'></span> </th>
		<th class='text-center'>9 - 10</th>
        <th class='text-center'>10 - 11</th>
        <th class='text-center'>11 - 12</th>
        <th class='text-center'>12 - 1</th>
        <th class='text-center'>1 - 2</th>
        <th class='text-center'>2 - 3</th>
        <th class='text-center'>3 - 4</th>
        <th class='text-center'>4 - 5</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$list=null;
		$sql="SELECT labid,name from lab";
		$result=mysqli_query($conn,$sql) or die("could not execute session fetch");
		while($rows=mysqli_fetch_assoc($result))
		{
		$list.="<tr>";
		$list.="<th class='info'> ".$rows['name']."</th>";
		$sql2="SELECT subject,type,start,finish FROM session WHERE day='".$day."' AND labid='".$rows['labid']."' ORDER BY start";
		$result2=mysqli_query($conn,$sql2) or die("could not execute session fetch");
		while($rows2=mysqli_fetch_assoc($result2))
		{
		$c= date('H',strtotime($rows2['finish'])) - date('H',strtotime($rows2['start']));
		if($rows2['subject']==NULL)
		$list.="<td style='border: 1px solid black;' colspan='".$c."'><i></i></td>";
		else
		$list.="<td style='border: 1px solid black;' class='text-center' colspan='".$c."'>".$rows2['subject']." (".$rows2['type'].")</td>";
		if($rows2['finish'] == "13:00:00")
		$list.="<td class='success text-center'>LUNCH</td>";
		}
	$list.="</tr>";
	} 
	echo $list;
	?>
    </tbody>
  </table>
  </center>
  <?php
//##################################################################
} ?>
</div>	




 <script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="../css/bootstrap-datepicker3.css"/>
<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>