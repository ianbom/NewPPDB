<!-- Sidebar -->

<style>
    .sidebar {
    color: white !important;
}

.sidebar a {
    color: white !important;
}

.sidebar a:hover {
    color: #ddd !important; /* Warna hover agar lebih soft */
}

.text-section {
    color: white !important;
}
</style>

<div class="sidebar"style="background: linear-gradient(to bottom, #172c18, #0a650d)">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header">
        <a href="#" class="logo">
          <img
            src="{{ asset('logo-None-iain-madura-f1a016af.jpg') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="50"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item">
            <a
              data-bs-toggle="collapse"
              href="#profile"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="bi bi-person-square"></i>
              <p>Profile</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="profile">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('profile.index') }}">
                    <span class="sub-item">My Profile</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Data</h4>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#pemberkasan">
                <i class="bi bi-file-text-fill"></i>
              <p>Pemberkasan</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="pemberkasan">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('pemberkasan.index') }}">
                    <span class="sub-item">Tambahkan Berkas</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#pengumuman">
                <i class="bi bi-megaphone-fill"></i>
              <p>Pengumuman</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="pengumuman">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('pengumuman.index') }}">
                    <span class="sub-item">Lihat Pengumuman</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->
