@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{Auth::user()->orders}} --}}
                    {{-- {{Auth::user()->name}}<br> --}}
                    {{-- {{App\Product::all()}} --}}

                    <div class="showcase">
                      @component('components.who')
                      @endcomponent
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
