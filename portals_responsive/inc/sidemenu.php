<?php
$post_type = 'contents';
$custom_post_slug = esc_html( get_post_type_object( $post_type )->name );
$taxonomy = 'shoujou_tax';
$num = - 1;//表示する投稿の数 -1で全部
$terms = get_terms( $taxonomy );
foreach ( $terms as $term ):

$args = array(
	'posts_per_page' => $num,
	'post_type' => $custom_post_slug,
	'orderby' => 'menu_order',
	'order'   => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => $taxonomy,
			'field' => 'slug',
			'terms' => $term->slug,
		)
	)
);
$my_query = get_posts( $args ); ?>
<div class="widget_nav_menu">
	<p id="<?php echo esc_html($term->slug); ?>"><?php echo $term->name; ?></p>
	<ul>
		<?php
		foreach ( $my_query as $post ) :
		setup_postdata( $post );
		?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php
endforeach;
wp_reset_postdata();
?>