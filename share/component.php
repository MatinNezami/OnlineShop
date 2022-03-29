<?php

    $connection = new PDO("mysql:host=127.0.0.1;dbname=shop", "matin", '!@MneZAMi#$2020');
    $info = [];

    if (!$connection)
        die("{\"status\": 500, \"message\": \"database isn't connect\"}");

    (function () {
        if (!isset($_COOKIE["token"]))
            return 0;
        
        $info = $GLOBALS["connection"]->prepare("SELECT * FROM `users` WHERE `token` = ?");
        $info->bindValue(1, $_COOKIE["token"]);
    
        if(!$info->execute())
            return 0;
    
        if ($info->rowCount())
            $GLOBALS["info"] = $info->fetch(PDO::FETCH_ASSOC);
    
        return 0;
    })();

    class component {
        static function navbar () {

?>

    <nav class="center-item">
        <template id="user">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <g fill="none" stroke="#FFF" stroke-width="7" stroke-linecap="round">
                    <circle cx="50" cy="25" r="20"/>
                    <path d="M 10 85 C 30 50 70 50 90 85"/>
                </g>
            </svg>
        </template>

        <template id="sun">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612">
                <path d="M76.5,286.875H19.125C8.568,286.875,0,295.443,0,306c0,10.557,8.568,19.125,19.125,19.125H76.5 c10.557,0,19.125-8.568,19.125-19.125C95.625,295.443,87.057,286.875,76.5,286.875z M306,95.625 c10.557,0,19.125-8.568,19.125-19.125V19.125C325.125,8.568,316.557,0,306,0c-10.557,0-19.125,8.568-19.125,19.125V76.5 C286.875,87.057,295.443,95.625,306,95.625z M490.002,148.792l40.182-40.182c7.401-7.401,7.401-19.393,0-26.794 s-19.394-7.401-26.795,0l-40.182,40.182c-7.401,7.401-7.401,19.393,0,26.794C470.609,156.194,482.601,156.194,490.002,148.792z M141.716,443.509l-40.182,40.182c-7.401,7.401-7.401,19.393,0,26.794s19.393,7.401,26.794,0l40.182-40.182 c7.401-7.401,7.401-19.393,0-26.794S149.118,436.107,141.716,443.509z M130.203,157.246c7.478,7.478,19.584,7.478,27.042,0 c7.459-7.478,7.459-19.584,0-27.042L116.682,89.62c-7.478-7.478-19.584-7.478-27.043,0c-7.478,7.478-7.478,19.584,0,27.043 L130.203,157.246z M306,516.375c-10.557,0-19.125,8.568-19.125,19.125v57.375c0,10.557,8.568,19.125,19.125,19.125 c10.557,0,19.125-8.568,19.125-19.125V535.5C325.125,524.943,316.557,516.375,306,516.375z M481.797,454.754 c-7.478-7.478-19.584-7.478-27.043,0c-7.478,7.479-7.478,19.584,0,27.043l40.564,40.564c7.478,7.478,19.584,7.478,27.043,0 c7.459-7.479,7.478-19.584,0-27.043L481.797,454.754z M592.875,286.875H535.5c-10.557,0-19.125,8.568-19.125,19.125 c0,10.557,8.568,19.125,19.125,19.125h57.375c10.557,0,19.125-8.568,19.125-19.125C612,295.443,603.432,286.875,592.875,286.875z M306,133.76c-95.128,0-172.24,77.112-172.24,172.24S210.872,478.24,306,478.24S478.24,401.128,478.24,306 S401.128,133.76,306,133.76z M306,439.837c-73.918,0-133.837-59.919-133.837-133.837S232.082,172.163,306,172.163 S439.837,232.082,439.837,306S379.918,439.837,306,439.837z" fill="#FFF"/>
            </svg>
        </template>

        <template id="moon">
            <svg viewBox="0 0 800 800" xmlns="http://www.w3.org/2000/svg">
                <g fill="#FFF">
                    <path d="M715.968,413.668c-5.151-5.157-12.812-6.895-19.685-4.469c-27.729,9.768-56.754,14.723-86.275,14.723 c-69.178,0-134.215-26.938-183.124-75.853c-70.097-70.095-94.09-175.841-61.126-269.4c2.42-6.873,0.683-14.532-4.474-19.684  c-5.152-5.157-12.811-6.895-19.683-4.474c-42,14.799-79.372,38.377-111.068,70.073c-56.072,56.072-86.948,130.62-86.948,209.92  c0,79.295,30.876,153.842,86.948,209.915c56.072,56.071,130.62,86.953,209.921,86.953c79.296,0,153.849-30.882,209.915-86.953  c31.701-31.696,55.273-69.063,70.073-111.067C722.861,426.479,721.124,418.82,715.968,413.668z M623.583,517.634  c-48.916,48.92-113.951,75.858-183.13,75.858c-69.179,0-134.22-26.938-183.135-75.858c-100.983-100.978-100.983-265.287,0-366.264  c18.486-18.487,39.169-33.805,61.786-45.78c-8.206,40.333-7.976,82.092,0.853,122.692c12.073,55.531,39.786,106.211,80.142,146.572  c56.067,56.066,130.615,86.943,209.91,86.943c20.043,0,39.892-1.994,59.355-5.949C657.388,478.464,642.069,499.152,623.583,517.634z"/>
                    <path d="M702.785,172.844c-12.073-17.825-31.347-29.691-52.822-32.346c-7.281-15.684-18.322-29.27-32.428-39.792 c-18.208-13.581-39.863-20.759-62.627-20.759c-22.771,0-44.427,7.179-62.633,20.759c-14.105,10.522-25.146,24.108-32.43,39.787  c-36.962,4.535-65.676,36.116-65.676,74.285c0,41.268,33.571,74.837,74.838,74.837h229.104c32.248,0,58.48-26.233,58.48-58.476  C756.595,200.465,732.853,175.227,702.785,172.844z M698.113,251.741H469.009c-20.383,0-36.963-16.586-36.963-36.963  c0-20.382,16.58-36.962,36.963-36.962c0.737,0,1.568,0.033,2.622,0.109c8.769,0.601,16.755-4.867,19.377-13.226  c8.801-28.036,34.478-46.878,63.9-46.878c29.418,0,55.094,18.842,63.895,46.878c2.622,8.358,10.631,13.827,19.384,13.226  c1.049-0.076,1.879-0.109,2.616-0.109c14.586,0,27.845,8.621,33.782,21.972c3.48,7.834,11.795,12.346,20.262,11.008  c1.088-0.169,2.19-0.257,3.268-0.257c11.357,0,20.602,9.238,20.602,20.601C718.715,242.497,709.472,251.741,698.113,251.741z"/>
                    <path d="M293.373,646.565c-9.795-13.571-24.66-22.766-41.256-25.408c-14.45-29.287-44.234-48.18-77.766-48.18 c-18.847,0-36.776,5.944-51.849,17.192c-11.084,8.265-19.886,18.825-25.906,30.975c-30.106,4.765-53.193,30.898-53.193,62.322  c0,34.788,28.304,63.098,63.097,63.098h180.971c27.67,0,50.178-22.509,50.178-50.179  C337.65,670.717,318.273,649.488,293.373,646.565z M287.473,708.685H106.501c-13.908,0-25.217-11.313-25.217-25.217  c0-13.91,11.309-25.217,25.217-25.217c0.497,0,1.071,0.021,1.808,0.07c8.735,0.61,16.744-4.867,19.366-13.222  c6.425-20.479,25.185-34.241,46.676-34.241c21.491,0,40.246,13.762,46.676,34.241c2.622,8.354,10.63,13.815,19.36,13.222  c0.743-0.05,1.322-0.07,1.813-0.07c9.954,0,19,5.883,23.054,14.989c3.48,7.834,11.789,12.352,20.263,11.014  c0.655-0.104,1.311-0.159,1.955-0.159c6.786,0,12.298,5.52,12.298,12.292C299.771,703.172,294.258,708.685,287.473,708.685z"/>
                    <path d="M173.205,117.27c0-20.918-16.958-37.875-37.88-37.875c-20.918,0-37.875,16.957-37.875,37.875 c0,20.923,16.957,37.88,37.875,37.88C156.247,155.15,173.205,138.193,173.205,117.27z"/>
                    <path d="M120.175,448.702c0-12.549-10.178-22.727-22.726-22.727c-12.554,0-22.731,10.178-22.731,22.727 c0,12.554,10.178,22.729,22.731,22.729C109.998,471.433,120.175,461.256,120.175,448.702z"/>
                    <path d="M673.192,612.433c0-12.554-10.172-22.726-22.727-22.726s-22.727,10.172-22.727,22.726 c0,12.555,10.172,22.727,22.727,22.727C663.021,635.158,673.192,624.986,673.192,612.433z"/>
                    <circle cx="598.109" cy="354.007" r="22.726"/>
                    <path d="M455.274,682.5c0-12.554-10.173-22.726-22.727-22.726c-12.555,0-22.728,10.172-22.728,22.726 c0,12.549,10.173,22.727,22.728,22.727S455.274,695.049,455.274,682.5z"/>
                </g>
            </svg>
        </template>

        <div class="links center-item">
            <a href="/">Home</a>

            <a href="#">Products</a>
                 
            <a href="#">Cart</a>
        </div>

        <svg class="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">                
            <rect class="menu-item" x="0" y="10"/>
            <rect class="menu-item" x="0" y="44"/>
            <rect class="menu-item" x="0" y="77"/>
        </svg>

        <div class="account center-item">
            <div id="mode"></div>
            <div id="profile"></div>

            <a href="/account?page=login">Log in</a>

            <span>/</span>

            <a href="/account?page=signup">Sign up</a>
        </div>
    </nav>

    <script>
        <?php echo "window.userProfile = \"" . ($GLOBALS["info"]["profile"]?? null) . "\";" ?>
    </script>

    <script type="text/javascript" src="/share/profile.js"></script>

<?php

        }

        static function asideMenu () {

?>

    <aside class="menu">
        <div class="links center-item">
            <a href="/">Home</a>
            <a href="#">Products</a>
            <a href="#">Cart</a>
        </div>
    </aside>

    <div id="prevent"></div>

<?php

        }

        static function search () {

?>

    <div class="search">
        <div>
            <input type="search" placeholder="Type to search..."  autocomplete="off">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <g fill="none" stroke="#000" stroke-width="4" stroke-linecap="round">
                    <circle cx="40" cy="40" r="25"/>
                    <line x1="58" y1="58" x2="80" y2="80"/>
                </g>
            </svg>
        </div>
    </div>

<?php

        }

        static function headFiles () {

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2196F3">

    <link rel="dns-prefetch" href="http://localhost">

    <link rel="stylesheet" type="text/css" href="/share/responsive.css">
    <link rel="stylesheet" type="text/css" href="/share/style.css">

    <script type="text/javascript" src="/share/config.js"></script>

<?php

        }

        static function backToTop () {

?>

    <div class="center-item back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
            <path d="M 15 70 50 30 85 70" stroke="#FFF" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
    </div>

<?php

        }

        static function message () {

?>

    <div id="message">
        <p></p>
        <div class="progress"></div>
    </div>

<?php

        }

        static function tooltip () {

?>

    <div id="err-tooltip" class="center-item">
        <p>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <polygon points="50 12 10 90 90 90" stroke-width="10" fill="#FFB703" stroke="#FFB703"/>
                <polygon points="50 1 14.7 70 75.1 50" fill="#FFF2"/>
                <path d="M 45 35 55 35 51 65 49 65 z" fill="#FFF" stroke-width="3" stroke="#FFF" stroke-linejoin="round"/>
                <circle cx="50" cy="73" r="4" fill="#FFF"/>
            </svg>

            <span></span>
        </p>
    </div>

<?php

        }

    }

?>