@if(session()->has('success_message'))
    <section class="content-header">
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
            {{session('success_message')}}
        </div>
    </section>
@endif
@if(session()->has('error_message'))
    <section class="content-header">
        <div class="alert alert-success alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            {!! session() ->get('error_message')!!}
        </div>
    </section>
@endif


{{--@if(session('success_message'))--}}
{{--    <div class="alert alert-success" role="alert">--}}
{{--        {{session('success_message')}}--}}
{{--    </div>--}}

{{--@elseif(session('error_message'))--}}
{{--    <div class="alert alert-danger" role="alert">--}}
{{--        {{session('error_message')}}--}}
{{--    </div>--}}
{{--@endif--}}
