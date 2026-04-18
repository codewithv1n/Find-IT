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
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="report_item.php">Report Item</a></li>
        <li><a href="reports.php">Reported Items</a></li>
        <li><a href="my_posts.php">My Posts</a></li>
        <li><a href="about.php">About</a></li>
    </ul>

</div>