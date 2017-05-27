<?php 
session_start();
include('init.php');
if(!$_SESSION['username']){
	header('Location:login.php');
	}
include_once('includes/header.php'); ?>
	<!-- Modal Display for user -->
	<div id="modal-user" class="modal hide">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="user-infos">User 1</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span2">
					<img src="img/demo/user-1.jpg" alt="">
				</div>
				<div class="span10">
					<dl class="dl-horizontal" style="margin-top:0;">
						<dt>Full name:</dt>
						<dd>User 1</dd>
						<dt>Email:</dt>
						<dd>jane.doe@janedoesemail.com</dd>
						<dt>Address:</dt>
						<dd>
							<address> <strong>John Doe, Inc.</strong>
								<br>
								7195 JohnsonDoes Ave, Suite 320
								<br>
								San Francisco, CA 881234
								<br> <abbr title="Phone">P:</abbr>
								(123) 456-7890
							</address>
						</dd>
						<dt>Social:</dt>
						<dd>
							<a href="#" class='btn'><i class="icon-facebook"></i></a>
							<a href="#" class='btn'><i class="icon-twitter"></i></a>
							<a href="#" class='btn'><i class="icon-linkedin"></i></a>
							<a href="#" class='btn'><i class="icon-envelope"></i></a>
							<a href="#" class='btn'><i class="icon-rss"></i></a>
							<a href="#" class='btn'><i class="icon-github"></i></a>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
		</div>
	</div>
    
	<?php include_once ('includes/top-navigation.php'); ?>
	<div class="container-fluid" id="content">
		<?php include_once('includes/side-navigation.php'); ?>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
					<div class="pull-right">
						<ul class="stats">
							<li class='blue'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo date('F '.'d,'.'Y')?></span>
									<span><?php //$today=gettimeofday();
												//print_r($today); ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<?php include_once('includes/breadcrumbs.php'); ?>
				<div class="row-fluid">
                	<div class="span12">
                    	<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Basic Widget
								</h3>
							</div>
							<div class="box-content">
								<?php if($_GET['module']){include_once(PATH.$_GET['module']); }?>
							</div>
						</div>
                    </div>
				</div>
				
				
				
				
			</div>
		</div></div>
		
<?php include_once ('includes/footer.php'); ?>