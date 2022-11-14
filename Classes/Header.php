
<header>
            <div class='header_wrapper container'>
                    <div class="label">News portal</div>

                <div class="header_search">
                    <form>
                        <input class="search_input" type="text" name="search">
                        <button class="search_btn" type="submit">Найти</button>
                    </form>

                </div>

                <div class="dropdown">
                    <button class="dropbtn">Категории</button>
                    <div class="dropdown-content">
                        <a href="index.php">Все новости</a>
                        <a href="showAnimals.php">Животные</a>
                        <a href="showCities.php">Города</a>
                    </div>
                </div>
                <?php
                        session_start();

                        if($_SESSION['user']) {
                 ?>
                                <div class="profile_div">
                                    <a href="profile.php">
                                        <img class="profile_on" src="icons/free-icon-user-1550584.png" alt="user_avatar">
                                    </a>
                                    <p class="profile_p"><?php echo $_SESSION['user']['name']?></p>
                                </div>

                <?php
                        } else {
                ?>
                        <a class="enter_btn" href="auth.php"><button>Войти</button></a>
                <?php
                        }

                ?>


            </div>

        </header>

