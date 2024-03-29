<nav class="sidebar sidebar-offcanvas shadow" style="background-color: rgb(3, 164, 237);" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='./'">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <?php if ($_SESSION['data-user']['role'] == 1) { ?>
      <li class="nav-item nav-category">Kelola Pengguna</li>
      <li class="nav-item">
        <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='users'">
          <i class="mdi mdi-account-multiple-outline menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item nav-category">Data NBC</li>
      <li class="nav-item">
        <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='skripsi'">
          <i class="mdi mdi-file menu-icon"></i>
          <span class="menu-title">Skripsi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='kelas-klasifikasi'">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Kelas Klasifikasi</span>
        </a>
      </li>
    <?php } ?>
    <li class="nav-item nav-category">Data Hitung</li>
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='training'">
        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
        <span class="menu-title">Data Training</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='klasifikasi'">
        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
        <span class="menu-title">Klasifikasi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='testing'">
        <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
        <span class="menu-title">Data Testing</span>
      </a>
    </li>
    <li class="nav-item nav-category"></li>
    <!-- <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='icons'">
        <i class="mdi mdi-face-profile menu-icon"></i>
        <span class="menu-title">Icons</span>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" style="cursor: pointer;" onclick="window.location.href='../auth/signout'">
        <i class="mdi mdi-logout-variant menu-icon"></i>
        <span class="menu-title">Keluar</span>
      </a>
    </li>
  </ul>
</nav>