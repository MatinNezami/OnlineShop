<?php

    require_once "../share/component.php";

    $src = null;

    (function () {

        if (!isset($GLOBALS["info"]["profile"]))
            return null;

        $type = substr($GLOBALS["info"]["profile"], 0, strpos($GLOBALS["info"]["profile"], ";"));
        $GLOBALS["src"] = "data:$type;base64," . substr($GLOBALS["info"]["profile"], strpos($GLOBALS["info"]["profile"], ";") + 1);

    })();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account</title>

    <?php component::headFiles() ?>

    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" type="text/css" href="/share/form.css">
    <link rel="stylesheet" type="text/css" href="./responsive.css">

    <script>
        <?php
            (function () {
                $userCookie = isset($_COOKIE["token"])? "const flag = \"information\";": "const flag = \"login\";";

                if (!isset($_GET["page"])) {
                    echo $userCookie;
                    return NULL;
                }

                switch ($_GET["page"]) {
                    case "login":
                        echo "const flag = \"login\";";
                        break;

                    case "signup":
                        echo "const flag = \"signup\";";
                        break;

                    case "information":
                        echo $userCookie;
                        break;
                }
            })();
        ?>
    </script>
</head>

<body>
    <header>
        <?php component::navbar() ?>
    </header>

    <main class="center-item">
        <div class="center-item" id="signup-box">
            <img src="/images/register.svg" loading="lazy" alt="signup picture" draggable="false">

            <form action="" class="center-item">
                <div class="input">
                    <input type="text" name="firstName">
                    <p class="placeholder">First Name</p>
                </div>

                <div class="input">
                    <input type="text" name="username" required>
                    <p class="placeholder">Username</p>
                </div>

                <div class="input">
                    <input type="email" name="email" required>
                    <p class="placeholder">Email</p>
                </div>

                <ul>
                    <li>
                        use number, capitalize letter and specific character
                    </li>
                </ul>

                <div class="input">
                    <input type="password" name="password" data-type="password" required>
                    <p class="placeholder">Password</p>
                </div>

                <div class="input">
                    <input type="password" name="retry-password" data-type="password" required>
                    <p class="placeholder">Re-enter Password</p>
                </div>

                <input type="file" id="custom-profile" autocomplete="off">

                <input type="hidden" name="type" value="register">
            </form>

            <div class="show-password center-item">
                <input type="checkbox" id="show-password-signup" autocomplete="off">
                <label for="show-password-signup">Show Password</label>
            </div>

            <button class="profile">Select A Profile</button>

            <div class="profile-images center-item">
                <div class="center-item"></div>
                
                <div class="center-item"></div>
            </div>

            <img src="" alt="custom profile" draggable="false" id="custom-profile-image">

            <label for="custom-profile" class="center-item">Select A Custom Profile</label>

            <div class="control center-item">
                <button class="login" data-target-box="login">Login</button>

                <button class="submit">Submit</button>
            </div>
        </div>

        <div class="center-item" id="login-box">
            <img src="/images/login.svg" loading="lazy" alt="login picture" draggable="false">

            <form action="" class="center-item">
                <div class="input">
                    <input type="text" name="username" required>
                    <p class="placeholder">Username</p>
                </div>

                <div class="input">
                    <input type="password" name="password" data-type="password" required>
                    <p class="placeholder">Password</p>
                </div>

                <input type="hidden" name="type" value="login">
            </form>

            <div class="show-password center-item">
                <input type="checkbox" id="show-password-login" autocomplete="off">
                <label for="show-password-login">Show Password</p>
            </div>

            <button class="login-google">With Google</button>

            <button class="forgot-password" data-target-box="forgot">Forgot Password</button>

            <div class="control center-item">
                <button class="signup" data-target-box="signup">Sign Up</button>

                <button class="submit">Submit</button>
            </div>
        </div>

        <div class="center-item" id="forgot-password-box">
            <img src="/images/forgot-password.svg" loading="lazy" alt="forgot password" draggable="flase">

            <form action="">
                <div class="input">
                    <input type="email" name="email" required>
                    <p class="placeholder">Email</p>
                </div>

                <input type="hidden" name="type" value="reset-password">
            </form>

            <div>
                <button class="submit">Take My Password</button>
            </div>
        </div>

        <div class="center-item" id="informations-box">
            <img src="<?php echo $src ?>" loading="lazy" alt="user profile" draggable="false">
            <h2>Hey <span><?php echo $info["firstName"]?? "client" ?></span></h2>

            <button class="logout">Log out</button>

            <button class="change-info" data-target-box="change">Change Informations</button>
        </div>
        
        <div class="center-item" id="change-informations-box">
            <div class="details-profile">
                <img src="<?php echo $src ?>" loading="lazy" alt="user profile" draggable="false">

                <button id="change-profile-btn" data-target-modal="change-profile-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 605 605">
                        <g fill="#FFF">
                            <path d="M529.473,113.459h-56.729l-18.91-37.82C442.695,53.628,436.91,37.82,416.016,37.82H189.097 c-20.895,0-27.797,18.04-37.82,37.819l-18.91,37.82H75.639C33.867,113.459,0,147.326,0,189.098v302.556 c0,41.771,33.867,75.639,75.639,75.639h453.835c41.771,0,75.639-33.867,75.639-75.639V189.098 C605.111,147.327,571.244,113.459,529.473,113.459z M302.556,491.654c-83.543,0-151.278-67.734-151.278-151.277 s67.735-151.278,151.278-151.278c83.543,0,151.278,67.735,151.278,151.278S386.1,491.654,302.556,491.654z"/>
                            <circle cx="302" cy="340" r="120"/>
                        </g>
                    </svg>
                </button>
            </div>

            <form action="" class="center-item">
                <div class="input">
                    <input type="text" name="firstName" value="<?php echo $info["firstName"]?? "client" ?>" required>
                    <p class="placeholder">First Name</p>
                </div>

                <div class="input">
                    <input type="text" name="username" value="<?php echo $info["username"] ?>" required>
                    <p class="placeholder">Username</p>
                </div>

                <div class="input">
                    <input type="password" name="password" data-type="password" required>
                    <p class="placeholder">Password</p>
                </div>
            </form>

            <div class="show-password center-item">
                <input type="checkbox" id="show-change" autocomplete="off">
                <label for="show-change">Show Password</p>
            </div>

            <button class="change-email" data-target-box="email">Change Email</button>
            <button class="change-password" data-target-box="password">Change Password</button>
            <button class="apply">Apply</button>
            
            <div class="center-item modal" id="change-profile-modal">
                <label for="custom-profile" class="center-item">Custom Profile</label>
            </div>
        </div>

        <div class="center-item" id="change-password-box">
            <img src="/images/change-password.svg" loading="lazy" alt="change password" draggable="flase">

            <form action="" class="center-item">
                <div class="input">
                    <input type="password" name="old-password" data-type="password" required>
                    <p class="placeholder">Old Password</p>
                </div>

                <ul>
                    <li>
                        use number, capitalize letter and specific character
                    </li>
                </ul>

                <div class="input">
                    <input type="password" name="password" data-type="password" required>
                    <p class="placeholder">New Password</p>
                </div>

                <div class="input">
                    <input type="password" name="retry-password" data-type="password" required>
                    <p class="placeholder">Re-enter Password</p>
                </div>

                <input type="hidden" name="type" value="change-password">
            </form>

            <div class="show-password center-item">
                <input type="checkbox" id="show-password-password" autocomplete="off">
                <label for="show-password-password">Show Password</p>
            </div>

            <button class="submit">Change</button>
        </div>

        <div class="center-item" id="change-email-box">
            <img src="/images/change-email.svg" loading="lazy" alt="change email" draggable="flase">

            <form action="" class="center-item">
                <div class="input">
                    <input type="email" name="email" value="<?php echo $info["email"]?? null ?>" required>
                    <p class="placeholder">Email</p>
                </div>

                <div class="input">
                    <input type="password" name="password" data-type="password" required>
                    <p class="placeholder">Password</p>
                </div>

                <input type="hidden" name="type" value="change-email">
            </form>

            <div class="show-password center-item">
                <input type="checkbox" id="show-password-email" autocomplete="off">
                <label for="show-password-email">Show Password</p>
            </div>

            <button class="submit">Change</button>
        </div>
    </main>

    <?php
        component::backToTop();
        component::asideMenu();
        component::message();
        component::tooltip();
    ?>

    <script async type="text/javascript" src="/share/validate.js"></script>
    <script type="text/javascript" src="/share/app.js"></script>
    <script type="text/javascript" src="/share/form.js"></script>
    <script type="text/javascript" src="./main.js"></script>
</body>

</html>
