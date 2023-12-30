@extends('layouts.app')

@section('content')
    <div class="page-dynamic-section">
        <div class="container">

            <div class="extra-erorr-message d-none"></div>

            <div clsas="card">
                <div class="card-body mb-2">

                </div>


                <div class="card-body @if($voters->count() == 0) d-none @endif" id="voterDataGrid">
                    <div class="row">
                        @foreach ($voters as $voterIndex => $voter)
                            <div class="col-md-4 mb-2">

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("onPageJS")
    <script>
        $(document).ready(function () {
            $(document).on('click', ".datatable-pagination .pagination .page-item a", function () {
                event.preventDefault();
                parameterString = parameterGenerate();
                var paginationiteUrl = $(this).attr('href');
                var paginationUrlArray = paginationiteUrl.split("?");

                var paginationParameter = (parameterString == null) ? paginationUrlArray[1] : parameterString + "&" + paginationUrlArray[1];

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
