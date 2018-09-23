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
<h3><span class='glyphicon glyphicon-tasks'></span> LAB Assets</h3>

<div align="left">
</div>
<form name="order" action="asset.php" method="get">
<div class="form-group" style="padding-right: 752px;">
<label><span class='glyphicon glyphicon-pushpin'></span> Select:</label>
	<select name="type" class="form-control">
	<option value="Consumable">Consumable</option>
	<option value="Non_Consumable">Non-Consumable</option>
	<option value="Furniture">Furniture</option>
	</select>
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
$limit = 10;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$ex=explode('|',$_GET['lab']);
$type=$_GET['type'];
echo "<h4><span class='glyphicon glyphicon-blackboard'></span> ".$ex[1]." Lab  ||  ".$type."</h4>";
?>
<!--##########################FORM###########################-->
<div class="container" style="padding-left: 933px;">
  <!-- Trigger the modal with a button -->
  <?php
	$k="select count(*) as k from user WHERE name='".$_SESSION['name']."' AND labid='".$ex[0]."'";
$kresult=mysqli_query($conn,$k) or die("could not execute if button");
$krows=mysqli_fetch_assoc($kresult);
if($krows['k']>0){
  ?>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" >Add</button>
	<?php }?>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add <?php echo $type." to ".$ex[1]." Lab" ?></h4>
        </div>
        <div class="modal-body">
  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
  <form role="form" method="POST" action="add.php" style="margin-left: 33px;margin-right: 33px;">
    <?php if($type=='Consumable' || $type=='Non_Consumable' ) { ?>
	  <label>Name:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="name" required> 
	  <label>Indent no:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="indent_no" required>
	  <label>Book no:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="book_no" required>
	  	  <label>quantity:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="quantity" required>
	  	  <label>Supplier:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="supplier_name" required>
	  	  <label>Store Indent no:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="store_indent_no" required>
	  	  <label>Bill no:</label>
      <input type="text" class="form-control" size="10" placeholder="YYYY-MM-DD" name="bill_no" required>
	  	  <label>Bill date:</label>
      <input type="date" class="form-control" size="10" placeholder="Query" name="bill_no_date" required>
	  	  <label>Price:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="price" required>
	  	  <label>Balance:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="balance" required>
	  	  <label>Signed by:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="signed_by" required>
	  	  <label>remark:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="remark">
	    <?php } else {?>
		 <label>Name:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="name" required> 
	   <label>Quantity:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="quantity" required>
	   <label>Colour:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="colour" required> 	
	   <label>Type:</label>
      <input type="text" class="form-control" size="10" placeholder="Query" name="type" required> 	  
	    <?php }
		echo"<input type='hidden' name='type' class='form-control' value='".$type."'>
		<input type='hidden' name='labid' class='form-control' value='".$ex[0]."'>";
		?>
	  <br>
        <button name="Submit" class="btn btn-success btn-block glyphicon glyphicon-plus" type="submit" id="upload"> <strong>Add</strong></button>
  </form>

  <!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--#####################################################-->
<hr color="#d5d5d5">
 <center>
<table class="table table-striped table-hover table-bordered">
    <thead>
	<?php if($type!="Furniture"){ ?>
      <tr class=" info">
        <th>Srno</th>
        <th>Name</th>
        <th>Indent no</th>
        <th>Book no</th>
        <th>Quantity</th>
        <th>Supplier</th>
        <th>Store indent no</th>
        <th>Bill no</th>
        <th>Bill date</th>
        <th>Price</th>
        <th>Balance</th>
        <th>Signed by</th>
        <th>Remark</th>
        <th>Condemn</th>
		</tr>
	<?php }
	else{?>
	 <tr class="warning">
        <th><span class='glyphicon glyphicon-asterisk'></span> Srno</th>
        <th><span class='glyphicon glyphicon-align-center'></span> Name</th>
        <th><span class='glyphicon glyphicon-align-center'></span> Quantity</th>
        <th><span class='glyphicon glyphicon-align-center'></span> Colour</th>
        <th><span class='glyphicon glyphicon-align-center'></span> type</th>
        <th><span class='glyphicon glyphicon-align-center'></span>Condemn</th>
		</tr>
	<?php }?>
    </thead>
    <tbody>
	<?php
		$sql2="SELECT * from ".$type." WHERE labid='".$ex[0]."' AND condemned!='y' ORDER BY srno ASC LIMIT ".$start_from.", ".$limit;
		//echo $sql2;
		$result2=mysqli_query($conn,$sql2) or die("could not execute asset fetch");
		if($type!="Furniture")
		{
		while($rows2=mysqli_fetch_assoc($result2))
		{
      $list.="<tr>";
         $list.="<th>".$rows2['srno']."</td>";
         $list.="<td>".$rows2['name']."</td>";
         $list.="<td>".$rows2['indent_no']."</td>";
         $list.="<td>".$rows2['book_no']."</td>";
         $list.="<td>".$rows2['quantity']."</td>";
         $list.="<td>".$rows2['supplier_name']."</td>";
         $list.="<td>".$rows2['store_indent_no']."</td>";
         $list.="<td>".$rows2['bill_no']."</td>";
         $list.="<td>".$rows2['bill_no_date']."</td>";
         $list.="<td>".$rows2['price']."</td>";
         $list.="<td>".$rows2['balance']."</td>";
         $list.="<td>".$rows2['signed_by']."</td>";
         $list.="<td>".$rows2['remark']."</td>";
         $list.="<td><button type='button' class='btn btn-warning btn-sm glyphicon glyphicon-trash' onclick=javascript:window.location.href='addcondemn.php?id=".$rows2['srno']."&type=".$type."'> Condemn</button></td>";
		 $list.="</tr>";
}}
	else{
		while($rows2=mysqli_fetch_assoc($result2))
		{
	  $list.="<tr>";
         $list.="<td>".$rows2['srno']."</td>";
        $list.=" <td>".$rows2['name']."</td>";
         $list.="<td>".$rows2['quantity']."</td>";
         $list.="<td>".$rows2['colour']."</td>";
         $list.="<td>".$rows2['type']."</td>";
         $list.="<td><button type='button' class='btn btn-warning btn-sm glyphicon glyphicon-delete' onclick=javascript:window.location.href='addcondemn.php?id=".$rows2['srno']."&type=".$type."'>Condemn</button></td>";
		 $list.="</tr>";
		}
		}
	echo $list;
	?>
    </tbody>
  </table>
  </center>
  <?php 
  
$sql = "SELECT count(*) from ".$type." WHERE labid='".$ex[0]."'";  
$rs_result = mysqli_query($conn,$sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
			 if($page==$i){
             $pagLink .= "<li class='active'><a href='asset.php?type=".$type."&lab=".$_GET['lab']."&page=".$i."'>".$i."</a></li>";
			 }
			 else{
			$pagLink .= "<li><a href='asset.php?type=".$type."&lab=".$_GET['lab']."&page=".$i."'>".$i."</a></li>";
			 }
};  
echo $pagLink . "</ul></div></div>"; 
  
  } 
  ?>
 </div>
 <script>
function clickEvent(){
    javascript:window.location.href='addcondemn.php?id=".$rows2['srno']."&type=".$type."';
	confirm(Sure?);
}
</script>
<?php
include("../connection/close.php");
include("../common/footer.php");
?>