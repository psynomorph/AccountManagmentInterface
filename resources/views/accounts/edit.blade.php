@extends('layouts.app')

@php
$formUrl = $account->exists ? route('updateAccount', ['id' => $account->id]) : route('createAccount');
@endphp

@section('title')
    @if ($account->exists)
        Edit account {{ $account->firstName }} {{ $account->lastName }}
    @else
        Create new account
    @endif
@endsection

@section('content')
    <form method="POST" action="{{ $formUrl }}">
        {{-- CSRF Token --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-row">
            {{-- First name input group --}}
            <div class="form-group col-md-6">
                <label for="firstName">First name</label>
                <input
                    type="text"
                    name="firstName"
                    id="firstName"
                    required
                    value="{{ $account->firstName }}"
                    class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}"
                    placeholder="First name">

                @if ($errors->has('firstName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('firstName')}}
                    </div>
                @endif
            </div>

            {{-- Last name input group --}}
            <div class="form-group col-md-6">
                <label for="lastName">Last name</label>
                <input
                    type="text"
                    name="lastName"
                    id="lastName"
                    required
                    value="{{ $account->lastName }}"
                    class="form-control {{ $errors->has('lastName') ? 'is-invalid' : '' }}"
                    placeholder="Last name">

                @if ($errors->has('lastName'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lastName')}}
                    </div>
                @endif
            </div>

        </div>

        <div class="form-row">

            {{-- Email input group --}}
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ $account->email }}"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    placeholder="mail@domain.com">

                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email')}}
                    </div>
                @endif
            </div>

            {{-- Company name input group --}}
            <div class="form-group col-md-4">
                <label for="companyName">Company Name</label>
                <input
                    type="text"
                    name="companyName"
                    id="companyName"
                    class="form-control"
                    value="{{ $account->companyName }}"
                    placeholder="Company name">
            </div>

            {{-- Position input group --}}
            <div class="form-group col-md-4">
                <label for="position">Position</label>
                <input
                    type="text"
                    name="position"
                    id="position"
                    class="form-control"
                    value="{{ $account->position }}"
                    placeholder="Position">
            </div>

        </div>

        {{-- Phones input group --}}
        <div class="form-row">

            {{-- First phone input group --}}
            <div class="form-group col-md-4">
                <label for="phone1">Phone 1</label>
                <input
                    type="text"
                    name="phone1"
                    id="phone1"
                    class="form-control"
                    value="{{ $account->phone1 }}"
                    placeholder="Phone number">
            </div>

            {{-- Second phone input group --}}
            <div class="form-group col-md-4">
                <label for="phone2">Phone 2</label>
                <input
                    type="text"
                    name="phone2"
                    id="phone2"
                    class="form-control"
                    value="{{ $account->phone2 }}"
                    placeholder="Phone number">
            </div>

            {{-- Third phone input group --}}
            <div class="form-group col-md-4">
                <label for="phone3">Phone 3</label>
                <input
                    type="text"
                    name="phone3"
                    id="phone3"
                    class="form-control"
                    value="{{ $account->phone3 }}"
                    placeholder="Phone number">
            </div>
        </div>

        {{-- Submit button --}}
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i>
            Save
        </button>
    </form>
@endsection
