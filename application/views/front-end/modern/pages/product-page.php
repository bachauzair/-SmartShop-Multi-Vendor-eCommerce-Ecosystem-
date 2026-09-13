<?php $total_images = 0; ?>
<!-- breadcrumb -->
<div class="content-wrapper">
    <section class="wrapper bg-soft-grape">
        <div class="container py-3 py-md-5">
            <nav class="d-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= base_url('products') ?>" class="text-decoration-none"><?= !empty($this->lang->line('product')) ? $this->lang->line('product') : 'Products' ?></a></li>
                    <?php
                    $cat_names = array();
                    $result = check_for_parent_id($product['product'][0]['category_id']);
                    array_push($cat_names, $result[0]['name']);
                    while (!empty($result[0]['parent_id'])) {
                        $result = check_for_parent_id($result[0]['parent_id']);
                        array_push($cat_names, $result[0]['name']);
                    }
                    $cat_names = array_reverse($cat_names, true);
                    foreach ($cat_names as $row) { ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= strip_tags(output_escaping(str_replace('\r\n', '&#13;&#10;', $row))) ?></li>
                    <?php } ?>
                </ol>
            </nav>
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
</div>
<!-- end breadcrumb -->

<?php $seller_slug = fetch_details("seller_data", ['user_id' => $product['product'][0]['seller_id']]);
?>
<section class="wrapper bg-light">
    <div class="container main-content mb-15 mt-10">

        <div class="d-flex flex-wrap">
            <div class="col-md-7">

                <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false" data-nav="true" data-thumbs="true">
                    <div class="d-flex product-preview-image-section-md">
                        <div class="col-md-2 overflow-auto product-thumb-img" style="height: 530px;">
                            <div class="swiper swiper-thumbs swiper-vertical gallery-thumbs-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide swiper-img mb-1" style="width: 114px; margin-right: 10px;">
                                        <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['image'] ?>" class="rounded p-1 lazy">
                                    </div>
                                    <?php
                                    $variant_images_md = array_column($product['product'][0]['variants'], 'images_md');

                                    if (!empty($variant_images_md)) {
                                        foreach ($variant_images_md as $variant_images) {
                                            if (!empty($variant_images)) {
                                                foreach ($variant_images as $image) { ?>
                                                    <div class="swiper-slide  swiper-img mb-1" style="width: 114px; margin-right: 10px;">
                                                        <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $image ?>" class="rounded p-1 lazy" alt="">
                                                    </div>
                                    <?php }
                                            }
                                        }
                                    } ?>
                                    <?php
                                    if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                                        foreach ($product['product'][0]['other_images'] as $other_image) { ?>
                                            <div class="swiper-slide  swiper-img mb-1" style="width: 114px; margin-right: 10px;">
                                                <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $other_image ?>" class="rounded p-1 lazy" alt="">
                                            </div>
                                    <?php }
                                    } ?>
                                    <?php
                                    if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                                        $total_images++;
                                    ?>
                                        <div class="swiper-slide  swiper-img mb-1" style="width: 114px; margin-right: 10px;">
                                            <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/admin/images/video-file.png') ?>" class="rounded p-1 lazy" alt="">
                                        </div>
                                    <?php } ?>

                                </div>
                                <!--/.swiper-wrapper -->
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="swiper  gallery-top-1">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <figure class="rounded">
                                            <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['image'] ?>" alt="" class="lazy" style="object-fit: cover;height: 400px !important;width: fit-content;">
                                            <a class="item-link text-decoration-none" href="<?= $product['product'][0]['image'] ?>" data-glightbox="" data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                        </figure>
                                    </div>
                                    <?php
                                    $variant_images_md = array_column($product['product'][0]['variants'], 'images_md');
                                    if (!empty($variant_images_md)) {
                                        foreach ($variant_images_md as $variant_images) {
                                            if (!empty($variant_images)) {
                                                foreach ($variant_images as $image) {
                                    ?>
                                                    <div class="swiper-slide 12345">
                                                        <figure class="rounded">
                                                            <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $image ?>" class="lazy" alt="" style="object-fit: cover;height: 400px !important;width: fit-content;">
                                                            <a class="item-link text-decoration-none" href="<?= $image ?>" data-glightbox="" data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                                        </figure>
                                                    </div>
                                    <?php }
                                            }
                                        }
                                    } ?>
                                    <?php
                                    if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                                        foreach ($product['product'][0]['other_images'] as $other_image) {
                                            $total_images++;
                                    ?>
                                            <div class="swiper-slide">
                                                <figure class="rounded">
                                                    <img src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $other_image ?>" class="lazy" alt="" id="img_01" style="object-fit: cover;height: 400px !important;width: fit-content;">
                                                    <a class="item-link text-decoration-none" href="<?= $other_image ?>" data-glightbox="" data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                                </figure>
                                            </div>
                                    <?php }
                                    } ?>
                                    <?php
                                    if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                                        $total_images++;
                                    ?>
                                        <div class="swiper-slide">
                                            <figure class="rounded">
                                                <?php if ($product['product'][0]['video_type'] == 'self_hosted') { ?>
                                                    <video controls width="320" height="240" src="<?= $product['product'][0]['video'] ?>">
                                                        <?= !empty($this->lang->line('no_video_tag_support')) ? $this->lang->line('no_video_tag_support') : 'Your browser does not support the video tag.' ?>
                                                    </video>
                                                <?php } else if ($product['product'][0]['video_type'] == 'youtube' || $product['product'][0]['video_type'] == 'vimeo') {
                                                    if ($product['product'][0]['video_type'] == 'vimeo') {
                                                        $url =  explode("/", $product['product'][0]['video']);
                                                        $id = end($url);
                                                        $url = 'https://player.vimeo.com/video/' . $id;
                                                    } else if ($product['product'][0]['video_type'] == 'youtube') {
                                                        if (strpos($product['product'][0]['video'], 'watch?v=') !== false) {
                                                            $url = str_replace("watch?v=", "embed/", $product['product'][0]['video']);
                                                        } else if (strpos($product['product'][0]['video'], "youtu.be/") !== false) {
                                                            $url = explode("/", $product['product'][0]['video']);
                                                            $url = "https://www.youtube.com/embed/" . end($url);
                                                        }
                                                    } else {
                                                        $url = $product['product'][0]['video'];
                                                    } ?>
                                                    <iframe width="560" height="315" src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <?php } ?>
                                            </figure>
                                        </div>
                                    <?php } ?>
                                    <!--/.swiper-slide -->

                                </div>
                                <!--/.swiper-wrapper -->
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Product Image Slider -->
                <div class="product-preview-image-section-sm overflow-auto mb-9">
                    <div class=" swiper-container preview-image-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide text-center"><img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['image'] ?>"></div>
                            <?php
                            if (!empty($product['product'][0]['other_images']) && isset($product['product'][0]['other_images'])) {
                                foreach ($product['product'][0]['other_images'] as $other_image) { ?>
                                    <div class="swiper-slide text-center"><img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $other_image ?>"></div>
                            <?php }
                            } ?>
                            <?php if (!empty($variant_images_md)) {
                                foreach ($variant_images_md as $variant_images) {
                                    if (!empty($variant_images)) {
                                        foreach ($variant_images as $image) {
                            ?>
                                            <div class="swiper-slide text-center"><img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $image ?>" data-zoom-image=""></div>

                            <?php }
                                    }
                                }
                            } ?>
                            <?php
                            if (isset($product['product'][0]['video_type']) && !empty($product['product'][0]['video_type'])) {
                                $total_images++;
                            ?>
                                <div class="swiper-slide">
                                    <div class='product-view-grid'>
                                        <div class='product-view-image'>
                                            <div class='product-view-image-container'>
                                                <?php if ($product['product'][0]['video_type'] == 'self_hosted') { ?>
                                                    <video controls width="320" height="240" class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['video'] ?>">
                                                        <?= !empty($this->lang->line('no_video_tag_support')) ? $this->lang->line('no_video_tag_support') : 'Your browser does not support the video tag.' ?>
                                                    </video>
                                                <?php } else if ($product['product'][0]['video_type'] == 'youtube' || $product['product'][0]['video_type'] == 'vimeo') { ?>
                                                    <iframe width="560" height="315" class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination preview-image-swiper-pagination text-center"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="post-header mb-5">
                    <h2 class="post-title"><a href="" class="link-dark text-decoration-none"><?= ucfirst($product['product'][0]['name']) ?></a></h2>
                    <p><?= output_escaping(str_replace('\r\n', '&#13;&#10;', $product['product'][0]['short_description'])) ?></p>
                    <hr class="mt-4 mb-4">

                    <?php
                    $indicator = (isset($product['product'][0]['indicator']) && !empty($product['product'][0]['indicator']) ? $product['product'][0]['indicator'] : '');
                    if ($indicator == '1') { ?>
                        <span class="badge badge-success">Veg</span>
                    <?php } elseif ($indicator == '2') { ?>
                        <span class="badge badge-danger">Non veg</span>
                    <?php } ?>

                    <?php if ($product['product'][0]['type'] == "simple_product") { ?>
                        <p class="mb-0 mt-2 price" id="price">
                            <?php $price = get_price_range_of_product($product['product'][0]['id']);

                            echo $price['range'];
                            ?>
                            <sup><span class="special-price striped-price"><s><?= !empty($product['product'][0]['min_max_price']['special_price']) && $product['product'][0]['min_max_price']['special_price'] != NULL  ?   $settings['currency'] . '</i>' . number_format($product['product'][0]['min_max_price']['min_price']) : '' ?></s></span></sup>
                        </p>
                        <p class="mb-0 mt-2 price d-none" id="price">
                            <?php $price = get_price_range_of_product($product['product'][0]['id']); ?>
                        </p>
                    <?php } else { ?>
                        <?php if (($product['product'][0]['variants'][0]['special_price'] < $product['product'][0]['variants'][0]['price']) && ($product['product'][0]['variants'][0]['special_price'] != 0)) { ?>
                            <p class="mb-0 mt-2 price text-muted">
                                <span id="price" style='font-size: 20px;'>
                                    <?php echo $settings['currency'] ?>
                                    <?php
                                    $price = $product['product'][0]['variants'][0]['special_price'];
                                    echo number_format($price, 2);
                                    ?>
                                </span>
                                <sup>
                                    <span class="special-price striped-price text-danger" id="product-striped-price-div">
                                        <s id="striped-price">
                                            <?php echo $settings['currency'] ?>
                                            <?php $price = $product['product'][0]['variants'][0]['special_price'];
                                            echo number_format($price, 2);
                                            // echo $price;
                                            ?>
                                        </s>
                                    </span>
                                </sup>
                            </p>
                        <?php } else { ?>
                            <p class="mb-0 mt-2 price text-muted">
                                <span id="price" style='font-size: 20px;'>
                                    <?php echo $settings['currency'] ?>
                                    <?php
                                    $price = $product['product'][0]['variants'][0]['price'];
                                    echo number_format($price, 2);
                                    ?>
                                </span>
                            </p>
                        <?php } ?>
                    <?php } ?>

                    <div class="col-md-12 pl-0 product-rating-small " dir="ltr">
                        <input id="input" name="rating" class="rating rating-loading d-none mt-n5" data-size="xs" value="<?= $product['product'][0]['rating'] ?>" data-show-clear="false" data-show-caption="false" readonly>
                        <span class="my-auto ml-0 text-muted"> ( <?= $product['product'][0]['no_of_ratings'] ?> <?= !empty($this->lang->line('reviews')) ? $this->lang->line('reviews') : 'reviews' ?> ) </span>
                    </div>

                    <?php
                    $color_code = $style = "";
                    $product['product'][0]['variant_attributes'] = array_values($product['product'][0]['variant_attributes']);

                    if (isset($product['product'][0]['variant_attributes']) && !empty($product['product'][0]['variant_attributes'])) { ?>
                        <?php
                        foreach ($product['product'][0]['variant_attributes'] as $attribute) {
                            $attribute_ids = explode(',', $attribute['ids']);
                            $attribute_values = explode(',', $attribute['values']);
                            $swatche_types = explode(',', $attribute['swatche_type']);
                            $swatche_values = explode(',', $attribute['swatche_value']);
                            for ($i = 0; $i < count($swatche_types); $i++) {
                                if (!empty($swatche_types[$i]) && $swatche_values[$i] != "") {
                                    $style = '<style> .product-page-details .btn-group>.active { background-color: #ffffff; color: #000000; border: 1px solid black;}</style>';
                                } else if ($swatche_types[$i] == 0 && $swatche_values[$i] == null) {
                                    $style1 = '<style> .product-page-details .btn-group>.active { background-color: var(--primary-color);color: white!important;}</style>';
                                }
                            }
                        ?>
                            <h4 class="mt-2"><?= $attribute['attr_name'] ?></h4>
                            <div class="btn-group btn-group-toggle gap-1 d-flex flex-wrap" data-toggle="buttons" id="<?= $attribute['attr_name'] ?>">
                                <?php
                                // echo "<pre>";
                                // print_r($attribute);
                                // print_r($product['product'][0]['variant_attributes']);
                                // die;
                                foreach ($attribute_values as $key => $row) {
                                    if ($swatche_types[$key] == "1") {
                                        echo '<style> .product-page-details .btn-group>.active { border: 1px solid black;}</style>';
                                        $color_code = "style='background-color:" . $swatche_values[$key] . ";'";  ?>
                                        <ul class="p-0 mb-0" style="height:31px;">
                                            <li class="list-unstyled">
                                                <label class="btn text-center fullCircle rounded-circle p-3" <?= $color_code ?>>
                                                    <input type="radio" name="<?= $attribute['attr_name'] ?>" value="<?= $attribute_ids[$key] ?>" autocomplete="off" class="attributes filter-input">
                                                </label>
                                            </li>

                                        </ul>
                                    <?php } else if ($swatche_types[$key] == "2") { ?>
                                        <?= $style ?>
                                        <ul class="p-0">
                                            <li class="list-unstyled">
                                                <label class="btn text-center ">
                                                    <img class="swatche-image lazy category-image-container" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $swatche_values[$key] ?>">
                                                    <input type="radio" name="<?= $attribute['attr_name'] ?>" value="<?= $attribute_ids[$key] ?>" autocomplete="off" class="attributes">
                                                    <br>
                                                </label>
                                            </li>
                                        </ul>

                                    <?php } else { ?>
                                        <?= '<style> .product-page-details .btn-group>.active { background-color: var(--primary-color);color: white!important;}</style>'; ?>
                                        <ul class="p-0">
                                            <li class="list-unstyled">
                                                <label class="btn btn-default text-center rounded-2 btn-aqua btn-sm w-13">
                                                    <?= $row ?>
                                                    <input type="radio" name="<?= $attribute['attr_name'] ?>" value="<?= $attribute_ids[$key] ?>" autocomplete="off" class="attributes">
                                                    <br>
                                                </label>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php
                        }
                    }
                    if (!empty($product['product'][0]['variants']) && isset($product['product'][0]['variants'])) {
                        $total_images = 1;
                        foreach ($product['product'][0]['variants'] as $variant) {
                        ?>
                            <input type="hidden" class="variants" name="variants_ids" data-image-index="<?= $total_images ?>" data-name="" value="<?= $variant['variant_ids'] ?>" data-id="<?= $variant['id'] ?>" data-price="<?= $variant['price'] ?>" data-special_price="<?= $variant['special_price'] ?>" />
                    <?php
                            $total_images += count($variant['images']);
                        }
                    }
                    ?>

                    <div class="num-block skin-2 py-4 mt-2">
                        <div class="num-in form-control d-flex align-items-center">
                            <span class="minus dis" data-min="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['minimum_order_quantity'])) ? $product['product'][0]['minimum_order_quantity'] : 1 ?>" data-step="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['quantity_step_size'])) ? $product['product'][0]['quantity_step_size'] : 1 ?>"></span>
                            <input type="text" name="qty" class="in-num" value="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['minimum_order_quantity'])) ? $product['product'][0]['minimum_order_quantity'] : 1 ?>" data-step="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['quantity_step_size'])) ? $product['product'][0]['quantity_step_size'] : 1 ?>" data-min="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['minimum_order_quantity'])) ? $product['product'][0]['minimum_order_quantity'] : 1 ?>" data-max="<?= (isset($product['product'][0]['total_allowed_quantity']) && !empty($product['product'][0]['total_allowed_quantity'])) ? $product['product'][0]['total_allowed_quantity'] : '' ?>">
                            <span class="plus" data-max="<?= (isset($product['product'][0]['total_allowed_quantity']) && !empty($product['product'][0]['total_allowed_quantity'])) ? $product['product'][0]['total_allowed_quantity'] : '' ?> " data-step="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['quantity_step_size'])) ? $product['product'][0]['quantity_step_size'] : 1 ?>"></span>
                        </div>
                    </div>
                    <div class="bg-gray mt-2 mb-2">
                        <?php ($product['product'][0]['tax_percentage'] != 0) ? "Tax" . $product['product'][0]['tax_percentage'] : '' ?>
                    </div>
                    <input type="hidden" class="variants_data" id="variants_data" data-name="<?= $product['product'][0]['name'] ?>" data-image="<?= $product['product'][0]['image'] ?>" data-id="<?= $variant['id'] ?>" data-price="<?= $variant['price'] ?>" data-special_price="<?= $variant['special_price'] ?>">
                    <div class="" id="result"></div>

                    <?php if ($product['product'][0]['type'] != 'digital_product') { ?>
                        <form class="mt-2" id="validate-zipcode-form" method="POST">

                            <div class="input-group">
                                <input type="hidden" name="product_id" value="<?= $product['product'][0]['id'] ?>">
                                <input type="text" class="form-control my-1 rounded" id="zipcode" placeholder="Zipcode" name="zipcode" autocomplete="off" required value="<?= $product['product'][0]['zipcode']; ?>">

                                <button type="submit" class="btn btn-sm ml-0 btn-primary check-availability mt-1" id="validate_zipcode"><?= !empty($this->lang->line('check_availability')) ? $this->lang->line('check_availability') : 'Check Availability' ?></button>
                            </div>
                            <div class="input-group" id="error_box">
                                <?php if (!empty($product['product'][0]['zipcode'])) { ?>
                                    <b class="text-<?= ($product['product'][0]['is_deliverable']) ? "success" : "danger" ?>"><?= !empty($this->lang->line('product_is')) ? $this->lang->line('product_is') : 'Product is' ?> <?= ($product['product'][0]['is_deliverable']) ? "" : "not" ?> <?= !empty($this->lang->line('delivarable_on')) ? $this->lang->line('delivarable_on') : 'delivarable on' ?> &quot; <?= $product['product'][0]['zipcode']; ?> &quot; </b>
                                <?php } ?>
                            </div>
                        </form>
                    <?php } ?>
                    <!--end profile -->


                    <div class="row">
                        <div class="col-lg-9 d-flex flex-row pt-2 gap-2">
                            <?php
                            if (count($product['product'][0]['variants']) <= 1) {
                                $variant_id = $product['product'][0]['variants'][0]['id'];
                            } else {
                                $variant_id = "";
                            }
                            ?>
                            <?php if ($product['product'][0]['variants'][0]['cart_count'] != 0) { ?>
                                <a class="btn btn-yellow btn-icon btn-sm btn-icon-start rounded-pill w-100 py-2" href="<?= base_url('cart') ?>"><i class='fs-20 uil uil-arrow-right'></i> <?= !empty($this->lang->line('go_to_cart')) ? $this->lang->line('go_to_cart') : 'Go To Cart' ?></a>
                            <?php } else { ?>
                                <button type="button" name="add_cart" class="btn btn-yellow btn-icon btn-sm btn-icon-start rounded-pill w-100 add_to_cart" id="add_cart" data-product-id="<?= $product['product'][0]['id'] ?>" data-product-title="<?= $product['product'][0]['name'] ?>" data-product-slug="<?= $product['product'][0]['slug'] ?>" data-product-image="<?= $product['product'][0]['image'] ?>" data-product-price="<?= ($variant['special_price'] > 0 && $variant['special_price'] != '0' && $variant['special_price'] != '') ? $variant['special_price'] : $variant['price']; ?>" data-product-description="<?= short_description_word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', strip_tags($product['product'][0]['short_description'])))); ?>" data-step="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['quantity_step_size'])) ? $product['product'][0]['quantity_step_size'] : 1 ?>" data-min="<?= (isset($product['product'][0]['minimum_order_quantity']) && !empty($product['product'][0]['minimum_order_quantity'])) ? $product['product'][0]['minimum_order_quantity'] : 1 ?>" data-max="<?= (isset($product['product'][0]['total_allowed_quantity']) && !empty($product['product'][0]['total_allowed_quantity'])) ? $product['product'][0]['total_allowed_quantity'] : '' ?>" data-product-variant-id="<?= $variant_id ?>">
                                    <i class="uil uil-shopping-bag mr-2 fs-20"></i> <?= !empty($this->lang->line('add_to_cart')) ? $this->lang->line('add_to_cart') : 'Add to Cart' ?>
                                </button>
                            <?php } ?>
                            <button type="button" name="compare" class="btn btn-outline-blue btn-icon btn-sm rounded-pill w-15 p-0 compare ml-1" id="compare" data-product-id="<?= $product['product'][0]['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                <i class="uil uil-exchange-alt"></i>
                            </button>
                            <?php if ($product['product'][0]['is_favorite'] == 0) { ?>
                                <button class="btn btn-outline-red btn-icon btn-sm rounded-pill w-15 p-0 ml-1 add-fav" id="add_to_favorite_btn" data-product-id="<?= $product['product'][0]['id'] ?>">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-outline-red btn-icon btn-sm rounded-pill w-15 p-0 remove-fav" id="add_to_favorite_btn" data-product-id="<?= $product['product'][0]['id'] ?>">
                                    <i class="fa fa-heart"></i>
                                </button>
                            <?php } ?>
                        </div>
                    </div>

                    <hr class="mt-3 mb-3">


                    <div class="mt-2"><?= !empty($this->lang->line('seller')) ? $this->lang->line('seller') : 'Seller' ?>
                        <?php if (isset($product['product'][0]['seller_name']) && !empty($product['product'][0]['seller_name'])) { ?>
                            <a target="_BLANK" class="text-danger" href="<?= base_url('products?seller=' . $seller_slug[0]['slug']) ?>"><?= $product['product'][0]['seller_name'] ?></a>
                            </span>
                        <?php } ?>
                    </div>

                    <?php if ($this->ion_auth->logged_in()) { ?>
                        <div class="mt-2"><?= !empty($this->lang->line('seller')) ? $this->lang->line('chat_with') : 'Chat With' ?>
                            <?php if (isset($product['product'][0]['seller_name']) && !empty($product['product'][0]['seller_name'])) { ?>
                                <a id="chat-with-button" class="text-success" data-id="<?= $product['product'][0]['seller_id'] ?>" href="#">
                                    <i class="uil uil-comments"></i>
                                    <?= $product['product'][0]['seller_name'] ?></a>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>



                    <?php if (isset($product['product'][0]['tags']) && !empty($product['product'][0]['tags'])) { ?>
                        <div class="mt-2"><?= !empty($this->lang->line('tags')) ? $this->lang->line('tags') : 'Tags' ?>
                            <?php foreach ($product['product'][0]['tags'] as $tag) { ?>
                                <a href="<?= base_url('products/tags/' . $tag) ?>"><span class="badge badge-secondary p-1"><?= $tag ?></span></a>
                            <?php } ?>
                            </span>
                        <?php } ?>
                        <div class="mt-3 d-flex product-permission-feature no-gutters col-md-12 gap-5 overflow-auto">
                            <?php if (isset($product['product'][0]['cod_allowed']) && !empty($product['product'][0]['cod_allowed']) && $product['product'][0]['cod_allowed'] == 1) {  ?>
                                <div>
                                    <div class="product-permission">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/cod_logo.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        COD
                                    </div>
                                </div>
                            <?php } ?>
                            <div>
                                <?php if (isset($product['product'][0]['is_cancelable']) && !empty($product['product'][0]['is_cancelable']) && $product['product'][0]['is_cancelable'] == 1) {  ?>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/cancelable.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        Cancelable <br> till<?= ' ' . $product['product'][0]['cancelable_till'] ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/notcancelable.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        No Cancelable
                                    </div>
                                <?php  } ?>
                            </div>
                            <div>
                                <?php if (isset($product['product'][0]['is_returnable']) && !empty($product['product'][0]['is_returnable']) && $product['product'][0]['is_returnable'] == 1) {  ?>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/returnable.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        <?= $settings['max_product_return_days'] ?> Days <br> Returnable
                                    </div>
                                <?php } else { ?>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/notreturnable.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        No Returnable
                                    </div>
                                <?php  } ?>
                            </div>
                            <?php if (isset($product['product'][0]['guarantee_period']) && !empty($product['product'][0]['guarantee_period'])) {  ?>
                                <div>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/guarantee.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        <?= $product['product'][0]['guarantee_period'] ?> <br> Guarantee
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if (isset($product['product'][0]['warranty_period']) && !empty($product['product'][0]['warranty_period'])) {  ?>
                                <div>
                                    <div class="product-permission" class="ml-4">
                                        <img class="h-6 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= base_url('assets/front_end/classic/images/warranty.png') ?>">
                                    </div>
                                    <div class="product-permission-text">
                                        <?= $product['product'][0]['warranty_period'] ?> <br> Warranty
                                    </div>
                                </div>
                            <?php } ?>
                        </div>



                        </div>
                        <!-- /.post-header -->

                        <div class="mt-3">
                            <h6 class="product-details-title"> Product Details: </h6>
                            <hr class="mt-3 mb-3">
                            <table class="product-detail-tab">
                                <?php if (isset($product['product'][0]['attributes']) && !empty($product['product'][0]['attributes']) && $product['product'][0]['attributes'] != []) { ?>
                                    <?php foreach ($product['product'][0]['attributes'] as $attrbute) { ?>
                                        <tr>
                                            <td><?= ucfirst($attrbute['name']) ?> :</td>
                                            <td><?= $attrbute['value'] ?></td>
                                        </tr>
                                    <?php }
                                }
                                if (isset($product['product'][0]['made_in']) && !empty($product['product'][0]['made_in']) && $product['product'][0]['made_in'] != '') { ?>
                                    <tr>
                                        <td>Made In :</td>
                                        <td><?= ucfirst($product['product'][0]['made_in']) ?></td>
                                    </tr>
                                <?php }
                                if (isset($product['product'][0]['brand']) && !empty($product['product'][0]['brand']) && $product['product'][0]['brand'] != '') {

                                    $brand_img = fetch_details('brands', ['name' => $product['product'][0]['brand']]);
                                ?>
                                    <tr>
                                        <td>Brand :</td>
                                        <td>
                                            <a href="<?= base_url('products?brand=' . html_escape($brand_img[0]['slug'])) ?>" class="text-decoration-none">
                                                <img src="<?= base_url($brand_img[0]['image']) ?>" class="h-6">
                                                <?= ucfirst($product['product'][0]['brand']) ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                        <hr class="mt-3 mb-3">

                        <!-- /column -->
                        <div class="mt-5" id="share"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="container mt-n6">
        <div class="row mt-4">

            <div class="nav" id="product-tab" role="tablist">
                <nav class="w-100">
                    <ul class="nav nav-tabs nav-tabs-basic">
                        <li class="nav-item">
                            <?php if (isset($product['product'][0]['description']) && !empty($product['product'][0]['description'])) { ?>
                                <a class="nav-item nav-link product-nav-tab active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><?= !empty($this->lang->line('description')) ? $this->lang->line('description') : 'Description' ?></a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if (isset($product['product'][0]['description']) && !empty($product['product'][0]['description'])) { ?>

                                <a class="nav-item nav-link product-nav-tab" id="product-review-tab" data-toggle="tab" href="#product-review" role="tab" aria-controls="product-review" aria-selected="false"><?= !empty($this->lang->line('reviews')) ? $this->lang->line('reviews') : 'Reviews' ?></a>
                            <?php } else { ?>

                                <a class="nav-item nav-link product-nav-tab  active show" id="product-review-tab" data-toggle="tab" href="#product-review" role="tab" aria-controls="product-review" aria-selected="true"><?= !empty($this->lang->line('reviews')) ? $this->lang->line('reviews') : 'Reviews' ?></a>

                            <?php } ?>

                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link product-nav-tab <?= !isset($product['product'][0]['description']) && empty($product['product'][0]['description']) ? 'active' : '' ?>" id="product-seller-tab" data-toggle="tab" href="#product-seller" role="tab" aria-controls="product-seller" aria-selected="false">Sold By</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link product-nav-tab" id="product-faq-tab" data-toggle="tab" href="#product-faq" role="tab" aria-controls="product-faq" aria-selected="true">FAQ</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-content p-3 w-100" id="nav-tabContent">
                <div class="tab-pane fade active show" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <!--<div class="container-fluid">-->
                    <div class="row">
                        <div class="col-12 description overflow-auto">
                            <?= (isset($product['product'][0]['description']) && !empty($product['product'][0]['description'])) ? $product['product'][0]['description'] : ""  ?>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
                <!-- product faq tab -->
                <div class="tab-pane fade" id="product-faq" role="tabpanel" aria-labelledby="product-faq-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion accordion-wrapper" id="accordionSimpleExample">

                                    <?php if ((!isset($faq['data']) && empty($faq['data'])) || $faq['data'] == []) { ?>
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="d-flex flex-column">
                                                <img class="" src="<?= base_url('assets/front_end/modern/img/no-faq.jpg') ?>" alt="No Faq" width="160px" />
                                                <h4>No FAQs Found.</h4>
                                            </div>
                                            <div>
                                                <?php if ($this->ion_auth->logged_in()) { ?>
                                                    <div class=" add-faqs-form float-right">
                                                        <button class="btn btn-outline-primary btn-xs mt-2 rounded-pill" type="submit" data-toggle="modal" data-target="#add-faqs-form"><i class="uil uil-plus" aria-hidden="true"></i> &nbsp;Add your question here</button>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <?php foreach ($faq['data'] as $row) {
                                        ?>
                                            <?php if (isset($row['answer']) && !empty($row['answer']) && ($row['answer'] != '')) {
                                            ?>
                                                <div class="card plain accordion-item">
                                                    <div class="card-header" id="<?= "h-" . $row['id'] ?>">
                                                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#<?= "c-" . $row['id'] ?>" aria-expanded="true" aria-controls="collapseSimpleOne">
                                                            <?= html_escape($row['question']) ?>
                                                        </button>
                                                    </div>
                                                    <!--/.card-header -->
                                                    <?php $product_data = fetch_details('users', ['id' => $row['answered_by']], 'username'); ?>
                                                    <div id="<?= "c-" . $row['id'] ?>" class="accordion-collapse collapse" aria-labelledby="<?= "h-" . $row['id'] ?>" data-bs-parent="#accordionSimpleExample">
                                                        <div class="card-body">
                                                            <p class="mb-1"><?= html_escape($row['answer']) ?></p>
                                                            <p class="text-dark">Answer by : <?= isset($product_data[0]['username']) && !empty($product_data[0]['username']) ? html_escape($product_data[0]['username']) : "" ?></p>
                                                        </div>
                                                        <!--/.card-body -->
                                                    </div>
                                                    <!--/.accordion-collapse -->
                                                </div>
                                            <?php } ?>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?= (isset($product['product'][0]['description']) && !empty($product['product'][0]['description'])) ? "" : "active show"  ?>" id="product-review" role="tabpanel" aria-labelledby="product-review-tab">
                    <?php
                    // echo "<pre>";
                    // print_r($review_images);
                    // die;
                    if (!empty($review_images['total_images'])) {
                        if ($review_images['total_images'] > 0) { ?>
                            <h3 class="review-title"> User Review Images (<span><?= $review_images['total_images'] ?></span>)</h3>
                        <?php
                        }
                    }

                    if (isset($review_images['product_rating']) && !empty($review_images['product_rating'])) {
                        ?>
                        <div class="row reviews">
                            <?php
                            $count = 0;
                            $total_images = $review_images['total_images'];
                            for ($i = 0; $i < count($review_images['product_rating']); $i++) {
                                if (!empty($review_images['product_rating'][$i]['images'])) {
                                    for ($j = 0; $j < count($review_images['product_rating'][$i]['images']); $j++) {
                                        if ($count <= 8) {

                                            if ($count == 8 && !empty($review_images['product_rating'][$i]['images'][$j])) {
                            ?>
                                                <div class="mt-4">
                                                    <a href="<?= $review_images['product_rating'][$i]['images'][$j];  ?>" class="text-decoration-none" data-izimodal-open="#user-review-images" id="review-image-title" data-reached-end="false" data-izimodal-open="#user-review-images" data-review-limit="1" data-review-offset="0" data-product-id="<?= $review_images['product_rating'][$i]['product_id'] ?>" data-review-title="User Review Images(<span><?= $review_images['total_images'] ?></span>)">
                                                        <p class="limit_position text-blue">See all customer images</p>
                                                    </a>
                                                </div>
                                            <?php } else if (!empty($review_images['product_rating'][$i]['images'][$j])) {
                                            ?>

                                                <div class="col-sm-1">
                                                    <div class="review-box review-img">

                                                        <a href="<?= $review_images['product_rating'][$i]['images'][$j];  ?>" data-lightbox="users-review-images" data-title="<?= "<button class='label btn-success'>" . $review_images['product_rating'][$i]['rating'] . " <i class='fa fa-star'></i></button></br>" . $review_images['product_rating'][$i]['user_name'] . "<br>" . $review_images['product_rating'][$i]['comment'] ?> ">
                                                            <img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $review_images['product_rating'][$i]['images'][$j];  ?>" alt="Review Images">
                                                        </a>

                                                    </div>
                                                </div>
                            <?php }
                                            $count += 1;
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <hr class="mb-1 mt-1">
                    <div class="row mt-10">
                        <aside class="col-lg-4 sidebar">

                            <?php if ($product['product'][0]['is_purchased'] == 1 && !empty($my_rating)) {
                                $form_link = (!empty($my_rating)) ? base_url('products/save-rating') : base_url('products/save-rating');  ?>
                                <div id="rating-box" class="">
                                    <div class="add-review p-3 bg-soft-primary">
                                        <h3 class="text-center mb-4">Edit Your Review</h3>
                                        <form action="<?= $form_link ?>" id="product-rating-form" method="POST">
                                            <?php if (!empty($my_rating)) { ?>
                                                <input type="hidden" name="rating_id" value="<?= $my_rating['product_rating'][0]['id'] ?>">
                                            <?php } ?>
                                            <input type="hidden" name="product_id" value="<?= $product['product'][0]['id'] ?>">

                                            <label for="rating" class="fs-17">Your rating</label>
                                            <div class="pl-0 product-rating-small rating-form mb-2 mt-n2" dir="ltr">
                                                <input id="input" name="rating" class="rating rating-loading d-none mt-n5" data-size="xs" value="<?= isset($my_rating['product_rating'][0]['rating']) ? $my_rating['product_rating'][0]['rating'] : '0' ?>" data-show-clear="false" data-show-caption="false" data-step="1">
                                            </div>
                                            <div class="form-group fs-17">
                                                <label for="exampleFormControlTextarea1">Your Review</label>
                                                <textarea class="form-control" name="comment" rows="3"><?= isset($my_rating['product_rating'][0]['comment']) ? $my_rating['product_rating'][0]['comment'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group fs-17">
                                                <label for="exampleFormControlTextarea1">Images</label>
                                                <input type="file" name="images[]" accept="image/x-png,image/gif,image/jpeg" multiple />
                                            </div>
                                            <button class="btn btn-primary rounded-pill w-100" id="rating-submit-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($product['product'][0]['is_purchased'] == 1) {
                                $form_link = (!empty($my_rating)) ? base_url('products/edit-rating') : base_url('products/save-rating');
                            ?>
                                <div class=" p-3 bg-soft-primary <?= (!empty($my_rating)) ? 'd-none' : '' ?>" id="rating-box">
                                    <div class="add-review">
                                        <h3 class="review-title"><?= !empty($this->lang->line('add_your_review')) ? $this->lang->line('add_your_review') : 'Add Your Review' ?></h3>
                                        <form action="<?= $form_link ?>" id="product-rating-form" method="POST">
                                            <?php if (!empty($my_rating)) { ?>
                                                <input type="hidden" name="rating_id" value="<?= $my_rating['product_rating'][0]['id'] ?>">
                                            <?php } ?>
                                            <input type="hidden" name="product_id" value="<?= $product['product'][0]['id'] ?>">
                                            <label for="rating" class="fs-17">Your rating</label>
                                            <div class="col-md-12 pl-0 product-rating-small rating-form fs-17 mt-n2 mb-2" dir="ltr">
                                                <input id="input" name="rating" class="rating rating-loading d-none mt-n5" data-size="xs" value="<?= isset($my_rating['product_rating'][0]['rating']) ? $my_rating['product_rating'][0]['rating'] : '0' ?>" data-show-clear="false" data-show-caption="false" data-step="1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Your Review</label>
                                                <textarea class="form-control" name="comment" rows="3"><?= isset($my_rating['product_rating'][0]['comment']) ? $my_rating['product_rating'][0]['comment'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1"><?= !empty($this->lang->line('images')) ? $this->lang->line('images') : 'Images' ?></label>
                                                <input type="file" name="images[]" accept="image/x-png,image/gif,image/jpeg" multiple />
                                            </div>
                                            <button class="btn btn-primary rounded-pill w-100" id="rating-submit-btn"><?= !empty($this->lang->line('submit')) ? $this->lang->line('submit') : 'Submit' ?></button>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </aside>
                        <!-- /column .sidebar -->
                        <div class="col-md-12 order-md-2 <?= (isset($user->id) == 1) ? "col-lg-7" : "col-lg-12" ?>">
                            <!-- <div class="col-lg-7"> -->
                            <!-- <div class="row align-items-center mb-3 position-relative zindex-1">
                                <div class="col-md-7 col-xl-8 pe-xl-20">
                                    <h2 class="display-6 mb-0">Ratings & Reviews</h2>
                                </div>
                            </div> -->
                            <!--/.row -->
                            <div id="comments">
                                <h3 class="review-title mb-9"> <span id="no_ratings"><?= $product['product'][0]['no_of_ratings'] ?></span> Reviews For this Product</h3>
                                <ol id="singlecomments" class="commentlist">
                                    <?php if (isset($my_rating) && !empty($my_rating)) {
                                        foreach ($my_rating['product_rating'] as $row) { ?>
                                            <li class="comment mb-5">
                                                <div class="comment-header d-md-flex align-items-center">
                                                    <figure class="user-avatar">
                                                        <img class="rounded-circle h-11 w-11 lazy" alt="" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= THEME_ASSETS_URL . 'img/user.png' ?>" />
                                                    </figure>
                                                    <div>
                                                        <h6 class="comment-author"><a href="#" class="link-dark"><?= $row['user_name'] ?></a></h6>
                                                        <ul class="post-meta">
                                                            <li>
                                                                <span class="review-date text-muted">
                                                                    <?php $date = strtotime($row['data_added']); ?>
                                                                    <i class="uil uil-calendar-alt"></i>&nbsp;<span><?= date("d-M-Y", $date) ?>
                                                                    </span>
                                                            </li>
                                                        </ul>
                                                        <!-- /.post-meta -->
                                                    </div>
                                                    <!-- /div -->
                                                </div>
                                                <!-- /.comment-header -->
                                                <div class="d-flex flex-row align-items-center mb-2 ">
                                                    <input id="input" name="rating" class="rating rating-loading d-none" data-size="xs" value="<?= $row['rating'] ?>" data-show-clear="false" data-show-caption="false" readonly>
                                                </div>
                                                <p><?= $row['comment'] ?></p>
                                                <div class="float-end">
                                                    <a id="delete_rating" href="<?= base_url('products/delete-rating') ?>" class="text-decoration-none text-danger" data-rating-id="<?= $row['id'] ?>">
                                                        <i class="uil uil-trash-alt fs-22"></i></a>
                                                </div>
                                                <div class="row reviews">
                                                    <?php foreach ($row['images'] as $image) { ?>
                                                        <div class="col-md-2">
                                                            <div class="review-box review-img">
                                                                <!-- <a href="<?= file_exists(FCPATH . REVIEW_IMG_PATH . $image) ? $image : base_url() . NO_IMAGE; ?>" data-lightbox="review-images">
                                                                                <img  src="<?= file_exists(FCPATH . REVIEW_IMG_PATH . $image) ? $image : base_url() . NO_IMAGE; ?>" alt="Review Image">
                                                                            </a> -->
                                                                <a href="<?= $image; ?>" data-lightbox="review-images">
                                                                    <img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $image; ?>" alt="Review Image">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </li>
                                    <?php }
                                    } ?>
                                    <?php if (isset($product_ratings) && !empty($product_ratings)) {
                                        $user_id = (isset($user->id)) ? $user->id : '';
                                        foreach ($product_ratings['product_rating'] as $row) {
                                            if ($row['user_id'] != $user_id) { ?>
                                                <li class="comment mb-5">
                                                    <div class="comment-header d-md-flex align-items-center">
                                                        <figure class="user-avatar">
                                                            <img class="rounded-circle h-11 w-11 lazy" alt="" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= THEME_ASSETS_URL . 'img/user.png' ?>" />
                                                        </figure>
                                                        <div>
                                                            <h6 class="comment-author"><a href="#" class="link-dark"><?= $row['user_name'] ?></a></h6>
                                                            <ul class="post-meta">
                                                                <li>
                                                                    <span class="review-date text-muted">
                                                                        <?php $date = strtotime($row['data_added']); ?>
                                                                        <i class="uil uil-calendar-alt"></i>&nbsp;<span><?= date("d-M-Y", $date) ?>
                                                                        </span>
                                                                </li>
                                                            </ul>
                                                            <!-- /.post-meta -->
                                                        </div>
                                                        <!-- /div -->
                                                    </div>
                                                    <!-- /.comment-header -->
                                                    <div class="d-flex flex-row align-items-center mb-2 ">
                                                        <input id="input" name="rating" class="rating rating-loading d-none" data-size="xs" value="<?= $row['rating'] ?>" data-show-clear="false" data-show-caption="false" readonly>
                                                    </div>
                                                    <p><?= $row['comment'] ?></p>
                                                    <div class="row reviews">
                                                        <?php foreach ($row['images'] as $image) { ?>
                                                            <div class="col-md-1">
                                                                <div class="review-box review-img">
                                                                    <!-- <a href="<?= file_exists(FCPATH . REVIEW_IMG_PATH . $image) ? $image : base_url() . NO_IMAGE; ?>" data-lightbox="review-images">
                                                                                <img  src="<?= file_exists(FCPATH . REVIEW_IMG_PATH . $image) ? $image : base_url() . NO_IMAGE; ?>" alt="Review Image">
                                                                            </a> -->
                                                                    <a href="<?= $image; ?>" data-lightbox="review-images">
                                                                        <img class="lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $image; ?>" alt="Review Image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                    <?php }
                                        }
                                    } ?>
                                </ol>
                            </div>
                            <!-- /#comments -->
                            <nav class="d-flex mt-10">
                                <?php if (isset($product_ratings) && !empty($product_ratings)) { ?>
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button class="btn btn-outline-primary rounded-pill" id="load-user-ratings" data-product="<?= $product['product'][0]['id'] ?>" data-limit="<?= $user_rating_limit ?>" data-offset="<?= $user_rating_offset ?>">Load more</button>
                                        </div>
                                    </div>
                                <?php } ?>
                            </nav>
                            <!-- /nav -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-seller" role="tabpanel" aria-labelledby="product-seller-tab">
                    <!--<div class="container-fluid">-->
                    <div class="align-items-center container d-flex flex-wrap">
                        <div class="seller-image-container">
                            <img class="lazy pic-1" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $product['product'][0]['seller_profile'] ?>">
                        </div>
                        <div>
                            <div class="card-body-right seller_tab">
                                <h4 class="mb-0"><?= $product['product'][0]['store_name'] . "  " ?><span class="badge badge-success "><?= number_format($product['product'][0]['seller_rating'], 1) . " " ?><i class="fa fa-star"></i></span> </h4>
                                <span class="text-muted d-block mb-2"><?= $product['product'][0]['seller_name'] ?></span>
                                <p class="m-0 mb-3"><?= $product['product'][0]['store_description'] ?></p>
                                <a target="_BLANK" href="<?= base_url('products?seller=' . $seller_slug[0]['slug']) ?>" class="hover text-decoration-none">Explore All Products</a>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- section -->

<!-- related products -->
<section class="wrapper bg-gray">
    <div class="container py-10 overflow-hidden">
        <h3 class="h2 mb-6 text-center"><?= !empty($this->lang->line('related_products')) ? $this->lang->line('related_products') : 'Related Products' ?></h3>
        <div class="col-12 product-styl e-default pb-4 mt-2 mb-2 shop">

            <div class="swiper-container grid-view mb-6 mySwiper" data-margin="30" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">

                <div <?= ($is_rtl == true) ? "dir='rtl'" : ""; ?> class="swiper-wrapper">
                    <?php foreach ($related_products['product'] as $row) { ?>
                        <div class="swiper-slide project item rounded" title="<?= $row['name'] ?>">
                            <figure class="rounded">
                                <a href="<?= base_url('products/details/' . $row['slug']) ?>">
                                    <img class="lazy" class="pic-1 lazy" src="<?= base_url('assets/front_end/modern/img/product-placeholder.jpg') ?>" data-src="<?= $row['image_sm'] ?>" style="object-fit: cover;">
                                </a>

                                <a class="item-like text-decoration-none add-to-fav-btn 
                                            <?= ($row['is_favorite'] == 1) ? 'fa fa-heart' : 'fa fa-heart-o' ?>  
                                            " href="#" data-bs-toggle="white-tooltip" title="Add to wishlist" data-product-id="<?= $row['id'] ?>" style="color: <?= ($row['is_favorite'] == 1) ? 'red' : '' ?>">
                                    <i class=""></i>
                                </a>

                                <a href="#" class="quick-view-btn item-view text-decoration-none" data-bs-toggle="white-tooltip" title="Quick View" data-tip="Quick View" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $row['variants'][0]['id'] ?>" data-izimodal-open="#quick-view">
                                    <i class="uil uil-eye"></i>
                                </a>
                                <?php
                                if (count($row['variants']) <= 1) {
                                    $variant_id = $row['variants'][0]['id'];
                                    $modal = "";
                                } else {
                                    $variant_id = "";
                                    $modal = "#quick-view";
                                }
                                ?>

                                <?php
                                if (count($row['variants']) <= 1) {
                                    $variant_id = $row['variants'][0]['id'];
                                } else {
                                    $variant_id = "";
                                }
                                ?>
                                <a href="#" class="compare item-compare text-decoration-none" data-tip="Compare" data-bs-toggle="white-tooltip" title="compare" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $variant_id ?>">
                                    <i class="uil uil-exchange-alt"></i>
                                </a>

                                <?php $variant_price = ($row['variants'][0]['special_price'] > 0 && $row['variants'][0]['special_price'] != '') ? $row['variants'][0]['special_price'] : $row['variants'][0]['price'];
                                $data_min = (isset($row['minimum_order_quantity']) && !empty($row['minimum_order_quantity'])) ? $row['minimum_order_quantity'] : 1;
                                $data_step = (isset($row['minimum_order_quantity']) && !empty($row['quantity_step_size'])) ? $row['quantity_step_size'] : 1;
                                $data_max = (isset($row['total_allowed_quantity']) && !empty($row['total_allowed_quantity'])) ? $row['total_allowed_quantity'] : 0;
                                ?>
                                <a href="#" class="add_to_cart item-cart text-decoration-none" data-product-id="<?= $row['id'] ?>" data-product-variant-id="<?= $variant_id ?>" data-product-title="<?= $row['name'] ?>" data-product-slug="<?= $row['slug'] ?>" data-product-image="<?= $row['image']; ?>" data-product-price="<?= $variant_price; ?>" data-min="<?= $data_min; ?>" data-step="<?= $data_step; ?>" data-product-description="<?= short_description_word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', strip_tags($row['short_description'])))); ?>" data-izimodal-open="<?= $modal ?>">
                                    <i class="uil uil-shopping-bag"></i>&nbsp;<?= !empty($this->lang->line('add_to_cart')) ? $this->lang->line('add_to_cart') : 'Add To Cart' ?></a>

                            </figure>
                            <div class="post-header text-center mt-4 mb-5">
                                <input id="input" name="rating" class="rating rating-loading d-none" data-size="xs" value="<?= $row['rating'] ?>" data-show-clear="false" data-show-caption="false" readonly>
                                <!-- </div> -->
                                <h4 class="title post-title m-0 mt-2" title="<?= $row['name'] ?>" style="font-size: 16px;">
                                    <a class="link-dark text-decoration-none" href="<?= base_url('products/details/' . $row['slug']) ?>"><?= short_description_word_limit(output_escaping(str_replace('\r\n', '&#13;&#10;', strip_tags($row['name']))), 35) ?></a>
                                </h4>
                                <?php if (($row['variants'][0]['special_price'] < $row['variants'][0]['price']) && ($row['variants'][0]['special_price'] != 0)) { ?>
                                    <p class="mb-0 mt-2 price text-muted">
                                        <span id="price" style='font-size: 20px;'>
                                            <?php echo $settings['currency'] ?>
                                            <?php
                                            $price = $row['variants'][0]['price'];;
                                            echo number_format($price, 2);
                                            ?>
                                        </span>
                                        <sup>
                                            <span class="special-price striped-price text-danger" id="product-striped-price-div">
                                                <s id="striped-price">
                                                    <?php echo $settings['currency'] ?>
                                                    <?php $price = $row['variants'][0]['special_price'];
                                                    echo number_format($price, 2);
                                                    // echo $price;
                                                    ?>
                                                </s>
                                            </span>
                                        </sup>
                                    </p>
                                <?php } else { ?>
                                    <p class="mb-0 mt-2 price text-muted">
                                        <span id="price" style='font-size: 20px;'>
                                            <?php echo $settings['currency'] ?>
                                            <?php
                                            $price = $row['variants'][0]['price'];;
                                            echo number_format($price, 2);
                                            ?>
                                        </span>
                                    </p>
                                <?php } ?>
                            </div>

                            <!-- /.post-header -->
                        </div>
                        <!--/.swiper-slide -->
                    <?php } ?>
                </div>
                <!-- </div> -->
                <!--/.swiper-wrapper -->
            </div>
            <div class="swiper-controls mt-0">
                <div class="swiper-pagination product-swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3" aria-current="true"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>
<!-- /section -->

<div class="modal fade" id="add-faqs-form">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header pb-5 pt-8">
                <h4 class="modal-title">Add Faq</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body pb-8 pt-0">
                <form method="post" action='<?= base_url('products/add_faqs') ?>' id="add-faqs">
                    <div class="form-group">

                        <input type="hidden" name=" <?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="user_id" value="<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';  ?>">
                        <input type="hidden" name="seller_id" value="<?= $product['product'][0]['seller_id'];  ?>">
                        <input type="hidden" name="product_id" value="<?= $product['product'][0]['id']  ?>">
                        <input type="text" class="form-control" id="question" placeholder="Enter Your Question Here" name="question">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm rounded-pill" id="add-faqs" name="add-faqs" value="Save">Add Question</button>
                    <div class="mt-3">
                        <div id="add_faqs_result"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="user-review-images" class='product-page-content'>
    <div class="container" id="review-image-div">
        <?php
        if (isset($review_images['product_rating']) && !empty($review_images['product_rating'])) { ?>
            <div class="d-flex flex-wrap reviews" id="user_image_data">

            </div>
            <div id="load_more_div">
            </div>
        <?php } ?>
    </div>
</div>