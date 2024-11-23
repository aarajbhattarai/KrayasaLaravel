@extends('vendor::layouts.master')

@section('content')
<form method="POST" action="{{ route('vendor.register.submit') }}">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>
@endsection