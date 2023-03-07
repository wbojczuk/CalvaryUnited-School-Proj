<?php

            // If User Has Not Submitted Form
            if(!isset($_POST['passwordField'])){
            ?>
                <div class="center-full">
                    <form id="loginForm" action="./site_manager.php" method="POST">
                        <div class="center" style="justify-content: space-evenly;">
                        <span id="formTitle">Please Log In</span>
                            <div class="center">
                                <input type="password" name="passwordField" id="passwordField" placeholder="Password">
                                <input type="submit" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            <?php

            // If User Has Submitted Form
            }else{
                $current_pass = "7d641759f7e0ebb3a61501428e1f63bf6bac4bcff4cee9e860d370d015839424";
                $errors = [];
                $entered_pass = $_POST['passwordField'];
                if(empty($entered_pass)){
                    $errors[] = "Please Enter a Password";
                }else if($current_pass != hash("sha256", $entered_pass)){
                    $errors[] = "Wrong Password, Try Again";
                }

                if(count($errors) == 0){
                    // Log In User
                    $_SESSION["login"] = true;
                    header("Refresh:0");
                }else{
                    ?>
                    <div class="center-full">
                        <form id="loginForm" action="./site_manager.php" method="POST">
                            <div class="center" style="justify-content: space-evenly;">
                            <span id="formTitle">Please Log In</span>
                                <div class="center">
                                    <input type="password" name="passwordField" id="passwordField" placeholder="Password">
                                    <input type="submit" value="Login">
                                </div>
                            </div>
                            <?php
                                foreach($errors as $error){
                                    echo "<div class='form-error'>$error</div>";
                                }
                            ?>
                        </form>
                    </div>
                <?php
                }
            }
    ?>