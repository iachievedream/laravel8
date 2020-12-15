@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<div align="center">
    <form action="login/sign_in" id = form1 method="post">
    <p>Login</p>
    <table border="1" wedth=200 align="center">
        <tr align="center" >
            <td>account</td>
            <td ><input id="idaccount" type="text" name="account"/></td>
        </tr>
        <tr align="center">
            <td >password</td>
            <td ><input id="idpassword" type="password" name="password"/></td>
        </tr>
        <tr >
            <td colspan="2" align="center"><button id="add_submit" name="submit">送出</button></td>
        </tr>
    </form>
</div>

                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
