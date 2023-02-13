<?php get_header(); ?>
<div class="pageWrapper">
    <?= apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
</div>
<?php get_footer(); ?>
