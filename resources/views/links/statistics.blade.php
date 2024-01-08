@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Generate Short URL') }}</div>

                    <div class="card-body">
                        <form id="checkCkickURLForm" enctype="multipart/form-data" action="{{ route('links.showClicks') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="short_link" class="form-label">{{ __('Short URL') }}</label>
                                <textarea class="form-control" id="short_link" name="short_link" rows="3" required></textarea>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Check the clicks') }}</button>
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

