@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ __('Register Hospital') }}</h5>
    </div>
    <form method="post" action="{{ route('registerHospital') }}" autocomplete="off">
        <div class="card-body">
            @csrf


            <div class="form-group">
                <label>{{ __('Hospital Name') }}</label>
                <input type="text" name="hospital_name" class="form-control" placeholder="{{ __('Busesa Hospital') }}" value="" required>

            </div>

            <div class="form-group">
                <label>{{ __('Hospital Category') }}</label>
                <input type="text" name="hospital_category" class="form-control" placeholder="{{ __('General') }}" value="" required>

            </div>
            <div class="form-group">
                <label>{{ __('District') }}</label>
                <input type="text" name="district" class="form-control" placeholder="{{ __('Kampala') }}" value="" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Register') }}</button>
        </div>
    </form>
</div>

@endsection
