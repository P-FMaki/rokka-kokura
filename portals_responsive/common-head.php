<!doctype html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if(is_page('mail-form')||is_search()||is_attachment()): ?>
		<meta name="robots" content="noindex,nofollow">
		<?php endif; ?>
		<!-- Google Tag Manager -->
		<!-- End Google Tag Manager -->
		<link rel="icon" href="/favicon.ico">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "HealthAndBeautyBusiness",
	"name":"<?php echo get_bloginfo('name'); ?>", //タイトル
	"url": "<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>", //URL
	"@id": "<?php echo (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>",
	"telephone": "+81 00-000-0000", //電話番号
	"priceRange": "1000-10000", //価格の幅
	"openingHoursSpecification": [
	{
	"@type": "OpeningHoursSpecification",//午前の受付時間
	"dayOfWeek": [
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday"
	],
	"opens": "09:30",
	"closes": "13:00"
	},
	{
	"@type": "OpeningHoursSpecification",
	"dayOfWeek": [//午後の受付時間
	"Monday",
	"Tuesday",
	"Wednesday",
	"Thursday",
	"Friday"
	],
	"opens": "15:00",
	"closes": "20:00"
	},
	{
	"@type": "OpeningHoursSpecification",
	"dayOfWeek": "Saturday",//土曜日
	"opens": "16:00",
	"closes": "23:00"
	},
	{
	"@type": "OpeningHoursSpecification",
	"dayOfWeek": [//休み
	"Sunday",
	"PublicHolidays"
	],
	"opens": "00:00",
	"closes": "00:00"
	}
	],
	"address": {
	"@type": "PostalAddress",
	"postalCode": "000-0000",
	"addressRegion": "〇〇県",
	"addressLocality": "○○市",
	"streetAddress": "その先の住所"
	},
	"geo": {
	"@type": "GeoCoordinates",
	"latitude": 35.00000, //緯度
	"longitude": 135.00000 //経度
	},
	"image": {
	"@type": "ImageObject",
	"url": "<?php echo get_template_directory_uri(); ?>/image/top/main_img_sp.png", //メイン画像のURL
	"width": 000,
	"height": 000
	}
}
		</script>
		<?php wp_head(); ?>
	</head>

	<body <?php //if(!is_page("mail-form")){ echo 'oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;"'; }?>>
		
		<!-- Google Tag Manager のコードをここに貼って下さい-->
