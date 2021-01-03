<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="">
         </div>
         <div class="pull-left info">
            <p style="font-size: 20px; color: black;font-weight: 700">Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         
         <!-- Dashboard -->
         <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
         <!-- Users -->
         <li><a href="<?php echo e(url('/AllUsers')); ?>"><i class="fa fa-user"></i>Admin User</a></li>
         <!-- Engineers -->
         <li class=" treeview">
            <a href="#">
            <i class="fa fa-desktop"></i><span>Engineers</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?php echo e(url('/engineer-master')); ?>"><i class="fa fa-circle-o"></i>All Engineers</a></li>
               <li><a href="<?php echo e(url('/leave-management')); ?>"><i class="fa fa-circle-o"></i>Leave Management</a></li>
               <li><a href="<?php echo e(url('/engineer-asset')); ?>"><i class="fa fa-circle-o"></i>Engineer Asset</a></li>
               <li><a href="<?php echo e(url('/engineer-onsite')); ?>"><i class="fa fa-circle-o"></i>Engineer On Site</a></li>
               <!-- <li><a href="<?php echo e(url('/engineerperformance')); ?>"><i class="fa fa-circle-o"></i>Engineer Performance</a></li> -->
            </ul>
         </li>
         <!--Railways -->
         <li class=" treeview">
            <a href="#">
            <i class="fa fa-train"></i><span>Railways</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?php echo e(url('/railways-master')); ?>"><i class="fa fa-circle-o"></i>Railways Master</a></li>
               <li><a href="<?php echo e(url('/division-master')); ?>"><i class="fa fa-circle-o"></i>Division Master</a></li>
            </ul>
         </li>
         <!-- Machine Master-->
         <li class=" treeview">
            <a href="#">
            <i class="fa fa-cogs"></i><span>Machine Masters</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?php echo e(url('/machine-category-master')); ?>"><i class="fa fa-circle-o"></i>Machine Type Master</a></li>
               <li><a href="<?php echo e(url('/machine-sub-category-master')); ?>"><i class="fa fa-circle-o"></i>Machine Sub Category Master</a></li>
               <li><a href="<?php echo e(url('/machine-master')); ?>"><i class="fa fa-circle-o"></i>Machine Master</a></li>
               <li><a href="<?php echo e(url('/catalog-master')); ?>"><i class="fa fa-circle-o"></i>Machine Catalog Master</a></li>
               <li><a href="<?php echo e(url('/technical-description')); ?>"><i class="fa fa-info"></i>Machine Technical Master</a></li>
            </ul>
         </li>
         
         <!-- All Masters -->
         <li class=" treeview">
            <a href="#">
            <i class="fa fa-cog"></i><span>Settings</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?php echo e(url('/user-designations')); ?>"><i class="fa fa-circle-o"></i>User Designation Master</a></li>
               <li><a href="<?php echo e(url('/engineer-designation-master')); ?>"><i class="fa fa-circle-o"></i>Engineer Designation Master</a></li>
               <li><a href="<?php echo e(url('/asset-category-master')); ?>"><i class="fa fa-circle-o"></i>Asset Category Master</a></li>
               <li><a href="<?php echo e(url('/work-master')); ?>"><i class="fa fa-circle-o"></i>File Type</a></li>
               <li><a href="<?php echo e(url('/conveyance-master')); ?>"><i class="fa fa-circle-o"></i>Conveyance Master</a></li>
               <!-- <li><a href="<?php echo e(url('/organisation-master')); ?>"><i class="fa fa-circle-o"></i>Organisation Master</a></li> -->
            </ul>
         </li>
         <li><a href="<?php echo e(url('/service-master')); ?>"><i class="fa fa-list"></i>Service Master</a></li>
         <li><a href="<?php echo e(url('/companydetails')); ?>"><i class="fa fa-industry"></i>Company Master</a></li>
         <li><a href="<?php echo e(url('/purchase_order')); ?>"><i class="fa fa-money"></i>PO Details</a></li>
         <li><a href="<?php echo e(url('/gatepass')); ?>"><i class="fa fa-ticket"></i>Gate Pass Details</a></li>
         <li><a href="<?php echo e(url('/reports')); ?>"><i class="fa fa-file"></i>Reports</a></li>
         
         
         <li>
            <a href="<?php echo e(route('logout')); ?>"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?>   
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
         </li>
                   
               
      </ul>
   </section>
   <!-- /.sidebar -->
</aside><?php /**PATH E:\public_html\hspl-admin\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>