
<header>
            <div class='header_wrapper container'>
                    <a href="/portal?path=news" style="text-decoration: none; color: white;" class="label">News portal</a>

                <form class="dropdown">
                    <button class="dropbtn">Категории</button>

                    <div class="dropdown-content">
                        <a href="/portal?path=news">Все новости</a>
                        <a href="/portal?path=news/category/&name=Животные">Животные</a>
                        <a href="/portal?path=news/category/&name=Города">Города</a>
                        <a href="/portal?path=news/category/&name=Автомобили">Автомобили</a>
                    </div>

                </form>
                <?php

                        

                        if($_SESSION['user']) {
                 ?>
                                <div class="profile_div">
                                    <a href="/portal?path=profile"> 
                                        <img class="profile_on" src="assets/icons/free-icon-user-1550584.png"  alt="user_avatar">
                                    </a>
                                    <p class="profile_p"><?php echo $_SESSION['user']['name']?></p>
                 <?php
                        } else {
                ?>
                        <a class="enter_btn" href="/portal?path=auth"><button>Войти</button></a>
                <?php
                        }
                ?>
                                </div>

               


            </div>

        </header>

