@extends('layouts.app')

@section('content')
    <div class="page-dynamic-section">
        <div class="container">

            <div class="extra-erorr-message d-none"></div>

            <div clsas="card">
                <div class="card-body mb-2">

                </div>

                <div class="card-body @if($voters->count() == 0) d-none @endif" id="voterDataGrid">
                    <div class="row @if($voters->hasPages()) mb-2 @endif">
                        @foreach ($voters as $voterIndex => $voter)
                            <div class="col-md-4 mb-2">
                                <div class="card" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $voter->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $voter->no }}</h6>
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
                                                <li class="list-group-item"><b>ঠিকানা :</b> {{ $voter->address }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($voters->hasPages())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-1">
                                    <div class="datatable-pagination">
                                        {{ $voters->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push("onPageJS")
    <script>
        $(document).ready(function () {
            $(document).on('click', ".page-dynamic-section .datatable-pagination .pagination .page-item a", function () {
                event.preventDefault();
                parameterString = parameterGenerate();

                var paginationiteUrl = $(this).attr('href');
                var paginationUrlArray = paginationiteUrl.split("?");

                var paginationParameter = parameterString ? parameterString + "&" + paginationUrlArray[1] : paginationUrlArray[1] ;

                dataTableLoad(paginationParameter);
            });

            $(document).on('click', ".page-dynamic-section #searchVoterButton", function () {
                parameterString = parameterGenerate();
                dataTableLoad(paginationParameter);
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
                    $(".page-dynamic-section .container #voterDataGrid").html($(result).find(".page-dynamic-section #voterDataGrid").html());
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
