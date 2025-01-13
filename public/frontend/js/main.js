"use strict";

(function ($) {
    $(document).ready(function () {
        // Xử lý sự kiện khi người dùng chọn một mã giảm giá
        $("#discount_code").change(function () {
            var coupon_code = $(this).val();
            $("#coupon_code").val(coupon_code);
        });
    });

    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        Product Slider
    --------------------*/
    $(".product-slider").owlCarousel({
        loop: false,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            },
        },
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            },
        },
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
    var yyyy = today.getFullYear();

    if (mm == 12) {
        mm = "01";
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, "0");
    }
    var timerdate = mm + "/" + dd + "/" + yyyy;
    // For demo preview end

    console.log(timerdate);

    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

    $("#countdown").countdown(timerdate, function (event) {
        $(this).html(
            event.strftime(
                "<div class='cd-item'><span>%D</span> <p>Days</p> </div>" +
                    "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" +
                    "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" +
                    "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"
            )
        );
    });

    /*----------------------------------------------------
     Language Flag js
    ----------------------------------------------------*/
    $(document).ready(function (e) {
        //no use
        try {
            var pages = $("#pages")
                .msDropdown({
                    on: {
                        change: function (data, ui) {
                            var val = data.value;
                            if (val != "") window.location = val;
                        },
                    },
                })
                .data("dd");

            var pagename = document.location.pathname.toString();
            pagename = pagename.split("/");
            pages.setIndexByValue(pagename[pagename.length - 1]);
            $("#ver").html(msBeautify.version.msDropdown);
        } catch (e) {
            // console.log(e);
        }
        $("#ver").html(msBeautify.version.msDropdown);

        //convert
        $(".language_drop").msDropdown({ roundedBorder: false });
        $("#tech").data("dd");
    });
    /*-------------------
        Range Slider
    --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max"),
        minValue =
            rangeSlider.data("min-value") !== ""
                ? rangeSlider.data("min-value")
                : minPrice,
        maxValue =
            rangeSlider.data("max-value") !== ""
                ? rangeSlider.data("max-value")
                : maxPrice;
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minValue, maxValue],
        slide: function (event, ui) {
            minamount.val("$" + ui.values[0]);
            maxamount.val("$" + ui.values[1]);
        },
    });
    minamount.val("$" + rangeSlider.slider("values", 0));
    maxamount.val("$" + rangeSlider.slider("values", 1));

    /*-------------------
        Radio Btn
    --------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on(
        "click",
        function () {
            $(
                ".fw-size-choose .sc-item label, .pd-size-choose .sc-item label"
            ).removeClass("active");
            $(this).addClass("active");
        }
    );

    /*-------------------
        Nice Select
    --------------------- */
    $(".sorting, .p-show").niceSelect();

    /*------------------
        Single Product
    --------------------*/
    $(".product-thumbs-track .pt").on("click", function () {
        $(".product-thumbs-track .pt").removeClass("active");
        $(this).addClass("active");
        var imgurl = $(this).data("imgbigurl");
        var bigImg = $(".product-big-img").attr("src");
        if (imgurl != bigImg) {
            $(".product-big-img").attr({ src: imgurl });
            $(".zoomImg").attr({ src: imgurl });
        }
    });

    $(".product-pic-zoom").zoom();

    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $(".pro-qty");
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);

        //Update Cart
        const rowId = $button.parent().find("input").data("rowid");
        updateCart(rowId, newVal);
    });

    var proQty2 = $(".pro-qty2");
    proQty2.prepend('<span class="dec qtybtn">-</span>');
    proQty2.append('<span class="inc qtybtn">+</span>');
    proQty2.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);

        //Update Cart
        // const rowId = $button.parent().find("input").data("rowid");
        // updateCart(rowId, newVal);
    });

    var proQty1 = $(".pro-qty1");
    proQty1.prepend('<span class="dec qtybtn">-</span>');
    proQty1.append('<span class="inc qtybtn">+</span>');
    proQty1.on("click", ".qtybtn", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.hasClass("inc")) {
            var newVal1 = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal1 = parseFloat(oldValue) - 1;
            } else {
                newVal1 = 0;
            }
        }
        $button.parent().find("input").val(newVal1);
    });

    function updateCart(rowId, qty) {
        $.ajax({
            type: "GET",
            url: "/cart/update",
            data: { rowId: rowId, qty: qty },
            success: function (response) {
                $(".cart-count").text(response["count"]);
                $(".cart-price").text("$" + response["total"]);
                $(".select-total h5").text("$" + response["total"]);

                var cartHover_tbody = $(".select-items tbody");
                var cartHover_existItem = cartHover_tbody.find(
                    "tr" + "[data-rowId='" + rowId + "']"
                );
                if (qty === 0) {
                    cartHover_existItem.remove();
                } else {
                    cartHover_existItem
                        .find(".product-selected p")
                        .text(
                            "$" +
                                response["cart"].price.toFixed(2) +
                                " x " +
                                response["cart"].qty
                        );
                }
                //Xu ly o trong trang shop/cart
                var cart_tbody = $(".cart-table tbody");
                var cart_existItem = cart_tbody.find(
                    "tr" + "[data-rowId='" + rowId + "']"
                );

                if (qty === 0) {
                    cart_existItem.remove();
                } else {
                    cart_existItem
                        .find(".total-price")
                        .text(
                            "$" +
                                (
                                    response["cart"].price *
                                    response["cart"].qty
                                ).toFixed(2)
                        );
                }

                $(".subtotal span").text("$" + response["subtotal"]);
                $(".cart-total span").text("$" + response["total"]);

                // alert('Update successful!\nProduct: ' + response['cart'].name)

                console.log(response);
            },
            error: function (response) {
                alert("Update failed.");
                console.log(response);
            },
        });
    }
    /*-------------------
        Product Filter - Index
    --------------------- */

    const product_phone = $(".product-slider.phone");
    const product_laptop = $(".product-slider.laptop");
    $(".filter-control").on("click", ".item", function () {
        const $item = $(this);
        const filter = $item.data("tag");
        const category = $item.data("category");

        $item.siblings().removeClass("active");
        $item.addClass("active");

        if (category === "phone") {
            product_phone.owlcarousel2_filter(filter);
        }
        if (category === "laptop") {
            product_laptop.owlcarousel2_filter(filter);
        }
    });
})(jQuery);

function addCart(productId) {
    $.ajax({
        type: "GET",
        url: "/cart/create?productId=" + productId,
        data: { productId: productId },
        success: function (response) {
            $(".cart-count").text(response["count"]);
            $(".cart-price").text("$" + response["total"]);
            $(".select-total h5").text("$" + response["total"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr[data-rowId='" + response["cart"].rowId + "']"
            );

            if (cartHover_existItem.length) {
                cartHover_existItem
                    .find(".product-selected p")
                    .text(
                        "$" +
                            response["cart"].price.toFixed(2) +
                            " x " +
                            response["cart"].qty
                    );
            } else {
                var newItem =
                    '<tr data-rowId="' +
                    response["cart"].rowId +
                    '">\n' +
                    '   <td class="si-pic"><img style="height: 70px;" src="/admin/assets/images/products/' +
                    (response["cart"].options.images[0]
                        ? response["cart"].options.images[0].path
                        : "") +
                    '" alt=""></td>\n' +
                    '   <td class="si-text">\n' +
                    '       <div class="product-selected">\n' +
                    "           <p>$" +
                    response["cart"].price.toFixed(2) +
                    " x " +
                    response["cart"].qty +
                    "</p>\n" +
                    "           <h6>" +
                    response["cart"].name +
                    "</h6>\n" +
                    "       </div>\n" +
                    "   </td>\n" +
                    '   <td class="si-close">\n' +
                    "       <i onclick=\"removeCart('" +
                    response["cart"].rowId +
                    '\')" class="ti-close"></i>\n' +
                    "   </td>\n" +
                    "</tr>";

                cartHover_tbody.append(newItem);
            }

            alert("Thêm thành công\nSản Phẩm: " + response["cart"].name);
            console.log(productId);
            console.log(response);
        },
        error: function (response) {
            alert("add failed!");
            console.log(response);
        },
    });
}

function addWish(productId) {
    $.ajax({
        type: "GET",
        url: "wishlist/add",
        data: { productId: productId },
        success: function (response) {
            $(".wish-count").text(response["count"]);
            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr" + "[data-rowId='" + response["wishlist"].rowId + "']"
            );

            if (cartHover_existItem.length) {
            } else {
                var newItem =
                    '<tr data-rowId="{{ $wishlist->rowId }}">\n' +
                    '    <td class="si-pic"><img style="height: 70px" src="front/img/products/' +
                    response["wishlist"].options.images[0].path +
                    '"></td>\n' +
                    '    <td class="si-text">\n' +
                    '        <div class="product-selected">\n' +
                    "            <h6>" +
                    response["wishlist"].name +
                    "</h6>\n" +
                    "        </div>\n" +
                    "    </td>\n" +
                    '    <td class="so-close">\n' +
                    "        <i onclick=\"removeCart('" +
                    response["wishlist"].rowId +
                    '\')" class="ti-close" ></i>\n' +
                    "    </td>\n" +
                    "</tr>";

                cartHover_tbody.append(newItem);
            }
            alert(
                "Add successfull! \nProduct: " +
                    response["wishlist"].name +
                    " to wishlist"
            );

            console.log(response);
            location.reload();
        },
        error: function (response) {
            alert("Add failed.");
            console.log(response);
        },
    });
}
function addCartInDetails(productId) {
    var product_qty = document.getElementById("quantity");
    var qty = parseInt($("#quantity").val());
    var qty_fill = parseInt($("#qty_fill").val());
    console.log(qty);
    console.log(product_qty);
    console.log(qty_fill);
    if (typeof product_qty == "undefined" && product_qty == null) {
        product_qty = 1;
    } else {
        product_qty = document.getElementById("quantity").value;
        console.log(parseInt(product_qty));
    }
    if (qty <= qty_fill) {
        if (qty > 0) {
            $.ajax({
                type: "GET",
                url: "/cart/addCartInDetails?productId=" + productId,
                data: { productId: productId, product_qty: product_qty },
                success: function (response) {
                    $(".cart-count").text(response["count"]);
                    $(".cart-price").text("$" + response["total"]);
                    $(".select-total h5").text("$" + response["total"]);

                    var cartHover_tbody = $(".select-items tbody");
                    var cartHover_existItem = cartHover_tbody.find(
                        "tr" + "[data-rowId='" + response["cart"].rowId + "']"
                    );
                    if (cartHover_existItem.length) {
                        cartHover_existItem
                            .find(".product-selected p")
                            .text(
                                "$" +
                                    response["cart"].price.toFixed(2) +
                                    " x " +
                                    response["cart"].qty
                            );
                    } else {
                        var newItem =
                            '<tr data-rowId="' +
                            response["cart"].rowId +
                            '">\n' +
                            '    <td class="si-pic"><img style="height: 70px" src="front/img/products/' +
                            response["cart"].options.images[0].path +
                            '"></td>\n' +
                            '    <td class="si-text">\n' +
                            '        <div class="product-selected">\n' +
                            "            <p>$" +
                            response["cart"].price.toFixed(2) +
                            " x " +
                            response["cart"].qty +
                            "</p>\n" +
                            "            <h6>" +
                            response["cart"].name +
                            "</h6>\n" +
                            "        </div>\n" +
                            "    </td>\n" +
                            '    <td class="so-close">\n' +
                            "        <i onclick=\"removeCart('" +
                            response["cart"].rowId +
                            '\')" class="ti-close" ></i>\n' +
                            "    </td>\n" +
                            "</tr>";

                        cartHover_tbody.append(newItem);
                    }
                    alert(
                        "Thêm thành công \nSản phẩm : " + response["cart"].name
                    );

                    console.log(response);
                },
                error: function (response) {
                    alert("Add failed.");
                    console.log(response);
                },
            });
        } else {
            alert("Bạn chưa thêm số lượng sản phẩm");
            console.log('duogbachnek');
        }
    } else {
        alert("Số lượng sản phẩm không đủ để thêm");
        console.log(response);
    }
}

function removeCart(rowId) {
    $.ajax({
        type: "GET",
        url: "/cart/delete?rowId=" + rowId,
        data: { rowId: rowId },
        success: function (response) {
            $(".cart-count").text(response["count"]);
            $(".cart-price").text("$" + response["total"]);
            $(".select-total h5").text("$" + response["total"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );

            cartHover_existItem.remove();

            var cart_tbody = $(".cart-table tbody");
            var cart_existItem = cart_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );

            cart_existItem.remove();

            alert("Xóa thành công !\nProduct: " + response["cart"].name);
            console.log(response);
        },
        error: function (response) {
            alert("Xóa không thành công.");
            console.log(response);
        },
    });
}
function removeWish(rowId) {
    $.ajax({
        type: "GET",
        url: "wishlist/delete",
        data: { rowId: rowId },
        success: function (response) {
            $(".wish-count").text(response["count"]);

            var cartHover_tbody = $(".select-items tbody");
            var cartHover_existItem = cartHover_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );

            cartHover_existItem.remove();

            var cart_tbody = $(".cart-table tbody");
            var cart_existItem = cart_tbody.find(
                "tr" + "[data-rowId='" + rowId + "']"
            );

            cart_existItem.remove();

            alert("Delete successful!\nProduct: " + response["wishlist"].name);
            console.log(response);
        },
        error: function (response) {
            alert("Delete failed.");
            console.log(response);
        },
    });
}
function destroyCart() {
    $.ajax({
        type: "GET",
        url: "/cart/destroy",
        data: {},
        success: function (response) {
            $(".cart-count").text("0");
            $(".cart-price").text("0");
            $(".select-total h5").text("0");

            var cartHover_tbody = $(".select-items tbody");
            cartHover_tbody.children().remove();

            var cart_tbody = $(".cart-table tbody");
            cart_tbody.children().remove();

            $(".subtotal span").text("0");
            $(".cart-total span").text("0");

            alert("Delete successful!\nProduct: " + response["cart"].name);
            console.log(response);
        },
        error: function (response) {
            alert("Delete failed.");
            console.log(response);
        },
    });
}

// var newItem =
//     '<tr data-rowId="' + response['car'].rowId + '">\n' +
//     '    <td class="si-pic"><img style="height: 70px" src="front/img/products/' + response['cart'].options.images[0].path + '"></td>\n' +
//     '    <td class="si-text">\n' +
//     '        <div class="product-selected">\n' +
//     '            <p>$' + response['cart'].price.toFixed(2) + ' x ' + response['cart'].qty + '</p>\n' +
//     '            <h6>' + response['cart'].name + '</h6>\n' +
//     '        </div>\n' +
//     '    </td>\n' +
//     '    <td class="so-close">\n' +
//     '        <i onclick="removeCart(\'' + response['cart'].rowId + '\')" class="ti-close" ></i>\n' +
//     '    </td>\n' +
//     '</tr>';
function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $(input).siblings(".thumbnail").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function applyCouponCode() {
    $("#coupon_code_msg").html("");
    var coupon_code = $("#coupon_code").val();
    if (coupon_code !== "") {
        $.ajax({
            type: "post",
            url: "checkout/apply_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("" + "[name='_token']").val(),
            success: function (result) {
                if (result.status === "Success") {
                    $(".show_coupon_box").removeAttr("hidden");
                    document.getElementById("discount_code").style.display =
                        "none";
                    $("#coupon_code_str").html(coupon_code);
                    if (result.Type === 0) {
                        $("#coupon_code_price").html("- $" + result.Value);
                        $("#discount").val(result.Value);
                    } else {
                        $("#coupon_code_price").html("- $" + result.newPrice);
                        $("#discount").val(result.newPrice);
                    }
                    $("#total_price_order").html("$" + result.totalPrice);
                    $(".apply_coupon_code_box").hide();

                    $("#total_order").val(result.totalPrice);
                }
                if (result.status === "Error") {
                    $("#coupon_code_msg").html(
                        "Please enter valid coupon code"
                    );
                }
                $("#coupon_code_msg").html(result.msg);
            },
        });
    } else {
        $("#coupon_code_msg").html("please enter coupon code");
    }
}
function remove_coupon_code() {
    $("#coupon_code_msg").html("");

    var coupon_code = $("#coupon_code").val();
    if (coupon_code !== "") {
        $.ajax({
            type: "post",
            url: "checkout/remove_coupon_code",
            data:
                "coupon_code=" +
                coupon_code +
                "&_token=" +
                jQuery("" + "[name='_token']").val(),
            success: function (result) {
                if (result.status === "Success") {
                    $(".show_coupon_box").attr("hidden", true);
                    document.getElementById("discount_code").style.display =
                        "block";
                    $("#coupon_code_str").html("");
                    $("#total_price_order").html("$" + result.totalPrice);
                    $(".apply_coupon_code_box").show();
                    document.getElementById("discount").value = "";
                    document.getElementById("total_order").value = "";
                } else {
                }
                $("#coupon_code_msg").html(result.msg);
            },
        });
    }
}

//Khi click #thumbnail thì cũng gọi sự kiện click #image
$(document).ready(function () {
    $(".thumbnail").click(function () {
        $(this).siblings(".image").click();
    });
});
// Select your input element.
var number = document.getElementById("quantity");

// Listen for input event on numInput.
// number.onkeydown = function (e) {
//     if (
//         !(
//             (e.keyCode > 95 && e.keyCode < 106) ||
//             (e.keyCode > 47 && e.keyCode < 58) ||
//             e.keyCode == 8
//         )
//     ) {
//         return false;
//     }
// };

// var number1 = document.getElementById('quantity');
//
// // Listen for input event on numInput.
// number1.onkeydown = function(e) {
//     if(!((e.keyCode > 95 && e.keyCode < 106)
//         || (e.keyCode > 47 && e.keyCode < 58)
//         || e.keyCode == 8)) {
//         return false;
//     }
// }
