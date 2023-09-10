<?php

/**
 * @var array $block
 */

$tiles = get_field('tiles_hero');
?>

<section class="splide splide-tiles" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            <?php foreach ($tiles as $item) : ?>
                <li class="splide__slide">
                    <a class="splide-tiles__tile" href="<?php echo esc_url($item['link']); ?>">
                        <?php echo get_attachemnt_id($item['img'], 'splide-tiles__img') ?>

                        <h2 class="splide-tiles__name">
                            <?php esc_html_e($item['name']); ?>
                        </h2>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="hero">
    <?php foreach ($tiles as $item) : ?>
        <a class="hero__tile" href="<?php echo esc_url($item['link']); ?>">
            <?php echo get_attachemnt_id($item['img'], 'hero__img') ?>

            <h2 class="hero__name">
                <?php esc_html_e($item['name']); ?>
            </h2>
        </a>
    <?php endforeach; ?>
</section>