<?php
  if(isset($_SESSION['user_session']))
  {
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vaibhav</b> Leads</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="logout.php" class="home logout_btn">Logout <span class="glyphicon glyphicon-log-out"></span></a>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Navigation</li>
        <li class="active">
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>           
          </a>         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Leads</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="total_leads.php"><i class="fa fa-circle-o"></i> Total Leads</a></li>			  
            <li><a href="active_leads.php"><i class="fa fa-circle-o"></i> Active Leads</a></li>
            <li><a href="accepted_leads.php"><i class="fa fa-circle-o"></i> Accepted Leads</a></li>
			      <li><a href="declined_leads.php"><i class="fa fa-circle-o"></i> Declined Leads</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		      <ul class="treeview-menu">
            <li><a href="view_users.php"><i class="fa fa-circle-o"></i> View/Edit Users</a></li>
            <li><a href="add_user.php"><i class="fa fa-circle-o"></i> Add User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Target</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="set_target.php"><i class="fa fa-circle-o"></i> Set Target</a></li>
            <li><a href="view_targets.php"><i class="fa fa-circle-o"></i> View Target</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Incentive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_incentives.php"><i class="fa fa-circle-o"></i> View Incentive</a></li>
            <li><a href="unpaid_incentives.php"><i class="fa fa-circle-o"></i> Unpaid Incentive</a></li>
            <li><a href="view_incentives_schemes.php"><i class="fa fa-circle-o"></i>Incentive Schemes</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Rewards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_rewards.php"><i class="fa fa-circle-o"></i> View Reward Points</a></li>            
            <li><a href="rewards_policy.php"><i class="fa fa-circle-o"></i> Rewards Policy </a></li>
            <li><a href="redemption_policy.php"><i class="fa fa-circle-o"></i> Redemption Policy</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Loans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view_gold_loans.php"><i class="fa fa-circle-o"></i> View Gold Loans</a></li>
            <li><a href="add_gold_loan.php"><i class="fa fa-circle-o"></i> Add Gold Loan</a></li>
          </ul>
        </li>      
       
        <li class="header">Quick Links</li>
        <li><a href="pending_payments.php"><i class="fa fa-circle-o text-yellow"></i> <span>Pending Payments</span></a></li>
        <li><a href="view_schemes.php"><i class="fa fa-circle-o text-aqua"></i> <span>View Schemes</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php
  }
  else
  {
  ?>
    <script>
      window.location.href = "login.php";
    </script>
<?php
  }
?>