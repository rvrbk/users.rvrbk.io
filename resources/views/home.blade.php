@extends('body')

@section('content')
    <section class="social-wrapper">
        <h1>click to retrieve your credentials</h1>
        <ul class="no-list social-icons">
            <li><a title="Register with Github" href="{{ url('auth/github') }}"><img src="{{ asset('px/GitHub-Mark-64px.png') }}"></a></li>
            <li><a title="Register with Github" href="{{ url('auth/linkedin') }}"><img src="{{ asset('px/linkedin.png') }}"></a></li>
        </ul>
    </section>
    @if(isset($credentials))
    <section class="code-wrapper">
        <code>
        "grant_type": "client_credentials",<br>
        "scope": "*",<br>
        "client_id": "{{ $credentials['client_id'] }}",<br>
        "client_secret": "{{ $credentials['client_secret'] }}"<br>
        </code>
    </section>
    <section class="download-wrapper">
        <a href="{{ url('download/' . $credentials['client_id']) }}" title="Download your credentials">download</a>
    </section>
    @endif
@endsection