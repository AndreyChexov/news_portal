<section class="news">
    <div class="news_wrapper container">
        <div class="main_news">
        
            <?php
                foreach($params['allNews'] as $news) :
                    if($news['category'] === "Города") {
                        require 'newsBlock.php';
                    }
                endforeach;
                
            ?>

        </div>
    </div>

</section>