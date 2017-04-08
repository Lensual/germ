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
	<!-- 背景自动切换s by Lensual -->
	<script type="text/javascript">
	var switchSpeed = 10000;  //图片切换时间
	var onerrorRetry = 5000;  //重试时间
	var bgImgUrlArr = new Array(<?php
		$str = "";
		foreach (get_bgimgs_url() as $url){
			$str .=  "\"".$url."\",";
		}
		echo rtrim($str,",").");\n";
	?>
	var errorTimes = 0;
	var preLoadBgImg_complete = false;
	var preLoadBgImg_complete_url = "";
	var stopWatch_timeout = false;
	$(document).ready(function() {
		setTimeout("stopWatch()", switchSpeed);
		preLoadBgImg();
	});
	function preLoadBgImg() {
		var img = new Image();
		do
		{
			var url = bgImgUrlArr[Math.floor(Math.random() * bgImgUrlArr.length)];  //1-15
		}
		while ($("body").css("background-image") == "url(" + url + ")")  //避免重复
		img.src = url
		img.onerror=function(){
			onerror = null;
			errorTimes++;
			setTimeout("preLoadBgImg()", onerrorRetry);  //重新加载
			return;
		};
		img.onload = function(){
			onload = null;
			preLoadBgImg_complete_url = url;
			preLoadBgImg_complete = true;
			if (stopWatch_timeout){
				switchBgImg();
			}
		};
	}
	function stopWatch() {
		stopWatch_timeout = true;
		if (preLoadBgImg_complete){
			switchBgImg();
		}
	}
	function switchBgImg() {
		$("body").css("background-image","url(" + preLoadBgImg_complete_url + ")");  //已经使用 CSS3 做渐变动画
		preLoadBgImg_complete = false;
		preLoadBgImg_complete_url = "";
		stopWatch_timeout = false;
		setTimeout("stopWatch()", switchSpeed);  //下一轮开始
		preLoadBgImg();
	}
	</script>
	<!-- 背景自动切换e by Lensual -->

</body>
</html>
