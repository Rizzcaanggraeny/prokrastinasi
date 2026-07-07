    <!-- Footer Bar -->
    <div class="footer-bar">
      <span>&copy; <?= date('Y') ?> Bye Prokrastinasi. All rights reserved.</span>
      <span>Admin Panel v2.0</span>
    </div>

  </main>
</div>

<script>
// Sidebar mobile toggle
(function(){
  const toggle = document.getElementById('mobileToggle');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');

  if (toggle && sidebar && overlay) {
    toggle.addEventListener('click', function(){
      sidebar.classList.toggle('open');
      overlay.classList.toggle('open');
    });
    overlay.addEventListener('click', function(){
      sidebar.classList.remove('open');
      overlay.classList.remove('open');
    });
  }
})();
</script>
</body>
</html>
