<?php
/*
Plugin Name: ckplayer without ad
Plugin URI: http://www.iqktv.com/462.html
Description: 调用ck播放器实现优酷、爱奇艺、音悦台等视频源无广告播放。使用方法：编辑文章添加[ck1]视频地址[/ck1],如[ck1]http://v.youku.com/v_show/id_XNzIxODU2NTQw.html[/ck1]。如果解析失败请联系插件作者更新。
Version: 0.1
Author: BLACKCYY
Author URI: http://www.iqktv.com/
*/

function ckplayer($atts, $content=null){
	extract(shortcode_atts(array("auto"=>'0'),$atts));	
	return '<embed src="http://1.blackcyy.sinaapp.com/ck3/ckplayer.swf?a='.$content.'" allowFullScreen="true" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">';
}
add_shortcode('ck1','ckplayer');
?> 