<?php include "Views/head.php";
    $err = $_POST['error'];
?>

<body>
    <header class="header">
        <img class="logo_pic" src="Views/images/Logo.png" alt="logotype">
        <h1 class="logo_text">Cat Nanny</h1>
        <button class="button__main"><h3>Log out</h3></button>
    </header>


    <main class="body">

        <section class="section__client_information"><!-- ??? -->

            
            <div class="section__client_info">
                <div class="info_about_client">
                    
                    <div class="client_data">
                        <h6>My information</h6>  
                    </div>

                    <form method="post" id="form_client">
                        <div class="client_data">
                            <input name="client_id" value="<?php echo $_POST['user']['id']; ?>" hidden>
                            <label class="label__client_data"><h2>My name:</h2></label>
                            <input type="text" name="name" id="input__client_name" value="<?php echo $_POST['user']['name']; ?>" class="input_disabled" disabled>
                            
                        </div><label class="label__invalid_data text_aligh_right" id="label__client_name"></label>

                        <div class="client_data">
                            <label class="label__client_data"><h4>Address:</h4></label>
                            <input type="text" name="address" id="input__client_address" value="<?php echo $_POST['user']['address']; ?>" class="input_disabled" disabled>
                            
                        </div><label class="label__invalid_data text_aligh_right" id="label__client_address"></label>

                        <div class="client_data">
                            <label class="label__client_data"><h4>Phone:</h4></label>
                            <input type="text" name="phone" id="input__client_phone" value="<?php echo $_POST['user']['phone']; ?>" class="input_disabled" disabled>
                            
                        </div><label class="label__invalid_data text_aligh_right" id="label__client_phone"></label>

                        <!-- <div class="client_data">
                            <label class="label__client_data"><h4>Additional phone*:</h4></label>
                            <input type="text" name="emergency_phone" id="input__client_emergency_phone" value="<?php echo $user[0]["emergency_phone"]?>" class="input_disabled" disabled>
                        </div>   
                        <div class="client_data">
                            <label class="label_emergency_phone">*only for emergency situations</label>
                            <label class="label__invalid_data" id="label__client_emergency_phone"></label>
                        </div> -->



                        <div class="client_additional_info">
                            <label class="label__client_data"><h4>Additional information:</h4></label>
                            <textarea name="info" id="input__client_additional_information" rows="4" class="textarea_disabled" disabled><?php echo $_POST['user']['info']; ?></textarea>
                        </div>
                        <div class="client_data center_align">
                            <input name="uri" value="change_info" hidden>
                            <button type="button" id="button__change_client_info" class="button__main button_small"><h5>Change info</h5></button>
                            <button type="button" id="button__save_client_info" class="button__main button_small" hidden><h5>Save info</h5></button>
                        </div></form>
                    

                    <br><br>
                    <form method="post" id="form_email_password">
                        <div class="client_data">
                            <input name="client_id" value="<?php echo $_POST['user']['id']; ?>" hidden>
                            <input name="uri" value="change_data" hidden>
                            <button type="button" id="button__change_client_email" class="button__main button_small"><h5>Change email</h5></button>
                            <button type="button" id="button__change_client_password" class="button__main button_small"><h5>Change password</h5></button>

                            <input type="text" name="email" id="input__client_email" value="<?php echo $_POST['user']['email']; ?>" class="input width_60percent" hidden>
                            <button type="button" id="button__save_client_email" class="button__main button_small" hidden><h5>Save email</h5></button>
                            <input type="text" name="password" id="input__client_password" class="input" class="input width_60percent" hidden>
                            <button type="button" id="button__save_client_password" class="button__main button_small" hidden><h5>Save password</h5></button>
                            
                        </div><label class="label__invalid_data" id="label__client_email_password" hidden></label>
                    </form>


                </div>


                <section class="section__cat_information">
                    <h6>My cat(s)</h6>

<?php foreach ($_POST['cats'] as $cat)
{
    echo '      <div class="carousel fade">
                    <form method="post" id="form_cat">
                        <div class="info_about_cat__with_pic">
                            <div class="info_about_cat__without_pic">

                                <div class="client_data">
                                    <input id="input__cat_id" name="cat_id" value="' . $cat['cat_id'] . '" hidden>
                                    <label class="label__client_data"><h4>Name:</h4></label>
                                    <input type="text" name="cat_name" id="input__cat_name" value="' . $cat['cat_name'] . '" class="input_disabled" disabled>
                                </div><label class="label__invalid_data text_aligh_right" id="label__cat_name"></label>

                                <div class="client_data">
                                    <label class="label__client_data"><h4>Age (years):</h4></label>
                                    <input type="number" step="0.1" min=0 name="cat_age" id="input__cat_age" value="' . $cat['cat_age'] . '" class="input_disabled" disabled>
                                </div><label class="label__invalid_data text_aligh_right" id="label__cat_age"></label>

                                <div class="client_data">
                                    <label class="label__client_data"><h4>Character:</h4></label>
                                    <input type="text" name="cat_character" id="input__cat_character" value="' . $cat['cat_character'] . '" class="input_disabled" disabled>
                                </div><label class="label__invalid_data"></label>

                                <div class="client_data">
                                    <label class="label__client_data"><h4>Problems:</h4></label>
                                    <input type="text" name="cat_problems" id="input__cat_problems" value="' . $cat['cat_problems'] . '" class="input_disabled" disabled>
                                </div><label class="label__invalid_data"></label>
                                
                            </div>
                            <img class="info_about_cat__pic" id="cat_photo" src="Views/images/cats/' . $cat['cat_id'] . '.png"></img>
                        </div>    
                        <div class="client_additional_info">
                            <label class="label__client_data"><h4>Individual requests:</h4></label>
                            <textarea name="cat_info" id="input__cat_individual_requests" rows="3" class="textarea_disabled" disabled>' . $cat['cat_info'] . '</textarea>
                        </div>
                        <input name="uri" value="change_cat" hidden>
                    </form>
                </div>
'; } ?>


                        <div class="client_data center_align">
                            <!-- <input name="uri" value="change_cat" hidden> -->
                            <button type="button" id="button__change_cat_info" class="button__main button_small"><h5>Change cat's info</h5></button>
                            <button type="button" id="button__save_cat_info" class="button__main button_small" hidden><h5>Save cat's info</h5></button>
                        </div>
                    <!-- </form> -->

                        <div class="right_side_of45vw">
                        <label id="label__button_next_cat" style="padding-right: 5px;"><h4>Next cat</h4></label>
                            <button class="button__next_article" id="button__next_cat"></button>
                        </div>

                        <div>
                            <button class="button__main" id="button__add_cat"><h4>Add a cat</h4></button>
                        </div>

                </section>
            </div>    
        </section><!-- ??? -->
        <input id="adding_cat" hidden disabled value="<?php echo $_POST['adding_cat']; ?>" >
    </main>

    <form class="menu__new_cat" id="form__add_cat" enctype="multipart/form-data">

        <div class="client_data center_align">
            <h6>Add a new cat</h6>  
        </div><br><br>

        <div class="info_about_cat__with_pic">
            <div class="info_about_cat__without_pic width_35vw">

                <div class="client_data">
                    <input id="user_id" name="user_id" value="<?php echo $_POST['user']['id']; ?>" hidden>
                    <label class="label__client_data"><h4>Name:</h4></label>
                    <input type="text" name="new_cat_name" id="input__new_cat_name" class="input_clientPage" value="<?php echo $_POST['new_cat_name']; ?>" placeholder="Tom">
                </div><label class="label__invalid_data text_aligh_right" id="label__new_cat_name"></label>

                <div class="client_data">
                    <label class="label__client_data"><h4>Age (years):</h4></label>
                    <input type="number" step="0.1" min=0.1 name="new_cat_age" id="input__new_cat_age" class="input_clientPage" value="<?php echo $_POST['new_cat_age']; ?>" placeholder="3">
                </div><label class="label__invalid_data text_aligh_right" id="label__new_cat_age"></label>

                <div class="client_data">
                    <label class="label__client_data"><h4>Character:</h4></label>
                    <input type="text" name="new_cat_character" id="input__new_cat_character" class="input_clientPage" value="<?php echo $_POST['new_cat_character']; ?>" placeholder="calm or aggressive..">
                </div><label class="label__invalid_data"></label>

                <div class="client_data">
                    <label class="label__client_data"><h4>Problems:</h4></label>
                    <input type="text" name="new_cat_problems" id="input__new_cat_problems" class="input_clientPage" value="<?php echo $_POST['new_cat_problems']; ?>" placeholder="sometimes sharpens his claws on the sofa">
                </div><label class="label__invalid_data"></label>
            </div>

            <div class="text_above_pic">
                
                <img class="info_about_cat__pic" id="new_cat_photo" src= <?php echo $_POST['adding_cat']==="active" ? "Views/images/temp/temp.png" : "Views/images/place_for_photo.png"?> ></img>
                <label class="center_text_above_pic">
                    <input name="fileName" type="file" accept=".png" id="input_new_cat_photo" hidden>
                    <h5 style="text-shadow: #C1FAB2 0 0 2px;">Add photo</h5>
                </label>
                <label class="label__invalid_data" id="label__photo_new_cat"></label>
            </div>

        </div>    
        <div class="client_additional_info">
            <label class="label__client_data"><h4>Individual requests:</h4></label>
            <textarea name="new_cat_info" id="input__new_cat_individual_requests" rows="3" class="input_clientPage full_width" placeholder="Cover the sofa with a blanket"><?php echo $_POST['new_cat_info']; ?></textarea>
        </div>
        <br><br>
            
        <div class="text_buttons">
            <input id="form__add_cat__uri" hidden>
            <button class="button__main" type="button" id="button_save_new_cat"><h2>Add a cat</h2></button>
        </div>
        
    </form>
    
    <input type="text" id="error_label" hidden disabled value="<?php echo $err; ?>">

    <script type="text/javascript" src="Views/ClientPage.script.js"></script>

    <?php include "Views/footer.php"; ?>