@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Generate Short URL') }}</div>

                    <div class="card-body">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form id="editURLForm" enctype="multipart/form-data" action="{{ route('links.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="original_link" class="form-label">{{ __('Original URL') }}</label>
                                <textarea class="form-control" id="original_link" name="original_link" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="expiration_date">{{ __('Expiration Date and Time for Short URL') }}</label>
                                <input type="datetime-local" id="expiration_date" name="expiration_date"/>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Generate Short URL') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@push('footer-scripts')--}}
{{--    @vite(['resources/js/modal_create_author.js','resources/js/modal_update_author.js','resources/js/delete_author.js'])--}}
{{--@endpush--}}

