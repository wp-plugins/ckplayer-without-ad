<?php
/*
Plugin Name: ckplayer without ad
Plugin URI: http://www.imeoe.com/462.html
Description: 调用ck播放器实现优酷、爱奇艺、音悦台等视频源无广告播放。使用方法：编辑文章添加[ck1]视频地址[/ck1],如[ck1]http://v.youku.com/v_show/id_XNzIxODU2NTQw.html[/ck1]。如果解析失败请联系插件作者更新。
Version: 0.51
Author: BLACKCYY
Author URI: http://www.imeoe.com/
*/
/** 添加后台设置 **/
add_action( 'admin_menu', 'ckplayer_without_ad_menu' );
function ckplayer_without_ad_menu() {
	add_options_page( 'ckplayer without ad', 'ckplayer without ad', 'manage_options', 'my-unique-identifier', 'ckplayer_without_ad_options' );
}
function ckplayer_without_ad_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( '您没有操作权限！' ) );
	}
    $opt_name1 = 'ck_width';
    $opt_name2 = 'ck_height';
	$opt_name3 = 'ck_style';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name1 = 'ck_width';
    $data_field_name2 = 'ck_height';
	$data_field_name3 = 'ck_style';

    $opt_val1 = get_option( $opt_name1 );
    $opt_val2 = get_option( $opt_name2 );
	$opt_val3 = get_option( $opt_name3 );
 
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        $opt_val1 = $_POST[ $data_field_name1 ];
        $opt_val2 = $_POST[ $data_field_name2 ];
		$opt_val3 = $_POST[ $data_field_name3 ];

        update_option( $opt_name1, $opt_val1 );
        update_option( $opt_name2, $opt_val2 );
		update_option( $opt_name3, $opt_val3 );
?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php
    }
    echo '<div class="wrap">';
    echo "<h2>ckplayer without ad插件播放器设置</h2>";
?>
<form action="https://shenghuo.alipay.com/send/payment/fill.htm" onsubmit=" document.charset='gbk'"method="post" target="_blank"> 
<input name="optEmail" type="hidden" value="1565935060@qq.com" /> 
<input name="payAmount" type="hidden" value="10" /> 
<input name="title" type="hidden" value="请你喝杯咖啡！" placeholder="付款说明" /> 
<input name="pay" type="image" value="给我付款" src="<?php echo plugins_url('payment.png',__FILE__);?>" /> </form>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p>播放器宽度：
<input type="text" name="ck_width" value="<?php echo get_option('ck_width');?>" size="20">
</p><hr />

<p>播放器高度：
<input type="text" name="ck_height" value="<?php echo get_option('ck_height');?>" size="20">
</p><hr />

<p>播放器风格：
<input type="text" name="ck_style" value="<?php echo get_option('ck_style');?>" size="20">
</p><hr />

<p>注意：使用该插件前请将该设置填写完毕并保存；
播放器风格只为用户更改播放器右上角logo，默认值为"3"，如需要自定义播放器logo请联系作者，每月2.1RMB。
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

<p>各位ckplayer without ad插件的站长用户</p><hr />
<p>你们好，在这里BLACK给大家说声抱歉，昨日因为本人SAE云豆消耗完毕，造成插件无法使用，给大家造成了困扰。</p><hr />
<p>说实话，我没有想到这个插件目前竟然有这么多的人在使用，而使用这个插件的站总流量还比较客观。相信使用这个插件的你已经发现了，BLACK提供的这个插件是完全无偿免费的，有一个定制logo的服务虽然收费，但实际上，有些朋友想要付费本人也都解释了定制logo效果并不好，不如用默认“3”清爽风格，而先行转账给BLACK的费用BLACK也都如数返还给了那些朋友。</p><hr />
<p>非常感谢大家的支持。当初制作这个插件，本意是自用，BLACK个人博客www.lyre.cn七弦琴主打生活分享，以音乐视频图片搭配文字的风格记录自己的点点滴滴，其中图片存储通过七牛云解决，音乐存储是自己利用国外VPS加上锐速做的附件服务器，而对于视频，本人无力承担其空间及流量费用，不得已便想到了使用解析各大视频网站视频源的方法来解决。于是便有了ckplayer without ad这个插件。</p><hr />
<p>对于这个插件，只在www.imeoe.com折腾户上进行了宣传。当时SAE还有开发者补贴，而在今年，取消了开发者补贴，转而给微小的免费限额。</p><hr />
<p>整个插件后台资源300K左右，消耗流量最大的是SWF播放器文件。为了实现免广告，SWF必须和get.php在一个地址，否则无法传递经过解析后得到的视频真实地址（ajax），但就是那100K大小的SWF，在每天数万PV的消耗下，也会产生上G的流量。而BLACK为了保证解析迅速，使用的是资源昂贵的SAE，SAE目前1G流量收费1.5RMB。BLACK根本没有想到这个插件的流量竟然这么大，以前攒的云豆一扫而空，于是便导致了昨天晚上以及今天早上因为欠费而产生的插件无法使用问题。</p><hr />
<p>解释这么多，只是为了得到大家的理解。毕竟今天看了下8月份的报表，消耗云豆4000左右，折合rmb40块钱，快和我的阿里云乞丐机支出一样了。而BLACK做站仅仅出于爱好，七弦琴，折腾户虽然挂着广告，但是点击极少，至今尚未达到支付限额。我很难做到仅仅出于爱好就投入大量时间金钱，所以暂计划将该插件迁移到阿里云。</p><hr />
<p>迁移完毕后，原来的sae域名会不再使用，如果您对整个插件进行了二次开发，且与该域名相关，请联系BLACK说明，如果您并未对这个插件进行修改，那么不必理会这次更新迁移。目前进行公示，迁移工作将在3天后完成，如果您有不同意见，请尽快联系BLACK。</p><hr /></p><hr />
<p>ckplayer without ad将会一直保持免费，同时也希望大家能给给予BLACK一些捐助，该插件下载1400多次，大约有200个站点正在使用该插件，即使有二分之一的人捐助一块五块，该插件也将继续有本金使用SAE，毕竟相比阿里云，SAE资源虽贵，但是配额性能强劲，对于该插件体验来讲，差别巨大，如果在这三天里，捐助总额超过100块的话，该插件将会继续在SAE上面保留很长一段时间。</p><hr />
<p>谢谢您的的支持。</p><hr />
<p>BLACK</p><hr />



</p><hr />

</form>
</div>
<?php
}
//短代码
function ckplayer($atts, $content=null){
	extract(shortcode_atts(array("auto"=>'0'),$atts));	
	return '<embed src="http://1.blackcyy.sinaapp.com/ck'.get_option('ck_style').'/ckplayer.swf?a='.$content.'" allowFullScreen="true" quality="high" width="'.get_option('ck_width').'" height="'.get_option('ck_height').'" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash">';
}
add_shortcode('ck1','ckplayer');

//添加文本模式下快捷按钮
function ckwoa_add_quicktags() {
?>
<script type="text/javascript">
QTags.addButton( 'ck1', 'ck无广告视频', '[ck1][/ck1]','' ); 
</script>
<?php
}
add_action('admin_print_footer_scripts', 'ckwoa_add_quicktags' );
?>