<?php include "includes/session.php";?>
<?php include "includes/header.php";?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
	<?php include "includes/navbar.php";?>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
	<?php include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
				 <?php
                $sql = "SELECT * FROM upload_files";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Total Files</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 <?php
                $sql = "SELECT * FROM tbladmin WHERE role !='admin' and role!='officer'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                 <?php
                $sql = "SELECT * FROM tbladmin WHERE role ='staff'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-folder"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <?php
                $sql = "SELECT * FROM upload_files WHERE DATE(TIMERS)=CURDATE()";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
                <p>Total Uploads Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row" id="PrintChart">
          <!-- Left col -->
          <section class="col-lg-6">
			<div class="card">
			<div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                   Analytics Reports
                </h3>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
			       <?php 
                include('connect.php');
                $sql = "SELECT *, YEAR as typ, count(DOWNLOAD) as qcount, FILENAME as name FROM upload_files GROUP BY FILENAME";
                $query = $db->prepare($sql); 
                $query->execute();
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['typ'], 'value'=>$value['qcount']); //'title'=>//$value['FILENAME']);
                }
                $d = json_encode($data);
                ?>
				    <!--- <div id="chart" style="height: 500px;"></div>-->
             <div id="chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </section>


      <section class="col-lg-6">
      <div class="card">
      <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Yearly Downloads Analytics Reports
                </h3>
              </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php 
                  include('connect.php');
                  $sql = "SELECT *, YEAR as dyea, COUNT(DOWNLOAD) as qcount FROM upload_files GROUP BY dyea";
                  $query = $db->prepare($sql); 
                  $query->execute();
                  $fetch = $query->fetchAll();
                  foreach ($fetch as $key => $value) {
                    $sdata[] = array('title'=>$value['dyea'], 'value'=>$value['qcount']);
                  }
                  $dyear = json_encode($sdata);
                  ?>
           
              <div id="chartdiv" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
		  
          </section>
		  
        </div>
		<!--- <button id="print" onclick="printContent('PrintChart');" class="btn btn-primary pull-right"> <i class="fa fa-print"></i> Print</button>
		 <br>
		 <br>--->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
	  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<?php include"includes/scripts.php";?>
	 <script src="plugins/amcharts/amcharts.js"></script>
      <script src="plugins/amcharts/animate.min.js"></script>
      <script src="plugins/amcharts/themes/light.js"></script>
      <script src="plugins/amcharts/export/export.min.js"></script>
      <script src="plugins/amcharts/themes/patterns.js"></script>
      <script type="plugins/export/export.css"></script>
      <script src="plugins/amcharts/plugins/responsive/responsive.min.js"></script>
      <script src="plugins/amcharts/serial.js"></script>
      <script src="plugins/amcharts/pie.js"></script>


      <script type="text/javascript">
        var raw = '<?php echo $d; ?>';
        var data = JSON.parse(raw);
        var chart = AmCharts.makeChart( "chart", {
          "type": "pie",
          "theme": "light",
          "dataProvider": data ,
          "titleField": "title",
          "valueField": "value",
          "labelRadius": 25,

          "radius": "37%",
          "innerRadius": "40%",
          "labelText": " [[title]] ([[percents]]%)",
          "export": {
            "enabled": true
          },
          "depth3D": 10,
          "angle": 17,
          "fontFamily": "Helvetica",
          "fontSize": 13,
          "balloonText": "[[value]]",
          "color": "#222",
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
      } );
    </script>
	<script>

          var raw = '<?php echo $dyear; ?>';
          var data = JSON.parse(raw);
          var chart = AmCharts.makeChart( "chartdiv", {
            "type": "serial",
            "theme": "scatter",
            "dataProvider": data,
            "valueAxes": [ {
              "gridColor": "#FFFFFF",
              "gridAlpha": 0.2,
              "dashLength": 0
            } ],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [ {
              "balloonText": "[[category]]: <b>Year [[value]]</b>",
              "fillAlphas": 0.8,
              "lineAlpha": 0.2,
              "type": "column",
              "valueField": "value"
            } ],
            "chartCursor": {
              "categoryBalloonEnabled": false,
              "cursorAlpha": 0,
              "zoomable": false
            },
            "categoryField": "title",
            "categoryAxis": {
              "gridPosition": "start",
              "gridAlpha": 0,
              "tickPosition": "start",
              "tickLength": 20
            },
            "export": {
              "enabled": true
            },
          "depth3D": 20,
          "angle": 17,
          "fontFamily": "Helvetica",
          "fontSize": 13,
          "balloonText": "[[value]]",
          "color": "#222",
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "color": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']

          } );
        </script>

	<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
var enteredtext = $('#text').val();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
$('#text').html(enteredtext);
}
</script>
</body>
</html>
