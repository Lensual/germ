        </div>
        <footer id="footer" class="yahei clearfix">
  		    <a class="left <?php echo dopt('d_saying_bottom')?'saying-bottom':'';?>">
                <?php echo dopt('d_notice_bottom');?>
            </a>
            <p class="right">Powered by <a href="https://cn.wordpress.org" target="_blank" rel="nofollow">WordPress</a>, and theme by <a href="https://hzy.pw/p/1933" target="_blank">Moshel</a>.</p>
        </footer>
    </div>

    <img id="qrimg" src=""/>
    <a id="qr" href="javascript:;"><i class="fa fa-qrcode"></i></a>
    <a id="gotop" title="点击返回页顶" href="javascript:;"><i class="fa fa-arrow-up"></i></a>

    <?php
        if( dopt('d_track_b') != '' )
            echo '<div class="static-hide">'.dopt('d_track').'</div>';

        wp_footer();

        if( dopt('d_footcode_b') != '' )
            echo dopt('d_footcode');
    ?>
	<?php if(dopt('d_backgound_image_b') != '' && 
	    dopt('d_backgound_image_autoswitch_b') != '' &&
		dopt('d_backgound_image_static_b') == '') { ?>
	<!-- 背景图片自动切换s by Lensual -->
	<script type="text/javascript">
    $(document).ready(function() {
		if(ajax.d_backgound_image_preload_b != ''){
			setTimeout("stopWatch()", ajax.switchInterval);
			preLoadBgImg();
		}else{
			setTimeout("preLoadBgImg()", ajax.switchInterval);
		}
	});
	</script>
	<!-- 背景图片自动切换e by Lensual -->
	<?php } ?>

</body>
</html>
