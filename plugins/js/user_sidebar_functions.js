// Sidebar toggle
document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    document.body.classList.remove('sidebar-open');

    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            sidebar.style.transition = 'transform 0.3s ease';
            document.querySelector('header').style.transition = 'left 0.3s ease';
            document.querySelector('.footer').style.transition = 'left 0.3s ease';
            document.querySelector('.sidebar').style.transition = 'transform 0.3s ease';
            document.querySelector('.container, .report-item-container, .post-container, .about-container','.sidebar')
                ?.style && Object.assign(
                    document.querySelector('.container, .report-item-container, .post-container, .about-container','.sidebar').style,
                    { transition: 'margin-left 0.3s ease'}
                );
        });
    });

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function() {
            if (window.innerWidth <= 1024) {
                document.body.classList.toggle('sidebar-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');

                if (document.body.classList.contains('sidebar-collapsed')) {
                    localStorage.setItem('sidebarState', 'collapsed');
                } else {
                    localStorage.setItem('sidebarState', 'expanded');
                }
            }
        });
    }
});
