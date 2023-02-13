    <footer>
        <?php wp_nav_menu(array(
            'menu'              => 'footer_menu',
            'theme_location'    => 'footer_menu',
            'depth'             => 1,
            'menu_class'        => 'footer__menu',
            'container'         => false,
        )); ?>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
