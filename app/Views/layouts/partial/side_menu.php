<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a href="<?= base_url('login') ?>" class="brand-link">
    <img src="<?= base_url('img/logo-smk.webp') ?>" alt="SMK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SPK-Prakerin</span>
  </a>

  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('img/logo-smk.webp') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('name') ?></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if (session()->get('role') == "admin") : ?>
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- management user -->
          <li class="nav-item">
            <a href="<?= base_url('admin/users') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/students') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/dudi') ?>" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>Data DU/DI</p>
            </a>
          </li>
          <!-- <li class="nav-item">
                        <a href="<?= base_url('admin/criterias') ?>" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>Data Kriteria</p>
                        </a>
                    </li> -->
        <?php endif; ?>
        <?php if (session()->get('role') == "koordinator") : ?>
          <li class="nav-item">
            <a href="<?= base_url('koordinator') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Penilaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('koordinator/dokumen') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelengkapan Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('koordinator/rapor') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Rapor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('koordinator/rekapNilai') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Nilai</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (session()->get('role') == "hubin") : ?>
          <li class="nav-item">
            <a href="<?= base_url('hubin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Penilaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('hubin/tesTulis') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tes Tertulis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('hubin/tesWawancara') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tes Wawancara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('hubin/rekapNilai') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Nilai</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('hubin/hitung') ?>" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>Hitung SAW</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-table"></i>
              <p>
                Hasil SAW
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('hubin/lihatHasil') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Hasil</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (session()->get('role') == "gurubk") : ?>
          <li class="nav-item">
            <a href="<?= base_url('gurubk') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Penilaian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('gurubk/presensi') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Presensi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('gurubk/rekapNilai') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap Nilai</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (session()->get('role') == "kepsek") : ?>
          <li class="nav-item">
            <a href="<?= base_url('kepsek') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Hasil SAW
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('kepsek/lihatHasil') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lihat Hasil</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if (session()->get('role') == "siswa") : ?>
          <li class="nav-item">
            <a href="<?= base_url('siswa') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('siswa/biodata') ?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Biodata</p>
            </a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a href="<?= site_url('logout') ?>" class="nav-link" onclick="return confirm('Ingin Logout?');">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>

  </div>

</aside>