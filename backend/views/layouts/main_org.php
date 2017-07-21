<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\User;
use backend\models\employees\Employees;
DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--script src="/js/ajax-jquery-1.11.0.min.js"></script>
  <script src='/js/jquery-ui1.12.1.min.js'</script-->
  <script src="/js/jquery.min.js"></script>

  <script type="text/javascript" src="/js/cropbox.js"></script>
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  </head>
  <body class=" skin-blue sidebar-mini" style="padding:0">
    <?php $this->beginBody() ?>
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php Yii::$app->homeUrl?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="/" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                          page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                      <!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo Yii::$app->user->identity->firstname;   ?> </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                      <!--?php echo Yii::$app->user->identity->firstname. ' '. Yii::$app->user->identity->lastname; ?-->
                      <!--?php $startDate = Employees::findOne(['id_employees' => Yii::$app->user->id])?-->

                      <small>Employee since <!--?php echo $startDate->employees_startdate  ?--></small>
                      <!--?php if (!Yii::$app->user->isGuest) {
                        $user_role =  Yii::$app->user->identity->getRoleName();
                      }?-->
                      <small>User Role: <!--?php echo ucwords($user_role) ?--> </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                        <a href="#">Followers</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Sales</a>
                      </div>
                      <div class="col-xs-4 text-center">
                        <a href="#">Friends</a>
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/user/view?id=<?php echo Yii::$app->user->id?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <?php echo Html::beginForm(['/site/logout'], 'post');
                      echo Html::submitButton('Logout',['class' => 'btn btn-default btn-flat logout']);
                      echo Html::endForm();?>

                      </div>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p> <?php echo Yii::$app->user->identity->firstname. ' '. Yii::$app->user->identity->lastname; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- search form -->
      <!--form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!--?php if (!Yii::$app->user->isGuest) {
        $user_role =  Yii::$app->user->identity->getRoleName();
      }else{
        echo '/404';
      }
      ?-->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!--span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span-->
          </a>
          <!--ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul-->
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa ion ion-android-people"></i>
            <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <!--span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span-->
          </a>
          <ul class="treeview-menu">
            <li><a href="/customer/create/"><i class="fa fa-angle-right"></i>Create customer</a></li>
            <li><a href="/customer-branch/create/"><i class="fa fa-angle-right"></i>Create branch</a></li>
            <li class="divider"></li>
            <li><a href="/customer/"><i class="fa fa-angle-right"></i>Customers list</a></li>
            <li><a href="/customer-branch/"><i class="fa fa-angle-right"></i>Branches list</a></li>
            <!--li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
            </ul>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="fa ion ion-android-person"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <!--span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span-->
          </a>
          <ul class="treeview-menu">
            <li><a href="/employees/create/"><i class="fa fa-angle-right"></i>Create Employee</a></li>
            <li class="divider"></li>
            <li><a href="/employees/"><i class="fa fa-angle-right"></i>Employee List</a></li>
            <!--li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa ion ion-briefcase"></i>
              <span>Departments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            <!--span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span-->
          </a>
          <ul class="treeview-menu">
            <li><a type="button" href="/department/create/"><i class="fa fa-angle-right"></i>Create Department</a></li>

            <!--li>
               <button  id="AddDepartment" class="modalButton" value="/department/createmodal/"><i class="fa fa-angle-right  modalButton"></i> Create Department</button>
             </li-->
             <li><a href="/department/"><i class="fa fa-angle-right"></i>Department List</a></li>
            <!--li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa ion ion-clipboard"></i>
              <span>Attendance</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              <!--span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span-->
            </a>

            <ul class="treeview-menu">
              <li><a href="/attendance/create/"><i class="fa fa-angle-right"></i>Create Attendance</a></li>
              <li class="divider"></li>
              <li><a href="/attendance/"><i class="fa fa-angle-right"></i>Attendance List</a></li>
              <!--li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
              <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
              </ul>
            </li>
          <li class="treeview">
            <a href="#">
              <i class="fa ion ion-clipboard"></i>
              <span>Contracts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              <!--span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span-->
            </a>

            <ul class="treeview-menu">
              <li><a href="/contract/create/"><i class="fa fa-angle-right"></i>Create New Contract</a></li>
              <li><a href="/contract-fireextinguisher/create"><i class="fa fa-angle-right"></i>New Fire Extinguisher</a></li>
              <li class="divider"></li>
              <li><a href="/contract/"><i class="fa fa-angle-right"></i>Contract List</a></li>
              <!--li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
              <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
              </ul>
            </li>




            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green">new</small>
                </span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level One
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Level Two
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
              </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <!-- Modal With Form -->
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
       <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Dashboard</li-->
        <?= 
        Breadcrumbs::widget([
          'homeLink' => [ 
          'label' => Yii::t('yii', 'Dashboard'),
          'url' => Yii::$app->homeUrl,
          ],
          'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) 
          ?>
        </ol>
      </section>
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content col-xs-12">
        <?= $content ?>
      </section>
    </div>
    <div id="modalWarningShow">
    </div>
    <?php /*<div id="Warning" class="modal fade" role="dialog" data-backdrop="false">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-header alert alert-warning">
            <button type="button" class="close closefirstmodal">&times;</button>
            <!--div class="alert alert-warning alert-dismissible"-->
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <!--/div-->

          </div>
          <div class="modal-body">
          <script>
            
          </script>
           <p id="modalTitle"></p>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default confirmclosed">Yes</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal With Warning -->
  <div  class="modal fade" role="dialog" data-backdrop="false">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">


        </div>
      </div>
    </div>
  </div>*/?>
  <footer class="footer">
    <div class="container">
      <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

      <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
  </footer>
  <script src="/js/bootstrap.js"></script>
  <?php $this->endBody() ?>
  <!-- Smooth scroll-->
  <script>
    $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();
      var target = this.hash;
      var dataHash = $(this).attr("data-hash");
      $(this).addClass('current');
      $target = $(target);
      $('html, body').stop().animate({
        'scrollTop':  $target.offset().top
      }, 900, 'swing', function () {
        window.location.hash = target; 

      });
    });

  </script>

        

  <!--start datepicker-->
  <script>
 var today = new Date();
    
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        startDate: today,
        autoclose: true,
        todayHighlight: true,
        toggleActive: true,
        todayBtn: "linked",
    });
  </script>
  <script>

      

        /*$("#contract-contract_start").change(function(){
         date = $('#contract-contract_start').attr("value")
         var second_date = new Date(date),
          fecha = new Date(date);
          fecha.setMonth(fecha.getMonth());
          fecha.setDate(fecha.getDate()+1);
          alert(fecha)
            tiempo = prompt("Ingrese la cantidad de días a añadir"),
            addTime = 30,4167 * 86400;
            second_date.setSeconds(addTime);
          $("#contract-contract_expire").attr("value", second_date.getDate() + "/" + (second_date.getMonth() + 1) + "/" + second_date.getFullYear());
          $("#contract-contract_expire-disp").attr("value", second_date.getDate() + "/" + (second_date.getMonth() + 1) + "/" + second_date.getFullYear());
       })*/
</script>

  <script>
    var $ = jQuery.noConflict();
    $('.onoffswitch-checkbox').on('click',function(e){
      var elem = $(this).attr('id');
      if ($('#'+elem).is(':checked') == true){
        $('#'+elem).attr('checked','checked');
        $('#'+elem).attr('value','1');
      }else{
        $('#'+elem).removeAttr('checked');
        $('#'+elem).attr('value','0');
      }
    });


  </script>



</body>
</html>


<?php $this->endPage() ?>
    