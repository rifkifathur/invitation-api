<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-green {
            background-color: #198754;
        }

        .text-green {
            color: #198754;
        }
    </style>
</head>

<body>
    <header class="bg-green sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-green container">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tema</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="py-5 bg-green">
        <article class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <img src="https://inveet.id/landing/img/banner.png" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card bg-green border-0">
                        <div class="card-body text-light">
                            <h5 class="h1">Website Undangan Pernikahan Digital</h5>
                            <p class="card-text h4 py-3">Bagikan momen kebahagian dimanapun dan kapanpun dengan undangan
                                digital. Lebih hemat, praktis, dan kekinian</p>
                            <a href="#" class="btn btn-dark p-3">
                                <span class="h4">Buat sekarangan undangan kamu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <section>
        <article class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card border-0 w-75">
                        <div class="card-body text-center align-content-center">
                            <h5 class="h1 py-3">Mengapa memilih kami?</h5>
                            <p class="card-text h5">Kami buatkan website undangan digital pernikahanmu secara ekslusif
                                dengan mudah, murah
                                dan cepat dengan hasil terbaik. Solusi website undangan pernikahan kamu jadi lebih
                                berkesan!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 py-5">
                <div class="col py-2 d-flex justify-content-center justify-content-md-end">
                    <div class="card border-0 bg-green text-light w-75">
                        <div class="card-body d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <div class="pt-2 px-2">
                                <h3 class="card-title"><strong>Harga Terjangkau</strong></h3>
                                <p class="card-text h5 opacity-50">
                                    Kami buatkan undangan pernikahanmu harga terjangkau dengan kualitas terbaik
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center justify-content-md-start">
                    <div class="card border-0 bg-green text-light w-75">
                        <div class="card-body d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-lightning" viewBox="0 0 20 20">
                                <path
                                    d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641l2.5-8.5zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1H6.374z" />
                            </svg>
                            <div class="pt-2 px-2">
                                <h3 class="card-title"><strong>Proses Mudah & Cepat</strong></h3>
                                <p class="card-text h5 opacity-50">
                                    Pembuatan hanya kurang dari 24jam dan bisa revisi kapanpun
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center justify-content-md-end">
                    <div class="card border-0 bg-green text-light w-75">
                        <div class="card-body d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-window-stack" viewBox="0 0 20 20">
                                <path d="M4.5 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM6 6a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                                <path d="M12 1a2 2 0 0 1 2 2 2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2 2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10ZM2 12V5a2 2 0 0 1 2-2h9a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1Zm1-4v5a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V8H3Zm12-1V5a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2h12Z"/>
                              </svg>
                            <div class="pt-2 px-2">
                                <h3 class="card-title"><strong>Pilihan Tema</strong></h3>
                                <p class="card-text h5 opacity-50">
                                    Tersedia pilihan tema menarik sesuai kebutuhanmu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center justify-content-md-start">
                    <div class="card border-0 bg-green text-light w-75">
                        <div class="card-body d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 22 22">
                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                              </svg>
                            <div class="pt-2 px-2">
                                <h3 class="card-title"><strong>Pelayanan terbaik</strong></h3>
                                <p class="card-text h5 opacity-50">
                                    Tim kami selalu sedia membantu kamu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <section>
        <article class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card border-0 w-75">
                        <div class="card-body text-center align-content-center">
                            <h5 class="h1 py-3">Fitur Unggulan</h5>
                            <p class="card-text h5">Fitur unggulan kami siap digunakan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 py-5">
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>Nama tamu</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Nama tamu selayaknya undangan fisik dengan nama tamu yang unlimited
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>Background Musik</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Hiasi undangan digitalmu dengan musik favoritmu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>Hitung Mundur</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Hitung mundur sebagai pengingat waktu acaramu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>Galeri Foto</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Bagikan momen spesialmu dengan tamu undanganmu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>RSVP & Ucapan</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Konfirmasi kehadiran tamu & Tamu memberi ucapan kepada kamu
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 w-100">
                        <div class="card-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                <path
                                    d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                            </svg>
                            <h3 class="card-title py-3"><strong>Amplop digital</strong></h3>
                            <p class="card-text h5 text-secondary">
                                Tamu dapat langsung memberikan amplop ke rekeningmu
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <section>
        <article class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card border-0 w-75">
                        <div class="card-body text-center align-content-center">
                            <h5 class="h1 py-3">Pilihan tema</h5>
                            <p class="card-text h5">pilih tema siap digunakan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 py-5">
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0">
                        <img src="http://halalinkamu.com/storage/images/theme1.png" alt="img"
                            class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title py-3"><strong>Tema 001</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0">
                        <img src="http://halalinkamu.com/storage/images/theme1.png" alt="img"
                            class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title py-3"><strong>Tema 001</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0">
                        <img src="http://halalinkamu.com/storage/images/theme1.png" alt="img"
                            class="card-img-top">
                        <div class="card-body text-center">
                            <h3 class="card-title py-3"><strong>Tema 001</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <section>
        <article class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card border-0 w-75">
                        <div class="card-body text-center align-content-center">
                            <h5 class="h1 py-3">Harga Terjangkau</h5>
                            <p class="card-text h5">pilih paket sesuai kebutuhanmu
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 py-5">
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 shadow w-100 rounded">
                        <div class="card-body text-center">
                            <h2 class="card-title py-3 bg-dark text-light rounded"><strong>SILVER</strong></h2>
                            <h2 class="card-title text-green"><strong>Rp. 50.000,-</strong></h2>
                            <ul class="list-group list-group-flush px-5 py-3">
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                            </ul>
                            <a href="#" class="btn btn-dark p-3 my-5">
                                <span class="h3">Pesan sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 shadow w-100 rounded bg-green">
                        <div class="card-body text-center">
                            <h2 class="card-title py-3"><strong>BEST SELLER</strong></h2>
                            <h2 class="card-title py-3 bg-dark text-light rounded"><strong>GOLD</strong></h2>
                            <h2 class="card-title text-light"><strong>Rp. 115.000,-</strong></h2>
                            <ul class="list-group list-group-flush px-5 py-3">
                                <li class="list-group-item h5 bg-green text-light">An item</li>
                                <li class="list-group-item h5 bg-green text-light">A second item</li>
                                <li class="list-group-item h5 bg-green text-light">A third item</li>
                                <li class="list-group-item h5 bg-green text-light">An item</li>
                                <li class="list-group-item h5 bg-green text-light">A second item</li>
                                <li class="list-group-item h5 bg-green text-light">A third item</li>
                                <li class="list-group-item h5 bg-green text-light">An item</li>
                                <li class="list-group-item h5 bg-green text-light">A second item</li>
                                <li class="list-group-item h5 bg-green text-light">A third item</li>
                                <li class="list-group-item h5 bg-green text-light">An item</li>
                                <li class="list-group-item h5 bg-green text-light">A second item</li>
                                <li class="list-group-item h5 bg-green text-light">A third item</li>
                                <li class="list-group-item h5 bg-green text-light">An item</li>
                                <li class="list-group-item h5 bg-green text-light">A second item</li>
                                <li class="list-group-item h5 bg-green text-light">A third item</li>
                            </ul>
                            <a href="#" class="btn btn-dark p-3 my-5">
                                <span class="h3">Pesan sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col py-2 d-flex justify-content-center">
                    <div class="card border-0 shadow w-100 rounded">
                        <div class="card-body text-center">
                            <h2 class="card-title py-3 bg-dark text-light rounded"><strong>DIAMOND</strong></h2>
                            <h2 class="card-title text-green"><strong>Rp. 150.000,-</strong></h2>
                            <ul class="list-group list-group-flush px-5 py-3">
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                                <li class="list-group-item h5">An item</li>
                                <li class="list-group-item h5">A second item</li>
                                <li class="list-group-item h5">A third item</li>
                            </ul>
                            <a href="#" class="btn btn-dark p-3 my-5">
                                <span class="h3">Pesan sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <footer class="bg-dark">
        <article class="container">
            <div class="row">
                <div class="col-sm-6 d-flex align-items-center">
                    <div class="card bg-dark text-light py-5">
                        <p class="h4">copyright @ by lorem</p>
                    </div>
                </div>
            </div>
        </article>
    </footer>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
