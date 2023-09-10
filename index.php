<?php get_header(); ?>
<div class="pageWrapper">
    <div style="background: red; padding: 50px;">
        <button class="button button--secondary">
            secondary
        </button>

        <button>Testowy button</button>
        <a href="#123" class="button">button link</a>
        <button>Testowy button</button>

    </div>
    <?= apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
</div>
<?php get_footer(); ?>
