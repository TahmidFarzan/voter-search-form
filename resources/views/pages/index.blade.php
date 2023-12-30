@extends('layouts.app')

@section('content')
    <div class="page-dynamic-section">
        <div class="container">

            @include("utility.status messages")

            <div class="extra-erorr-message d-none"></div>

            <div clsas="card">
                <div class="card-body mb-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" id="searchInput" name="search" placeholder="অনুসন্ধান: ভোটার নং">
                        <button type="button" class="btn btn-sm btn-success" id="searchVoterButton">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body @if(! ( $voterInfo) ) d-none @endif" id="voterDataGrid">
                    @if ($voterInfo)
                        <div class="row">
                            <div class="col-md-12">
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
                            </div>
                        </div>
                    @endif

                    @if ( !$voterInfo )
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" d-flex justify-content-center text-warning">
                                    <p>এই ভোটার নম্বর ব্যবহার করে কোনো ভোটার খুঁজে পাওয়া যায়নি।</p>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push("onPageCSS")
    <style>
        .page-dynamic-section .container #voterDataGrid .card{
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
                    $(".page-dynamic-section .container .extra-erorr-message").addClass('d-none');
                    $(".page-dynamic-section .container .extra-erorr-message").html("");

                    $(".page-dynamic-section .container #voterDataGrid").removeClass('d-none');
                    $(".page-dynamic-section .container #voterDataGrid").html($(result).find(".page-dynamic-section .container #voterDataGrid").html());
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

            $(".page-dynamic-section .container .extra-erorr-message").removeClass('d-none');
            $(".page-dynamic-section .container .extra-erorr-message").append(errorHtml);
        }
    </script>
@endpush
