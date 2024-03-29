@extends('Layout.Masterlayout')

@section('title')
    <title>T-Shop</title>
@endsection

@section('content')
    @include('patials.slider')
    <section>
        <div class="container">
            <div class="row">
                @include('patials.sidebar')

                <div class="col-sm-9 padding-right">
                    @include('components.feature_item')
                    @include('components.Category_tab')
                    @include('components.recommended_item')
                </div>
            </div>
        </div>
    </section>

@endsection



