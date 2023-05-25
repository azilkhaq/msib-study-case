<?php
include "../../../config/config.php";
$query = mysqli_query($conn, "SELECT *, products.image as product_image, brands.image as brand_image FROM products 
                                LEFT JOIN categories ON products.category_id = categories.id
                                LEFT JOIN conditions ON products.condition_id = conditions.id
                                LEFT JOIN brands ON products.brand_id = brands.id
                              WHERE products.category_id = 1
                              ORDER BY products.id DESC");

$queryPopular = mysqli_query($conn, "SELECT *, products.image as product_image, brands.image as brand_image FROM products 
                                LEFT JOIN categories ON products.category_id = categories.id
                                LEFT JOIN conditions ON products.condition_id = conditions.id
                                LEFT JOIN brands ON products.brand_id = brands.id
                              WHERE products.category_id = 2
                              ORDER BY products.id DESC");
?>

<?php include_once("../layouts/head.php") ?>

<div class="page-wrapper">

    <?php include_once("../layouts/navbar.php") ?>

    <div class="page-content">

        <?php include_once("../layouts/sidebar.php") ?>

        <main class="page-main">
            <div class="uk-grid" data-uk-grid>
                <div class="uk-width-2-3@l uk-width-3-3@m uk-width-3-3@s">
                    <h3 class="uk-text-lead">E-Money Store</h3>
                    <div class="js-recommend">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="recommend-slide">
                                    <div class="tour-slide__box">
                                        <a href=""><img src="../../../public/assets/img/logo/banner.jpeg" class="img-banner" alt="banner"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="uk-width-1-1">
                    <h3 class="uk-text-lead">Limited Edition</h3>
                    <div class="js-popular">
                        <div class="swiper">
                            <div class="swiper-wrapper">

                                <?php if (mysqli_num_rows($query) > 0) { ?>
                                    <?php
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="game-card">
                                                <div class="game-card__box game-card__box_custom">
                                                    <div class="game-card__media"><a href="10_game-profile.html"><img src="../../../<?= $data['product_image'] ?>" alt="Kill of Democracy" /></a></div>
                                                    <div class="game-card__info"><a class="game-card__title" href="10_game-profile.html"><?= $data['name'] ?></a>
                                                        <div class="game-card__genre"><?= $data['category_name'] ?></div>
                                                        <div class="game-card__rating-and-price">
                                                            <div class="game-card__rating"><span><?= $data['condition_name'] ?></div>
                                                            <div class="game-card__price"><span>Rp. <?= number_format($data['price']) ?> </span></div>
                                                        </div>
                                                        <div class="game-card__bottom">
                                                            <div class="game-card__platform">
                                                                <img src="../../../<?= $data['brand_image'] ?>" class="img-brand" alt="Kill of Democracy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }  ?>
                                <?php }  ?>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-1">
                    <h3 class="uk-text-lead">Most Popular</h3>
                    <div class="js-popular">
                        <div class="swiper">
                            <div class="swiper-wrapper">

                                <?php if (mysqli_num_rows($queryPopular) > 0) { ?>
                                    <?php
                                    while ($dataPopular = mysqli_fetch_array($queryPopular)) {
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="game-card">
                                                <div class="game-card__box game-card__box_custom">
                                                    <div class="game-card__media"><a href="10_game-profile.html"><img src="../../../<?= $dataPopular['product_image'] ?>" alt="Kill of Democracy" /></a></div>
                                                    <div class="game-card__info"><a class="game-card__title" href="10_game-profile.html"><?= $dataPopular['name'] ?></a>
                                                        <div class="game-card__genre"><?= $dataPopular['category_name'] ?></div>
                                                        <div class="game-card__rating-and-price">
                                                            <div class="game-card__rating"><span><?= $dataPopular['condition_name'] ?></div>
                                                            <div class="game-card__price"><span>Rp. <?= number_format($dataPopular['price']) ?> </span></div>
                                                        </div>
                                                        <div class="game-card__bottom">
                                                            <div class="game-card__platform">
                                                                <img src="../../../<?= $dataPopular['brand_image'] ?>" class="img-brand" alt="Kill of Democracy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }  ?>
                                <?php }  ?>

                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>

<?php include_once("../layouts/script.php") ?>