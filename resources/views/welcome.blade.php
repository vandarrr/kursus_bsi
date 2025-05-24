<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Website Kursus - BSI</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/css/slick/slick.css" />
    <link rel="stylesheet" href="assets/css/slick/slick-theme.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/iconfont.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/bootsnav.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
  </head>

  <body data-spy="scroll" data-target=".navbar-collapse">
    <div id="loading">
      <div id="loading-center">
        <div id="loading-center-absolute">
          <div class="object" id="object_one"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_four"></div>
        </div>
      </div>
    </div>

    <div class="culmn">
      <nav class="navbar navbar-default bootsnav navbar-fixed">
        <div class="navbar-top bg-grey fix">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="navbar-callus text-left sm-text-center">
                  <ul class="list-inline">
                    <li>
                      <a href=""
                        ><i class="fa fa-phone"></i> Call us: +62 2345 6789</a
                      >
                    </li>
                    <li>
                      <a href=""
                        ><i class="fa fa-envelope-o"></i> Contact us:
                        kursus@bsi.com</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="navbar-socail text-right sm-text-center">
                  <ul class="list-inline">
                    <li>
                      <a href="https://www.facebook.com/kampusbsi/" target="_blank"
                        ><i class="fa fa-facebook"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://x.com/kuliahbsiaja" target="_blank"
                        ><i class="fa fa-twitter"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://id.linkedin.com/school/universitas-bina-sarana-informatika/" target="_blank"
                        ><i class="fa fa-linkedin"></i
                      ></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/kuliahbsiaja/" target="_blank"
                        ><i class="fa fa-instagram"></i
                      ></a>
                    </li>
                    <li>
                      <a
                        href="https://www.youtube.com/@universitasbinasaranainfor4603"
                        target="_blank"
                        ><i class="fa fa-youtube"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="top-search">
          <div class="container">
            <div class="input-group">
              <span class="input-group-addon"
                ><i class="fa fa-search"></i
              ></span>
              <input type="text" class="form-control" placeholder="Search" />
              <span class="input-group-addon close-search"
                ><i class="fa fa-times"></i
              ></span>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="attr-nav">
            <ul>
              <li class="search">
                <a href="#"><i class="fa fa-search"></i></a>
              </li>
            </ul>
          </div>
          <div class="navbar-header">
            <button
              type="button"
              class="navbar-toggle"
              data-toggle="collapse"
              data-target="#navbar-menu"
            >
              <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#brand">
              <img src="assets/images/kbsi.png" class="logo" alt="" />
            </a>
          </div>

          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#home">Menu</a></li>
              <li><a href="#features">Tentang Kami</a></li>
              <li><a href="#business">Layanan</a></li>
              <li><a href="#test">Blog</a></li>
              <li><a href="#contact">Kontak</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li>
                @if (Auth::check())
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin') }}">Dashboard Admin</a>
                    @elseif (Auth::user()->role == 'user')
                        <a href="{{ route('user') }}">Dashboard User</a>
                    @endif
                @else
                    <a href="{{ route('auth') }}">Login</a>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section id="home" class="home bg-black fix">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="main_home text-center">
              <div class="col-md-12">
                <div class="hello_slid">
                  <div class="slid_item">
                    <div class="home_text">
                      <h2 class="text-white">
                        Welcome to <strong>BSI</strong>
                      </h2>
                      <h1 class="text-white">
                        kami menyebarkan pengetahuan sepanjang waktu
                      </h1>
                      <h3 class="text-white">
                        - Kursus berkualitas <strong>harga terjangkau</strong> Daftar hari ini juga -
                      </h3>
                    </div>

                    <div class="home_btns m-top-40">
                      <a
                        href="https://www.youtube.com/@universitasbinasaranainfor4603?sub_confirmation=1"
                        class="btn btn-primary m-top-20"
                        target="_blank"
                        >Subscribe Sekarang</a
                      >
                      <a
                        href="https://www.bsi.ac.id/ubsi/index.js"
                        class="btn btn-default m-top-20"
                        target="_blank"
                        >Lihat Lebih Lanjut</a
                      >
                    </div>
                  </div>
                  <div class="slid_item">
                    <div class="home_text">
                      <h2 class="text-white">
                        Welcome to <strong>BSI</strong>
                      </h2>
                      <h1 class="text-white">
                        Belajar Mudah. Ilmu Nyata. Hasil Maksimal.
                      </h1>
                      <h3 class="text-white">
                        - Kursus berkualitas <strong>harga terjangkau</strong> Daftar hari ini juga -
                      </h3>
                    </div>

                    <div class="home_btns m-top-40">
                      <a
                        href="https://www.youtube.com/@universitasbinasaranainfor4603?sub_confirmation=1"
                        class="btn btn-primary m-top-20"
                        target="_blank"
                        >Subscribe Sekarang</a
                      >
                      <a
                        href="https://www.bsi.ac.id/ubsi/index.js"
                        class="btn btn-default m-top-20"
                        target="_blank"
                        >Lihat Lebih Lanjut</a
                      >
                    </div>
                  </div>
                  <div class="slid_item">
                    <div class="home_text">
                      <h2 class="text-white">
                        Welcome to <strong>BSI</strong>
                      </h2>
                      <h1 class="text-white">
                        Waktunya upgrade skill! Akses kursus kapan saja, di mana saja
                      </h1>
                      <h3 class="text-white">
                        - Kursus berkualitas <strong>harga terjangkau</strong> Daftar hari ini juga -
                      </h3>
                    </div>

                    <div class="home_btns m-top-40">
                      <a
                        href="https://www.youtube.com/@universitasbinasaranainfor4603?sub_confirmation=1"
                        class="btn btn-primary m-top-20"
                        target="_blank"
                        >Subscribe Sekarang</a
                      >
                      <a
                        href="https://www.bsi.ac.id/ubsi/index.js"
                        class="btn btn-default m-top-20"
                        target="_blank"
                        >Lihat Lebih Lanjut</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="features" class="features">
        <div class="container">
          <div class="row">
            <div class="main_features fix roomy-70">
              <div class="col-md-4">
                <div class="features_item sm-m-top-30">
                  <div class="f_item_icon">
                    <i class="fa fa-thumbs-o-up"></i>
                  </div>
                  <div class="f_item_text">
                    <h3>Kursus Kualitas Terbaik</h3>
                    <p>
                    Mulailah perjalanan menuju keunggulan dengan kursus yang tidak hanya kaya akan konten 
                    tetapi juga disesuaikan untuk memberikan pemahaman mendalam tentang materi,
                    disampaikan oleh pengajar berpengalaman yang merupakan pemimpin di bidangnya.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="features_item sm-m-top-30">
                  <div class="f_item_icon">
                    <i class="fa fa-tablet"></i>
                  </div>
                  <div class="f_item_text">
                    <h3>Kursus Responsif</h3>
                    <p>
                    Kursus ini menawarkan pengalaman belajar yang responsif, 
                    di mana Anda dapat memperoleh feedback real-time dan bimbingan langsung 
                    dari instruktur untuk memastikan pemahaman yang mendalam.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="features_item sm-m-top-30">
                  <div class="f_item_icon">
                    <i class="fa fa-sliders"></i>
                  </div>
                  <div class="f_item_text">
                    <h3>Mudah Dipahami</h3>
                    <p>
                    Kursus ini dirancang dengan materi yang mudah dipahami,
                    disajikan dengan cara yang sederhana namun tetap mendalam, 
                    sehingga setiap peserta dapat belajar dengan lancar tanpa kesulitan
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="business" class="business bg-grey roomy-70">
        <div class="container">
          <div class="row">
            <div class="main_business">
              <div class="col-md-6">
                <div class="business_slid">
                  <div class="slid_shap bg-grey"></div>
                  <div class="business_items text-center">
                    <div class="business_item">
                      <div class="business_img">
                        <img src="assets/images/aboutpag1.png" alt="" />
                      </div>
                    </div>

                    <div class="business_item">
                      <div class="business_img">
                        <img src="assets/images/aboutpag2.png" alt="" />
                      </div>
                    </div>

                    <div class="business_item">
                      <div class="business_img">
                        <img src="assets/images/abaoutpag3.png" alt="" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="business_item sm-m-top-50">
                  <h2 class="text-uppercase">
                    <strong>BSI</strong> adalah Situs Web Untuk Kursus
                  </h2>
                  <ul>
                    <li>
                      <i class="fa fa-arrow-circle-right"></i> Bersih & Modern
                      Kursus
                    </li>
                    <li>
                      <i class="fa fa-arrow-circle-right"></i> Mudah Dipahami
                    </li>
                    <li>
                      <i class="fa fa-arrow-circle-right"></i> Sertifikasi BNSP
                    </li>
                  </ul>
                  <p class="m-top-20">
                    Tingkatkan keahlian Anda hari ini! 
                    Daftar sekarang dan nikmati pembelajaran berkualitas tinggi 
                    mudah dipahami, responsif, dan langsung diterapkan di dunia nyata.
                  </p>

                  <div class="business_btn">
                    <a href="https://news.bsi.ac.id/" 
                    class="btn btn-default m-top-20"
                    target="_blank"
                    >Baca Selengkapnya</a>
                    <a href="https://www.bsi.ac.id/ubsi/visimisi" 
                    class="btn btn-primary m-top-20"
                    target="_blank"
                    >Visi & Misi</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="portfolio" class="product">
        <div class="container">
          <div class="main_product roomy-80">
            <div class="head_title text-center fix">
              <h2 class="text-uppercase">Apa Kata Pelajar</h2>
              <h5>Kursus interaktif dengan mentor berpengalaman</h5>
            </div>

            <div
              id="carousel-example-generic"
              class="carousel slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="1"
                ></li>
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="2"
                ></li>
              </ol>

              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/webdevelopment.png" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/webdevelopment.png"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Web Development</h5>
                            <h6>- Frontend dan backend</h6>
                            <h7>- Full-Stack Development</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/dasarpemrogaman.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/dasarpemrogaman.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Dasar Pemrogaman</h5>
                            <h6>- Logika dan algoritma dasar</h6>
                            <h7>- Bahasa pemrograman dasar</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/Cyber.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/Cyber.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>CyberSecurity</h5>
                            <h6>- Sistem operasi</h6>
                            <h7>- Networking dasar</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/UIUX.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/UIUX.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>UI/UX Design</h5>
                            <h6>- Dasar desain antarmuka pengguna</h6>
                            <h7>- Implementasi Ke Frontend</h7>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/logika.png" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/logika.png"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Logika Pemrogaman</h5>
                            <h6>- logika dengan pseudocode sederhana</h6>
                            <h7>- Flowchart,pseudocode,dasar algoritma</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/gamedevelopment.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/gamedevelopment.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Game Development</h5>
                            <h6>- Unity (C#)</h6>
                            <h7>- Unreal Engine (C++)</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/aplikasimobile.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/aplikasimobile.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Aplikasi Mobile</h5>
                            <h6>- Android</h6>
                            <h7>- iOS</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/datascience.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/datascience.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Data Science</h5>
                            <h6>- Visualisasi Data</h6>
                            <h7>- Deep Learning</h7>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/GitGitHub.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/GitGitHub.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Git & GitHub</h5>
                            <h6>- Manajemen versi & kolaborasi kode</h6>
                            <h7>- Use Github Untuk Open Source</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/htmlcss.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/htmlcss.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>HTML & CSS</h5>
                            <h6>- Membangun tampilan website</h6>
                            <h7>- Membuat halaman interaktif</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/java.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/java.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Java</h5>
                            <h6>- DOM Manipulation, event handling.</h6>
                            <h7>- Interaktivitas dasar.</h7>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="port_item xs-m-top-30">
                          <div class="port_img">
                            <img src="assets/images/machinelearning.jpg" alt="" />
                            <div class="port_overlay text-center">
                              <a
                                href="assets/images/machinelearning.jpg"
                                class="popup-img"
                                >+</a
                              >
                            </div>
                          </div>
                          <div class="port_caption m-top-20">
                            <h5>Machine Learning</h5>
                            <h6>- Data Preparation</h6>
                            <h7>- Algoritma Supervised Learning</h7>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <a
                class="left carousel-control"
                href="#carousel-example-generic"
                role="button"
                data-slide="prev"
              >
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>

              <a
                class="right carousel-control"
                href="#carousel-example-generic"
                role="button"
                data-slide="next"
              >
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </section>

      <section id="test" class="test bg-grey roomy-60 fix">
        <div class="container">
          <div class="row">
            <div class="main_test fix">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="head_title text-center fix">
                  <h2 class="text-uppercase">Apa Kata Guru</h2>
                  <h5>Kursus Bersih dan Modern adalah spesialis terbaik kami</h5>
                </div>
              </div>

              <div class="col-md-6">
                <div class="test_item fix">
                  <div class="item_img">
                    <img
                      class="img-circle"
                      src="assets/images/test-img1.jpg"
                      alt=""
                    />
                    <i class="fa fa-quote-left"></i>
                  </div>

                  <div class="item_text">
                    <h5>Sarah Amanda</h5>
                    <h6>sarah.com</h6>

                    <p>
                      Materi yang disampaikan sangat terstruktur dan mudah diikuti, 
                      bahkan untuk pemula seperti saya. Penjelasannya jelas dan langsung bisa dipraktikkan.
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="test_item fix sm-m-top-30">
                  <div class="item_img">
                    <img
                      class="img-circle"
                      src="assets/images/test-img2.jpg"
                      alt=""
                    />
                    <i class="fa fa-quote-left"></i>
                  </div>

                  <div class="item_text">
                    <h5>Michael Vilemon</h5>
                    <h6>Michael.com</h6>

                    <p>
                      Saya sangat terbantu dengan cara penyampaian yang sederhana tapi tetap mendalam. 
                      Tidak terasa seperti belajar sendiri, karena setiap penjelasan begitu rinci dan logis.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="brand" class="brand fix roomy-80">
        <div class="container">
          <div class="row">
            <div class="main_brand text-center">
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img1.png" alt="" />
                </div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img2.png" alt="" />
                </div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img3.png" alt="" />
                </div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img4.png" alt="" />
                </div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img5.png" alt="" />
                </div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6">
                <div class="brand_item sm-m-top-20">
                  <img src="assets/images/cbrand-img6.png" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="action" class="action bg-primary roomy-40">
        <div class="container">
          <div class="row">
            <div class="maine_action">
              <div class="col-md-8">
                <div class="action_item text-center">
                  <h2 class="text-white text-uppercase">
                    Terima kasih sudah mendaftar
                  </h2>
                </div>
              </div>
              <div class="col-md-4">
                <div class="action_btn text-left sm-text-center">
                  <a
                    href="https://www.youtube.com/@universitasbinasaranainfor4603?sub_confirmation=1"
                    class="btn btn-default"
                    target="_blank"
                    >Subscire Sekarang</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer id="contact" class="footer action-lage bg-black p-top-80">
        <div class="container">
          <div class="row">
            <div class="widget_area">
              <div class="col-md-3">
                <div class="widget_item widget_about">
                  <h5 class="text-white">Tentang Kami</h5>
                  <p class="m-top-20">
                  Kami menghadirkan kursus digital yang fleksibel, interaktif, 
                  dan bisa diakses kapan saja—belajar jadi lebih mudah dan efektif.
                  </p>
                  <div class="widget_ab_item m-top-30">
                    <div class="item_icon">
                      <i class="fa fa-location-arrow"></i>
                    </div>
                    <div class="widget_ab_item_text">
                      <h6 class="text-white">Lokasi</h6>
                      <p>
                      Jl. Margonda No.8, Pondok Cina, Kecamatan Beji, Depok, Indonesia 16424.
                      </p>
                    </div>
                  </div>
                  <div class="widget_ab_item m-top-30">
                    <div class="item_icon"><i class="fa fa-phone"></i></div>
                    <div class="widget_ab_item_text">
                      <h6 class="text-white">Phone :</h6>
                      <p>+62 2345 6789</p>
                    </div>
                  </div>
                  <div class="widget_ab_item m-top-30">
                    <div class="item_icon">
                      <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="widget_ab_item_text">
                      <h6 class="text-white">Email Address :</h6>
                      <p>kursus@BSI.com</p>
                    </div>
                  </div>
                </div>
                <!-- End off widget item -->
              </div>
              <!-- End off col-md-3 -->

              <div class="col-md-3">
                <div class="widget_item widget_latest sm-m-top-50">
                  <h5 class="text-white">Berita Terbaru</h5>
                  <div class="widget_latst_item m-top-30">
                    <div class="item_icon">
                      <img src="assets/images/ltst-img-1.jpg" alt="" />
                    </div>
                    <div class="widget_latst_item_text">
                      <p>Spesifikasi Kamera Vlogging ZV-E10 II</p>
                      <a href="">07<sup>th</sup> sept 2024</a>
                    </div>
                  </div>
                  <div class="widget_latst_item m-top-30">
                    <div class="item_icon">
                      <img src="assets/images/ltst-img-2.jpg" alt="" />
                    </div>
                    <div class="widget_latst_item_text">
                      <p>Family Mart Cofee</p>
                      <a href="">02<sup>th</sup> mei 2025</a>
                    </div>
                  </div>
                  <div class="widget_latst_item m-top-30">
                    <div class="item_icon">
                      <img src="assets/images/ltst-img-3.jpg" alt="" />
                    </div>
                    <div class="widget_latst_item_text">
                      <p>Café Santai</p>
                      <a href="">21<sup>th</sup> maret 2025</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="widget_item widget_service sm-m-top-50">
                  <h5 class="text-white">Berita Lainnya</h5>
                  <ul class="m-top-20">
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=tj2TJ66QRIo"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Chat App</a
                      >
                    </li>
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=YMj-tYrnOuQ"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Template Website
                        Premium</a
                      >
                    </li>
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=QqOg2xQw2Yw"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Cara Hosting
                        Website</a
                      >
                    </li>
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=51OqEADQfpQ"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Deploy Restfull
                        API</a
                      >
                    </li>
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=dcCYgvZ_kxc"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Laravel Breeze</a
                      >
                    </li>
                    <li class="m-top-20">
                      <a
                        href="https://www.youtube.com/watch?v=q_yJV1xElt0"
                        target="_blank"
                        ><i class="fa fa-angle-right"></i> Membuat Web
                        Autentikasi</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="widget_item widget_newsletter sm-m-top-50">
                  <h5 class="text-white">Buletin</h5>
                  <form class="form-inline m-top-30">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Enter you Email"
                      />
                      <button type="submit" class="btn text-center">
                        <i class="fa fa-arrow-right"></i>
                      </button>
                    </div>
                  </form>
                  <div class="widget_brand m-top-40">
                    <a href="" class="text-uppercase">Kursus BSI</a>
                    <p>
                    Kami membantu Anda mengembangkan keterampilan melalui kursus terarah, materi berkualitas, 
                    dan dukungan mentor yang siap memandu setiap langkah Anda.
                    </p>
                  </div>
                  <ul class="list-inline m-top-20">
                    <li>
                      - <a href="https://www.facebook.com/kampusbsi/" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://x.com/kuliahbsiaja" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="https://id.linkedin.com/school/universitas-bina-sarana-informatika/" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/kuliahbsiaja/" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/@universitasbinasaranainfor4603" target="_blank"><i class="fa fa-youtube"></i></a> -
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80"
        >
          <div class="col-md-12">
            <p class="wow fadeInRight" data-wow-duration="1s">
              Made with
              <i class="fa fa-heart"></i>
              by
              <a target="_blank" href="https://www.youtube.com/@universitasbinasaranainfor4603"
                >Kursus BSI</a
              >
              2025. All Rights Reserved
            </p>
          </div>
        </div>
      </footer>
    </div>

    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/css/slick/slick.js"></script>
    <script src="assets/css/slick/slick.min.js"></script>
    <script src="assets/js/jquery.collapse.js"></script>
    <script src="assets/js/bootsnav.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
