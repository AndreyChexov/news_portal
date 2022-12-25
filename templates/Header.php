
<header>
            <div class='header_wrapper container'>
                    <a href="/news/index.php?path=news" style="text-decoration: none; color: white;" class="label">News portal</a>

                <form class="dropdown">
                    <button class="dropbtn">Категории</button>

                    <div class="dropdown-content">
                        <a href="/news/index.php?path=news">Все новости</a>
                        <a href="/news/index.php?path=animals">Животные</a>
                        <a href="/news/index.php?path=cities">Города</a>
                        <a href="/news/index.php?path=cars">Автомобили</a>
                    </div>

                </form>
                <?php

                        session_start();

                        if($_SESSION['user']) {
                 ?>
                                <div class="profile_div">
                                    <a href="/news/index.php?path=profile" >
                                        <img class="profile_on" src="assets/icons/free-icon-user-1550584.png"  alt="user_avatar">
                                    </a>
                                    <p class="profile_p"><?php echo $_SESSION['user']['name']?></p>
                                    <?php
                        } else {
                ?>
                        <a class="enter_btn" href="/news/index.php?path=auth"><button>Войти</button></a>
                <?php
                        }
                ?>
                                </div>

               


            </div>

        </header>

