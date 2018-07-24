<?php
///**
// * Created by runner.han
// * There is nothing new under the sun
// */

if (!isset($PIKA_ROOT_DIR)){
    $PIKA_ROOT_DIR = '';
}
//echo $PIKA_ROOT_DIR;

?>



<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
						<span class="bigger-120">
							Pikachu PIKA~ PIKA~&copy; runner.han
						</span>

        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.easypiechart.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.flot.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $PIKA_ROOT_DIR;?>assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<script>
    $(function (){
        $("[data-toggle='popover']").popover();
    });
</script>


</body>
</html>
