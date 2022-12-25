<?php
      
      foreach($params['allNews'] as $news) {

                if($_GET['news_id'] == $news['id']) {
?>
          <div class="news_page container">
              <div class="news_page_name" style="background-image: url('<?php echo $news['fon']?>')"><?php echo $news['new_name']?></div>
              <div class="news_page_text"><?php echo $news['text']?></div>
              <div class="news_page_footer">
                  <div>Автор: <?php echo $news['author']?></div>
                  <div><?php echo $news['data']?></div>
              </div>

          </div>

<?php
 
  }
}


?>

                <form class="comments comment_form">

                    <label for="" style="margin-bottom: 40px; font-size: 20px">Комментарии:</label>
                    <textarea class="text_comment" type="text" name="comment"></textarea>
                    <input name="page" type="hidden" value="<? echo $_GET['news_id']; ?>">
                    <button class="comment_btn" type="submit">Оставить комментарий</button>

                </form>


 
<?php

            
foreach ($params['allComments'] as $comments):

    if($_GET['news_id'] == $comments['page']) {
        ?>

        <div class="list_comments">
        <div class="list_comments_wrapper">
        <div class="text_comment"><? echo $comments['text']?></div>
        <div class="wrapper_for_details">
            <div class="time_comment"><? echo $comments['time']?></div>
            <div class="author_comment">Автор: <? echo  $comments['author']?></div>
<!--                                <a class="comments_answer_btn" href="#">Ответить</a>-->
            <form>
                <input type="hidden" value="<?echo $comments['id']?>">
                <input type="submit" class="comments_answer_btn" value="Ответить">
            </form>

        </div>

        </div>
<?php
        } 
        endforeach;
?>

     
         

    <form class="comments_answer none_answer">
        <textarea name="comment_answer" cols="50" rows="2" class="for_answer"></textarea>
        <button class="comments_answer_btn" type="submit">Отправить</button>
    </form>
          

   
    
 <a class="news_page_link" href="/news/index.php?path=news">Вернуться к списку новостей...</a>