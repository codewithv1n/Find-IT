<script>
(function() {
    if (window.innerWidth > 1024 && localStorage.getItem('sidebarState') === 'collapsed') {
        document.body.classList.add('sidebar-collapsed');
    }
})();
</script>
<div class="sidebar" id="sidebar">     
   <div class="logo-container">
    <img src="../images/logo/Find IT.png" alt="logo">
   </div>

    <ul>
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="report_item.php"><i class="fa fa-exclamation-circle"></i> Report Item</a></li>
        <li><a href="reports.php"><i class="fa fa-history"></i> Reported Items</a></li>
        <li><a href="my_posts.php"><i class="fa fa-user"></i> My Posts</a></li>
        <li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
    </ul>

</div>