@extends('vendor::layouts.master')

@section('content')
<form method="POST" action="{{ route('vendor.login.submit') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form>
@endsection