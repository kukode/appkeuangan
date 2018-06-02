<?php
ob_start();
?>
<h3 class="text-center">Welcome,  <?php echo strtoupper($_SESSION['username'])?> !</h3>
<!-- Panel Atas 
<div class="col-lg-12">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-7">
                            <i class="fa fa-exchange fa-4x"></i>
                        </div>
                        <div class="col-xs-5 text-right">
                        	<h2 class="font-bold">25</h2>
                        </div>
                        <div class="col-xs-12 text-right">
                        <span> Online Customers! </span><br>
                        	<a href="#" style="color:#fff;"> View <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-7">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-xs-5 text-right">
                        	<h2 class="font-bold">5</h2>
                        </div>
                        <div class="col-xs-12 text-right">
                        <span> New Customers! </span><br>
                        	<a href="#" style="color:#fff;"> View <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-7">
                            <i class="fa fa-life-ring fa-4x"></i>
                        </div>
                        <div class="col-xs-5 text-right">
                        	<h2 class="font-bold">7</h2>
                        </div>
                        <div class="col-xs-12 text-right">
                        <span> New & Open Ticket! </span><br>
                        	<a href="#" style="color:#fff;"> View <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-7">
                            <i class="fa fa-plug fa-4x"></i>
                        </div>
                        <div class="col-xs-5 text-right">
                        	<h2 class="font-bold">0</h2>
                        </div>
                        <div class="col-xs-12 text-right">
                        <span> Device Down! </span><br>
                        	<a href="#" style="color:#fff;"> View <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> -->

<?php
$home = ob_get_clean();
?>
