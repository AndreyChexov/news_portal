<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style/style.scss" rel="stylesheet" type="text/css">
    <title>News</title>
</head>
<body>
        <header>
            <div class='header_wrapper container'>
                    <div class="label">News portal</div>
                    <div>Поиск
                        <input type="text" class="search">
                        <button type="submit">Найти</button>
                    </div>
                    <a class="auth_btn" href="auth.php"><button>Вход</button></a>
            </div>

        </header>

        <section class="news">
                <div class="news_wrapper container">
                    <div class="main_news">
                        <div class="main_news_card">
                                <div class="main_news_data"><?php echo date('l jS \of F Y h:i:s A');?></div>

                                <div class="main_news_author">Drake</div>

                                <div class="main_news_text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid
                                        aperiam atque beatae cumque distinctio dolore dolores dolorum earum eos
                                        explicabo hic nam natus neque nesciunt possimus, praesentium quia saepe!
                                    </div>
                            <button class="main_news_btn">Подробнее</button>
                        </div>
                        <div class="main_news_card">
                            <div class="main_news_data"><?php echo date('l jS \of F Y h:i:s A');?></div>

                            <div class="main_news_author">Drake</div>

                            <div class="main_news_text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid
                                aperiam atque beatae cumque distinctio dolore dolores dolorum earum eos
                                explicabo hic nam natus neque nesciunt possimus, praesentium quia saepe!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores
                                    consectetur cum esse ex exercitationem expedita fugit id inventore iusto laudantium
                                    nemo nesciunt nobis optio quisquam quod tempore ullam vel.

                                A amet aspernatur autem cumque deleniti dicta dolorum eos facilis hic id laboriosam
                                    magni modi nulla odio officiis possimus, provident quis quisquam recusandae repellat
                                    reprehenderit sed sit soluta suscipit voluptas?

                            </div>
                            <button class="main_news_btn">Подробнее</button>
                        </div>
                        <div class="main_news_card">
                            <div class="main_news_data"><?php echo date('l jS \of F Y h:i:s A');?></div>

                            <div class="main_news_author">Drake</div>

                            <div class="main_news_text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid
                                aperiam atque beatae cumque distinctio dolore dolores dolorum earum eos
                                explicabo hic nam natus neque nesciunt possimus, praesentium quia saepe!
                            </div>
                            <button class="main_news_btn">Подробнее</button>
                        </div>
                        <div class="main_news_card">
                            <div class="main_news_data"><?php echo date('l jS \of F Y h:i:s A');?></div>

                            <div class="main_news_author">Drake</div>

                            <div class="main_news_text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aliquid
                                aperiam atque beatae cumque distinctio dolore dolores dolorum earum eos
                                explicabo hic nam natus neque nesciunt possimus, praesentium quia saepe!
                            </div>
                            <button class="main_news_btn">Подробнее</button>
                        </div>



                    </div>

                    <div class="other_news">
                        <div class="other_news_card"></div>
                        <div class="other_news_card"></div>
                        <div class="other_news_card"></div>
                    </div>

                </div>
        </section>


        <footer>
            <h1>Made by Chexov</h1>
        </footer>
</body>
</html>