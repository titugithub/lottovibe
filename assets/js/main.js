(function($) {
  // =================Start default js===============================//

  if ($("body").hasClass("post-type-archive-product")) {
    // Initialize Nice Select for all selects, but then destroy it on the WooCommerce sorting dropdown
    $("select").niceSelect();
    $(".woocommerce-ordering select").niceSelect("destroy");
  } else {
    // Initialize Nice Select for all other pages
    $("select").niceSelect();
  }

  //Sticky Menu

  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".header-inner").removeClass("sticky-menu");
    } else {
      $(".header-inner").addClass("sticky-menu");
    }
  });
  //Sticky Menu

  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $(".header-inner").removeClass("sticky-menu");
    } else {
      $(".header-inner").addClass("sticky-menu");
    }
  });

  // collapse hidden
  $(function () {
    var navMain = $(".navbar-collapse"); // avoid dependency on #id
    // when you have dropdown inside navbar
    navMain.on("click", "a:not([data-toggle])", null, function () {
      navMain.collapse("hide");
    });
  });

  // video
  if ($(".player").length) {
    $(".player").YTPlayer();
  }
  $(".menu-area .navbar ul > li.menu-item-has-children").hover(
    function () {
      $(this).addClass("hover-minimize");
    },
    function () {
      $(this).removeClass("hover-minimize");
    }
  );
  $(".showcase-item").hover(function () {
    $(this).toggleClass("hover");
  });

  //Phone Number
  $(".phone_call").on("click", function (event) {
    $(".phone_num_call").slideToggle("show");
  });
  //search
  $(".sticky_search").on("click", function (event) {
    $(".sticky_form").animate({ opacity: "toggle" }, 500);
    $(".sticky_form input").focus();
  });

  $(".sticky_search").on("click", function () {
    $("body").removeClass("search-active").removeClass("search-close");
    if ($(this).hasClass("close-full")) {
      $("body").addClass("search-close");
      $(".sticky_form").fadeOut("show");
    } else {
      $("body").addClass("search-active");
    }
    return false;
  });

  $(".nav-link-container").on("click", function (e) {
    $("body.on-offcanvas").removeClass("on-offcanvas");
    setTimeout(function () {
      $("body").addClass("on-offcanvas");
    }, 500);
  });

  if ($(".svtheme-newsletter").hasClass("svtheme-newsletters")) {
    $("body").addClass("svtheme-pages-btm-gap");
  }
  $(".sticky_form_search").on("click", function () {
    $("body, html")
      .removeClass("svtheme-search-active")
      .removeClass("svtheme-search-close");
    if ($(this).hasClass("close-search")) {
      $("body, html").addClass("svtheme-search-close");
    } else {
      $("body, html").addClass("svtheme-search-active");
    }
    return false;
  });

  var nav = $("#nav");
  if (nav.length) {
    $("#menu-single-menu").onePageNav();
  }
  new WOW().init();

  $(document).ready(function () {
    function resizeNav() {
      $(".menu-ofcn").css({ height: window.innerHeight });
      var radius = Math.sqrt(
        Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2)
      );
      var diameter = radius * 2;
      $(".off-nav-layer").width(diameter);
      $(".off-nav-layer").height(diameter);
      $(".off-nav-layer").css({
        "margin-top": -radius,
        "margin-left": -radius,
      });
    }
    $(".menu-button, .close-button").on("click", function () {
      $(
        ".nav-toggle, .off-nav-layer, .menu-ofcn, .close-button, body"
      ).toggleClass("off-open");
    });

    $("#mobile_menu li a").on("click", function () {
      $(
        ".nav-toggle, .off-nav-layer, .menu-ofcn, .close-button, body"
      ).toggleClass("off-open");
    });

    $(window).resize(resizeNav);
    resizeNav();
  });

  // Canvas Menu Js
  $(".nav-link-container > a")
    .off("click")
    .on("click", function (event) {
      event.preventDefault();
      $(".nav-link-container").toggleClass("nav-inactive-menu-link-container");
      $(".mobile-menus").toggleClass("nav-active-menu-container");
    });

  // Canvas Menu Js
  $(".nav-link-container > a")
    .off("click")
    .on("click", function (event) {
      event.preventDefault();
      $(".nav-link-container").toggleClass("nav-inactive-menu-link-container");
      $(".mobile-menus").toggleClass("nav-active-menu-container");
    });

  $(".nav-close-menu-li > a").on("click", function (event) {
    $(".mobile-menus").toggleClass("nav-active-menu-container");
    $(".content").toggleClass("inactive-body");
  });

  $(function () {
    $("ul.children").addClass("sub-menu");
  });
  //Videos popup jQuery activation code
  $(".popup-videos").magnificPopup({
    disableOn: 10,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
  });

  // collapse hidden
  $(function () {
    var navMain = $(".navbar-collapse"); // avoid dependency on #id
    // "a:not([data-toggle])" - to avoid issues caused
    // when you have dropdown inside navbar
    navMain.on("click", "a:not([data-toggle])", null, function () {
      navMain.collapse("hide");
    });
  });

  //Select box wrap css
  $(".menu-area .navbar ul > li.mega > ul.sub-menu").wrapInner(
    "<div class='container flex-mega'></div>"
  );
  $(".menu-area .navbar ul > li.mega > ul.sub-menu li")
    .first()
    .addClass("first-li-item");

  if ($("div").hasClass("openingfoot")) {
    $("body").addClass("openingfootwrap");
  }

  //preloader
  $(window).on("load", function () {
    $("#lottovibe-load").delay(400).fadeOut(200);
    $(".lottovibe-loader").delay(400).fadeOut(200);

    if ($(window).width() < 992) {
      $(".svtheme-menu").css("height", "0");
      $(".svtheme-menu").css("opacity", "0");
      $(".svtheme-menu").css("z-index", "-1");
      $(".svtheme-menu-toggle").on("click", function () {
        $(".svtheme-menu").css("opacity", "1");
        $(".svtheme-menu").css("z-index", "1");
      });
    }
  });

  // Counter Up
  $(".rs-counter").counterUp({
    delay: 20,
    time: 1500,
  });
  // scrollTop init
  var win = $(window);
  var totop = $("#top-to-bottom");
  win.on("scroll", function () {
    if (win.scrollTop() > 150) {
      totop.fadeIn();
    } else {
      totop.fadeOut();
    }
  });
  totop.on("click", function () {
    $("html,body").animate(
      {
        scrollTop: 0,
      },
      500
    );
  });

  $(function () {
    $("ul.children").addClass("sub-menu");
  });

  $(".comment-body, .comment-respond").wrap("<div class='comment-full'></div>");

  //mobile menu
  $.fn.menumaker = function (options) {
    var mobile_menu = $(this),
      settings = $.extend(
        {
          format: "dropdown",
          sticky: false,
        },
        options
      );
    return this.each(function () {
      mobile_menu.find("li ul").parent().addClass("has-sub");
      var multiTg = function () {
        mobile_menu
          .find(".has-sub")
          .prepend('<span class="submenu-button"></span>');
        mobile_menu.find(".hash").parent().addClass("hash-has-sub");
        mobile_menu.find(".submenu-button").on("click", function () {
          $(this).toggleClass("submenu-opened");
          if ($(this).siblings("ul").hasClass("open-sub")) {
            $(this).siblings("ul").removeClass("open-sub").hide("fadeToggle");
            $(this).siblings("ul").hide("fadeToggle");
          } else {
            $(this).siblings("ul").addClass("open-sub").hide("fadeToggle");
            $(this).siblings("ul").slideToggle().show("fadeToggle");
          }
        });
      };
      if (settings.format === "multitoggle") multiTg();
      else mobile_menu.addClass("dropdown");
      if (settings.sticky === true) mobile_menu.css("position", "fixed");
      var resizeFix = function () {
        if ($(window).width() > 991) {
          mobile_menu.find("ul").show("fadeToggle");
          mobile_menu.find("ul.sub-menu").hide("fadeToggle");
        }
      };
      resizeFix();
      return $(window).on("resize", resizeFix);
    });
  };

  $(document).ready(function () {
    $("#mobile_menu").menumaker({
      format: "multitoggle",
    });
  });

  //woocommerce quantity style
  if (!String.prototype.getDecimals) {
    String.prototype.getDecimals = function () {
      var num = this,
        match = ("" + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if (!match) {
        return 0;
      }
      return Math.max(
        0,
        (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0)
      );
    };
  }
  // Quantity "plus" and "minus" buttons
  $(document.body).on("click", ".plus, .minus", function () {
    var $qty = $(this).closest(".quantity").find(".qty"),
      currentVal = parseFloat($qty.val()),
      max = parseFloat($qty.attr("max")),
      min = parseFloat($qty.attr("min")),
      step = $qty.attr("step");

    // Format values
    if (!currentVal || currentVal === "" || currentVal === "NaN")
      currentVal = 0;
    if (max === "" || max === "NaN") max = "";
    if (min === "" || min === "NaN") min = 0;
    if (
      step === "any" ||
      step === "" ||
      step === undefined ||
      parseFloat(step) === "NaN"
    )
      step = 1;

    // Change the value
    if ($(this).is(".plus")) {
      if (max && currentVal >= max) {
        $qty.val(max);
      } else {
        $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
      }
    } else {
      if (min && currentVal <= min) {
        $qty.val(min);
      } else if (currentVal > 0) {
        $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
      }
    }

    // Trigger change event
    $qty.trigger("change");
  });

  // =================End default js===============================//

  // on window scroll
  $(document).ready(function () {
    // position navbar on scroll
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
      $(".header").addClass(".header-inner.sticky-menu");
    }

    $(window)
      .on("scroll", function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
          $(".header").removeClass(".header-inner.sticky-menu");
        } else {
          $(".header").addClass(".header-inner.sticky-menu");
        }
      })
      .scroll(); // Triggering the scroll event on page load
  });

  $(document).ready(function () {
    $(".title").attr({
      "data-aos": "zoom-in",
      "data-aos-duration": "2000",
    });

    AOS.init({
      once: true,
    });
  });

  // preloader
  setTimeout(function () {
    $("#preloader").fadeToggle();
  }, 2500);

  // Click to Scroll Top //
  const ScrollTop = $(".scrollToTop");
  $(".scrollToTop").on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      600
    );
    return false;
  });
  // Click to Scroll Top //

  //>> Aos Animation <<//

  //>> Aos Animation <<//

  // Sticky Header //
  const fixed_top = $(".custom-fixed");
  if ($(window).scrollTop() > 50) {
    fixed_top.addClass("animated fadeInDown header-fixed");
  } else {
    fixed_top.removeClass("animated fadeInDown header-fixed");
  }
  // Sticky Header //

  // window on scroll function//
  $(window).on("scroll", function () {
    // Sticky Header//
    if ($(window).scrollTop() > 50) {
      fixed_top.addClass("animated fadeInDown header-fixed");
    } else {
      fixed_top.removeClass("animated fadeInDown header-fixed");
    }
    // Sticky Header//

    // Check Scroll //
    if ($(this).scrollTop() < 600) {
      ScrollTop.removeClass("active");
    } else {
      ScrollTop.addClass("active");
    }
    // Check Scroll //

    // Odometer Init
    let windowHeight = $(window).height();
    $(".odometer")
      .children()
      .each(function () {
        if (
          $(this).isInViewport({
            tolerance: windowHeight,
            toleranceForLast: windowHeight,
            debug: false,
          })
        ) {
          var section = $(this).closest(".counters");
          section.find(".odometer").each(function () {
            $(this).html($(this).attr("data-odometer-final"));
          });
        }
      });
    //--Odometer--//
  });
  // window on scroll function//

  // magnific-popup//
  $(".popup-video").magnificPopup({
    type: "iframe",
  });
  // magnific-popup//

  // gridGallery//
  $(".popup_img").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });
  // gridGallery//

  // Navbar Auto Active Class //
  var curUrl = $(location).attr("href");
  var terSegments = curUrl.split("/");
  var desired_segment = terSegments[terSegments.length - 1];
  var removeGarbage = desired_segment.split(".html")[0] + ".html";
  var checkLink = $('.menu-link a[href="' + removeGarbage + '"]');
  var targetClass = checkLink.addClass("active");
  targetClass.parents(".menu-item").addClass("active-parents");
  $(".active-parents > button").addClass("active");
  // Navbar Auto Active Class  //

  // navbar custom//
  $(".navbar-toggle-btn").on("click", function () {
    $(".navbar-toggle-item").slideToggle(300);
    $("body").toggleClass("overflow-hidden");
    $(this).toggleClass("open");
  });
  $(".menu-item button").on("click", function () {
    $(this).siblings("ul").slideToggle(300);
  });
  // navbar custom//

  // Password icon fill//
  document.querySelectorAll(".toggle-password").forEach(function (button) {
    button.addEventListener("click", function () {
      console.log("toggle click");
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
      var inputs = document.querySelectorAll(
        ".password-field, .password-field2, .password-field3"
      );
      inputs.forEach(function (input) {
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      });
    });
  });

  // banner car slide //

  //checkout car slide
  var swiper = new Swiper(".checkout-carslide-wrap", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 14,
    speed: 4500,
    autoplay: false,
    autoplay: {
      delay: 100,
    },
    pagination: {
      el: ".swiper-pagination-ch",
      clickable: true,
    },
    breakpoints: {
      1400: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      992: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });

  // banner Bike one slide //
  var swiper = new Swiper(".banner-bikeslide-wrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 1000,
    navigation: {
      nextEl: ".swiper-button-prevteam",
      prevEl: ".swiper-button-nextteam",
    },
    autoplay: {
      delay: 1200,
      reverseDirection: true,
    },
    breakpoints: {
      1400: {
        slidesPerView: 1,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  // lottery service
  var swiper = new Swiper(".lottery-service-wrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 1500,
    navigation: {
      nextEl: ".swiper-button-prevteam",
      prevEl: ".swiper-button-nextteam",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1400: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //luxury bike-onefixed selection
  var swiper = new Swiper(".bike-onefixed", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 1500,
    navigation: {
      nextEl: ".swiper-button-prevteam",
      prevEl: ".swiper-button-nextteam",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      1400: {
        slidesPerView: 3,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //luxury selection
  var swiper = new Swiper(".luxury-selectionwrap1", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 0,
    speed: 1500,
    navigation: {
      nextEl: ".luxury-prevteam",
      prevEl: ".luxury-nextteam",
    },
    breakpoints: {
      1400: {
        slidesPerView: 1,
      },
      992: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      500: {
        slidesPerView: 1,
      },
    },
  });
  var swiper = new Swiper(".biggest-winner-sldewrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 0,
    speed: 1500,
    navigation: {
      nextEl: ".luxury-prevteam",
      prevEl: ".luxury-nextteam",
    },
    breakpoints: {
      1400: {
        slidesPerView: 1,
      },
      992: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      500: {
        slidesPerView: 1,
      },
    },
  });
  //Bike Working win Slider
  var swiper = new Swiper(".bikeworking-wrap", {
    loop: false,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 50,
    direction: "vertical",
    autoHeight: true,
    mousewheel: true,
    speed: 1000,
    pagination: {
      el: ".swiper-pagination-workguide",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });
  var swiper = new Swiper(".banner-carslide-wrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 1000,
    navigation: {
      nextEl: ".swiper-button-prevteam",
      prevEl: ".swiper-button-nextteam",
    },
    autoplay: {
      delay: 1200,
    },
    breakpoints: {
      1400: {
        slidesPerView: 1,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //bikeworking-wrap-howtoplay
  var swiper = new Swiper(".bikeworking-wrap-howtoplay", {
    loop: false,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 50,
    direction: "vertical",
    autoHeight: true,
    mousewheel: true,
    speed: 1000,
    pagination: {
      el: ".swiper-pagination-workguide",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });
  //luxury selection
  var swiper = new Swiper(".testimonial-wrap1", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 4500,
    autoplay: true,
    centeredSlides: true,
    autoplay: {
      delay: 100,
    },
    pagination: {
      el: ".swiper-pagination-testi",
      clickable: true,
    },
    breakpoints: {
      1600: {
        slidesPerView: 4.1,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3.5,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //testimonial v7
  var swiper = new Swiper(".testimonial-wrapv7", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 4500,
    autoplay: true,
    centeredSlides: true,
    autoplay: {
      delay: 100,
    },
    pagination: {
      el: ".swiper-pagination-testi",
      clickable: true,
    },
    breakpoints: {
      1600: {
        slidesPerView: 5.5,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3.5,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //testimonial v8
  var swiper = new Swiper(".testimonial-wrapv8", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 4500,
    autoplay: true,
    centeredSlides: true,
    autoplay: {
      delay: 100,
    },
    pagination: {
      el: ".swiper-pagination-testi",
      clickable: true,
    },
    breakpoints: {
      1600: {
        slidesPerView: 2.9,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 2.5,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //testimonial v11
  var swiper = new Swiper(".testimonial-wrapv11", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 4500,
    autoplay: true,
    centeredSlides: true,
    autoplay: {
      delay: 100,
    },
    pagination: {
      el: ".swiper-pagination-testi",
      clickable: true,
    },
    breakpoints: {
      1600: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
      1399: {
        slidesPerView: 4,
        spaceBetween: 14,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //Sponsor selection
  var swiper = new Swiper(".sponsor-wrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 4500,
    autoplay: true,
    centeredSlides: true,
    autoplay: {
      delay: 100,
    },
    breakpoints: {
      1600: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
      0: {
        slidesPerView: 2,
        spaceBetween: 14,
      },
    },
  });
  //Testimonial unique
  var swiper = new Swiper(".testimonial-uniquewrap", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 2000,
    autoplay: false,
    pagination: {
      el: ".swiper-paginations",
      type: "fraction",
    },
    navigation: {
      nextEl: ".swiper-button-nextteam",
      prevEl: ".swiper-button-prevteam",
    },
    breakpoints: {
      1600: {
        slidesPerView: 1,
        spaceBetween: 24,
      },
      992: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      500: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
      0: {
        slidesPerView: 1,
        spaceBetween: 14,
      },
    },
  });
  //banner Slide v6
  var swiper = new Swiper(".banner-v6wrap-slide", {
    loop: true,
    slidesPerView: 1,
    slidesToShow: 1,
    spaceBetween: 24,
    speed: 2000,
    autoplay: true,
    autoplay: {
      delay: 1200,
      reverseDirection: true,
    },
  });
  //checking slider
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 1,
    watchSlidesProgress: true,
    allowTouchMove: false,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-nextteamjk",
      prevEl: ".swiper-button-prevteamjk",
    },
    thumbs: {
      swiper: swiper,
    },
  });
  // swipper slide //

  //--reply box--//
  $(".reply").on("click", function () {
    $(this).toggleClass("reply-active");
    $(this).parent().next(".reply__content").slideToggle();
  });
  //--reply box--//

  //--Copy Post--//
  var els_copy = document.querySelectorAll("[data-copy]");

  for (var i = 0; i < els_copy.length; i++) {
    var el = els_copy[i];
    el.addEventListener("submit", function (e) {
      e.preventDefault();
      var textInput = e.target.querySelector('input[type="text"]');
      textInput.select();
      document.execCommand("copy");
    });
  }
  //--Copy Post--//

  // Current Year//
  $(".currentYear").text(new Date().getFullYear());
  // Current Year//

  const texts = document.querySelectorAll(".text, .text2");
  texts.forEach((text) => {
    if (text) {
      text.innerHTML = text.innerText
        .split("")
        .map(
          (char, i) =>
            `<span style="display:inline-block; transform:rotate(${
              i * 14
            }deg)">${char}</span>`
        )
        .join("");
    } else {
      console.log("print");
    }
  });
  //text circle

  //propdown common lide//
  $(".dropdown-toggle").dropdown();
  //propdown common lide//

  //Tooptip//
  $('[data-toggle="tooltip"]').tooltip();
  //Tooptip//

  // Mouse Follower //
  const follower = document.querySelector(".mouse-follower .cursor-outline");
  const dot = document.querySelector(".mouse-follower .cursor-dot");
  window.addEventListener("mousemove", (e) => {
    follower.animate(
      [
        {
          opacity: 1,
          left: `${e.clientX}px`,
          top: `${e.clientY}px`,
          easing: "ease-in-out",
        },
      ],
      {
        duration: 3000,
        fill: "forwards",
      }
    );
    dot.animate(
      [
        {
          opacity: 1,
          left: `${e.clientX}px`,
          top: `${e.clientY}px`,
          easing: "ease-in-out",
        },
      ],
      {
        duration: 1500,
        fill: "forwards",
      }
    );
  });

  //Quantity
  var inputs = document.querySelectorAll("#qty, #qty2, #qty3");
  var btnminus = document.querySelectorAll(".qtyminus");
  var btnplus = document.querySelectorAll(".qtyplus");

  if (inputs.length > 0 && btnminus.length > 0 && btnplus.length > 0) {
    inputs.forEach(function (input, index) {
      var min = Number(input.getAttribute("min"));
      var max = Number(input.getAttribute("max"));
      var step = Number(input.getAttribute("step"));

      function qtyminus(e) {
        var current = Number(input.value);
        var newval = current - step;
        if (newval < min) {
          newval = min;
        } else if (newval > max) {
          newval = max;
        }
        input.value = Number(newval);
        e.preventDefault();
      }

      function qtyplus(e) {
        var current = Number(input.value);
        var newval = current + step;
        if (newval > max) newval = max;
        input.value = Number(newval);
        e.preventDefault();
      }

      btnminus[index].addEventListener("click", qtyminus);
      btnplus[index].addEventListener("click", qtyplus);
    });
  }

  //Quantity

  // Mouse Follower Hide Function //
  $("a, button").on("mouseenter mouseleave", function () {
    $(".mouse-follower").toggleClass("hide-cursor");
  });

  // Mouse Follower slider icon Function //
  const newElement = $(
    '<i class="material-symbols-outlined fs-four"> arrow_range </i>'
  );
  $(".slider-icon-area").on("mouseleave", function () {
    $(".mouse-follower").removeClass("slider-icon-active");
    newElement.remove();
  });
  $(".slider-icon-area").on("mouseenter", function () {
    $(".mouse-follower").addClass("slider-icon-active");
    $(".slider-icon-active .cursor-outline").append(newElement);
  });

  // Custom Tabs //
  $(".tablinks .nav-links").each(function () {
    var targetTab = $(this).closest(".singletab");
    targetTab.find(".tablinks .nav-links").each(function () {
      var navBtn = targetTab.find(".tablinks .nav-links");
      navBtn.click(function () {
        navBtn.removeClass("active");
        $(this).addClass("active");
        var indexNum = $(this).closest("li").index();
        var tabcontent = targetTab.find(".tabcontents .tabitem");
        $(tabcontent).removeClass("active");
        $(tabcontent).eq(indexNum).addClass("active");
      });
    });
  });
  // Custom Tabs //

  // tabLinks add active  //
  $(".tabLinks .nav-links").on("mouseenter", function () {
    $(this).addClass("active");
    $(".tabLinks .nav-links").not(this).removeClass("active");
  });
  // tabLinks add active  //

  // custom Accordion //
  $(".accordion-single .header-area").on("click", function () {
    if ($(this).closest(".accordion-single").hasClass("active")) {
      $(this).closest(".accordion-single").removeClass("active");
      $(this).next(".content-area").slideUp();
    } else {
      $(".accordion-single").removeClass("active");
      $(this).closest(".accordion-single").addClass("active");
      $(".content-area").not($(this).next(".content-area")).slideUp();
      $(this).next(".content-area").slideToggle();
    }
  });

  // count down timer
})(jQuery);
