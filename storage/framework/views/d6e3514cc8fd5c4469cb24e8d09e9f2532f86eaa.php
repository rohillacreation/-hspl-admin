 <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <style type="text/css">
   th,td
   {
    text-align: center;
   }
 </style>
 <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo e($data['uers']); ?></h3>
            <p>Total Admin Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo e(url('/AllUsers')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo e($data['machines']); ?></h3>
            <p>Total Machine</p>
          </div>
          <div class="icon">
            <i class="ion ion-settings"></i>
          </div>
          <a href="<?php echo e(url('/machine-master')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo e($data['engineers']); ?></h3>
            <p>Total Engineers</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="<?php echo e(url('/engineer-master')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo e($data['onleave']); ?></h3>
            <p>Total Engg On Leave</p>
          </div>
          <div class="icon">
            <i class="ion ion-happy"></i>
          </div>
          <a href="<?php echo e(url('/leave-management')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo e($data['onsite']); ?></h3>
            <p>Total Engg On Site</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo e(url('/engineer-onsite')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <table border="3" style="width: 100%;">
          <tr style="border: 2px solid black">
              <th>Engineer Name</th>
              <th>Total Days</th>
          </tr>
          <?php $__currentLoopData = $data['table']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr  style="border: 2px solid black">
                <td><?php echo e($key->EngineerName); ?></td>
                <td><?php echo e($key->totalDays); ?></td>
            </tr>  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
        </table>
      </div>
    </div>
    <!-- Charts row -->
    <div class="row">
      <section class="col-lg-6 connectedSortable">
        <div class="card-body">
          <div class="chart">
              <div id="container" style="width: 100%;margin: 0 auto;"></div>
          </div>
        </div>
      </section>
      <section class="col-lg-6 connectedSortable">
        <div class="card-body">
          <div class="chart">
              <div id="container1" style="width: 100%;margin: 0 auto;"></div>
          </div>
        </div>
      </section>
    </div>
  </section>
</div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script>
    var chart = Highcharts.chart('container', {
      title: {
        text: 'All Engineers Spent Service Wise Average days In a Month On Site'
      },
      subtitle: {
        text: 'Days'
      },
      xAxis: {
        categories: [<?php foreach($data['chart'] as $key){ ?>'<?=$key->months?>',<?php } ?>],
      },
      series: [{
        type: 'column',
        colorByPoint: true,
        data: [<?php foreach($data['chart'] as $key){ ?><?=$key->avg?>,<?php } ?>],
        showInLegend: false
      }],
    });

    var chart = Highcharts.chart('container1', {
      title: {
        text: 'Total No. Of Services Done In a Month'
      },
      subtitle: {
        text: 'Services'
      },
      xAxis: {
        categories: [<?php foreach($data['chart'] as $key){ ?>'<?=$key->months?>',<?php } ?>],
      },
      series: [{
        type: 'column',
        colorByPoint: true,
        data: [<?php foreach($data['charttotalservice'] as $key){ ?><?=$key->count?>,<?php } ?>],
        showInLegend: false
      }],
    });
  </script>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hspl\resources\views/dashboard/index.blade.php ENDPATH**/ ?>