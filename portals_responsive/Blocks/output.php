<?php //患者様の声ブロック
if(get_field('voice_ttl_b')): ?>
<div class="block_voice">
	<p class="block_voice_ttl">
		<?php the_field('voice_ttl_b'); ?>
	</p>
	<div class="block_voice_container">
		<?php if(get_field('voice_img01_b')||get_field('voice_img02_b')): ?>
		<div class="block_voice_container_pic">
			<figure>
				<?php if(get_field('voice_img01_b')): ?>
				<?php
				$attachment_id = get_field('voice_img01_b');
				$size = "medium"; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				$attachment = get_post( get_field('voice_img01_b') );
				$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
				$image_title = $attachment->post_title;
				?>
				<a href="<?php echo wp_get_attachment_url( get_field( 'voice_img01_b',$post->ID) ); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
				<?php endif; ?>
				<?php if(get_field('voice_img02_b')): ?>
				<?php
				$attachment_id = get_field('voice_img02_b');
				$size = "medium"; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				$attachment = get_post( get_field('voice_img02_b') );
				$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
				$image_title = $attachment->post_title;
				?>
				<a href="<?php echo wp_get_attachment_url( get_field( 'voice_img02_b',$post->ID) ); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
				<?php endif; ?>
			</figure>
		</div>
		<?php endif; ?>
		<div class="block_voice_container_txt">
			<p>
				<?php the_field('voice_txt_b'); ?>
			</p>
			<p class="block_voice_menseki">※お客様個人の感想であり、効果には個人差があります。</p>
		</div>
	</div>
</div>
<?php endif; ?>

<?php //キャッチリスト
if ( have_rows ( 'catchlist_block' ) ) : ?>
<?php if(get_field('catchlistimage_block_check')): ?>
<figure class="bnr"><img src="<?php echo get_template_directory_uri(); ?>/image/page/page_catch_ttl.png" alt="このようなお悩みはありませんか？"></figure>
<?php endif; ?>
<ol class="block_catch_list">
	<?php while (have_rows( 'catchlist_block' )) : the_row(); ?>
	<li class="block_catch_list_li"><?php the_sub_field('catchlist_contents_block'); ?></li>
	<?php endwhile; ?>
</ol>
<?php endif; ?>

<?php //イラストつきキャッチリスト
if( get_field('catchlistimage_block') ): ?>
<?php if(get_field('catchlistimage_block_check')): ?>
<figure class="bnr"><img src="<?php echo get_template_directory_uri(); ?>/image/page/page_catch_ttl.png" alt="このようなお悩みはありませんか？"></figure>
<?php endif; ?>
<div class="block_image_catch_list_wrapper">
	<?php if(get_field('catchlistimage_block_check02') && get_field('catchlistimage_block_image')):
	$attachment_id = get_field('catchlistimage_block_image');
	$size = "medium";
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('catchlistimage_block_image') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
	$image_title = $attachment->post_title;
	?>
	<figure class="block_catch_img"><img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>">
	</figure>
	<?php endif; ?>
	<?php
	if ( have_rows ( 'catchlistimage_block' ) ) : ?>
	<ol class="block_catch_list block_image_catch_list_list">
		<?php while (have_rows( 'catchlistimage_block' )) : the_row(); ?>
		<li class="block_catch_list_li"><?php the_sub_field('catchlist_contents_block'); ?></li>
		<?php endwhile; ?>
	</ol>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php //よくある質問
if ( have_rows ( 'faq_block' ) ) : ?>
<?php while (have_rows( 'faq_block' )) : the_row(); ?>
<dl class="block_faq_list">
	<dt class="block_faq_list_q"><?php the_sub_field('faq_q_block'); ?></dt>
	<dd class="block_faq_list_a"><?php the_sub_field('faq_a_block'); ?></dd>
</dl>
<?php endwhile; ?>
<?php endif; ?>

<?php //〇つのポイント
if ( have_rows ( 'point_block' ) ) : ?>
<ul class="block_point">
	<?php while (have_rows( 'point_block' )) : the_row(); ?>
	<li class="block_point_list">
		<p class="block_point_list_ttl"><?php the_sub_field('point_block_ttl'); ?></p>
		<?php
		$image = get_sub_field('point_block_pic');
		if( !empty($image) ): ?>
		<figure class="block_point_list_pic"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
		<?php endif; ?>
		<p class="block_point_list_txt"><?php the_sub_field('point_block_txt'); ?></p>
	</li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>

<?php //料金表（２列）
if ( have_rows ( 'price_block' ) ) : ?>
<table class="block_price">
	<tbody>
		<?php while (have_rows( 'price_block' )) : the_row(); ?>
		<tr>
			<th class="block_price_th"><?php the_sub_field('price_block_th'); ?></th>
			<td class="block_price_td">
				<?php the_sub_field('price_block_td'); ?>
			</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php endif; ?>

<?php //料金表（３列）
if(get_field('price_block03_th01')): ?>
<table class="block_price">
	<tbody>
		<tr>
			<th class="block_price_th">&nbsp;</th>
			<th class="block_price_th"><?php the_field('price_block03_th01'); ?></th>
			<th class="block_price_th"><?php the_field('price_block03_th02'); ?></th>
		</tr>
		<?php //料金表（３列）
		if ( have_rows ( 'price_block_row03' ) ) : ?>
		<?php while (have_rows( 'price_block_row03' )) : the_row(); ?>
		<tr>
			<th class="block_price_th"><?php the_sub_field('price_block_row03_th'); ?></th>
			<td class="block_price_td">
				<?php the_sub_field('price_block_row03_td1'); ?>
			</td>
			<td class="block_price_td">
				<?php the_sub_field('price_block_row03_td2'); ?>
			</td>
		</tr>
		<?php endwhile; ?>
		<?php endif; ?>
	</tbody>
</table>
<?php endif; ?>

<?php //料金表（４列）
if(get_field('price_block04_th01')): ?>
<table class="block_price">
	<tbody>
		<tr>
			<th class="block_price_th">&nbsp;</th>
			<th class="block_price_th"><?php the_field('price_block04_th01'); ?></th>
			<th class="block_price_th"><?php the_field('price_block04_th02'); ?></th>
			<th class="block_price_th"><?php the_field('price_block04_th03'); ?></th>
		</tr>
		<?php //料金表（３列）
		if ( have_rows ( 'price_block_row03' ) ) : ?>
		<?php while (have_rows( 'price_block_row03' )) : the_row(); ?>
		<tr>
			<th class="block_price_th"><?php the_sub_field('price_block_row04_th'); ?></th>
			<td class="block_price_td">
				<?php the_sub_field('price_block_row04_td1'); ?>
			</td>
			<td class="block_price_td">
				<?php the_sub_field('price_block_row04_td2'); ?>
			</td>
			<td class="block_price_td">
				<?php the_sub_field('price_block_row04_td3'); ?>
			</td>
		</tr>
		<?php endwhile; ?>
		<?php endif; ?>
	</tbody>
</table>
<?php endif; ?>

<?php //受付時間
if ( have_rows ( 'uketsuke_block' ) ): ?>
<div class="block_uketsuke_wrap">
	<table class="block_uketsuke">
		<tbody>
			<tr>
				<th>受付時間</th>
				<th>月</th>
				<th>火</th>
				<th>水</th>
				<th>木</th>
				<th>金</th>
				<th>土</th>
				<th>日</th>
				<th>祝</th>
			</tr>
			<?php while (have_rows( 'uketsuke_block' )) : the_row(); ?>
			<tr>
				<th><?php the_sub_field('uketsuke_time'); ?></th>
				<td><?php the_sub_field('uketsuke_mon'); ?></td>
				<td><?php the_sub_field('uketsuke_tue'); ?></td>
				<td><?php the_sub_field('uketsuke_wed'); ?></td>
				<td><?php the_sub_field('uketsuke_thu'); ?></td>
				<td><?php the_sub_field('uketsuke_fri'); ?></td>
				<td><?php the_sub_field('uketsuke_sat'); ?></td>
				<td><?php the_sub_field('uketsuke_sun'); ?></td>
				<td><?php the_sub_field('uketsuke_holi'); ?></td>
			</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	<?php //受付時間注意事項
	if ( get_field('uketsuke_block_notes') ): ?>
	<p class="uketsuke_block_notes"><?php the_field('uketsuke_block_notes'); ?></p>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php //フロー
if ( have_rows ( 'flow_block' ) ) : ?>
<ul class="block_flow">
	<?php while (have_rows( 'flow_block' )) : the_row(); ?>
	<li class="block_flow_list">
		<dl>
			<dt><p class="block_flow_list_ttl"><?php the_sub_field('flow_block_ttl'); ?></p></dt>
			<dd><?php
				$image = get_sub_field('flow_block_pic');
				if( !empty($image) ): ?>
				<figure class="block_flow_list_pic"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
				<?php endif; ?>
				<p class="block_flow_list_txt"><?php the_sub_field('flow_block_txt'); ?></p></dd>
		</dl>
	</li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>

<?php //クーポン
if(get_field('coupon_block_ttl')): ?>
<dl class="block_coupon">
	<dt class="block_coupon_ttl
			   <?php $target = get_field('coupon_block_target');
			   echo $target['value'] ?>">
		<span class="block_coupon_ttl_num">クーポンNo：<?php the_field('coupon_block_no'); ?></span>
		<?php the_field('coupon_block_ttl'); ?>
		<span class="block_coupon_ttl_price">￥<?php the_field('coupon_block_price'); ?></span>
	</dt>
	<dd class="block_coupon_conts">
		<figure class="block_coupon_conts_area">
			<?php
			$image = get_field('coupon_block_pic');
			if( !empty($image) ): ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			<?php endif; ?>
			<figcaption class="block_coupon_conts_area_info">
				<dl>
					<dt>提示条件：</dt>
					<dd><?php
						$presentation = get_field('coupon_block_teiji');
						if( $presentation ):
						foreach( $presentation as $presentations ): ?>
						<span class="presentations_span"><?php echo $presentations['label']; ?></span>
						<?php endforeach;
						endif; ?></dd>
					<dt>利用条件：</dt>
					<dd><?php the_field('coupon_block_riyou'); ?></dd>
					<?php if(get_field('coupon_block_date')): ?>
					<dt>有効期限：</dt>
					<dd><?php
						$date = date_create(get_field('coupon_block_date'));
						echo date_format($date,'Y年m月d日'); ?>まで</dd>
					<?php endif; ?>
				</dl>
				<p class="block_coupon_conts_area_txt"><?php the_field('coupon_block_about'); ?></p>
			</figcaption>
		</figure>
		<?php if ( have_rows ( 'coupon_block_yoyaku' ) ) : //予約方法?>
		<ul class="block_coupon_conts_yoyaku">
			<?php while (have_rows( 'coupon_block_yoyaku' )) : the_row(); ?>
			<li>
				<?php
				$field = get_sub_field('coupon_block_yoyaku_type');
				if( $field['value'] == 'tel'): ?>
				<a href="tel:<?php the_sub_field('coupon_block_yoyau_link'); ?>" class="<?php echo $field['value']; ?>">
					<?php else: ?>
					<a href="<?php the_sub_field('coupon_block_yoyau_link'); ?>" class="<?php echo $field['value']; ?>" target="_blank">
						<?php endif; ?>
						<?php the_sub_field('coupon_block_yoyau_label'); ?></a>
					</li>
				<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	</dd>
</dl>
<?php endif; ?>
