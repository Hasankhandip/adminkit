
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize Bootstrap collapse functionality
        const collapseElements = document.querySelectorAll('.collapse');
        collapseElements.forEach(element => {
            const bsCollapse = new bootstrap.Collapse(element, {
                toggle: false  // Prevent auto-opening on page load
            });
        });

        // Highlight active links (optional)
        const currentUrl = window.location.href;
        document.querySelectorAll('.sidebar-dropdown .sidebar-link').forEach(link => {
            if (link.href === currentUrl) {
                // Add active class to the link
                link.classList.add('active');

                // Expand parent submenu
                const submenu = link.closest('.collapse');
                if (submenu) {
                    submenu.classList.add('show');
                    const toggle = submenu.previousElementSibling;
                    if (toggle && toggle.classList.contains('collapsed')) {
                        toggle.classList.remove('collapsed');
                    }
                }
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function () {
        // Select all links with class .submenu-link
        const submenuLinks = document.querySelectorAll('.submenu-link');

        submenuLinks.forEach(link => {
            link.addEventListener('click', function () {
                // Remove 'active' class from all links
                submenuLinks.forEach(l => l.classList.remove('active'));

                // Add 'active' class to the clicked link
                this.classList.add('active');
            });
        });
    });