
    // document.addEventListener("DOMContentLoaded", function () {

    //     // Initialize Bootstrap collapse functionality
    //     const collapseElements = document.querySelectorAll('.collapse');
    //     collapseElements.forEach(element => {
    //         const bsCollapse = new bootstrap.Collapse(element, {
    //             toggle: false  // Prevent auto-opening on page load
    //         });
    //     });

    //     // Highlight active links (optional)
    //     const currentUrl = window.location.href;
    //     document.querySelectorAll('.sidebar-dropdown .sidebar-link').forEach(link => {
    //         if (link.href === currentUrl) {
    //             // Add active class to the link
    //             link.classList.add('active');

    //             // Expand parent submenu
    //             const submenu = link.closest('.collapse');
    //             if (submenu) {
    //                 submenu.classList.add('show');
    //                 const toggle = submenu.previousElementSibling;
    //                 if (toggle && toggle.classList.contains('collapsed')) {
    //                     toggle.classList.remove('collapsed');
    //                 }
    //             }
    //         }
    //     });
        
    // });


    // document.addEventListener("DOMContentLoaded", function () {
    //     // Select all links with class .submenu-link
    //     const submenuLinks = document.querySelectorAll('.submenu-link');

    //     submenuLinks.forEach(link => {
    //         link.addEventListener('click', function () {
    //             // Remove 'active' class from all links
    //             submenuLinks.forEach(l => l.classList.remove('active'));

    //             // Add 'active' class to the clicked link
    //             this.classList.add('active');
    //         });
    //     });
    // });

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
