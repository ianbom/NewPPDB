<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="assets/img/kaiadmin/logo_light.svg"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
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
          <li class="nav-item active">
            <a
              data-bs-toggle="collapse"
              href="#dashboard"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="bi bi-house"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="dashboard">
              <ul class="nav nav-collapse">
                <li>
                  <a href="../demo1/index.html">
                    <span class="sub-item">Dashboard 1</span>
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
            <a data-bs-toggle="collapse" href="#siswa">
                <i class="bi bi-person-fill-add"></i>
              <p>Siswa</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="siswa">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('siswa.index') }}">
                    <span class="sub-item">List</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#pertanyaan">
                <i class="bi bi-question-square-fill"></i>
              <p>Pertanyaan</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="pertanyaan">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('pertanyaan.index') }}">
                    <span class="sub-item">List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('pertanyaan.create') }}">
                    <span class="sub-item">Create</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#status">
                <i class="bi bi-megaphone-fill"></i>
              <p>Status Pengumuman</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="status">
              <ul class="nav nav-collapse">
                <li>
                  <a href="{{ route('status.index') }}">
                    <span class="sub-item">List</span>
                  </a>
                </li>

                <li>
                    <a href="{{ route('status.create') }}">
                      <span class="sub-item">Create</span>
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
