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
	<?php if(dopt('d_backgound_image_b') != '' && dopt('d_backgound_image_autoswitch_b') != '') { ?>
	<!-- 背景图片自动切换s by Lensual -->
	<script type="text/javascript">
    var errorTimes = 0;
    var preLoadBgImg_complete = false;
    var preLoadBgImg_complete_url = '';
    var stopWatch_timeout = false;
	var bgImgUrlArr_length = 0;
	var bgImgUrlArr_index = {};
	
	//遍历key
    for(var key in ajax.bgImgUrlArr){
        bgImgUrlArr_index[bgImgUrlArr_length++] = key;
	}
	
    $(document).ready(function() {
		setTimeout("stopWatch()", ajax.switchSpeed);
		preLoadBgImg();
	});
	function preLoadBgImg() {
		var img = new Image();
		do
		{
			var url = ajax.bgImgUrlArr[bgImgUrlArr_index[Math.floor(Math.random() * bgImgUrlArr_length)]];  //随机
		}
		while ($("body").css("background-image") == "url(" + url + ")")  //避免重复
		img.src = url
		img.onerror=function(){
			console.error('Error on loading background-image:%o',url);
			onerror = null;
			errorTimes++;
			setTimeout("preLoadBgImg()", ajax.onerrorRetry);  //重新加载
		};
		img.onload = function(){
			onload = null;
			preLoadBgImg_complete_url = url;
			preLoadBgImg_complete = true;
			//console.debug('preLoadBgImg_complete_url:%o',preLoadBgImg_complete_url);
			if (stopWatch_timeout){
				switchBgImg();
			}
		};
	}
	function stopWatch() {
		stopWatch_timeout = true;
		//console.debug('stopWatch_timeout');
		if (preLoadBgImg_complete){
			switchBgImg();
		}
	}
	function switchBgImg() {
		$("body").css("background-image","url(" + preLoadBgImg_complete_url + ")");  //已经使用 CSS3 做渐变动画
		preLoadBgImg_complete = false;
		preLoadBgImg_complete_url = "";
		stopWatch_timeout = false;
		setTimeout("stopWatch()", ajax.switchSpeed);  //下一轮开始
		preLoadBgImg();
	}
	</script>
	<!-- 背景图片自动切换e by Lensual -->
	<?php } ?>

</body>
</html>
