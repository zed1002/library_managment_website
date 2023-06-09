<?php
session_start();
include("../login/checklogin.php");
check_login();
require_once('../login/dbconnection.php');

    
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->

<!------ Include the above in your HEAD tag ---------->

<link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <script src='remove/jquery-3.0.0.js' type='text/javascript'></script>
        <script src='remove/script.js' type='text/javascript'></script>
<style>

 
/********card frame **************/
.card {position: relative; border-radius: 3px; background-color: #fff;color: #4f5256;border: 1px solid #f2f2f2;margin-bottom: 16px;background:#fff;}
.card-header{ padding: 16px;margin:0px;}
.card-body {position: relative; padding: 16px;}

.gaadiex-list {list-style-type: none; margin: 0;padding: 0;}
.gaadiex-list>.gaadiex-list-item {padding: 0 22px;}
.gaadiex-list-item-img  {
    float: left;
    width: 58px;
    height: 58px;
    margin-top: 20px;
    margin-bottom: 8px;
    margin-right: 20px;
    border-radius: 50%;
}
.gaadiex-list-item i  {
    float: left;
    font-size:48px;
    width: 58px;
    height: 58px;
    margin-top: 20px;
    margin-bottom: 8px;
    margin-right: 20px;
    border-radius: 50%;
}
.border-b-1 {border-bottom: 1px solid rgba(162,162,162,.16);}
</style>
</head>

<body id="inner_page" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
       <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg"><br>
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"><img src="images/nticl.png" alt="image"></a>
                        
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.php">Home</a></li>
                  
                        <li><a class="nav-link" href="booklist/search/search-book.php">Documents</a></li>
                        
						<li><a class="nav-link" href="contact.php">Contact </a></li>
                   <li> <a class="nav-link" href="../login/logout.php">Logout</a> </li>
                <div class="serch-box">
                 
                   <li><img src="images/us.png" alt="#" width="50px" /></li>
                </div>
              
                  </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

	<!-- section -->
	
	<section class="inner_banner">
	  <div class="container">
	      <div class="row">
		      <div class="col-12">
			     <div class="full">
				     <h3>   Your Reservation Table  </h3>
				 </div>
			  </div>
		  </div>
	  </div>
	</section>
	
	<!-- end section -->
   
	<!-- section -->
	<?php
	$id=$_SESSION['id'];
$output = '';
$ret= mysqli_query($con,"SELECT id, idreservation,genre, drs,ref FROM reserver WHERE id='$id' ");




	if(mysqli_num_rows($ret) > 0)  {
		
	 while($num = mysqli_fetch_array($ret)){
	 	 $output .='
	 	<div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="card">
		       
		        <div class="gaadiex-list">
                    <div class="gaadiex-list-item"><img class="gaadiex-list-item-img"  src="https://img.icons8.com/cute-clipart/64/000000/book.png" alt="List user"/>
                      <div class="gaadiex-list-item-text">
                      <br><br>
                        <h3><a href="#"> You BOOKED A  ' .$num['genre'].'</a></h3>
                        <h4>  IN '.$num['drs'].'</h4>
                        <p> We will contact you when the '.$num['genre'].' is available</p>
                        

                        <td align="center"><span class="delete" data-id="'.$num['idreservation'].' ">Delete reservation</span></td>
                      </div>
                    </div>

                  </div>
           	  
           </div>
        </div>
        '

     ;}
   echo $output;
}
        else{
        	echo 'no data found';}?>
	<!-- end section -->
    <!-- Start Footer -->
 <footer class="footer-box">
        <div class="container">
    
       <div class="row">
       
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
           <div class="footer_blog">
            <div class="full margin-bottom_30">
             <img src="images/fot-lo.png" alt="#" />
           </div>
           <div class="full white_fonts">
              <p> </p>
           </div>
         </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div class="footer_blog footer_menu white_fonts">
              
             </div>
         </div>

              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                   <div class="footer_blog footer_menu white_fonts">
                      
                         </div>
                 </div>
         
         
        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
         <div class="footer_blog full white_fonts">
                 <h3>Contact us</h3>
               <ul class="full">
                 <li><img src="images/i5.png"><span>Constantine<br>Ali Mendjeli</span></li>
                 <li><img src="images/i6.png"><span>ouremail@gmail.com</span></li>
                 <li><img src="images/i7.png"><span>+213555370207</span></li>
               </ul>
             </div>
          </div>   
        
       </div>
    
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© Copyrights 2019 design by html.design</p>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/custom.js"></script>
	<script>
	/* counter js */

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
	</script>
</body>

</html>