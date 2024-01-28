<?php include "Views/head.php"; 
    $email = $_POST['email'];
    $err = $_POST['error'];
?>

<body>
    <header class="header">
        <img class="logo_pic" src="Views/images/Logo.png" alt="logotype">
        <h1 class="logo_text">Cat Nanny</h1>
        <button class="button__main" id="button__redirect_login"><h3>Log in</h3></button>
    </header>

    <main class="body">
        <section class="section__about_me">
            <div class="article__about_me__pic_text">
                <img class="article__about_me__pic" src="Views/images/about_me.png" alt="photo with Cat">
                <article class="article__about_me__text">
                    <h3>About me</h3>
                    <p>Lorem ipsum dolor sit amet consectetur. Malesuada suspendisse commodo sapien iaculis urna ornare nam ut. Arcu gravida nunc in libero eros suscipit arcu. </p>
                </article>
            </div>
            <article class="article__what_doIdo">
                <h3>What do I do</h3>
                <p>Lorem ipsum dolor sit amet consectetur. Id tincidunt sed velit a. Tincidunt eget mauris ipsum libero bibendum fermentum sed mauris. Sed pharetra habitant platea facilisis sit. Nullam vitae condimentum porttitor nec sit vel aliquam vel. Tristique amet duis in consequat amet sagittis ultricies tempor. Tristique euismod mauris posuere nec. Est facilisi porta vitae arcu felis. Porttitor in commodo turpis amet aliquet.
                    <br>Aliquam risus in est magna ipsum potenti fringilla habitasse. Nullam vitae condimentum porttitor nec sit vel aliquam vel. Tristique amet duis in consequat amet sagittis ultricies tempor. Tristique euismod mauris posuere nec. Est facilisi porta vitae arcu felis. Porttitor in commodo turpis amet aliquet. Aliquam risus in est magna ipsum potenti fringilla habitasse.</p>
            </article>
        </section>

        <section class="section__recommendations">
            <h3>Recommendations</h3>
            <div class="article__recommendation">
                <article class="article__recommendation__pics_text">
                    <div class="article__recommendation__pics">
                        <img src="Views/images/recommend_1.png" alt="">
                        <img src="Views/images/recommend_2.png" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur. Id tincidunt sed velit a. Tincidunt eget mauris ipsum libero bibendum fermentum sed mauris. Sed pharetra habitant platea facilisis sit. Nullam vitae condimentum porttitor nec sit vel aliquam vel. Tristique amet duis in consequat amet sagittis ultricies tempor. Tristique euismod mauris posuere nec. Est facilisi porta vitae arcu felis. Porttitor in commodo turpis amet aliquet.</p>
                </article>
                <button class="button__next_article"></button>
            </div>
        </section>
    </main>

    <form class="menu__login" id="form__login" method="post">
        <label for="email"><h2>Email:</h2></label>
        <input type="email" class="input" id="email" name="email" placeholder="email" value="<?php echo $email; ?>">
        <label class="label__invalid_data" id="incorrect_email"></label>

        <label for="password"><h2>Password:</h2></label>
        <input type="password" class="input" id="password" name="password" placeholder="pAs$worD">
        <label class="label__invalid_data" id="incorrect_password"></label>
        <br>
        <!-- <label class="label__forgot_password">If you forgot your password, click 
            <a href="" id="forgot_password">here</a>.</label>
        <br><br> -->
        <div class="text_buttons">
            <button class="button__main" id="button_login" name="uri" value="login"><h2>Log in</h2></button>
            <br><br>
            <p>If you aren't registered, please fill email and password and click the button below:</p><br>
            <button class="button__main" id="button_register" name="uri" value="register"><h2>Register</h2></button>
        </div>
        
    </form>

    <input type="text" id="error_label" hidden disabled value="<?php echo $err; ?>">
    
    <script type="text/javascript" src="Views/MainPage.script.js"></script>

    <?php include "Views/footer.php"; ?>