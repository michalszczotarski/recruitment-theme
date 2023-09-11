<?php
$logo_attachment_id = get_field('logo_footer', 'option');

$desc_footer = get_field('desc_footer', 'option');

$name_menu_footer = get_field('name_menu_footer', 'option');
$footer_menu_id = get_menu_id('footer_menu');
$footer_menu = wp_get_nav_menu_items($footer_menu_id);
$contact_footer = get_field('contact_footer', 'option');

$mail_button_footer = get_field('mail_button_footer', 'option');
$icon_mail_button_footer = wp_get_attachment_image($mail_button_footer['icon'], 'thumbnail', false, [
    'loading' => 'lazy',
]);

$call_button_footer = get_field('call_button_footer', 'option');
$icon_call_button_footer = wp_get_attachment_image($call_button_footer['icon'], 'thumbnail', false, [
    'loading' => 'lazy',
]);

$social_media_footer = get_field('social_media_footer', 'option');
$copyright_footer = get_field('copyright_footer', 'option');

?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__left-box">
            <a href="/">
                <?php echo get_attachment_id($logo_attachment_id, null, 'footer__logo'); ?>
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
                    <button aria-label="<?php esc_html_e($mail_button_footer['name']); ?>" type="button" class="footer__button">
                        <?php echo $icon_mail_button_footer ?>
                        <?php esc_html_e($mail_button_footer['name']); ?>
                    </button>
                </a>

                <a rel="nofollow" href="tel: <?php echo antispambot($call_button_footer['number_phone']); ?>">
                    <button aria-label="<?php esc_html_e($call_button_footer['name']); ?>" type="button" class="footer__button">
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
                <a target="_blank" href="<?php echo esc_url($item['link']); ?>">
                    <?php echo get_attachment_id($item['icon'], 'thumbnail', 'footer__social-icon'); ?>
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