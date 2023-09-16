<main>
    <section class="container mt-4">
        <!-- section 1 -->
        <div class="mb-4 mb-md-5">
            <div class="swiper mySwiper grab border-radius-10">
                <div class="swiper-wrapper">
                    <?php if (isset($sliders) && !empty($sliders)) { ?>
                        <?php foreach ($sliders as $row) { ?>
                            <div class="swiper-slide center-swiper-slide">
                                <a href="<?= $row['link'] ?>">
                                    <img src="<?= base_url($row['image']) ?>">
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="container">
        <!-- section 2 -->
        <div class="mb-4 mb-md-5">
            <div class="align-items-center d-flex flex-wrap justify-content-between pb-3">
                <h1 class="section-title  pointer"><?= label('popular_categories', 'Popular Categories') ?></h1>

                <a href="<?= base_url('home/categories/') ?>">
                    <button class="btn viewmorebtn"><?= label('view_more', 'View More') ?></button>
                </a>
            </div>
            <div class="swiperForCategories swiper mySwiper2 ">
                <div class="swiper-wrapper grab text-center">
                    <?php
                    foreach ($categories as $key => $row) {
                    ?>

                        <div class="swiper-slide overflow-hidden">
                            <div class="col p-0 fit-content">
                                <div class="categories-card">
                                    <a href="<?= base_url('products/category/' . html_escape($row['slug'])) ?>" class="text-reset text-decoration-none">
                                        <div class="categories-image">
                                            <img src="<?= $row['image'] ?>" alt="">
                                        </div>
                                        <div class="categories-card-text">
                                            <h4><?= html_escape($row['name']) ?></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
            </div>
        </div>
    </section>
    <?php $offer_counter = 0;
    $offers =  get_offers();
    foreach ($sections as $count_key => $row) {

        if (!empty($row['product_details'])) {
            if ($row['style'] == 'default') {
    ?>
                <section class="container">
                    <!-- default style -->
                    <!-- section 3 -->
                    <div class="product-style-default mb-4 mb-md-5">
                        <div class="align-items-center d-flex flex-wrap justify-content-between pb-3">
                            <h1 class="section-title  pointer"><?= ucfirst($row['title']) ?></h1>

                            <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                <button class="btn viewmorebtn"><?= label('view_more', 'View More') ?></button>
                            </a>
                        </div>
                        <div class="swiper mySwiper3 swiper-arrow swiper-wid ">
                            <div class="swiper-wrapper grab" <?= ($is_rtl == true) ? "dir='rtl'" : ""; ?>>
                                <?php foreach ($row['product_details'] as $product_row) {
                                ?>
                                    <?php
                                    if (isset($_GET['product_id'])) {

                                        $product_row['id'] = intval($_GET['product_id']);

                                        $product_details = ($product_row['id']);

                                        echo json_encode($product_details);
                                    }
                                    ?>
                                    <div class="swiper-slide background-none">
                                        <a href="<?= base_url('products/details/' . $product_row['slug']) ?>" class="text-reset text-decoration-none">
                                            <div class="card card-h-418 product-card" data-product-id="<?= $product_row['id'] ?>">
                                                <div class="product-img">
                                                    <img alt=" " class="" src="<?= $product_row['image_sm'] ?>" />
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['name']))) ?></h4>
                                                    <p class="card-text"><?= output_escaping(str_replace('\r\n', '&#13;&#10;', word_limit($product_row['category_name']))) ?></p>
                                                    <div class="d-flex flex-column">
                                                        <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $product_row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                        <h4 class="card-price"><?php $price = get_price_range_of_product($product_row['id']);
                                                                                echo $price['range'];
                                                                                ?> </h4>
                                                    </div>
                                                    <?php
                                                    if (count($product_row['variants']) <= 1) {
                                                        $variant_id = $product_row['variants'][0]['id'];
                                                        $modal = "";
                                                    } else {
                                                        $variant_id = "";
                                                        $modal = "#quick-view";
                                                    }
                                                    ?>
                                                    <?php $variant_price = ($product_row['variants'][0]['special_price'] > 0 && $product_row['variants'][0]['special_price'] != '') ? $product_row['variants'][0]['special_price'] : $product_row['variants'][0]['price'];
                                                    $data_min = (isset($product_row['minimum_order_quantity']) && !empty($product_row['minimum_order_quantity'])) ? $product_row['minimum_order_quantity'] : 1;
                                                    $data_step = (isset($product_row['minimum_order_quantity']) && !empty($product_row['quantity_step_size'])) ? $product_row['quantity_step_size'] : 1;
                                                    $data_max = (isset($product_row['total_allowed_quantity']) && !empty($product_row['total_allowed_quantity'])) ? $product_row['total_allowed_quantity'] : 0;
                                                    ?>

                                                    <a href="#" data-tip="Add to Cart" class="btn add-in-cart-btn add_to_cart w-100 quickview-trigger" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $product_row['name'] ?>" data-product-image="<?= $product_row['image']; ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $product_row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="#quickview"><span class="add-in-cart"><?= label('add_to_cart', 'Add to Cart') ?></span><span class="add-in-cart-icon"><i class="fa-solid fa-cart-shopping
                                                color-white"></i></span></a>

                                                </div>
                                                <div class="product-icon-onhover">
                                                    <div class="product-icon-spacebtw">
                                                        <div class="shuffle-box">
                                                            <a class="compare text-reset text-decoration-none shuffle" data-tip="Compare" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                                                <ion-icon name="shuffle-outline" class="ion-icon-hover pointer shuffle"></ion-icon>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-icon-spacebtw">
                                                        <div class="add-to-fav-btn" title="like" data-product-id="<?= $product_row['id'] ?>">
                                                            <ion-icon class="ion-icon ion-icon-hover <?= ($product_row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($product_row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="product-icon-spacebtw">
                                                        <div class="quick-search-box quickview-trigger" data-tip="Quick View" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $product_row['variants'][0]['id'] ?>">
                                                            <ion-icon name="search-outline" class="ion-icon-hover pointer" data-bs-toggle="modal" data-bs-target="#quickview"></ion-icon>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                            <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                        </div>
                    </div>
                </section>
            <?php } else if ($row['style'] == 'style_1') {

            ?>
                <section class="container">
                    <!-- Style 1 Design-->
                    <!-- section 4 -->
                    <div class="mb-4 mb-md-5 row">
                        <div class="col-xl-8 col-lg-12">
                            <div class="align-items-center d-flex flex-wrap justify-content-between pb-3">
                                <h1 class="section-title  pointer"><?= ucfirst($row['title']) ?></h1>

                                <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                    <button class="btn viewmorebtn"><?= label('view_more', 'View More') ?></button>
                                </a>
                            </div>
                            <div class="row">

                                <?php $product_count = count($row['product_details']) - 1; ?>
                                <?php
                                $i = 0;
                                if (count($row['product_details']) > 0) {
                                    foreach ($row['product_details'] as $key => $product_row) {
                                        if ($i == 3) {
                                            break;
                                        }
                                ?>
                                        <?php $last_product = $row['product_details'][$product_count]; ?>
                                        <?php if ($key != 0) { ?>
                                            <div class="col-md-4 col-12">
                                                <a href="<?= base_url('products/details/' . $product_row['slug']) ?>" class="text-reset text-decoration-none">
                                                    <div class="card-temp card p-0 mb-3 mb-md-0 pointer product-card" data-product-id="<?= $product_row['id'] ?>">
                                                        <div class="product-image-1">
                                                            <img class="pic-1 lazy card-img-top" src="<?= $product_row['image_sm'] ?>">
                                                        </div>
                                                        <div class="card-body">
                                                            <h4 class="card-title"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['name']))) ?></h4>
                                                            <p class="card-text"><?= output_escaping(str_replace('\r\n', '&#13;&#10;', word_limit($product_row['category_name']))) ?></p>
                                                            <div class="d-flex flex-column">
                                                                <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $product_row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                                <h4 class="card-price"><?php $price = get_price_range_of_product($product_row['id']);
                                                                                        echo $price['range']; ?></h4>
                                                            </div>
                                                            <?php
                                                            if (isset($product_row['variants']) && !empty($product_row['variants'])) {
                                                                if (count($product_row['variants']) <= 1) {
                                                                    $variant_id = $product_row['variants'][0]['id'];
                                                                } else {
                                                                    $variant_id = "";
                                                                }
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($product_row['is_on_sale'] == 1) {
                                                                $variant_price = ($product_row['variants'][0]['sale_final_price'] > 0 && $product_row['variants'][0]['sale_final_price'] != '') ? $product_row['variants'][0]['sale_final_price'] : $product_row['variants'][0]['price'];
                                                            } else {
                                                                $variant_price = ($product_row['variants'][0]['special_price'] > 0 && $product_row['variants'][0]['special_price'] != '') ? $product_row['variants'][0]['special_price'] : $product_row['variants'][0]['price'];
                                                            }
                                                            $data_min = (isset($product_row['minimum_order_quantity']) && !empty($product_row['minimum_order_quantity'])) ? $product_row['minimum_order_quantity'] : 1;
                                                            $data_step = (isset($product_row['minimum_order_quantity']) && !empty($product_row['quantity_step_size'])) ? $product_row['quantity_step_size'] : 1;
                                                            $data_max = (isset($product_row['total_allowed_quantity']) && !empty($product_row['total_allowed_quantity'])) ? $product_row['total_allowed_quantity'] : 0;
                                                            ?>
                                                            <a href="#" class="btn add-in-cart-btn add_to_cart w-100 quickview-trigger" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $product_row['name'] ?>" data-product-image="<?= $product_row['image']; ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $product_row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="#quickview"><span class="add-in-cart"><?= label('add_to_cart', 'Add to Cart') ?></span><span class="add-in-cart-icon"><i class="fa-solid fa-cart-shopping
                                                color-white"></i></span></a>

                                                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quickview">
                                                        Launch demo modal
                                                    </button> -->

                                                        </div>
                                                        <div class="product-icon-onhover">
                                                            <div class="product-icon-spacebtw">
                                                                <div class="shuffle-box">
                                                                    <a class="compare text-reset text-decoration-none shuffle" data-tip="Compare" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                                                        <ion-icon name="shuffle-outline" class="ion-icon-hover pointer shuffle"></ion-icon>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="product-icon-spacebtw">
                                                                <div class="add-to-fav-btn" title="like" data-product-id="<?= $product_row['id'] ?>">
                                                                    <ion-icon class="ion-icon ion-icon-hover <?= ($product_row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($product_row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                                                </div>
                                                            </div>
                                                            <div class="product-icon-spacebtw">
                                                                <div class="quick-search-box quickview-trigger" data-tip="Quick View" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $product_row['variants'][0]['id'] ?>">
                                                                    <ion-icon name="search-outline" class="ion-icon-hover pointer" data-bs-toggle="modal" data-bs-target="#quickview"></ion-icon>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    <?php $i++;
                                        }
                                    } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-radius-10 overflow-hidden product-banner-container">
                                <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                    <img class="pic-1 product-banner lazy" src="<?= $last_product['image_sm'] ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } else if ($row['style'] == 'style_2') {

            ?>
                <section class="container">
                    <!-- Style 2 Design-->
                    <!-- section 5 -->
                    <div class="mb-4 mb-md-5">
                        <?php $first_product = $row['product_details'][0]; ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="border-radius-10 overflow-hidden product-banner-container">
                                    <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                        <img class="pic-1 product-banner lazy" src="<?= $first_product['image_sm'] ?>">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12">
                                <div class="align-items-center d-flex flex-wrap justify-content-between pb-3">
                                    <h1 class="section-title"><?= ucfirst($row['title']) ?></h1>

                                    <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                        <button class="btn viewmorebtn"><?= label('view_more', 'View More') ?></button>
                                    </a>
                                </div>
                                <div class="row">
                                    <?php $product_count = count($row['product_details']) - 1; ?>
                                    <?php
                                    $i = 0;
                                    if (count($row['product_details']) > 0) {
                                        foreach ($row['product_details'] as $key => $product_row) {
                                            if ($i == 3) {
                                                break;
                                            }
                                    ?>
                                            <?php if ($key != 0) { ?>
                                                <div class="col-md-4 col-12">
                                                    <a href="<?= base_url('products/details/' . $product_row['slug']) ?>" class="text-reset text-decoration-none">
                                                        <div class="card-temp card p-0 mb-3 mb-md-0 pointer product-card" data-product-id="<?= $product_row['id'] ?>">
                                                            <div class="product-image-1">
                                                                <img class="pic-1 lazy card-img-top" src="<?= $product_row['image_sm'] ?>">
                                                            </div>
                                                            <div class="card-body">
                                                                <h4 class="card-title"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['name']))) ?></h4>
                                                                <p class="card-text"><?= output_escaping(str_replace('\r\n', '&#13;&#10;', word_limit($product_row['category_name']))) ?></p>
                                                                <div class="d-flex flex-column">
                                                                    <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $product_row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                                    <h4 class="card-price"><?php $price = get_price_range_of_product($product_row['id']);
                                                                                            echo $price['range']; ?></h4>
                                                                </div>
                                                                <?php
                                                                if (isset($product_row['variants']) && !empty($product_row['variants'])) {
                                                                    if (count($product_row['variants']) <= 1) {
                                                                        $variant_id = $product_row['variants'][0]['id'];
                                                                    } else {
                                                                        $variant_id = "";
                                                                    }
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($product_row['is_on_sale'] == 1) {
                                                                    $variant_price = ($product_row['variants'][0]['sale_final_price'] > 0 && $product_row['variants'][0]['sale_final_price'] != '') ? $product_row['variants'][0]['sale_final_price'] : $product_row['variants'][0]['price'];
                                                                } else {
                                                                    $variant_price = ($product_row['variants'][0]['special_price'] > 0 && $product_row['variants'][0]['special_price'] != '') ? $product_row['variants'][0]['special_price'] : $product_row['variants'][0]['price'];;
                                                                }
                                                                $data_min = (isset($product_row['minimum_order_quantity']) && !empty($product_row['minimum_order_quantity'])) ? $product_row['minimum_order_quantity'] : 1;
                                                                $data_step = (isset($product_row['minimum_order_quantity']) && !empty($product_row['quantity_step_size'])) ? $product_row['quantity_step_size'] : 1;
                                                                $data_max = (isset($product_row['total_allowed_quantity']) && !empty($product_row['total_allowed_quantity'])) ? $product_row['total_allowed_quantity'] : 0;
                                                                ?>
                                                                <a href="#" class="btn add-in-cart-btn add_to_cart w-100 quickview-trigger" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $product_row['name'] ?>" data-product-image="<?= $product_row['image']; ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $product_row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="#quickview"><span class="add-in-cart"><?= label('add_to_cart', 'Add to Cart') ?></span><span class="add-in-cart-icon"><i class="fa-solid fa-cart-shopping
                                                color-white"></i></span></a>
                                                            </div>
                                                            <div class="product-icon-onhover">
                                                                <div class="product-icon-spacebtw">
                                                                    <div class="shuffle-box">
                                                                        <a class="compare text-reset text-decoration-none shuffle" data-tip="Compare" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                                                            <ion-icon name="shuffle-outline" class="ion-icon-hover pointer shuffle"></ion-icon>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-icon-spacebtw">
                                                                    <div class="add-to-fav-btn" title="like" data-product-id="<?= $product_row['id'] ?>">
                                                                        <ion-icon class="ion-icon ion-icon-hover <?= ($product_row['is_favorite'] == 1) ? 'heart text-danger' : 'heart-outline text-dark' ?>" name="<?= ($product_row['is_favorite'] == 1) ? 'heart' : 'heart-outline' ?>"></ion-icon>
                                                                    </div>
                                                                </div>
                                                                <div class="product-icon-spacebtw">
                                                                    <div class="quick-search-box quickview-trigger" data-tip="Quick View" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $product_row['variants'][0]['id'] ?>">
                                                                        <ion-icon name="search-outline" class="ion-icon-hover pointer" data-bs-toggle="modal" data-bs-target="#quickview"></ion-icon>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        <?php $i++;
                                            }
                                        } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } else if ($row['style'] == 'style_3') {

            ?>
                <!-- Style 3 Design-->
                <!-- section 6 -->
                <div class="container-fluid bg-gradient-design mb-4 mb-md-5">
                    <?php
                    foreach ($flash_sale as $count_key => $row) {
                        fetch_active_flash_sale();
                    ?>
                        <div class="container pt-4">
                            <div class="row">
                                <div class="col-12 text-center align-self-center">
                                    <div class="sale-section">
                                        <h4 class="banner-heading default-cursor"><?= ucfirst($row['title']) ?></h4>
                                        <p class="banner-paragraph  default-cursor"><?= strip_tags($row['short_description']) ?>
                                        </p>
                                        <input type="hidden" name="sale_timer" id="sale_timer" value="5/17/2024">
                                    </div>
                                    <p class="d-none get_e_time" data-value="<?= $row['id'] ?>">
                                        <?php print_r($row['end_date']); ?>
                                    </p>
                                    <div class="flash_sale_timers countdown" id="timer-<?= $row['id'] ?>" data-value="<?= $row['id'] ?>" data-value="<?php print_r($row['end_date']); ?>">
                                    </div>
                                </div>
                                <div class="swiper swiper-arrow mySwiper4">
                                    <div class="swiper-wrapper my-5  grab">
                                        <?php foreach ($row['product_details'] as $product_row) {
                                            $sale_price = get_flash_sale_price($product_row['variants'][0]['price'], $row['discount']);
                                        ?>
                                            <div class="swiper-slide box-shadow">
                                                <a href="<?= base_url('products/details/' . $product_row['slug']) ?>" class="text-reset text-decoration-none">
                                                    <div class="card5">
                                                        <img class="pic-1 lazy card-img-top pointer" src="<?= $product_row['image_sm'] ?>">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['name']))) ?></h5>
                                                            <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $product_row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                            <h5 class="card-price"><?php $price = get_price_range_of_product($product_row['id']);
                                                                                    echo $price['range'];  ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                                    <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <section class="container">

                <?php } else if ($row['style'] == 'style_4') { ?>
                    <!-- Style 4 Design-->
                    <!-- section 7 -->
                    <div class="mb-4 mb-md-5">
                        <div class="align-items-center d-flex flex-wrap justify-content-between pb-3">
                            <h1 class="section-title  pointer"><?= ucfirst($row['title']) ?></h1>

                            <a href="<?= base_url('products/section/' . $row['id'] . '/' . $row['slug']) ?>">
                                <button class="btn viewmorebtn"><?= label('view_more', 'View More') ?></button>
                            </a>
                        </div>
                        <div class="swiper mySwiper5 swiper-arrow">
                            <div class="swiper-wrapper grab" <?= ($is_rtl == true) ? "dir='rtl'" : ""; ?>>
                                <?php foreach ($row['product_details'] as $product_row) {

                                ?>
                                    <div class="swiper-slide-5 swiper-slide">
                                        <a href="<?= base_url('products/details/' . $product_row['slug']) ?>" class="text-reset text-decoration-none">
                                            <div class="card card6 mb-3 box-shadows product-card" data-product-id="<?= $product_row['id'] ?>">
                                                <div class="d-flex">
                                                    <div class="card6-img">
                                                        <img class="pic-1 img-fluid rounded-start" src="<?= $product_row['image_sm'] ?>">
                                                    </div>
                                                    <div class="card-body card-body-6">
                                                        <h5 class="card-title"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['name']))) ?></h5>
                                                        <p class="card-text"><?= word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', $product_row['category_name']))) ?></p>
                                                        <input id="input-3-ltr-star-md" name="input-3-ltr-star-md" class="kv-ltr-theme-svg-star rating-loading" value="<?= $product_row['rating'] ?>" dir="ltr" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
                                                        <p class="m-0"><span class="fw-bold card-price-section">
                                                                <?php $price = get_price_range_of_product($product_row['id']);
                                                                echo $price['range'];  ?>
                                                            </span>
                                                        </p>
                                                        <small class="product-disc"><?= $product_row['short_description'] ?></small>
                                                        <?php
                                                        if (isset($product_row['variants']) && !empty($product_row['variants'])) {
                                                            if (count($product_row['variants']) <= 1) {
                                                                $variant_id = $product_row['variants'][0]['id'];
                                                            } else {
                                                                $variant_id = "";
                                                            }
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($product_row['is_on_sale'] == 1) {
                                                            $variant_price = ($product_row['variants'][0]['sale_final_price'] > 0 && $product_row['variants'][0]['sale_final_price'] != '') ? $product_row['variants'][0]['sale_final_price'] : $product_row['variants'][0]['price'];
                                                        } else {
                                                            $variant_price = ($product_row['variants'][0]['special_price'] > 0 && $product_row['variants'][0]['special_price'] != '') ? $product_row['variants'][0]['special_price'] : $product_row['variants'][0]['price'];;
                                                        }
                                                        $data_min = (isset($product_row['minimum_order_quantity']) && !empty($product_row['minimum_order_quantity'])) ? $product_row['minimum_order_quantity'] : 1;
                                                        $data_step = (isset($product_row['minimum_order_quantity']) && !empty($product_row['quantity_step_size'])) ? $product_row['quantity_step_size'] : 1;
                                                        $data_max = (isset($product_row['total_allowed_quantity']) && !empty($product_row['total_allowed_quantity'])) ? $product_row['total_allowed_quantity'] : 0;
                                                        ?>
                                                        <a href="#" class="btn add-in-cart-btn add_to_cart w-100 quickview-trigger" data-product-id="<?= $product_row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $product_row['name'] ?>" data-product-image="<?= $product_row['image']; ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= $product_row['short_description']; ?>" data-bs-toggle="modal" data-bs-target="#quickview"><span class="add-in-cart"><?= label('add_to_cart', 'Add to Cart') ?></span><span class="add-in-cart-icon"><i class="fa-solid fa-cart-shopping
                                                color-white"></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
                            <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
                        </div>
                    </div>
                </section>
            <?php } ?>
    <?php }
    } ?>
    <section class="container">
        <!-- section 9 -->
        <?php if (isset($web_settings['app_download_section']) && $web_settings['app_download_section'] == 1) { ?>
            <div class="py-4 bg-white my-4 border-radius-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mobile-app-wrapper">
                            <img src="<?= base_url('assets/front_end/modern/image/avtars/4861083.jpg') ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <div>
                                <h3 class="section-title fs-1"><?= $web_settings['app_download_section_title'] ?></h3>
                                <h3 class="fs-4 fw-medium gray-700"><?= $web_settings['app_download_section_tagline'] ?></h3>
                            </div>
                            <p class="m-0 gray-700"><?= $web_settings['app_download_section_short_description'] ?></p>
                            <div class="mt-3">
                                <a href="<?= $web_settings['app_download_section_appstore_url'] ?>" target="_blank"><img src="<?= base_url('assets/front_end/modern/image/app-store/app-store.png') ?>" alt="" class="download_section" width="150"></a>
                                <a href="<?= $web_settings['app_download_section_playstore_url'] ?>" target="_blank"><img src="<?= base_url('assets/front_end/modern/image/app-store/google-play-store.png') ?>" alt="" class="download_section" width="150"></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of container -->
    </section>
<?php } ?>
<!-- <section class="container"> -->
<!-- blogs
 section 10 -->
<!-- <div class="mb-4 mb-md-5">
    <div class="align-items-center d-flex flex-wrap justify-content-between pb-4">
        <h1 class="section-title  pointer">Blogs</h1>

        <a href="<?= base_url('product-list-view.php') ?>">
            <button class="btn viewmorebtn">View More</button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="blogs border-radius-10 default-cursor">
                <div class="blog-img-box">
                    <img class="width100 border-radius-10 pointer" src="<?= base_url('assets/image/pictures/trump.jpg') ?>" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Donald Trump</h5>
                    <p>“The defendant, Donald J. Trump, falsified New York business
                        records in order to conceal an illegal conspiracy to undermine the integrity of the 2016
                        presidential election and other violations of Election Laws.”</p>
                    <a href="#">
                        <input class="read-more-btn " type="button" value="Read more">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="blogs border-radius-10 default-cursor">
                <div class="blog-img-box">
                    <img class="width100 border-radius-10 pointer" src="<?= base_url('assets/image/pictures/elon-mask.jpg') ?>" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Elon Mask</h5>
                    <p>“The defendant, Donald J. Trump, falsified New York business
                        records in order to conceal an illegal conspiracy to undermine the integrity of the 2016
                        presidential election and other violations of Election Laws.”</p>
                    <a href="#">
                        <input class="read-more-btn " type="button" value="Read more">
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class=" blogs border-radius-10 mb-4 default-cursor">
                <div class="blog-img-box">
                    <img class="width100 border-radius-10 pointer" src="<?= base_url('assets/image/pictures/space-x.jpg') ?>" alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Space X</h5>
                    <p>“The defendant, Donald J. Trump, falsified New York
                        business
                        records in order to conceal an illegal conspiracy to undermine the integrity of
                        the
                        2016
                        presidential election and other violations of Election Laws.”</p>
                    <a href="#">
                        <input class="read-more-btn " type="button" value="Read more">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>  -->

<!-- Testimonials -->
<!-- section 11 -->
<!-- <div class="mb-4 mb-md-5">
    <div class="align-items-center d-flex flex-wrap justify-content-between pb-3 pb-md-0">
        <h1 class="section-title  pointer">Testimonials</h1>

        <a href="<?= base_url('product-list-view.php') ?>">
            <button class="btn viewmorebtn">View More</button>
        </a>
    </div>
    <div class="swiper mySwiper5 swiper-arrow">
        <div class="swiper-wrapper grab heigth315px">
            <div class="swiper-slide-5 swiper-slide">
                <div class="card card-testimonial">
                    <div class="user-img">
                        <img src="<?= base_url('assets/image/pictures/passport-size-img.jpg') ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title m-0">Jaydeep Goswami</h5>
                        <small class="fst-italic">Founder & CEO - infinitietech</small>
                        <p class="card-text text-capitalize pt-1">Testimonial Pages are a key to
                            increased
                            conversion rates- if they's done right. vheck out this collection of
                            Testimonial
                            page inspiration Create by different designers from around the world.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide-5 swiper-slide">
                <div class="card card-testimonial">
                    <div class="user-img">
                        <img src="<?= base_url('assets/image/pictures/user-icon.png') ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title m-0">Jaydeep Goswami</h5>
                        <small class="fst-italic">Founder & CEO - infinitietech</small>
                        <p class="card-text text-capitalize pt-1">Testimonial Pages are a key to
                            increased
                            conversion rates- if they's done right. vheck out this collection of
                            Testimonial
                            page inspiration Create by different designers from around the world.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide-5 swiper-slide">
                <div class="card card-testimonial">
                    <div class="user-img">
                        <img src="<?= base_url('assets/image/pictures/user-icon.png') ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title m-0">Jaydeep Goswami</h5>
                        <small class="fst-italic">Founder & CEO - infinitietech</small>
                        <p class="card-text text-capitalize pt-1">Testimonial Pages are a key to
                            increased
                            conversion rates- if they's done right. vheck out this collection of
                            Testimonial
                            page inspiration Create by different designers from around the world.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide-5 swiper-slide">
                <div class="card card-testimonial">
                    <div class="user-img">
                        <img src="<?= base_url('assets/image/pictures/user-icon.png') ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title m-0">Jaydeep Goswami</h5>
                        <small class="fst-italic">Founder & CEO - infinitietech</small>
                        <p class="card-text text-capitalize pt-1">Testimonial Pages are a key to
                            increased
                            conversion rates- if they's done right. vheck out this collection of
                            Testimonial
                            page inspiration Create by different designers from around the world.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide-5 swiper-slide">
                <div class="card card-testimonial">
                    <div class="user-img">
                        <img src="<?= base_url('assets/image/pictures/user-icon.png') ?>" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title m-0">Jaydeep Goswami</h5>
                        <small class="fst-italic">Founder & CEO - infinitietech</small>
                        <p class="card-text text-capitalize pt-1">Testimonial Pages are a key to
                            increased
                            conversion rates- if they's done right. vheck out this collection of
                            Testimonial
                            page inspiration Create by different designers from around the world.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"><ion-icon name="chevron-forward-outline"></ion-icon></div>
        <div class="swiper-button-prev"><ion-icon name="chevron-back-outline"></ion-icon></div>
    </div>
</div> -->
<!-- </section> -->
</main>