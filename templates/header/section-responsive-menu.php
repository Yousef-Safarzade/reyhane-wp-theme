<div class="reyhane-responsive-menu-container hidden">

        <div class="reyhane-responsive-menu-top-section">

            <div class="reyhane-responsive-menu-logo">

                <?php echo get_custom_logo(); ?>

                <p class="reyhane-responsive-logo-text">دکتـر ریحانـه
                    قنبری جهرمی</p>

            </div>

            <div class="reyhane-responsive-menu-close-button">

                <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/responsive-menu-close-icon.svg" ); ?>

            </div>

        </div>





        <div class="reyhane-responsive-menu-bottom-section">

            <?php wp_nav_menu(
                array(
                    'theme_location'    => 'primary_menu_responsive' ,
                    'after'             => sprintf('<span class="reyhane-responsive-menu-item-arrow">%s</span>' , \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/responsive-menu-item-arrow.svg"  , false) ),
                    'walker'            => new \Reyhane\MobileNavWalker(),
                )
            ); ?>

        </div>


</div>