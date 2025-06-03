<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dashboard User Kursus - BSI</title>

    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <link
      href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
  </head>

  <body id="page-top">
    @include('fragment.alert')
    <div id="wrapper">
      <ul
        class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
        >
          <div class="sidebar-brand-text mx-3">Web Kursus</div>
        </a>

        <hr class="sidebar-divider my-0" />

        <li class="nav-item active">
          <a class="nav-link" href="{{ route(Auth::user()->role) }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a
          >
        </li>

        <hr class="sidebar-divider" />

        <div class="sidebar-heading">Utama</div>

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseTwo"
            aria-expanded="true"
            aria-controls="collapseTwo"
          >
            <i class="fas fa-fw fa-cog"></i>
            <span>Kursus</span>
          </a>
          <div
            id="collapseTwo"
            class="collapse"
            aria-labelledby="headingTwo"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Daftar Kursus:</h6>
              <a class="collapse-item" href="{{ route('cybersecurity') }}">CyberSecurity</a>
              <a class="collapse-item" href="{{ route('uiux') }}">UIUX</a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseUtilities"
            aria-expanded="true"
            aria-controls="collapseUtilities"
          >
            <i class="fas fa-fw fa-wrench"></i>
            <span>Agenda</span>
          </a>
          <div
            id="collapseUtilities"
            class="collapse"
            aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar"
          >
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Agenda Anda:</h6>
              <a class="collapse-item" href="{{ route('jadwal') }}">Jadwal Dan Status</a>
              <a class="collapse-item" href="{{ route('laporan') }}">Print Laporan</a>
            </div>
          </div>
        </li>

        <hr class="sidebar-divider" />

        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <form
              class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
            >
              <div class="input-group">
                <input
                  type="text"
                  class="form-control bg-light border-0 small"
                  placeholder="Cari untuk..."
                  aria-label="Search"
                  aria-describedby="basic-addon2"
                />
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <li class="nav-item dropdown no-arrow mx-1">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="alertsDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-bell fa-fw"></i>
                  <span class="badge badge-danger badge-counter">{{ $totalPemberitahuan }}</span>
                </a>
                <div
                  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown"
                >
                  <h6 class="dropdown-header">Pusat Peringatan</h6>

                  @forelse ($pemberitahuan as $info)
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div
                          class="icon-circle bg-primary"
                        >
                          <i class="fas fa-file-alt text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">{{ \Carbon\Carbon::parse($info->waktu)->format('F j, Y') }}</div>
                        <span class="font-weight-bold">{{ $info->pesan }}</span>
                      </div>
                    </a>
                  @empty
                    <a
                    class="dropdown-item text-center small text-gray-500"
                    href="#"
                    >Tidak Ada Notif</a
                  >
                  @endforelse

                    @if ($pemberitahuan->count() > 0)
                      <a
                      class="dropdown-item text-center small text-gray-500"
                      href="#"
                      >Tampilkan Semua Peringatan</a
                    >
                    @endif
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <li class="nav-item dropdown no-arrow">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="userDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                    >{{ Auth::user()->name }}</span
                  >
                  <img
                    class="img-profile rounded-circle"
                    src="{{ Auth::user()->google_id ? Auth::user()->image : asset('images/' . Auth::user()->image) }}"
                  />
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="userDropdown"
                >
                  <a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>>
                  <div class="dropdown-divider"></div>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                  >
                    <i
                      class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                    ></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>

          <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Pendaftaran Kursus CyberSecurity</h1>
            </div>
    
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        @if ($isRegistered)
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            Anda Telah Mendaftar
                            Silahkan Cek <span class="text-success">pusat peringatan</span> secara berkala!
                        </div>
                        @else
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran</h6>
                        </div>
                        <div class="card-body">
                            <form id="registrationForm" action="{{ route('create') }}" method="POST"
                            enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" name="name" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nohp">Nomor Telepon</label>
                                    <input type="tel" class="form-control" name="phone" id="nohp" placeholder="Masukkan nomor telepon" onkeypress="validateNumberInput(event)" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat seperti: Jl. Margonda Raya No.8, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16422" style="resize: none;" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cv">Dokumen(.pdf)</label>
                                    <input type="file" class="form-control" id="cv" name="cv" required>
                                </div>
                                <div class="form-group">
                                    <label for="alasan">Alasan Mengikuti Kursus</label>
                                    <textarea class="form-control" name="alasan" id="alasan" rows="3" placeholder="Masukkan setidaknya 20 kata" style="resize: none;" required></textarea>
                                </div>
                                <input type="hidden" value="cybersecurity" name="kursus" id="kursus">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi Kursus</h6>
                        </div>
                        <div class="card-body">
                            <p>Kursus Cybersecurity ini dirancang untuk pemula maupun profesional TI yang ingin memperdalam pengetahuan dan keterampilannya dalam dunia keamanan digital. Anda akan belajar berbagai teknik pengamanan data, sistem, dan jaringan dari ancaman siber yang semakin kompleks..</p>
                            <p>Fasilitas yang tersedia:</p>
                            <ul>
                                <li>Peralatan dan software lengkap</li>
                                <li>Materi berbasis kasus nyata</li>
                                <li>Instruktur berpengalaman di bidang keamanan siber</li>
                                <li>Sertifikat dan laporan hasil pembelajaran di akhir kursus</li>
                            </ul>
                            <p>Durasi kursus: 1 bulan</p>
                            <p>Biaya: Rp 100.000,-</p>
                        </div>
                    </div>
                </div>
            </div>            

          </div>
        </div>

        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <p>&copy; 2025. <b>Web Kursus</b> Hak Cipta Dilindungi.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bersiap untuk Keluar?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Pilih "Logout" di bawah jika Anda siap mengakhiri sesi Anda saat ini.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <form action="{{ route('logout') }}" method="POST" style="display: inline">
              @csrf
              <button type="submit" class="btn btn-primary">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="assets/js/sb-admin-2.min.js"></script>

    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

    <script>
        function validateNumberInput(event) {
            const key = event.key;
            if (!/[0-9]/.test(key)) {
                event.preventDefault();
                showError('Masukkan hanya angka untuk nomor telepon');
                const inputField = document.getElementById("nohp");
                inputField.disabled = true;
                setTimeout(() => {
                    inputField.disabled = false;
                }, 5000);
            }
        }
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin data sudah sesuai?')) {
                this.submit();
            }
        });
    </script>
  </body>
</html>
