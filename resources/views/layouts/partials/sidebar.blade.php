<div id="scrollbar">
    <div class="container-fluid">
        <div id="two-column-menu"></div>
        <ul class="navbar-nav" id="navbar-nav">
            <!-- Dashboards -->
            <li class="menu-item {{ $active === 'Dashboard' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/dashboard" role="button" aria-expanded="false">
                    <i class="ri-dashboard-2-line"></i>
                    <span data-key="t-dashboards">Dashboards</span>
                </a>
            </li>

            <!-- Menu Title -->
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            <!-- Data Gejala -->
            <li class="menu-item {{ $active === 'Gejala' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/gejala" role="button" aria-expanded="false">
                    <i class="ri-stack-line"></i>
                    <span>Data Gejala</span>
                </a>
            </li>

            <!-- Data Penyakit -->
            <li class="menu-item {{ $active === 'Penyakit' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/penyakit" role="button" aria-expanded="false">
                    <i class="ri-folder-open-line"></i>
                    <span data-key="t-dashboards">Data Penyakit</span>
                </a>
            </li>

            <!-- Aturan Title -->
            <li class="menu-title"><span data-key="t-menu">Aturan</span></li>

            <!-- Basis Rule -->
            <li class="menu-item {{ $active === 'Basis' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/basis" role="button" aria-expanded="false">
                    <i class="ri-settings-4-line"></i>
                    <span data-key="t-dashboards">Basis Rule</span>
                </a>
            </li>

            <!-- Artikel -->
            <li class="menu-item {{ $active === 'Artikel' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/artikel" role="button" aria-expanded="false">
                    <i class="ri-git-repository-line"></i>
                    <span data-key="t-dashboards">Artikel</span>
                </a>
            </li>

            <!-- Pengguna Title -->
            <li class="menu-title"><span data-key="t-menu">Pengguna</span></li>

            <!-- Diagnosis -->
            <li class="menu-item {{ $active === 'Diagnosis' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/diagnosis" role="button" aria-expanded="false">
                    <i class="ri-baidu-line"></i>
                    <span data-key="t-dashboards">Diagnosis</span>
                </a>
            </li>

            <!-- Kelola User -->
            <li class="menu-item {{ $active === 'User' ? 'active' : '' }}">
                <a class="nav-link menu-link" href="/user" role="button" aria-expanded="false">
                    <i class="ri-user-add-line"></i>
                    <span data-key="t-dashboards">Kelola User</span>
                </a>
            </li>
        </ul>
    </div>
</div>
