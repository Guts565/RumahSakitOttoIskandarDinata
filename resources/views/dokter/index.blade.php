<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Dokter</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href="/css/style.css" rel="stylesheet">
    <script src="/js/animation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="flex w-screen h-screen antialiased">
    <!-- Carousel -->
    <div class="swiper custom-hidden-slide flex flex-col item-center justify-center h-screen w-screen overflow-y-auto">
        {{-- <div class="swiper-wrapper h-64 sm:h-72 md:h-96 lg:h-[800px]"> --}}
        <div class="swiper-wrapper">
            <!-- Slide 1: Profile Dokter -->
            <div class="swiper-slide flex items-center justify-center h-full w-full text-center" id="slide-doctor">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 flex gap-8 text-center w-screen" id="doctor-grid">
                    <!-- JS will inject data here -->
                </div>
            </div>

            <!-- Slide 2: Alur Pendaftaran -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/carousel/' . $carousels->slide2) }}" class="w-full h-full object-fit "
                    alt="Alur Pendaftaran">
            </div>

            <!-- Slide 3: FAQ -->
            <div class="swiper-slide">
                <img src="{{ asset('storage/carousel/' . $carousels->slide3) }}" class="w-full h-full object-fit "
                    alt="FAQ">
            </div>
        </div>

        <!-- If we need pagination -->
        {{-- <div class="swiper-pagination "></div> --}}

        <!-- If we need navigation buttons -->
        {{-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"> --}}
    </script>
    <script>
        const doctors = @json($semuaDokter);
        const polis = @json($polis);
        const assetPath = "{{ asset('storage/images/') }}"; // Set asset path for images
    </script>
    {{-- <script src="/js/datatables.js"></script> --}}
    <script src="/js/swiper.js"></script>
</body>

</html>
