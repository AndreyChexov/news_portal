<div class='news_pagination'>
    <?php for ($i = 1; $i <= $params['page']; $i++ ): ?>
        <a href="&page=<? echo $i; ?>"> <? echo $i; ?></a>
    <?php endfor;
    ?>
</div>
