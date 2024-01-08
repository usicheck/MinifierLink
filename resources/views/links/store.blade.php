@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Short Link Result') }}</div>
                <div class="card-body">
                    <p class="mb-2"><strong>Original Link:</strong> {{ $original_link }}</p>
                    <p class="mb-2"><strong>Short Link:</strong>
                        <a href="{{ route('click.redirect', compact('short_link')) }}" target="_blank">
                            {{ route('click.redirect', compact('short_link')) }} </a>

                    </p>
                    <p class="mb-2"><strong>Expiration Date:</strong> {{ $expiration_date }}</p>
                    <p class="mb-2"><strong>Click Count:</strong> {{ $click_count }}</p>
                    <p><a href="{{ redirect()->back()->getTargetUrl() }}">Back to Previous Page</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

