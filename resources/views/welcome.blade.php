@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center pt-16 pb-32 relative">
        <!-- Animated Elements -->
        <div class="absolute top-20 left-10 floating floating-1">
            <div class="w-16 h-16 rounded-full bg-accent opacity-20"></div>
        </div>
        <div class="absolute bottom-40 right-20 floating floating-2">
            <div class="w-24 h-24 rounded-full bg-secondary opacity-15"></div>
        </div>
        <div class="absolute top-1/3 right-1/4 pulse-slow">
            <div class="w-8 h-8 rounded-full bg-white opacity-30"></div>
        </div>

        <div class="container mx-auto px-4 z-10">
            <div class="flex justify-end mb-4">
                @auth
                    <a href="{{ route('login') }}"
                        class="bg-accent hover:bg-yellow-500 text-primary font-bold py-2 px-6 rounded-full transition duration-300 transform hover:scale-105 shadow">
                        Dashboard <i class="ml-2 fas fa-tachometer-alt"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white border-2 border-primary text-primary font-bold py-2 px-6 rounded-full transition hover:bg-primary hover:text-white">
                        Masuk <i class="ml-2 fas fa-sign-in-alt"></i>
                    </a>
                @endauth
            </div>
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="hero-content">
                    <div class="mb-6">
                        <div
                            class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 rounded-full backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-secondary mr-2 animate-pulse"></span>
                            <span class="text-white text-sm font-medium">Sistem Pelayanan Terintegrasi</span>
                        </div>
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        <span class="block">Inovasi Pelayanan</span>
                        <span class="text-accent">DPMPTSP Jawa Timur</span>
                    </h1>


                    <p class="text-xl text-white text-opacity-90 mb-8 max-w-xl">
                        Sistem Tracking Dokumen Perizinan Real-time untuk meningkatkan transparansi dan percepatan
                        pelayanan
                        publik di Jawa Timur.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#"
                            class="bg-accent hover:bg-yellow-500 text-primary font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                            Lacak Dokumen <i class="ml-2 fas fa-search"></i>
                        </a>
                        <a href="#"
                            class="bg-transparent border-2 border-white hover:bg-white hover:text-primary text-white font-bold py-3 px-8 rounded-full transition duration-300">
                            Pelayanan Kami <i class="ml-2 fas fa-arrow-right"></i>
                        </a>

                    </div>
                </div>

                <div class="relative">
                    <!-- API Integration Placeholder -->
                    <div class="bg-white rounded-3xl shadow-2xl p-6 border-8 border-white">
                        <h3 class="text-xl font-bold text-primary mb-4">Statistik Pelayanan Hari Ini</h3>
                        <div class="grid grid-cols-2 gap-4" id="apiStats">
                            <div class="bg-gray-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-primary counter" data-target="100">0</div>
                                <div class="text-sm text-gray-600">Pengajuan Baru</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-primary counter" data-target="20">0</div>
                                <div class="text-sm text-gray-600">Disetujui</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-primary counter" data-target="60">0</div>
                                <div class="text-sm text-gray-600">Dalam Proses</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg text-center">
                                <div class="text-3xl font-bold text-primary counter" data-target="5">0</div>
                                <div class="text-sm text-gray-600">Selesai</div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-accent rounded-full opacity-20 z-0 floating"></div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-secondary rounded-full opacity-20 z-0 floating"
                        style="animation-delay: 1.5s"></div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="wave-divider">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Solusi Digital Terpadu</h2>
                <p class="text-xl text-gray-600">Mengubah pelayanan perizinan menjadi lebih efisien, transparan, dan
                    akuntabel</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white rounded-2xl shadow-lg p-8 card-hover border-t-4 border-primary">
                    <div class="w-16 h-16 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-search-location text-3xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-4">Pelacakan Real-time</h3>
                    <p class="text-gray-600 mb-4">Pantau perkembangan dokumen perizinan Anda secara real-time dari mana saja
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Update otomatis setiap tahapan</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Estimasi waktu penyelesaian</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Riwayat lengkap proses</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white rounded-2xl shadow-lg p-8 card-hover border-t-4 border-secondary">
                    <div class="w-16 h-16 bg-secondary bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-bolt text-3xl text-secondary"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-4">Proses Cepat</h3>
                    <p class="text-gray-600 mb-4">Percepatan proses perizinan dengan sistem terintegrasi</p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Otomatisasi alur kerja</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Peringatan tenggat waktu</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Pengurangan birokrasi</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white rounded-2xl shadow-lg p-8 card-hover border-t-4 border-accent">
                    <div class="w-16 h-16 bg-accent bg-opacity-10 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-3xl text-accent"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary mb-4">Keamanan Data</h3>
                    <p class="text-gray-600 mb-4">Keamanan dokumen dan data terjamin dengan sistem terkini</p>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Enkripsi data tingkat tinggi</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Backup harian otomatis</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-secondary mr-2"></i>
                            <span>Audit trail lengkap</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Alur Pelacakan Dokumen</h2>
                <p class="text-xl text-gray-600">Transparansi penuh dalam setiap tahapan proses perizinan</p>
            </div>

            <div class="relative max-w-4xl mx-auto">
                <!-- Timeline Line -->
                <div class="absolute left-8 top-0 bottom-0 w-1 bg-primary bg-opacity-20 transform translate-x-1"></div>

                <div class="space-y-12 pl-16">
                    <!-- Step 1 -->
                    <div class="relative">
                        <div class="timeline-dot">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-primary">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">
                                        <span class="text-primary font-bold">1</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-primary">Pengajuan Dokumen</h3>
                                </div>
                                <p class="text-gray-600">Dokumen diajukan melalui sistem dan diverifikasi kelengkapan
                                    persyaratan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative">
                        <div class="timeline-dot">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-secondary">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-secondary bg-opacity-10 flex items-center justify-center mr-4">
                                        <span class="text-secondary font-bold">2</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-primary">Verifikasi Administrasi</h3>
                                </div>
                                <p class="text-gray-600">Tim administrasi melakukan validasi data dan dokumen pendukung</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative">
                        <div class="timeline-dot">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-accent">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-accent bg-opacity-10 flex items-center justify-center mr-4">
                                        <span class="text-accent font-bold">3</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-primary">Proses Teknis</h3>
                                </div>
                                <p class="text-gray-600">Dokumen diproses oleh dinas teknis terkait sesuai bidang perizinan
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative">
                        <div class="timeline-dot">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-primary">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-primary bg-opacity-10 flex items-center justify-center mr-4">
                                        <span class="text-primary font-bold">4</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-primary">Persetujuan</h3>
                                </div>
                                <p class="text-gray-600">Dokumen disetujui oleh pejabat berwenang dan siap diterbitkan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative">
                        <div class="timeline-dot">
                            <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-secondary">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-10 h-10 rounded-full bg-secondary bg-opacity-10 flex items-center justify-center mr-4">
                                        <span class="text-secondary font-bold">5</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-primary">Penerbitan & Pengambilan</h3>
                                </div>
                                <p class="text-gray-600">Dokumen diterbitkan secara digital/fisik dan siap diambil pemohon
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tracking Section -->
    <section class="py-20 bg-primary bg-opacity-5">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-1/2 bg-primary p-12 text-white">
                        <h2 class="text-3xl font-bold mb-4">Lacak Dokumen Anda</h2>
                        <p class="mb-6">Masukkan nomor tracking untuk mengetahui status terkini pengajuan perizinan Anda.
                        </p>

                        <div class="flex items-start mb-6">
                            <div class="mr-4 mt-1">
                                <i class="fas fa-info-circle text-accent text-xl"></i>
                            </div>
                            <p>Nomor tracking dapat ditemukan di bukti pengajuan atau melalui email/SMS.</p>
                        </div>

                        <div class="flex items-center">
                            <div class="mr-4">
                                <i class="fas fa-qrcode text-4xl text-accent"></i>
                            </div>
                            <p>Scan QR code pada bukti pengajuan untuk lacak otomatis</p>
                        </div>
                    </div>

                    <div class="md:w-1/2 p-12">
                        <form action="#" method="GET" class="mb-6">
                            <div class="mb-6">
                                <label for="tracking_number" class="block text-gray-700 font-medium mb-2">Nomor
                                    Tracking</label>
                                <div class="relative">
                                    <input type="text" id="tracking_number" name="tracking_number"
                                        placeholder="DPM-JT-2024-XXXXX"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:border-transparent pr-12"
                                        required>
                                    <div class="absolute right-3 top-3 text-gray-400">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-accent hover:bg-yellow-500 text-primary font-bold py-3 px-4 rounded-lg transition duration-300 shadow-md">
                                Lacak Sekarang
                            </button>
                        </form>

                        <div class="text-center">
                            <p class="text-gray-600 mb-3">Atau lacak dengan metode lain</p>
                            <div class="flex justify-center space-x-4">
                                <button
                                    class="bg-white border border-gray-300 rounded-full p-3 shadow-sm hover:shadow-md transition">
                                    <i class="fas fa-qrcode text-primary text-xl"></i>
                                </button>
                                <button
                                    class="bg-white border border-gray-300 rounded-full p-3 shadow-sm hover:shadow-md transition">
                                    <i class="fas fa-sms text-primary text-xl"></i>
                                </button>
                                <button
                                    class="bg-white border border-gray-300 rounded-full p-3 shadow-sm hover:shadow-md transition">
                                    <i class="fas fa-envelope text-primary text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-darkblue text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="/assets/logo-dpmptsp.png" alt="DPMPTSP Jawa Timur" class="h-16 mb-4">
                    <p class="text-gray-300 mb-4">Jl. Ahmad Yani No. 288, Surabaya, Jawa Timur</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Perizinan Usaha</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Perizinan Bangunan</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Perizinan Lingkungan</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Perizinan Kesehatan</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Perizinan Pendidikan</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Status Permohonan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">E-Layanan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Regulasi</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Kontak Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt text-accent mt-1 mr-3"></i>
                            <span>(031) 8470000</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope text-accent mt-1 mr-3"></i>
                            <span>info@dpmptsp.jatimprov.go.id</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-clock text-accent mt-1 mr-3"></i>
                            <span>Senin - Jumat: 08:00 - 16:00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>© 2024 DPMPTSP Provinsi Jawa Timur. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
@endsection
@push('scripts')
    <script>
        // Fetch API data from DPMPTSP
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://api.dpmptsp.jatimprov.go.id/stats/today')
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll('#apiStats .counter').forEach((counter, index) => {
                        const target = data[index]?.value || 0;
                        counter.setAttribute('data-target', target);

                        // Start counter animation
                        let current = 0;
                        const increment = target / 50;

                        const updateCounter = () => {
                            current += increment;
                            if (current < target) {
                                counter.innerText = Math.ceil(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.innerText = target;
                            }
                        };

                        updateCounter();
                    });
                })
                .catch(error => {
                    console.error('Error fetching API data:', error);
                    // Fallback values
                    const fallbackValues = [12, 8, 15, 20];
                    document.querySelectorAll('#apiStats .counter').forEach((counter, index) => {
                        counter.setAttribute('data-target', fallbackValues[index]);
                    });
                });
        });
    </script>
@endpush
