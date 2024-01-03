@extends('layouts.app')

@section('content')
    <div class="page-dynamic-section">
        <section id="hero" class="hero">
            <img src="{{ asset('upload/hero-bg.webp') }}">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2>ভোটার তথ্য অনুসন্ধান</h2>
                        <p>বিস্তারিত তথ্য জানার জন্য ভোটার  আপনার আইডি নাম্বারের মাধ্যমে অনুসন্ধান করুন</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-12 mb-2">
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control mb-2" id="nameInput" name="name" placeholder="ভোটারের নাম: (ভোটার আইডি কার্ডে যেভাবে লিখিত)">
                                    <input type="text" class="form-control mb-2" id="fatherNameInput" name="father_name" placeholder="পিতার নাম: (ভোটার আইডি কার্ডে যেভাবে লিখিত)">
                                    <input type="text" class="form-control mb-2" id="motherNameInput" name="mother_name" placeholder="মায়ের নাম: (ভোটার আইডি কার্ডে যেভাবে লিখিত)">
                                    <button type="button" class="btn btn-sm btn-success" id="searchVoterButton">
                                        <i class="fa-solid fa-magnifying-glass"></i> অনুসন্ধান
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-12 @if(! ( $voters) ) mb-2 d-none @endif" id="voterDataGrid">
                                @include("utility.status messages")

                                <div class="extra-erorr-message d-none"></div>

                                <div id="votersMainDataGrid">
                                    @if ( !$voters )
                                        <div class=" d-flex justify-content-center text-warning">
                                            <p>এই ভোটার নম্বর ব্যবহার করে কোনো ভোটার খুঁজে পাওয়া যায়নি।</p>
                                        </div>
                                    @endif

                                    @if ($voters)
                                        <div class="card">
                                            @foreach ($voters as $voter)
                                                <div class="card-body mb-2">
                                                    <h5 class="card-title">{{ $voter->name }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-body-secondary">ভোটার নং : {{ $voter->voter_no }}</h6>
                                                    <h6 class="card-subtitle mb-2 text-body-secondary">ভোটার স্লিপ: {{ $voter->voter_slip }}</h6>
                                                    <ul class="list-group list-group-flush">

                                                        @if ($voter->date_of_birth)
                                                            <li class="list-group-item"><b>জন্ম তারিখ :</b> {{ $voter->date_of_birth }}</li>
                                                        @endif

                                                        @if ($voter->gender)
                                                            <li class="list-group-item"><b>লিঙ্গ :</b> {{  $voter->gender }}</li>
                                                        @endif

                                                        @if ($voter->father_name)
                                                            <li class="list-group-item"><b>পিতার নাম :</b> {{  $voter->father_name }}</li>
                                                        @endif

                                                        @if ($voter->mother_name)
                                                            <li class="list-group-item"><b>মায়ের নাম :</b> {{  $voter->mother_name }}</li>
                                                        @endif

                                                        @if ($voter->upazilla)
                                                            <li class="list-group-item"><b>উপজেলা :</b> {{  $voter->upazilla }}</li>
                                                        @endif

                                                        @if ($voter->union)
                                                            <li class="list-group-item"><b>ইউনিয়ন :</b> {{ $voter->union }}</li>
                                                        @endif

                                                        @if ($voter->profession)
                                                            <li class="list-group-item"><b>পেশা :</b> {{ $voter->profession }}</li>
                                                        @endif

                                                        @if ($voter->address)
                                                            <li class="list-group-item"><b>ভোটার ঠিকানা :</b> {{ $voter->address }}</li>
                                                        @endif

                                                        @if ($voter->vote_center)
                                                            <li class="list-group-item"><b>ভোট কেন্দ্র :</b> {{ $voter->vote_center }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about">
            <div class="container">
                <div class="row align-items-xl-center gy-5">
                    <div class="col-xl-5 content">
                        <h2>এক নজরে মাগুরা-১ আসন</h2>
                        <p>মাগুরা-১ আসন মাগুরা জেলার শ্রীপুর উপজেলা, মাগুরা সদর উপজেলা ( শত্রুজিৎপুর ইউনিয়ন, গোপালগ্রাম ইউনিয়ন, কুচিয়ামোড়া ইউনিয়ন, বেইরল পলিতা ইউনিয়ন ব্যতীত) নিয়ে গঠিত।</p>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6">
                                <div class="icon-box">
                                    <i class="bi bi-people"></i>
                                    <h3>মোট ভোটার</h3>
                                    <p>৪,০০,৪৯১</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="icon-box">
                                    <i class="bi bi-gender-male"></i>
                                    <h3>পুরুষ ভোটার</h3>
                                    <p>২,০০,৮৬৩</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="icon-box">
                                    <i class="bi bi-gender-female"></i>
                                    <h3>নারী ভোটার</h3>
                                    <p>১,৯৯,৬২৬</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="icon-box">
                                    <i class="bi bi-gender-trans"></i>
                                    <h3>হিজড়া ভোটার</h3>
                                    <p>২</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio">

            <div class="container section-title">
                <h2>ফটো গ্যালারী</h2>
                <p>দ্বাদশ জাতীয় সংসদ নির্বাচনে বাংলাদেশ আওয়ামীলীগ মনোনীত প্রার্থী জনাব সাকিব আল হাসানকে নৌকা মার্কায় মাগুরা-১ আসনে সকল ভোটার ও সর্বস্তরের জনগণকে নৌকা মার্কায় ভোট দিয়ে জয়যুক্ত করুন।</p>
            </div>

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 isotope-container">
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-3.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-3.webp') }}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-2.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-2.webp') }}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-1.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-1.webp') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-4.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-4.webp') }}" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-5.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-5.webp') }}" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-6.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-6.webp') }}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-7.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-7.webp') }}" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-8.webp') }}" class="img-fluid" alt="" loading="lazy">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-8.webp') }}" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection

@push("onPageCSS")
    <style>
        .page-dynamic-section #voterDataGrid{
            min-height: 200px;
        }
    </style>
@endpush

@push("onPageJS")

    <script>
        $(document).ready(function () {
            $(document).on('click', ".page-dynamic-section #searchVoterButton", function () {
                var nameInput = $(".page-dynamic-section #nameInput").val();
                var fatherNameInput = $(".page-dynamic-section #fatherNameInput").val();
                var motherNameInput = $(".page-dynamic-section #motherNameInput").val();
                if( (nameInput.length > 0) && (fatherNameInput.length > 0) & (motherNameInput.length > 0)){
                    dataTableLoad(parameterGenerate());
                }
                if( ! ((nameInput.length > 0) && (fatherNameInput.length > 0) & (motherNameInput.length > 0)) ){
                    extraErrorMessage("নিজের নাম,পিতার নাম,মায়ের নাম লিখুন|")
                }
            });
        });

        function parameterGenerate(){
            var parameterString = null;
            $.each( [
                "nameInput",
                "fatherNameInput",
                "motherNameInput",
            ], function( key, perInput ) {
                if(($("#" + perInput).val().length > 0)){
                    var inputFieldValue = $("#" + perInput).val();
                    var inputFieldName = $("#" + perInput).attr('name');
                    var curentParameterString = inputFieldName + "=" + inputFieldValue;
                    parameterString = (parameterString == null) ? curentParameterString : parameterString + "&" + curentParameterString;
                }
            });
            return parameterString;
        }

        function dataTableLoad(parameterString){
            $.ajax({
                type: "get",
                url: "{{ route('home') }}" + "?" + parameterString,
                success: function(result) {
                    $(".page-dynamic-section .extra-erorr-message").addClass('d-none');
                    $(".page-dynamic-section .extra-erorr-message").html("");

                    $(".page-dynamic-section #voterDataGrid").removeClass('d-none');
                    $(".page-dynamic-section #voterDataGrid #votersMainDataGrid").html($(result).find(".page-dynamic-section #voterDataGrid #votersMainDataGrid").html());
                },
                error: function(errorResponse) {
                    extraErrorMessage(["Error " + errorResponse.status,errorResponse.statusText]);
                }
            });
        }

        function extraErrorMessage(errorMessage){
            var errorHtml = '';
            errorHtml = errorHtml + '<div class="alert-messages alert alert-danger pb-0" role="alert">';
                errorHtml = errorHtml + '<div class="row">';
                    errorHtml = errorHtml + '<div class="col-11 col-lg-11 col-md-11 col-sm-11 ">';
                        errorHtml = errorHtml + '<p>'+errorMessage+'</p>';
                    errorHtml = errorHtml + '</div>';

                    errorHtml = errorHtml + '<div class="p-1 col-1 col-lg-1 col-md-1 col-sm-1">';
                        errorHtml = errorHtml + '<button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    errorHtml = errorHtml + '</div>';
                errorHtml = errorHtml + '</div>';
            errorHtml = errorHtml + '</div>';

            $(".page-dynamic-section .extra-erorr-message").removeClass('d-none');
            $(".page-dynamic-section .extra-erorr-message").append(errorHtml);
        }
    </script>
@endpush
