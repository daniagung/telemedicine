<?php

/*
if(!isset($_GET["b"])){
echo "<script>
alert('Mohon klik tombol monitoring yang terdapat di list pasien , terima kasih'); window.location = './indexdokter.php';</script>";}
*/
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");
if(empty($_SESSION['level'])) {
		echo '<script type="text/javascript">window.location.href="index.php";</script>';
}else{
	if(!isset($_GET['deviceid']) ){
		if($_SESSION['level']=="dokter"){
			echo '<script type="text/javascript">alert(\'Mohon klik tombol monitoring yang terdapat di list pasien , terima kasih\'); window.location.href="datapasien.php";</script>';
		}else if($_SESSION['level']=="pasien"){
			echo "<script type=\"text/javascript\">window.location.href=\"monitoring.php?deviceid=\"'".$_SESSION['deviceid']."';</script>";
		}
		}
}

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Monitoring";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["sub"]["monitoring"]["active"] = true;
include("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<!-- widget grid -->
		<section id="widget-grid" class="">

			<!-- row -->

			<div class="row">

				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-sortable="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<?php
						$result = mysqli_query($mysqli, "SELECT * FROM data_pasien WHERE device_id='".$_GET['deviceid']."'");
						$res = mysqli_fetch_array($result)
						 ?>
						<header>
							<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
							<h2>Live Monitoring <?php echo $res['nama_pasien']; ?></h2>

						</header>

						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body">

								<canvas id="ecg">
				</canvas>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->

				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-3" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-sortable="false">
						<!-- widget options:
						usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="true"
						data-widget-sortable="false"

						-->
						<header>
							<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
							<h2>Monitoring Report </h2>

						</header>

						<!-- widget div-->
						<div>

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body no-padding">

								<div class="well well-sm">
					<!-- Timeline Content -->
					<div class="smart-timeline">
						<ul class="smart-timeline-list">
							<li>
								<div class="smart-timeline-icon bg-color-greenDark">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="smart-timeline-time">
									<small>5 hrs ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong class="txt-color-greenDark">Normal Heartbeat</strong>
									</p>

									<br>
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon bg-color-greenDark">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="smart-timeline-time">
									<small>4 hrs ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong class="txt-color-greenDark">Normal Heartbeat</strong>
									</p>

									<br>
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon bg-color-greenDark">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="smart-timeline-time">
									<small>3 hrs ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong class="txt-color-greenDark">Normal Heartbeat</strong>
									</p>

									<br>
								</div>
							</li>
							<li>
								<div class="smart-timeline-icon bg-color-greenDark">
									<i class="fa fa-bar-chart-o"></i>
								</div>
								<div class="smart-timeline-time">
									<small>2 hrs ago</small>
								</div>
								<div class="smart-timeline-content">
									<p>
										<strong class="txt-color-greenDark">Normal Heartbeat</strong>
									</p>

									<br>
								</div>
							</li>
						</ul>
					</div>
					<!-- END Timeline Content -->

				</div>

							</div>
							<!-- end widget content -->

						</div>
						<!-- end widget div -->

					</div>
					<!-- end widget -->

				</article>
				<!-- WIDGET END -->

			</div>

			<!-- end row -->

			<!-- row -->



			<!-- end row -->

		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php
	//include required scripts
	include("inc/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S)
<script src="..."></script>-->
<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Full Calendar -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/pahomqtt.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/mqtt.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="http://www.hivemq.com/demos/websocket-client/js/mqttws31.js"></script>
<script>
	$(document).ready(function() {
		/*
		 *
		 * Photoplethysmograph (Real Time PPG Grapher)
		 *
		 *    by: Tso (Peter) Chen
		 *
		 *
		 *
		 * 0.1 - first version
		 *
		 *
		 * Absolutely free to use, copy, edit, share, etc.
		 *--------------------------------------------------*/

		  /*
		   * Helper function to convert a number to the graph coordinate
		   * ----------------------------------------------------------- */
		  function convertToGraphCoord(g, num){
		    return Math.floor((g.height / 2) * -(num * g.scaleFactor) + g.height / 2);
		  }

		  /*
		   * Constructor for the PlethGraph object
		   * ----------------------------------------------------------- */
		  function PlethGraph(cid, datacb){

		    var g             =   this;
		    g.canvas_id       =   cid;
		    g.canvas          =   $("#" + cid);
		    g.context         =   g.canvas[0].getContext("2d");
		    g.width           =   $("#" + cid).width();
		    g.height          =   $("#" + cid).height();
		    g.white_out       =   g.width * 0.01;
		    g.fade_out        =   g.width * 0.10;
		    g.fade_opacity    =   0.2;
		    g.current_x       =   0;
		    g.current_y       =   0;
		    g.erase_x         =   null;
		    g.speed           =   2;
		    g.linewidth       =   1;
		    g.scaleFactor     =   1;
		    g.stop_graph      =   true;

		    g.plethStarted    =   false;
		    g.plethBuffer     =   new Array();


		    devicePixelRatio = window.devicePixelRatio || 1,
		    backingStoreRatio = g.context.webkitBackingStorePixelRatio ||
		                        g.context.mozBackingStorePixelRatio ||
		                        g.context.msBackingStorePixelRatio ||
		                        g.context.oBackingStorePixelRatio ||
		                        g.context.backingStorePixelRatio || 1,

		    ratio = devicePixelRatio / backingStoreRatio;


		    var oldWidth = g.width;
		    var oldHeight = g.canvas[0].height;

		    g.canvas[0].width = oldWidth * ratio;
		    g.canvas[0].height = oldHeight * ratio;

		    g.canvas[0].style.width = '100%';
		    g.canvas[0].style.height = oldHeight + 'px';

		    // now scale the context to counter
		    // the fact that we've manually scaled
		    // our canvas element
		    g.context.scale(ratio, ratio);


		    /*
		     * The call to fill the data buffer using
		     * the data callback
		     * ---------------------------------------- */
		    g.fillData = function() {
		      g.plethBuffer = datacb();
		      };

		    /*
		     * The call to check whether graphing is on
		     * ---------------------------------------- */
		    g.isActive = function() {
		      return !g.stop_graph;
		    };

		    /*
		     * The call to stop the graphing
		     * ---------------------------------------- */
		    g.stop = function() {
		      g.stop_graph = true;
		    };


		    /*
		     * The call to wrap start the graphing
		     * ---------------------------------------- */
		    g.start = function() {
		      g.stop_graph = false;
		      g.animate();
		    };


		    /*
		     * The call to start the graphing
		     * ---------------------------------------- */
		    g.animate = function() {
		      reqAnimFrame =   window.requestAnimationFrame       ||
		                       window.mozRequestAnimationFrame    ||
		                       window.webkitRequestAnimationFrame ||
		                       window.msRequestAnimationFrame     ||
		                       window.oRequestAnimationFrame;

		      // Recursive call to do animation frames
		      if (!g.stop_graph) reqAnimFrame(g.animate);

		      // We need to fill in data into the buffer so we know what to draw
		      g.fillData();

		      // Draw the frame (with the supplied data buffer)
		      g.draw();
		    };


		    g.draw = function() {
		      // Circle back the draw point back to zero when needed (ring drawing)
		      g.current_x = (g.current_x > g.width) ? 0 : g.current_x;

		      // "White out" a region before the draw point
		      for( i = 0; i < g.white_out ; i++){
		        g.erase_x = (g.current_x + i) % g.width;
		        g.context.clearRect(g.erase_x, 0, 1, g.height);
		      }

		      // "Fade out" a region before the white out region
		      for( i = g.white_out ; i < g.fade_out ; i++ ){
		        g.erase_x = (g.current_x + i) % g.width;
		        g.context.fillStyle="rgba(255, 255, 255, " + g.fade_opacity.toString() + ")";
		        g.context.fillRect(g.erase_x, 0, 1, g.height);
		      }

		      // If this is first time, draw the first y point depending on the buffer
		      if (!g.started) {
		        g.current_y = convertToGraphCoord(g, g.plethBuffer[0]);
		        g.started = true;
		      }

		      // Start the drawing
		      g.context.beginPath();

		      // We first move to the current x and y position (last point)
		      g.context.moveTo(g.current_x, g.current_y);

		      for (i = 0; i < g.plethBuffer.length; i++) {
		        // Put the new y point in from the buffer
		        g.current_y = convertToGraphCoord(g, g.plethBuffer[i]);

		        // Draw the line to the new x and y point
		        g.context.lineTo(g.current_x += g.speed, g.current_y);

		        // Set the
		        g.context.lineWidth   = g.linewidth;
		        g.context.lineJoin    = "round";

		        // Create stroke
		        g.context.stroke();
		      }

		      // Stop the drawing
		      g.context.closePath();
		    };
		  }



		 // --------------------------- Noise Demo
		 console.log("MQTT Test");
		 var client = new Messaging.Client("broker.mqttdashboard.com", 8000, "myclientid_" + parseInt(Math.random() * 100, 10));

	 	client.onConnectionLost = onConnectionLost;
	 	client.onMessageArrived = onMessageArrived;

	 	//Connect Options
	 	var options = {
	 	    timeout: 3,

	 	    //Gets Called if the connection has sucessfully been established
	 	    onSuccess: onConnect,
	 	    //Gets Called if the connection could not be established
	 	    onFailure: function (message) {
	 	        alert("Connection failed: " + message.errorMessage);
	 	    }
	 	};
	 	client.connect(options);
	 	function onConnect() {
	 	 // Once a connection has been made, make a subscription and send a message.
	 	 console.log("onConnect");
	 	 client.subscribe("RhythmR01");
	 	/* message = new Messaging.Message("haaay");
	 	 message.destinationName = "/testmqtt";
	 	 client.send(message);*/
	 	};
	 	function onConnectionLost(responseObject) {
	 	 if (responseObject.errorCode !== 0)
	 	   console.log("onConnectionLost:"+responseObject.errorMessage);
	 	};
		var testing;
		var ECG_data = [];
		var ECG_idx = 0;

		function onMessageArrived(message) {
			testing = message.payloadString;
			ECG_data.push('-0.'+testing);
			console.log(ECG_data);
			//console.log(ECG_data);
	 	};


		//console.log(ECG_data);

	 	function getECG(){
		 	if (ECG_idx++ >= ECG_data.length - 1) ECG_idx=0;
		 		var output = new Array();
		 		output[0] = ECG_data[ECG_idx];
			return output;
	 	 }
	 var ecg;
	 ecg = new PlethGraph("ecg", getECG);
	 ecg.speed = 1.5;
	 ecg.scaleFactor = 1;

		 ecg.start();

/*
		 var ECG_data = [];

			 ECG_data.push(-0.400,-0.405,-0.420,-0.435,-0.425,-0.420,-0.430,-0.435,-0.450,-0.450,-0.435,-0.425,-0.415,-0.425,-0.445,-0.460,-0.455,-0.430,-0.430,-0.430,-0.435,-0.445,-0.440,-0.425,-0.425,-0.440,-0.435,-0.455,-0.445,-0.435,-0.430,-0.430,-0.420,-0.430,-0.425,-0.425,-0.410,-0.405,-0.400,-0.395,-0.385,-0.355,-0.360,-0.340,-0.340,-0.340,-0.330,-0.310,-0.300,-0.290,-0.285,-0.280,-0.250,-0.235,-0.200,-0.190,-0.190,-0.185,-0.165,-0.155,-0.130,-0.120,-0.125,-0.125,-0.115,-0.115,-0.110,-0.105,-0.115,-0.125,-0.140,-0.135,-0.135,-0.160,-0.175,-0.175,-0.165,-0.170,-0.180,-0.175,-0.195,-0.210,-0.200,-0.195,-0.195,-0.205,-0.210,-0.230,-0.225,-0.220,-0.210,-0.220,-0.230,-0.255,-0.230,-0.230,-0.220,-0.225,-0.230,-0.245,-0.245,-0.245,-0.235,-0.240,-0.240,-0.235,-0.245,-0.230,-0.225,-0.225,-0.240,-0.250,-0.230,-0.230,-0.215,-0.240,-0.245,-0.245,-0.225,-0.225,-0.225,-0.225,-0.235,-0.240,-0.230,-0.230,-0.220,-0.225,-0.230,-0.255,-0.240,-0.240,-0.235,-0.235,-0.245,-0.260,-0.240,-0.225,-0.225,-0.230,-0.260,-0.235,-0.240,-0.235,-0.240,-0.240,-0.225,-0.230,-0.230,-0.215,-0.230,-0.230,-0.240,-0.250,-0.235,-0.235,-0.225,-0.225,-0.230,-0.230,-0.210,-0.215,-0.165,-0.160,-0.130,-0.140,-0.140,-0.160,-0.145,-0.130,-0.115,-0.115,-0.090,-0.075,-0.060,-0.060,-0.055,-0.055,-0.040,-0.025,-0.035,-0.055,-0.070,-0.090,-0.095,-0.100,-0.120,-0.160,-0.225,-0.285,-0.300,-0.300,-0.290,-0.290,-0.300,-0.315,-0.335,-0.320,-0.320,-0.305,-0.310,-0.325,-0.305,-0.300,-0.300,-0.305,-0.310,-0.320,-0.315,-0.300,-0.280,-0.280,-0.290,-0.295,-0.295,-0.285,-0.255,-0.270,-0.275,-0.290,-0.275,-0.270,-0.275,-0.265,-0.230,-0.155,-0.015,0.150,0.335,0.520,0.705,0.875,1.035,1.145,1.220,1.235,1.165,1.035,0.935,0.865,0.790,0.690,0.560,0.395,0.265,0.195,0.145,0.060,-0.045,-0.125,-0.180,-0.230,-0.280,-0.330,-0.380,-0.420,-0.420,-0.435,-0.450,-0.465,-0.480,-0.485,-0.475,-0.460,-0.465,-0.475,-0.475,-0.480,-0.465,-0.445,-0.445,-0.445,-0.455,-0.465,-0.460,-0.445,-0.435,-0.455,-0.460,-0.470,-0.460,-0.445,-0.445,-0.435,-0.445,-0.455,-0.460,-0.445,-0.440,-0.445,-0.445,-0.455,-0.465,-0.460,-0.450,-0.450,-0.465,-0.470,-0.450,-0.460,-0.455,-0.460,-0.460,-0.465,-0.465,-0.445,-0.440,-0.440,-0.445,-0.445,-0.445,-0.425,-0.415,-0.410,-0.410,-0.415,-0.380,-0.360,-0.350,-0.330,-0.320,-0.320,-0.300,-0.275,-0.255,-0.245,-0.240,-0.235,-0.230,-0.215,-0.190,-0.175,-0.175,-0.160,-0.145,-0.130,-0.115,-0.120,-0.125,-0.140,-0.130,-0.135,-0.140,-0.140,-0.155,-0.170,-0.170,-0.165,-0.175,-0.185,-0.200,-0.205,-0.205,-0.205,-0.210,-0.220,-0.240,-0.255,-0.250,-0.240,-0.245,-0.245,-0.245,-0.265,-0.255,-0.250,-0.245,-0.250,-0.255,-0.275,-0.265,-0.270,-0.285,-0.265,-0.270,-0.280,-0.275,-0.275,-0.260,-0.270,-0.275,-0.290,-0.270,-0.275,-0.270,-0.275,-0.280,-0.280,-0.285,-0.270,-0.270,-0.265,-0.275,-0.295,-0.270,-0.260,-0.260,-0.265,-0.275,-0.295,-0.280,-0.260,-0.250,-0.265,-0.270,-0.285,-0.285,-0.275,-0.255,-0.265,-0.275,-0.285,-0.290,-0.280,-0.275,-0.270,-0.265,-0.280,-0.270,-0.260,-0.265,-0.260,-0.250,-0.260,-0.265,-0.255,-0.255,-0.235,-0.220,-0.210,-0.175,-0.150,-0.150,-0.170,-0.175,-0.205,-0.195,-0.170,-0.135,-0.115,-0.120,-0.100,-0.100,-0.080,-0.060,-0.060,-0.070,-0.090,-0.095,-0.090,-0.090,-0.105,-0.130,-0.165,-0.200,-0.240,-0.275,-0.315,-0.330,-0.340,-0.335,-0.325,-0.330,-0.325,-0.345,-0.355,-0.330,-0.325,-0.320,-0.325,-0.315,-0.335,-0.325,-0.315,-0.325,-0.320,-0.320,-0.320,-0.310,-0.295,-0.300,-0.300,-0.295,-0.315,-0.300,-0.285,-0.280,-0.290,-0.310,-0.300,-0.255,-0.160,-0.030,0.115,0.290,0.470,0.650,0.810,0.945,1.030,1.105,1.170,1.230,1.160,1.040,0.900,0.780,0.645,0.515,0.375,0.255,0.175,0.100,0.010,-0.080,-0.150,-0.215,-0.275,-0.330,-0.380,-0.420,-0.430,-0.440,-0.465,-0.485,-0.500,-0.525,-0.520,-0.510,-0.500,-0.515,-0.525,-0.525,-0.510,-0.500,-0.490,-0.495,-0.505,-0.500,-0.490,-0.480,-0.490,-0.500,-0.490,-0.490,-0.485,-0.480,-0.490,-0.480,-0.495,-0.495,-0.485,-0.480,-0.480,-0.480,-0.505,-0.510,-0.495,-0.485,-0.485,-0.495,-0.510,-0.520,-0.495,-0.500,-0.485,-0.490,-0.495,-0.500,-0.485,-0.485,-0.490,-0.500,-0.495,-0.480,-0.480,-0.475,-0.475,-0.475,-0.485,-0.460,-0.445,-0.425,-0.430,-0.425,-0.420,-0.395,-0.380,-0.375,-0.365,-0.360,-0.355,-0.335,-0.305,-0.285,-0.275,-0.265,-0.255,-0.240,-0.215,-0.195,-0.180,-0.175,-0.195,-0.180,-0.180,-0.155,-0.155,-0.165,-0.180,-0.180,-0.200,-0.210,-0.220,-0.220,-0.230,-0.225,-0.235,-0.250,-0.260,-0.270,-0.280,-0.270,-0.270,-0.270,-0.280,-0.300,-0.310,-0.305,-0.285,-0.290,-0.300,-0.330,-0.340,-0.330,-0.310,-0.300,-0.310,-0.320,-0.335,-0.330,-0.320,-0.325,-0.330,-0.330,-0.355,-0.345,-0.345,-0.345,-0.335,-0.345,-0.350,-0.345,-0.335,-0.330,-0.335,-0.340,-0.340,-0.335,-0.345,-0.330,-0.340,-0.355,-0.355,-0.345,-0.330,-0.345,-0.335,-0.335,-0.340,-0.345,-0.335,-0.325,-0.330,-0.335,-0.350,-0.340,-0.335,-0.315,-0.310,-0.335,-0.345,-0.340,-0.335,-0.335,-0.335,-0.345,-0.355,-0.340,-0.330,-0.320,-0.325,-0.330,-0.340,-0.335,-0.330,-0.325,-0.325,-0.325,-0.305,-0.285,-0.250,-0.240,-0.240,-0.250,-0.260,-0.240,-0.205,-0.180,-0.175,-0.175,-0.180,-0.160,-0.145,-0.135,-0.130,-0.135,-0.150,-0.160,-0.170,-0.160,-0.165,-0.180,-0.230,-0.270,-0.315,-0.355,-0.365,-0.390,-0.405,-0.395,-0.390,-0.395,-0.390,-0.390,-0.400,-0.390,-0.385,-0.380,-0.375,-0.395,-0.405,-0.390,-0.380,-0.360,-0.365,-0.365,-0.380,-0.370,-0.360,-0.345,-0.345,-0.350,-0.365,-0.350,-0.355,-0.350,-0.355,-0.360,-0.350,-0.285,-0.185,-0.030,0.160,0.330,0.515,0.715,0.900,1.040,1.135,1.175,1.125,1.000,0.875,0.785,0.695,0.630,0.495,0.330,0.180,0.095,0.020,-0.065,-0.170,-0.250,-0.310,-0.345,-0.410,-0.465,-0.510,-0.510,-0.510,-0.515,-0.535,-0.550,-0.565,-0.565,-0.545,-0.540,-0.540,-0.545,-0.560,-0.545,-0.535,-0.505,-0.515,-0.525,-0.530,-0.535,-0.520,-0.515,-0.505,-0.510,-0.515,-0.515,-0.510,-0.515,-0.520,-0.530,-0.530,-0.525,-0.525,-0.520,-0.535,-0.550,-0.550,-0.540,-0.520,-0.510,-0.520,-0.530,-0.535,-0.530,-0.525,-0.525,-0.520,-0.530,-0.535,-0.540,-0.530,-0.520,-0.510,-0.525,-0.530,-0.510,-0.500,-0.480,-0.480,-0.475,-0.465,-0.440,-0.425,-0.405,-0.390,-0.375,-0.380,-0.365,-0.355,-0.340,-0.330,-0.325,-0.305,-0.280,-0.255,-0.235,-0.215,-0.220,-0.230,-0.210,-0.210,-0.195,-0.205,-0.210,-0.215,-0.220,-0.225,-0.225,-0.240,-0.250,-0.250,-0.260,-0.265,-0.255,-0.270,-0.280,-0.285,-0.290,-0.285,-0.295,-0.290,-0.300,-0.310,-0.320,-0.295,-0.285,-0.290,-0.300,-0.320,-0.305,-0.300,-0.310,-0.310,-0.325,-0.325,-0.310,-0.315,-0.305,-0.310,-0.305,-0.315,-0.305,-0.315,-0.305,-0.305,-0.310,-0.315,-0.310,-0.310,-0.305,-0.310,-0.310,-0.310,-0.295,-0.285,-0.295,-0.295,-0.315,-0.325,-0.315,-0.295,-0.290,-0.295,-0.305,-0.315,-0.310,-0.305,-0.295,-0.295,-0.305,-0.325,-0.325,-0.320,-0.315,-0.305,-0.305,-0.320,-0.310,-0.295,-0.295,-0.290,-0.295,-0.305,-0.300,-0.290,-0.290,-0.290,-0.295,-0.320,-0.320,-0.295,-0.270,-0.285,-0.270,-0.270,-0.265,-0.235,-0.220,-0.195,-0.205,-0.215,-0.220,-0.195,-0.180,-0.160,-0.145,-0.140,-0.140,-0.115,-0.100,-0.080,-0.075,-0.095,-0.110,-0.110,-0.110,-0.110,-0.125,-0.125,-0.140,-0.170,-0.225,-0.270,-0.315,-0.345,-0.335,-0.340,-0.340,-0.365,-0.370,-0.375,);
			 var ECG_idx = 0;
			 console.log(ECG_data);

			 function getECG(){
				 if (ECG_idx++ >= ECG_data.length - 1) ECG_idx=0;
				 var output = new Array();
				 output[0] = ECG_data[ECG_idx];
				 return output;
			 }
			 var ecg;
			 ecg = new PlethGraph("ecg", getECG);
			 ecg.speed = 1.5;
			 ecg.scaleFactor = 0.8;

				 ecg.start();

*/

	});

</script>
<?php
	//include footer
	include("inc/google-analytics.php");
?>
