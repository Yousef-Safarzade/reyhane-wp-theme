<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<?php $fields = get_fields(); ?>

<div class="reyhane-contact-main-container reyhane-container reyhane-center-container">

    <div class="right-col">

        <h1 class="contact-main-title"> <?php echo $fields['contact_main_title']; ?> </h1>

        <p class="contact-description"> <?php echo $fields['contact_main_description']; ?> </p>

        <div class="contact-info">

            <div class="contact-info-item">

                <div class="contact-info-item-title-section">

                    <span class="contact-info-item-title-icon">

                        <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/pin-alt.svg") ?>

                    </span>

                    <p class="contact-info-item-title">

                        آدرس مطب

                    </p>

                </div>

                <div class="contact-info-item-description-section">

                    <span class="contact-info-description-empty-space"></span>

                    <p class="contact-info-item-description">

                        <?php echo \Reyhane\helper::englishToPersianNumber($fields['contact_office_location']); ?>

                    </p>

                </div>

            </div>

            <div class="contact-info-item">

                <div class="contact-info-item-title-section">

                    <span class="contact-info-item-title-icon">

                        <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/phone.svg") ?>

                    </span>

                    <p class="contact-info-item-title">

                       شماره تماس

                    </p>

                </div>

                <div class="contact-info-item-description-section">

                    <span class="contact-info-description-empty-space"></span>

                    <p class="contact-info-item-description split-description">

                        <span class="right">

                            <a href="tel:<?php echo $fields['contact_phone_number_1']; ?>">

                                    <?php echo \Reyhane\helper::englishToPersianNumber($fields['contact_phone_number_1']); ?>

                            </a>

                        </span>

                        <?php if(!empty($fields['contact_phone_number_2'])){ ?>

                            <span class="separator">|</span>

                            <span class="left">

                                <a href="tel:<?php echo $fields['contact_phone_number_2']; ?>">

                                    <?php echo \Reyhane\helper::englishToPersianNumber($fields['contact_phone_number_2']); ?>

                                </a>

                            </span>

                        <?php } ?>

                    </p>

                </div>

            </div>

        </div>

        <a class="reyhane-button-large get-consultant" href="<?php echo \Reyhane\ThemeSettings::get_theme_setting('get_consultant_url') ?>" target="_blank">

            <span class="reyhane-button-icon">

                <?php echo \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/chat-lines.svg"); ?>

            </span>

            <span class="reyhane-button-text">مشاوره رایگان</span>

        </a>


    </div>

    <div class="left-col">

        <?php echo do_shortcode('[contact-form-7 id="233"]'); ?>

    </div>


</div>

<?php get_footer(); ?>