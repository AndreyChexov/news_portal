
<header>
            <div class='header_wrapper container'>
                    <div class="label">News portal</div>

                <?php
                        session_start();

                        if($_SESSION['user']) {
                 ?>
                                <div class="profile_div">
                                    <a href="profile.php">
                                        <img class="profile_on" src="icons/free-icon-user-1550584.png" alt="">
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

