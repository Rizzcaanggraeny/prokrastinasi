<aside class="sidebar">
  <p class="brand">Bye admin</p>
  <a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="dashboard.php">Dashboard</a>
  <a class="nav-link <?= $active === 'article' ? 'active' : '' ?>" href="article.php">Article</a>
  <a class="nav-link <?= $active === 'motivation' ? 'active' : '' ?>" href="motivation.php">Motivation</a>
  <a class="nav-link <?= $active === 'profile' ? 'active' : '' ?>" href="profile.php">Profile</a>
  <a class="nav-link logout" href="logout.php">Keluar</a>
</aside>
