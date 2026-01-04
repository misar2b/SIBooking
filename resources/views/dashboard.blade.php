 @extends('layouts.app')
 @section('content')

 <main class="main">
 <!-- Hero Section -->
    <section id="hero" class="hero section d-flex align-items-center" style="
    background: linear-gradient(rgba(148, 144, 144, 0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/user/img/kampus-upi.jpeg') }}') center/cover no-repeat;
    height: 85vh;">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">SIBooking<br>Peminjaman Tempat UPI Purwakarta</h1>
            <p data-aos="fade-up" data-aos-delay="100">Form Peminjaman Tempat untuk ORMAWA dan UKM UPI Purwakarta</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Form Peminjaman</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out"> <img src="{{ asset('assets/user/img/upi-logo1.png') }}" class="img-fluid animated" alt="UPI Logo" style="width: 400px; height: auto; max-width: 50vw;"></div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Alur<br></h2>
        <p><span>Alur Peminjaman Tempat</span></p>
      </div><!-- End Section Title -->
        <!--About Us-->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Login Situs SIBooking</h3>
              <p>
                Bagian BPH dari masing-masing ORMAKOM harus sudah register agar tercatat pada database, setelah register lakukan login dengan email dan password yang sesuai register.
              </p>
            </div>
          </div><!-- End Why Box -->
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Masuk pada bagian Tempat</h4>
                  <p>Lihat bagian tempat, tempat-tempat tersebut adalah tempat yang diperbolehkan untuk dipinjam. Perhatikan status tempat.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Isi Form</h4>
                  <p>Isi form peminjaman tempat yang ada dibawah dengan lengkap.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Pengajuan Surat</h4>
                  <p>Setelah mengisi form dan mendapatkan WhatsApp acc pada tanggal tersebut. Ajukan surat peminjaman resmi kepada wakil direktur 2.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!--End About Us -->

    <!-- Menu Section -->
   <section id="menu" class="menu section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Tempat</h2>
    <p><span class="description-title">Ruangan dan Aula</span></p>
  </div>

  <div class="container">
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      <div class="tab-pane fade active show" id="menu-starters">
        <div class="row gy-5">
          @forelse($tempats as $tempat)
          <div class="col-lg-4 menu-item">
            @if($tempat->gambar)
              <a href="{{ asset('storage/' . $tempat->gambar) }}" class="glightbox">
                <img src="{{ asset($tempat->gambar) }}" class="menu-img img-fluid" alt="{{ $tempat->nama_tempat }}">
              </a>
            @else
              <img src="assets/user/img/menu/menu-item-1.png" class="menu-img img-fluid" alt="{{ $tempat->nama_tempat }}">
            @endif
            <h4 style="font-family: 'Amatic SC', cursive; font-weight:700; color: #b91c1c;">
                {{ $tempat->nama_tempat }}
            </h4>

            <p class="ingredients" style="font-family: 'Poppins', sans-serif;font-size: 14px; color: #6b7280;line-height: 1.6;">
              <strong>{{ $tempat->lokasi }}</strong><br>
              Kapasitas: {{ $tempat->kapasitas }} orang<br>
              Kategori: <span class="badge bg-info">{{ $tempat->kategori }}</span>
            </p>
            <p class="price" style="font-family: 'Poppins', sans-serif; font-size: 20px;color: #cb090cff; line-height: 1.6;">
              Status:
              @if($tempat->status == 'tersedia')
                <span class="badge bg-success fs-6"> {{ $tempat->status }}</span>
              @else
                <span class="badge bg-danger fs-6"> {{ $tempat->status }}</span>
              @endif
            </p>
          </div>
          @empty
          <div class="col-12">
            <div class="alert alert-warning text-center">
              <i class="bi bi-exclamation-triangle"></i> Belum ada tempat tersedia
            </div>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Menu Section -->

    <!-- Events Section -->
    <section id="events" class="events section">

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/user/img/albarxpsti.jpg)">
              <h3>Aula Barat x Pembubaran HIMA PSI</h3>
              <div class="price align-self-start">2025</div>
              <p class="description">
                Aula Barat menjadi Tempat Pembubaran HIMA PSTI UPI Purwakarta.
              </p>
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/user/img/smartxrotasi.jpg)">
              <h3>Smart Classroom x ROTASI HIMA PSTI</h3>
              <div class="price align-self-start">2025</div>
              <p class="description">
                Smart Classroom menjadi tempat pengkaderan atau ROTASI fase kampus mahasiswa baru PSTI 2025.
              </p>
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/user/img/digitalxpsti.jpg)">
              <h3>Digital Meeting Room X ROTASI HIMA PSTI</h3>
              <div class="price align-self-start">2025</div>
              <p class="description">
                Digital Meeting Room menjadi tempat pengkaderan atau ROTASI fase kampus mahasiswa baru PSTI 2025.
              </p>
            </div><!-- End Event item -->

            <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(assets/user/img/labc.jpg)">
              <h3>LAB C x Mata Kuliah Jaringan Komputer</h3>
              <div class="price align-self-start">2025</div>
              <p class="description">
                Mahasiswa PSTI semester 3 mata kuliah Jarkom selalu prakikum di LAB C.
              </p>
            </div><!-- End Event item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Events Section -->

    <!-- Book Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Book Tempat</h2>
        <p><span class="description-title">Form Peminjaman<br></span></p>
      </div><!-- End Section Title -->

      <div class="container">
    <form action="{{ route('peminjaman.store') }}" method="POST">
      @csrf
      <div class="row g-0">
        <div class="col-lg-4 reservation-img" style="background-image: url(assets/user/img/upi-purwakarta.jpeg);"></div>

        <div class="col-lg-8 p-5">
          <div class="row gy-4">
            <div class="col-md-6">
              <label class="form-label fw-bold">Pilih Tempat:</label>
              <select name="tempat_id" class="form-select form-control" required>
                <option value="">-- Pilih Tempat Tersedia --</option>
                @foreach($tempats as $tempat)
                <option value="{{ $tempat->id }}">
                  {{ $tempat->nama_tempat }} ({{ $tempat->lokasi }})
                </option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Tanggal:</label>
              <input type="date" name="tanggal_pinjam" class="form-control"
                     min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Jam Mulai:</label>
              <input type="time" name="jam_mulai" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Jam Selesai:</label>
              <input type="time" name="jam_selesai" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">No. HP <span class="text-danger">*</span>:</label>
              <input type="tel" name="no_hp" class="form-control" placeholder="081xxxxxxxxx" required>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Kegiatan:</label>
              <input type="text" name="kegiatan" class="form-control"
                     placeholder="Penyelenggara, HIMA/UKM..." required>
            </div>

            <div class="col-12">
              <label class="form-label fw-bold">Keterangan:</label>
              <textarea name="keterangan" rows="3" class="form-control"
                        placeholder="Detail kegiatan / keperluan ruangan..."></textarea>
            </div>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-get-started btn-lg px-5">
              <i class="bi bi-calendar-plus me-2"></i>Ajukan Peminjaman
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</section><!-- /Book Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p><span>Butuh bantuan?</span> <span class="description-title">Kontak Kami</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
          <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.865984405633!2d107.44470089999997!3d-6.538603299999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e690e68a1406c01%3A0xa66f34eb29c41198!2sUniversitas%20Pendidikan%20Indonesia%2C%20Kampus%20Purwakarta!5e0!3m2!1sid!2sid!4v1767369540566!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Alamat</h3>
                <p>Jl. Veteran No.8, Nagri Kaler, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 411152</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Telepon</h3>
                <p>083111222333</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email</h3>
                <p>akademik@upi.edu</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Jam Operasional<br></h3>
                <p><strong>Sen-Jum:</strong> 07.00-15.00 WIB</p>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="{{ route('pesan.store') }}" method="post" class="php-email-form" data-aos="fade-up">
          @csrf
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Nama" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Perihal" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>

              <button type="submit">Kirim Pesan</button>
            </div>

          </div>
        </form><!-- End Contact Form -->

      </div>

    </section><!-- /Contact Section -->

</main>
@endsection
