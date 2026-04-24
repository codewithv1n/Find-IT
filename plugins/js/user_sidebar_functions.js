document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');

  if (!toggleBtn || !sidebar) return;

  if (window.innerWidth > 1024) {
    const savedState = localStorage.getItem('sidebarState');
    if (savedState === 'collapsed') {
      document.body.classList.add('sidebar-collapsed');
    }
  }

  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      const els = [
        document.querySelector('header'),
        document.querySelector('.footer'),
        document.querySelector('.sidebar'),
        document.querySelector('.container, .report-item-container, .post-container, .about-container'),
      ];
      els.forEach(el => {
        if (!el) return;
        el.style.transition = 'transform 0.3s ease, left 0.3s ease, margin-left 0.3s ease';
      });
    });
  });

  toggleBtn.addEventListener('click', function () {
    if (window.innerWidth <= 1024) {
      document.body.classList.toggle('sidebar-open');
    } else {
      const isCollapsed = document.body.classList.toggle('sidebar-collapsed');
      localStorage.setItem('sidebarState', isCollapsed ? 'collapsed' : 'expanded');
    }
  });

  document.addEventListener('click', function (e) {
    if (window.innerWidth <= 1024) {
      if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
        document.body.classList.remove('sidebar-open');
      }
    }
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 1024) {
      document.body.classList.remove('sidebar-open');
    } else {
      document.body.classList.remove('sidebar-collapsed');
    }
  });
});


document.addEventListener("DOMContentLoaded", function() {
  let currentPage = window.location.pathname.split('/').pop();
   const sidebarLinks = document.querySelectorAll('.sidebar ul li a');

    if (currentPage === "") {
        currentPage = "dashboard.php"; 
    }
    
    sidebarLinks.forEach(link => {
        let linkHref = link.getAttribute('href');

        if (linkHref === currentPage) {
            link.classList.add('active');
        }
    });
});