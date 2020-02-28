@extends('layouts.app')

@section('title')
    Accounts - {{ $accounts->currentPage() }} page
@endsection

@section('content')
    <div class="card-columns">
        @foreach ($accounts as $account)
        @include('accounts.account-card', ['account' => $account])
        @endforeach
    </div>

    {{ $accounts->links('vendor.pagination.bootstrap-4') }}

    <a href="{{ route('accountCreationForm') }}"
        class="btn btn-success add-account-button"
        data-toggle="tooltip"
        data-placement="left"
        title="Create new account">

        <i class="fas fa-plus"></i>
    </a>
@endsection
