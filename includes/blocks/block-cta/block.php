<?php

/**
 * @var array $block
 */

$heading = get_field('heading_cta');
$desc = get_field('desc_cta');
$primary_button = get_field('primary_button_cta');
$secondary_button = get_field('secondary_button_cta');
$background_color = get_field('background_color_cta');
$background_color = $background_color !== '' && !$background_color ? $background_color : '#0860C4';
?>

<section class="cta" style="background-color: <?php echo $background_color; ?>">
    <div class="container">

        <h2 class="cta__heading">
            <?php esc_html_e($heading); ?>
        </h3>

        <div class="cta__desc">
            <?php echo apply_filters('the_content', $desc); ?>
        </div>

        <div class="cta__buttons">
            <a rel="nofollow" href="<?php echo esc_url($secondary_button['link']); ?>">
                <button class="button button--secondary">
                    <?php esc_html_e($secondary_button['name']); ?>
                </button>
            </a>

            <a rel="nofollow" href="<?php echo esc_url($primary_button['link']); ?>">
                <button class="button button--white">
                    <?php esc_html_e($primary_button['name']); ?>
                </button>
            </a>
        </div>
    </div>
</section>