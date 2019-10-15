@extends('body')

@section('content')
    <section class="social-wrapper">
        <h1>click to retrieve your credentials</h1>
        <ul class="no-list social-icons">
            <li>
                <a title="Register with Github" href="{{ url('auth/github') }}"><img src="{{ asset('px/GitHub-Mark-64px.png') }}"></a>
            </li>
        </ul>
    </section>
    <section class="code-wrapper">
        <code>
        "grant_type": "client_credentials",<br>
        "scope": "*",<br>
        "client_id": "{client_id}",<br>
        "client_secret": "{client_secret}"<br>
        </code>
    </section>
@endsection