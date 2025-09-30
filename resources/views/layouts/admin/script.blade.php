<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('sidebar-toggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('closed');
        document.getElementById('main-content').classList.toggle('expanded');
        document.getElementById('admin-navbar').classList.toggle('expanded'); 
    });
</script>

