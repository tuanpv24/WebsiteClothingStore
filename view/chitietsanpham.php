<!-- Shop Detail Start -->
<?php
extract($onesp);
$img = $img_path . $img;
$soluong1 = 1;
// var_dump($onesp);

?>
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?= $img ?>" alt="Image">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">

            <h3 class="font-weight-semi-bold"><?= $name ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4"><?= number_format($price, 0, ',', ',') ?> vnđ</h3>
            <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.</p>
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="soluong" value="<?= $soluong ?>">
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <?php
                    $i = 1;
                    foreach ($listsize as $key) :
                    ?>
                        <div class=" custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-<?php echo $i ?>" name="id_size" value="<?= $key['id'] ?>">
                            <label class="custom-control-label" for="size-<?php echo $i ?>"><?= $key['name'] ?></label>
                        </div>
                    <?php
                        $i++;
                    endforeach ?><br>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <?php
                    // $i = 1;
                    foreach ($listcolor as $key) :
                    ?>
                        <div class=" custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-<?php echo $i ?>" name="id_color" value="<?= $key['id'] ?>">
                            <label class="custom-control-label" for="color-<?php echo $i ?>"><?= $key['name'] ?></label>
                        </div>
                    <?php
                        $i++;
                    endforeach ?><br>


                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <input type="number" min="1" max="" name="soluong" id="" value="1">
                    <i class="fa fa-shopping-cart mr-1"></i>
                    <input class="btn btn-primary px-3" name="btn" type="submit" value="Add to cart">


            </form>
        </div>
        <div class="d-flex pt-2">
            <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
            <div class="d-inline-flex">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="nav nav-tabs justify-content-center border-secondary mb-4">
            <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab-pane-1">
                <h4 class="mb-3">Mô tả chi tiết sản phẩm</h4>
                <p> <?= $des ?> </p>

            </div>
            <div class="tab-pane fade" id="tab-pane-2">
                <h4 class="mb-3">Additional Information</h4>
                <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                            </li>
                            <li class="list-group-item px-0">
                                Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                            </li>
                            <li class="list-group-item px-0">
                                Duo amet accusam eirmod nonumy stet et et stet eirmod.
                            </li>
                            <li class="list-group-item px-0">
                                Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pane-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                <div class="text-primary mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-4">Leave a review</h4>
                        <small>Your email address will not be published. Required fields are marked *</small>
                        <div class="d-flex my-3">
                            <p class="mb-0 mr-2">Your Rating * :</p>
                            <div class="text-primary">
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="message">Your Review *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>'
<!-- Shop Detail End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".commentt").load("view/binhluan/commentForm.php", {
            id_product: <?= $id ?>
        });
    });
</script>
<div class="commentt">

</div>

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <?php
                foreach ($sp_cung_loai as $sp_cung_loai) {
                    extract($sp_cung_loai);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $img = $img_path . $img;

                    echo '
        <div class="card border-1 mb-4 box__child-items">
          <img src="' . $img . '" alt="product" />
          <div class="product-name">
            <h6 class="m-3">' . $name . '</h6>
          </div>
          <div class="price">
            <p>' . number_format($price, 0, ',', ',') . ' vnđ</p>
            <del>42,000 vnđ</del>
          </div>
          <div class="hover">
            <div class="add">
              <div class="add__top">
                <a href="' . $linksp . '" class="add__top-icon">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="" class="add__top-icon">
                  <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                </a>
                <a href="" class="add__top-icon">
                  <i class="fa-solid fa-arrows-spin"></i>
                </a>
              </div>
              <div class="add__bottom">
                <button class="add__bottom-icon btn">
                  <div><i class="fa-solid fa-bag-shopping"></i></div>
                  <p>ADD TO CART</p>
                </button>
              </div>
            </div>
          </div>
          </div>';
                } ?>
            </div>
        </div>
    </div>
</div>


<!-- Products End -->