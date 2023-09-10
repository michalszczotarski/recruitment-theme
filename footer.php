<?php
$logo_attachment_id = get_field('logo_footer', 'option');
$srcset = wp_get_attachment_image_srcset($logo_attachment_id, 'full');

$logo = wp_get_attachment_image($logo_attachment_id, 'full', false, [
    'loading' => 'lazy',
    'scrset' => $srcset
]);

$desc_footer = get_field('desc_footer', 'option');

$name_menu_footer = get_field('name_menu_footer', 'option');
$footer_menu_id = get_menu_id('footer_menu');
$footer_menu = wp_get_nav_menu_items($footer_menu_id);
$contact_footer = get_field('contact_footer', 'option');

$mail_button_footer = get_field('mail_button_footer', 'option');
$icon_mail_button_footer = wp_get_attachment_image($mail_button_footer['icon'], 'full', false, [
    'loading' => 'lazy',
]);

$call_button_footer = get_field('call_button_footer', 'option');
$icon_call_button_footer = wp_get_attachment_image($call_button_footer['icon'], 'full', false, [
    'loading' => 'lazy',
]);

$social_media_footer = get_field('social_media_footer', 'option');
$copyright_footer = get_field('copyright_footer', 'option');

?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__left-box">
            <a href="/" class="footer__logo">
                <?php echo $logo ?>
            </a>

            <?php echo apply_filters('the_content', $desc_footer); ?>
        </div>

        <div class="footer__middle-box">
            <h3 class="footer__name-menu">
                <?php esc_html_e($name_menu_footer); ?>
            </h3>

            <?php if (!empty($footer_menu) && is_array($footer_menu)) : ?>
                <nav class="footer__menu">
                    <?php foreach ($footer_menu as $item) : ?>
                        <a class="footer__menu-link" href="<?php echo esc_url($item->url); ?>">
                            <?php esc_html_e($item->post_title ?: $item->title); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>
        </div>

        <div class="footer__right-box">
            <h3 class="footer__name-contact">
                <?php esc_html_e($contact_footer['title']); ?>
            </h3>

            <div class="footer__desc-contact">
                <?php echo apply_filters('the_content', $contact_footer['desc']); ?>
            </div>

            <div class="footer__buttons">
                <a rel="nofollow" href="mailto:<?php echo antispambot($mail_button_footer['email']); ?>">
                    <button class="footer__button">
                        <?php echo $icon_mail_button_footer ?>
                        <?php esc_html_e($mail_button_footer['name']); ?>
                    </button>
                </a>

                <a rel="nofollow" href="tel: <?php echo antispambot($call_button_footer['number_phone']); ?>">
                    <button class="footer__button">
                        <?php echo $icon_call_button_footer ?>
                        <?php esc_html_e($call_button_footer['name']); ?>
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="footer__social-media">
            <?php foreach ($social_media_footer as $item) : ?>
                <a class="footer__menu-link" href="<?php echo esc_url($item['link']); ?>">
                    <?php echo wp_get_attachment_image($item['icon'], 'full', false, [
                        'loading' => 'lazy',
                    ]); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="footer__copyright">
            <?php esc_html_e($copyright_footer); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>