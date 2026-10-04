<div class="reyhane-faq-container">

    <?php foreach ($args as $item){ ?>

        <div class="reyhane-faq-item ">

            <div class="reyhane-faq-title">

                <p><?php  echo $item['question']; ?></p>

            </div>

            <div class="reyhane-faq-answer">

                <p><?php  echo $item['answer']; ?></p>

            </div>

            <div class="reyhane-faq-icon">

                <span class="plus">+</span>

                <span class="minus">-</span>

            </div>

        </div>

    <?php } ?>

</div>