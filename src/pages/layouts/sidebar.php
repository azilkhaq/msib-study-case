<?php

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>

<aside class="sidebar is-show" id="sidebar">
    <div class="sidebar-box">
        <ul class="uk-nav">
            <li class="<?= $uri_segments[4] == "home" ? "uk-active" : "" ?>"><a href="../home/index.php"><i class="ico_home"></i><span>Home</span></a></li>
            <li class="<?= $uri_segments[4] == "about" ? "uk-active" : "" ?>"><a href="../about/index.php"><i class="ico_report"></i><span>About</span></a></li>
            <li class="uk-nav-header">Admin</li>
            <li class="<?= $uri_segments[4] == "product" ? "uk-active" : "" ?>"><a href="../product/index.php"><i class="ico_wallet"></i><span>Product</span></a></li>
        </ul>
    </div>
</aside>