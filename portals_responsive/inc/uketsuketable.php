<?php //受付時間
if (have_rows('uketsuke_block', 618)) : ?>
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
    <?php while (have_rows('uketsuke_block', 618)) : the_row(); ?>
    <tr>
        <th><?php the_sub_field('uketsuke_time', 618); ?></th>
        <td><?php the_sub_field('uketsuke_mon', 618); ?></td>
        <td><?php the_sub_field('uketsuke_tue', 618); ?></td>
        <td><?php the_sub_field('uketsuke_wed', 618); ?></td>
        <td><?php the_sub_field('uketsuke_thu', 618); ?></td>
        <td><?php the_sub_field('uketsuke_fri', 618); ?></td>
        <td><?php the_sub_field('uketsuke_sat', 618); ?></td>
        <td><?php the_sub_field('uketsuke_sun', 618); ?></td>
        <td><?php the_sub_field('uketsuke_holi', 618); ?></td>
    </tr>
    <?php endwhile; ?>
</tbody>
</table>
<?php endif; ?>
<?php //受付時間注意事項
if (get_field('uketsuke_block_notes', 618)) : ?>
<p class="uketsuke_block_notes"><?php the_field('uketsuke_block_notes', 618); ?></p>
<?php endif; ?>