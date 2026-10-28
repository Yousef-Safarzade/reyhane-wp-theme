<?php /* Template Name: About */ ?>

<?php get_header(); ?>

<?php $fields = get_fields(); ?>

<div class="reyhane-about-detail-banner" style="background-image: url(<?php echo $fields['main_image'] ?>);">

    <div class="reyhane-container reyhane-center-container reyhane-about-detail-banner-content-wrapper" style="z-index: 1">

        <h1 class="reyhane-about-banner-main-title" >

            <?php echo $fields['main_title']; ?>

        </h1>

        <p class="reyhane-about-detail-banner-description">

            <?php echo $fields['main_description']; ?>

        </p>

        <div class="reyhane-about-banner-badges-container">

            <div class="reyhane-about-banner-badge-item">

                <span class="reyhane-about-banner-badge-icon">

                    <?php  \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/check.svg"); ?>

                </span>

                <p class="reyhane-about-banner-badge-title">

                    <?php echo $fields['first_badge_title']; ?>

                </p>

            </div>

            <div class="reyhane-about-banner-badge-item">

                <span class="reyhane-about-banner-badge-icon">

                    <?php  \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/check.svg"); ?>

                </span>

                <p class="reyhane-about-banner-badge-title">

                    <?php echo \Reyhane\helper::englishToPersianNumber( $fields['second_badge_title'] ); ?>

                </p>

            </div>

        </div>

    </div>

    <div class="reyhane-about-detail-banner-responsive-image"  style="background-image: url(<?php echo $fields['main_image_responsive'] ?>);"> </div>

</div>

<div class="reyhane-approaches-main-container reyhane-container reyhane-center-container">

    <h2 class="reyhane-approaches-main-title">

        <?php echo $fields['approaches_main_title']; ?>

    </h2>
    
    <div class="reyhane-approaches-items-container">

        <?php for($i=1 ; $i < 7 ; $i++) {

            if( empty($fields['approach_title_'.$i]) ) {

                continue;

            }

        ?>

            <div class="reyhane-approaches-item">

                <img class="reyhane-approaches-item-icon" src="<?php echo $fields['approach_icon_'.$i] ?>">

                <p class="reyhane-approaches-item-title"> <?php echo $fields['approach_title_'.$i]; ?> </p>

                <p class="reyhane-approaches-item-sub-title"> <?php echo $fields['approach_description_'.$i]; ?> </p>

            </div>

        <?php } ?>

    </div>

</div>

<div class="reyhane-skills">

    <div class="reyhane-skills-container reyhane-container reyhane-center-container">

        <div class="right-col">

            <p class="reyhane-skills-main-title"> <?php echo $fields['skills_main_title']; ?> </p>

            <p class="reyhane-skills-main-description"> <?php echo $fields['skills_main_description']; ?> </p>


            <ul class="reyhane-skills-items-container">


                <?php for($i=1 ; $i < 7 ; $i++) {

                    if( empty($fields['skills_title_'.$i]) ) {

                        continue;
                    }

                ?>

                    <li class="reyhane-skills-item">

                        <span class="reyhane-skill-item-icon">

                            <?php  \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/check.svg"); ?>

                        </span>

                        <p class="reyhane-skill-item-title"> <?php echo $fields['skills_title_'.$i]; ?> </p>

                    </li>

                <?php } ?>

            </ul>

        </div>

        <div class="left-col reyhane-skills-main-image" style="background-image: url('<?php echo $fields['skills_main_image'] ?>');"> </div>

    </div>

</div>

<?php get_footer(); ?>