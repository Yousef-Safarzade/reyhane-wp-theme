<form class="reyhane-edit-user-data-form" action="#">

    <input type="hidden" name="userID" value="<?php echo get_current_user_id(); ?>">

    <div class="reyhane-edit-user-form-row">

        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userFirstName">

                نام  : *

            </label>

            <input type="text" class="reyhane-edit-user-data-input" name="userFirstName" id="userFirstName" value="<?php echo $args['userFirstName'] ?>">

            <span class="reyhane-edit-user-data-input-error-message"></span>

        </div>


        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userLastName">

                نام خانوداگی : *

            </label>

            <input type="text" class="reyhane-edit-user-data-input" name="userLastName" id="userLastName" value="<?php echo $args['userLastName'] ?>" >

        </div>

    </div>




    <div class="reyhane-edit-user-form-row">

        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userAge">

                سن : *

            </label>

            <div class="reyhane-edit-user-data-custom-select-wrapper">

                <select name="userAge" class="reyhane-edit-user-data-custom-select" id="userAge">

                    <?php for($i = 8; $i <= 90; $i++){

                        $selected = ($args['userAge'] == $i) ? "selected" : "";

                        printf('<option value="%d" %s >%s</option>', $i, $selected , \Reyhane\helper::englishToPersianNumber($i));

                    } ?>

                </select>

                <span class="reyhane-edit-user-data-custom-select-arrow">

                            <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/custom-select-arrow.svg"); ?>

                        </span>

            </div>



        </div>


        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userMeliCode">

                کد ملی  : *

            </label>

            <input type="tel" class="reyhane-edit-user-data-input" name="userMeliCode" id="userMeliCode" value="<?php echo $args['userMeliCode'] ?>" oninput="this.value = this.value.replace(/\D/g, '')">

        </div>

    </div>




    <div class="reyhane-edit-user-form-row">

        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userGender">

                جنسیت : *

            </label>

            <div class="reyhane-edit-user-data-custom-select-wrapper">

                <select name="userGender" class="reyhane-edit-user-data-custom-select">

                    <option value="male" <?php echo $args['userGender'] == 'male' ? 'selected' : '' ?> >آقا</option>

                    <option value="female" <?php echo $args['userGender'] == 'female' ? 'selected' : '' ?>>خانم</option>

                </select>

                <span class="reyhane-edit-user-data-custom-select-arrow">

                            <?php \Reyhane\helper::print_svg(\Reyhane\config::$imgPath . "/svg/custom-select-arrow.svg"); ?>

                        </span>

            </div>

        </div>


        <div class="reyhane-edit-user-data-input-wrapper">

            <label class="reyhane-edit-user-data-label" for="userPhoneNumber">

                شماره تماس  :

            </label>

            <input type="email" class="reyhane-edit-user-data-input" name="userPhoneNumber"  value="<?php echo $args['userPhoneNumber'] ?>" readonly>

        </div>

    </div>

    <input type="submit" value="ثبت اطلاعات">

</form>