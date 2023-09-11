<?php
$header_menu_id = get_menu_id('header_menu');
$header_menu = wp_get_nav_menu_items($header_menu_id);

$logo_attachment_id = get_field('logo_header', 'option');

$button_header = get_field('button_header', 'option');

?>

<header class="header">
    <div class="main-nav">
        <div class="main-nav__left-box">
            <a href="/">
                <?php echo get_attachment_id($logo_attachment_id, null, 'main-nav__logo'); ?>
            </a>

            <svg id="toggle-menu" class="main-nav__toggle" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z" fill="currentColor" />
                <path d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z" fill="currentColor" />
                <path d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z" fill="currentColor" />
            </svg>
        </div>

        <div id="main-nav-wrap" class="main-nav__right-box">
            <?php if (!empty($header_menu) && is_array($header_menu)) : ?>
                <nav class="main-nav__menu">
                    <?php foreach ($header_menu as $item) : ?>
                        <?php if (!$item->menu_item_parent) :
                            $child_menu_items = get_child_menu_items($header_menu, $item->ID);
                        ?>
                            <?php if (count($child_menu_items) === 0) : ?>
                                <a class="main-nav__menu-link" href="<?php echo esc_url($item->url); ?>">
                                    <?php esc_html_e($item->post_title ?: $item->title); ?>
                                </a>
                            <?php else : ?>
                                <div class="main-nav__submenu">
                                    <a class="main-nav__menu-link main-nav__menu-link--arrow" href="<?php echo esc_url($item->url); ?>">
                                        <?php esc_html_e($item->post_title ?: $item->title); ?>

                                        <svg class="main-nav__menu-link-arrow" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="main-nav__menu-link-arrow-path" fill-rule="evenodd" clip-rule="evenodd" d="M0.57573 1.07564C0.810044 0.841324 1.18994 0.841324 1.42426 1.07564L5.99999 5.65137L10.5757 1.07564C10.81 0.841324 11.1899 0.841324 11.4243 1.07564C11.6586 1.30995 11.6586 1.68985 11.4243 1.92417L6.42426 6.92417C6.18994 7.15848 5.81004 7.15848 5.57573 6.92417L0.57573 1.92417C0.341415 1.68985 0.341415 1.30995 0.57573 1.07564Z" fill="#232629" />
                                        </svg>
                                    </a>

                                    <div class="main-nav__submenu-wrap">
                                        <?php foreach ($child_menu_items as $child_item) : ?>
                                            <a class="main-nav__submenu-link" href="<?php echo esc_url($child_item->url); ?>">
                                                <?php esc_html_e($child_item->post_title ?: $child_item->title); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

            <div class="main-nav__button_and_search">
                <a href="<?php echo esc_url($button_header['url']); ?>">
                    <button aria-label="<?php esc_html_e($button_header['name']); ?>" type="button">
                        <?php esc_html_e($button_header['name']); ?>
                    </button>
                </a>

                <div class="main-nav__search">
                    <input class="main-nav__input-search" type="text" placeholder="Search">

                    <button type="submit" class="main-nav__submit-search button">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00002 1.5999C4.4654 1.5999 1.60002 4.46528 1.60002 7.9999C1.60002 11.5345 4.4654 14.3999 8.00002 14.3999C11.5346 14.3999 14.4 11.5345 14.4 7.9999C14.4 4.46528 11.5346 1.5999 8.00002 1.5999ZM0.400024 7.9999C0.400024 3.80254 3.80266 0.399902 8.00002 0.399902C12.1974 0.399902 15.6 3.80254 15.6 7.9999C15.6 9.8826 14.9154 11.6054 13.7816 12.933L19.4243 18.5756C19.6586 18.81 19.6586 19.1899 19.4243 19.4242C19.19 19.6585 18.8101 19.6585 18.5758 19.4242L12.9331 13.7815C11.6055 14.9153 9.88272 15.5999 8.00002 15.5999C3.80266 15.5999 0.400024 12.1973 0.400024 7.9999Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>