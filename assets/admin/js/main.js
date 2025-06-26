"use strict";
(function ($) {
  $(document).ready(function () {
  
    // ========================== add active class to ul>li top Active current page Js Start =====================
    function dynamicActiveMenuClass(selector) {
      if (!$(selector).length) return;

      let fileName = window.location.pathname.split("/").reverse()[0];
      selector.find("li").each(function () {
        let anchor = $(this).find("a");
        if ($(anchor).attr("href") == fileName) {
          $(this).addClass("active");
        }
      });
      // if any li has active element add class
      selector.children("li").each(function () {
        if ($(this).find(".active").length) {
          $(this).addClass("active");
        }
      });
      // if no file name return
      if ("" == fileName) {
        selector.find("li").eq(0).addClass("active");
      }
    }
    dynamicActiveMenuClass($("ul.sidebar-menu-list"));

    // ========================== add active class to ul>li top Active current page Js End =====================
    $(".has-dropdown > a").click(function () {
      $(".sidebar-submenu").slideUp(200);
      if ($(this).parent().hasClass("active")) {
        $(".has-dropdown").removeClass("active");
        $(this).parent().removeClass("active");
      } else {
        $(".has-dropdown").removeClass("active");
        $(this).next(".sidebar-submenu").slideDown(200);
        $(this).parent().addClass("active");
      }
    });

        $(".has-dropdown-two > a").click(function () {
      $(".sidebar-submenu").slideUp(200);
      if ($(this).parent().hasClass("active")) {
        $(".has-dropdown-two").removeClass("active");
        $(this).parent().removeClass("active");
      } else {
        $(".has-dropdown-two").removeClass("active");
        $(this).next(".sidebar-submenu").slideDown(200);
        $(this).parent().addClass("active");
      }
    });
  });
})(jQuery);

