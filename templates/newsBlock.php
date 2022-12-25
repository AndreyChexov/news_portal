<div class="main_news_card" style="background-image: url('<?php echo  $news['fon']?>')">
                      <div class="main_news_data"><?php echo  $news['data']?></div>

                <div class="main_news_name"><?php echo  $news['new_name']?></div>


                <div class="main_news_text">
                    <?php echo  $news['text']?>
                </div>
                <div class="main_news_footer">
                    <div class="main_news_author"><?php echo  $news['author']?></div>
                    <a class="main_news_link" href="/news/index.php?path=main/index/&news_id=<?php echo $news['id']?>">Подробнее...</a>
                </div>

                </div>