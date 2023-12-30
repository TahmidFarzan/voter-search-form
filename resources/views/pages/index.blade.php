@extends('layouts.app')

@section('content')
    <div class="page-dynamic-section">
        <section id="hero" class="hero">
            <img src="{{ asset('upload/hero-bg.jpg') }}" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">ভোটার তথ্য অনুসন্ধান</h2>
                        <p data-aos="fade-up" data-aos-delay="200">বিস্তারিত তথ্য জানার জন্য ভোটার  আপনার আইডি নাম্বারের মাধ্যমে অনুসন্ধান করুন</p>
                    </div>
                    <div class="col-lg-5">
                        <div class="row height d-flex justify-content-center align-items-center">
                            <div class="col-md-12 mb-2">
                                <div class="search">
                                    <i class="fa fa-search"></i>
                                    <input type="text" class="form-control" id="searchInput" name="search" placeholder="অনুসন্ধান: ভোটার নং">
                                    <button type="button" class="btn btn-sm btn-success" id="searchVoterButton">
                                        <i class="fa-solid fa-magnifying-glass"></i> অনুসন্ধান
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-12 @if(! ( $voterInfo) ) mb-2 d-none @endif" id="voterDataGrid">
                                @include("utility.status messages")

                                <div class="extra-erorr-message d-none"></div>

                                @if ($voterInfo)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $voterInfo->name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $voterInfo->no }}</h6>
                                            <ul class="list-group list-group-flush">
                                                @if ($voterInfo->date_of_birth)
                                                    <li class="list-group-item"><b>জন্ম তারিখ :</b> {{ $voterInfo->date_of_birth }}</li>
                                                @endif

                                                @if ($voterInfo->gender)
                                                    <li class="list-group-item"><b>লিঙ্গ :</b> {{  $voterInfo->gender }}</li>
                                                @endif

                                                @if ($voterInfo->father_name)
                                                    <li class="list-group-item"><b>পিতার নাম :</b> {{  $voterInfo->father_name }}</li>
                                                @endif

                                                @if ($voterInfo->mother_name)
                                                    <li class="list-group-item"><b>মায়ের নাম :</b> {{  $voterInfo->mother_name }}</li>
                                                @endif

                                                @if ($voterInfo->upazilla)
                                                    <li class="list-group-item"><b>উপজেলা :</b> {{  $voterInfo->upazilla }}</li>
                                                @endif

                                                @if ($voterInfo->union)
                                                    <li class="list-group-item"><b>ইউনিয়ন :</b> {{ $voterInfo->union }}</li>
                                                @endif

                                                @if ($voterInfo->profession)
                                                    <li class="list-group-item"><b>পেশা :</b> {{ $voterInfo->profession }}</li>
                                                @endif

                                                @if ($voterInfo->address)
                                                    <li class="list-group-item"><b>ঠিকানা :</b> {{ $voterInfo->address }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if ( !$voterInfo )
                                    <div class=" d-flex justify-content-center text-warning">
                                        <p>এই ভোটার নম্বর ব্যবহার করে কোনো ভোটার খুঁজে পাওয়া যায়নি।</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">
                    <div class="col-xl-5 content">
                        <h2>এক নজরে মাগুরা-১ আসন</h2>
                        <p>মাগুরা-১ আসন মাগুরা জেলার শ্রীপুর উপজেলা, মাগুরা সদর উপজেলা ( শত্রুজিৎপুর ইউনিয়ন, গোপালগ্রাম ইউনিয়ন, কুচিয়ামোড়া ইউনিয়ন, বেইরল পলিতা ইউনিয়ন ব্যতীত) নিয়ে গঠিত।</p>
                    </div>

                    <div class="col-xl-7">
                        <div class="row gy-4 icon-boxes">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box">
                                    <i class="bi bi-people"></i>
                                    <h3>মোট ভোটার</h3>
                                    <p>৪,০০,৪৯১</p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-gender-male"></i>
                                    <h3>পুরুষ ভোটার</h3>
                                    <p>২,০০,৮৬৩</p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-gender-female"></i>
                                    <h3>নারী ভোটার</h3>
                                    <p>১,৯৯,৬২৬</p>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
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

            <div class="container section-title" data-aos="fade-up">
                <h2>ফটো গ্যালারী</h2>
                <p>দ্বাদশ জাতীয় সংসদ নির্বাচনে বাংলাদেশ আওয়ামীলীগ মনোনীত প্রার্থী জনাব সাকিব আল হাসানকে নৌকা মার্কায় মাগুরা-১ আসনে সকল ভোটার ও সর্বস্তরের জনগণকে নৌকা মার্কায় ভোট দিয়ে জয়যুক্ত করুন।</p>
            </div>

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-1.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-1.jpg') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-2.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-2.jpg') }}" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-3.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-3.jpg') }}" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-4.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-4.jpg') }}" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-5.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-5.jpg') }}" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-6.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-6.jpg') }}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-7.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-7.jpg') }}" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-8.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-8.jpg') }}" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <img src="{{ asset('upload/masonry-portfolio/masonry-portfolio-9.jpg') }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <a href="{{ asset('upload/masonry-portfolio/masonry-portfolio-9.jpg') }}" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
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
                var search = $(".page-dynamic-section #searchInput").val();
                if(search.length > 0){
                    dataTableLoad(parameterGenerate());
                }
                if(search.length == 0){
                    extraErrorMessage("ভোটার নম্বর লিখুন|")
                }
            });
        });

        function parameterGenerate(){
            var parameterString = null;
            $.each( [
                "searchInput",
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
                    $(".page-dynamic-section #voterDataGrid").html($(result).find(".page-dynamic-section #voterDataGrid").html());
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
