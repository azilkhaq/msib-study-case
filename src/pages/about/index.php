<?php include_once("../layouts/head.php") ?>

<div class="page-wrapper">

    <?php include_once("../layouts/navbar.php") ?>

    <div class="page-content">

        <?php include_once("../layouts/sidebar.php") ?>

        <main class="page-main">
            <div class="profile-container">
                <div class="widjet --profile">
                    <div class="widjet__head">
                        <h3 class="uk-text-lead">Profile</h3>
                    </div>
                    <div class="widjet__body">
                        <div class="user-info">
                            <div class="user-info__avatar"><img src="../../../public/assets/img/logo/user.png" alt="profile"></div>
                            <div class="user-info__box">
                                <div class="user-info__title">Azil Khaq</div>
                                <div class="user-info__text">Pekalongan, 15 April 2002</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widjet --bio">
                    <div class="widjet__head">
                        <h3 class="uk-text-lead">Bio</h3>
                    </div>
                    <div class="widjet__body"><span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include_once("../layouts/script.php") ?>