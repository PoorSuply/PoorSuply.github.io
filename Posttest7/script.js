document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const icon = document.getElementById('icon');
    const navTextLinks = document.querySelectorAll('.nav-text a');

    function enableLightMode() {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
    }

    function enableDarkMode() {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
    }

    function updateIcon() {
        const isDarkMode = body.classList.contains('dark-mode');
        icon.src = isDarkMode ? 'light_mode_FILL0_wght400_GRAD0_opsz24.png' : 'dark_mode_FILL0_wght400_GRAD0_opsz24.png';
        icon.alt = isDarkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode';
    }

    function changeLinkColorOnHover(link) {
        link.addEventListener('mouseenter', () => {
            link.style.color = '#FFD700';
        });

        link.addEventListener('mouseleave', () => {
            link.style.color = 'var(--header-text)';
        });
    }

    icon.addEventListener('click', function () {
        if (body.classList.contains('dark-mode')) {
            enableLightMode();
        } else {
            enableDarkMode();
        }
        updateIcon();
    });

    navTextLinks.forEach((link) => {
        changeLinkColorOnHover(link);
    });

    updateIcon();
});
