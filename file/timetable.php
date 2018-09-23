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
<h3><span class='glyphicon glyphicon-tasks'></span> LAB Time-Table</h3>

<div align="left">
</div>
<form name="order" action="timetable.php" method="get">
<div class="form-group" style="padding-right: 752px;">
<label><span class='glyphicon glyphicon-pushpin'></span> Select lab:</label>
    <select name="lab" onchange="this.form.submit()" class="form-control">
	<option style="display:none"> -- Select a Lab -- </option>
	<?php
$sql="select labid,name from lab";
$result=mysqli_query($conn,$sql) or die("could not execute Lab select");
while($rows=mysqli_fetch_assoc($result))
   {
        $list.="<option value='".$rows['labid']."|".$rows['name']."'>".$rows['name']."</option>";
   }
   echo $list;
   $list=NULL;
?>
    </select>
	</div>
</form>
<?php
if(isset($_GET['lab']))
{
$ex=explode('|',$_GET['lab']);
echo "<h4><span class='glyphicon glyphicon-blackboard'></span> ".$ex[1]." Lab</h4>";
$day = array("2"=>"Mon", "3"=>"Tue", "4"=>"Wed","5"=>"Thur","6"=>"Fri");
$i=2;
?>
<hr color="#d5d5d5">
 <center>
<table class="table table-striped table-hover table-bordered" style="background-color: #F9F9F9;">
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
	//$list.="<td rowspan='5'style='padding-left: 29px;'> <p class='vericaltext'>B  R  E  A  K</p></td>";
	While($i<=6)
	{
		$list.="<tr>";
		$list.="<th class='info'>".$day[$i]."</th>";
		$sql2="SELECT subject,type,start,finish FROM session WHERE day='".$i."' AND labid='".$ex[0]."' ORDER BY start";
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
	$i++;
	} 
	echo $list;
	$list=null;
	?>
    </tbody>
  </table>
  </center>
  <div align="left" style="padding-right: 789px;">
  <?php 
		$sql3="SELECT Distinct name from assist a join manage m ON a.assistid=m.assistid WHERE labid='".$ex[0]."'";
		$result3=mysqli_query($conn,$sql3) or die("could not execute assist fetch");
		$list.="<pre><label><span class='glyphicon glyphicon-user'></span> Lab Assistant(s) :</label><br>";
		while($rows3=mysqli_fetch_assoc($result3))
		{
		$list.="&#09;&#09;".$rows3['name']."<br>";
		}	
		$list.="</pre>";
		echo $list;
  } ?>
 </div>
 </div>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>