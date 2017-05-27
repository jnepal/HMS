<?php session_start(); ?>
<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">HMS</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
    <ul class='main-nav'>
        <li class='active'>
            <a href="index.php">
                <i class="icon-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                <i class="glyphicon-settings"></i>
                <span>Department</span>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="http://<?php echo URL;?>index.php?module=<?php echo 'view/department/add.php';?>">Add department</a>
                </li>
                <li>
                    <a href="http://<?php echo URL;?>index.php?module=<?php echo 'view/department/list.php';?>">List Departments</a>
                </li>
            </ul>
				</li>
				
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    	<i class="glyphicon-charts"></i>
						<span>Doctor</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="http://<?php echo URL;?>index.php?module=<?php echo 'view/doctor/list.php';?>">Doctors List</a>
						</li>
						<li>
							<a href="http://<?php echo URL;?>index.php?module=<?php echo 'view/doctor/add.php';?>">Add Doctors</a>
						</li>
					</ul>
				</li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    	<i class="glyphicon-charts"></i>
						<span>Reports</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Remitting Transaction Report</a>
						</li>
						<li>
							<a href="#">Unpaid Report</a>
						</li>
						<li>
							<a href="#">Paid Report</a>
						</li>
                        <li>
							<a href="#">Settlement Report</a>
						</li>
					</ul>
				</li>
                <li>
					<a href="#">
                    	<i class="icon-info-sign"></i>
						<span>About</span>
                   	</a>
				</li>
			</ul>
			<div class="user">
				<ul class="icon-nav">
					<li class='dropdown'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope-alt"></i><span class="label label-lightred">4</span></a>
						<ul class="dropdown-menu pull-right message-ul">
							<li>
								<a href="#">
									<img src="img/demo/user-1.jpg" alt="">
									<div class="details">
										<div class="name">Maiya Devi</div>
										<div class="message">
											This is message 1 ...
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-2.jpg" alt="">
									<div class="details">
										<div class="name">Binod Chaudary</div>
										<div class="message">
											This is message 2 ...
										</div>
									</div>
									<div class="count">
										<i class="icon-comment"></i>
										<span>3</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/demo/user-3.jpg" alt="">
									<div class="details">
										<div class="name">Abhash Pokhrel</div>
										<div class="message">
											This is message 3.
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="#" class='more-messages'>Go to Message center <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#" class='lock-screen' rel='tooltip' title="Lock screen" data-placement="bottom"><i class="icon-lock"></i></a>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['username']; ?><img src="img/demo/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="userprofile.php">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li>
						<li>
							<a href="http://<?php echo URL.'logout.php'?>">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>