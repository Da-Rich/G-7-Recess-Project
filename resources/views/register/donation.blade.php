@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="title">{{ __('Register Donnation') }}</h5>
    </div>
    <form method="post" action="{{ route('registerDonation') }}" autocomplete="off">
        <div class="card-body">
            @csrf


            <div class="form-group">
                <label>{{ __('Donor Name') }}</label>
                <input type="text" name="donor_name" class="form-control" placeholder="{{ __('Name of Donor') }}" value="" required>

            </div>

            <div class="form-group">
                <label>{{ __('Amount(UGX)') }}</label>
                <input type="text" name="amount" class="form-control" placeholder="{{ __('UGX 1000000') }}" value="" required>

            </div>
            <div class="form-group">
                <label>{{ __('Date') }}</label>
                <input type="date" name="date" class="form-control" placeholder="{{ __('Select') }}" value="" required>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-fill btn-primary">{{ __('Register') }}</button>
        </div>
    </form>
</div>

@endsection
