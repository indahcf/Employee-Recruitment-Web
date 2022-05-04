<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="<?= base_url() ?>/img/logo_ultranesia.jpg" alt="" width="45px">
        <div class="sidebar-brand-text mx-3">SIMAWAI</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hrd'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard HRD</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hrd/kategori'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kategori Pekerjaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hrd/lowongan'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Lowongan Pekerjaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('hrd/lamaran'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Lamaran Pekerjaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>