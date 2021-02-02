@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ __('Register Officer') }}</h5>
    </div>
    <form method="post" action="{{ route('registerOfficer') }}" autocomplete="off">
        <div class="card-body">
            @csrf


            <div class="form-group">
                <label>{{ __('Officer Name') }}</label>
                <input type="text" name="office_name" class="form-control" placeholder="{{ __('Officer Name') }}" value="" required>

            </div>

            <div class="form-group">
                <label>{{ __('Officer Username') }}</label>
                <input type="text" name="username" class="form-control" placeholder="{{ __('username.') }}" value="" required>

            </div>
            <div class="form-group">
                <label>{{ __('Officer Contact') }}</label>
                <input type="text" name="Email" class="form-control" placeholder="{{ __('example@here.com') }}" value="" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Register') }}</button>
        </div>
    </form>
</div>

@endsection
