<section class="news">
    <div class="news_wrapper container">
        <div class="main_news">
            <?php

            foreach ($params['allNews'] as $news):
                require 'newsBlock.php';
            endforeach;
                
        ?>

        </div>
    </div>

</section>

<? require 'pagination.php'?>



