@extends('layouts.guest')
@section('title', 'Tentang Kami')

@section('content')
  <section class="my-5 py-5" data-aos="fade" data-aos-duration="1500">
    <div class="container-fluid bg-icon-right">
      <h6 class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
        <i class="mdi mdi-frequently-asked-questions mdi-24px me-2"></i>
        <span class="text-uppercase">faq</span>
      </h6>
      <h3 class="text-center mb-2">Frequently asked<span class="fw-bold"> questions</span></h3>
      <p class="text-center fw-medium mb-3 mb-md-5 pb-3">
        Telusuri semua pertanyaan yang sering diajukan
      </p>
      <div class="row gy-5">
        <div class="col-lg-5">
          <div class="text-center">
            <img src="{{ asset('materio/assets/img/illustrations/misc-under-maintenance.png') }}"
              alt="sitting girl with laptop" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="accordion" id="accordionFront">
            <div class="accordion-item">
              <h2 class="accordion-header" id="head-One">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                  data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne" fdprocessedid="iy0tu">
                  Bagaimana cara menggunakan aplikasi ini?
                </button>
              </h2>

              <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionFront"
                aria-labelledby="accordionOne">
                <div class="accordion-body">
                  Anda hanya perlu mengakses aplikasi ini melalui browser. Kemudian melakukan registrasi akun. Setelah itu
                  login menggunakan akun anda. Mengisi data diri anda sebagai pelanggan. Selanjutnya anda dapat membeli
                  produk.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="head-Two">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                  data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                  Bagaimana cara melakukan pemesanan produk?
                </button>
              </h2>
              <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="accordionTwo"
                data-bs-parent="#accordionFront">
                <div class="accordion-body">
                  Anda hanya perlu mengikuti langkah-langkah di bawah ini.
                  <ol>
                    <li>Pilih produk yang diinginkan</li>
                    <li>Pilih metode pembayaran</li>
                    <li>Lakukan pembayaran</li>
                    <li>Transaksi selesai</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="accordion-item active">
              <h2 class="accordion-header" id="head-Three">
                <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionThree"
                  aria-controls="accordionThree">
                  Apakah data diri yang anda masukkan ke aplikasi ini aman dan terpercaya?
                </button>
              </h2>
              <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="accordionThree"
                data-bs-parent="#accordionFront">
                <div class="accordion-body">
                  Data diri yang anda masukkan ke aplikasi ini aman dan terpercaya. Kami tidak menggunakan data diri anda
                  untuk keperluan pribadi. Password yang anda masukkan saat login tersebut sudah menggunakan password
                  terenkripsi sehingga admin tidak akan melihat password anda.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="head-Four">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                  data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour"
                  fdprocessedid="1tauxf">
                  Metode pembayaran apa saja yang tersedia?
                </button>
              </h2>
              <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="accordionFour"
                data-bs-parent="#accordionFront">
                <div class="accordion-body">
                  Untuk metode pembayaran yang tersedia menggunakan metode pembayaran berikut.
                  <ol>
                    <li>Cash (Uang Tunai)</li>
                    <li>Bank Transfer (BRI, BCA, Mandiri)</li>
                    <li>QRIS</li>
                    <li>Dana</li>
                    <li>Gopay</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="head-Five">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                  data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive"
                  fdprocessedid="htfdw">
                  Apakah ada promo yang tersedia dalam aplikasi ini?
                </button>
              </h2>
              <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="accordionFive"
                data-bs-parent="#accordionFront">
                <div class="accordion-body">
                  Ya, kami memiliki promo yang tersedia dalam aplikasi ini. Kami menawarkan promo berupa diskon 10% - 20%
                  tergantung dari musim dalam promo.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
