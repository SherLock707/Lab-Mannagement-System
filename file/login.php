<?php
include("../common/blankheader.php");
?>
    <div> 
    <div class="col-sm-8">

      <form class="form-signin" name="form1" method="post" action="checklogin.php">
	  	<?php 
	if(isset($_GET['error']))
	{
	echo '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-lable="close"></a><strong>Wrong Username Or Password</strong></div>';
	}
	?>
        <h2 class="form-signin-heading">Sign in</h2>
        <input name="username" id="username" type="text" autocomplete="off" class="form-control" placeholder="Username" required> <!--autofocus-->
        <input name="password" id="password" type="password" class="form-control" placeholder="Password" required>
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div id="message"></div>
      </form>

    </div> <!-- /container -->
    </div>
<?php
include("../common/footer.php");
?>