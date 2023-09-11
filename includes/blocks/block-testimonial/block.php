<?php

/**
 * @var array $block
 */

$heading = get_field('heading_testimonial');
$testimonials = get_field('testimonials_testimonial');
?>

<section class="testimonial">
    <div class="container testimonial__container">
        <h2 class="testimonial__heading">
            <?php esc_html_e($heading); ?>
        </h2>

        <div class="testimonial__box">
            <div class="testimonial__slider">
                <section class="splide splide-testimonial" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($testimonials as $item) : ?>
                                <li class="splide__slide">
                                    <div class="testimonial__desc-slide">
                                        <?php echo apply_filters('the_content', $item['desc']); ?>
                                    </div>

                                    <div class="testimonial__author-slide">
                                        <?php esc_html_e($item['author']); ?>
                                    </div>

                                    <div class="testimonial__position-slide">
                                        <?php esc_html_e($item['position']); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="testimonial__cta cta">
                <h2 class="cta__heading">
                    Lorem Ipsum
                </h2>

                <div class="cta__desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac arcu tempus, iaculis elit ac, euismod urna.
                </div>

                <div class="cta__buttons">
                    <a href="http://localhost:3000/#link1">
                        <button class="button button--secondary">
                            Secondary button </button>
                    </a>

                    <a href="http://localhost:3000/#link2">
                        <button class="button button--white">
                            Primary button </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>