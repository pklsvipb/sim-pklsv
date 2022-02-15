@extends('layouts.app')

@section('content')

@if ($message = Session::get('alert'))
<div id="messageAlert" class="alert alert-primary alert-dismissible text-center">
    <i class="fa fa-check"></i> &nbsp; {{ $message }}
</div>
@endif
<div class="l-form">
    <form action="{{ route('login') }}" method="POST" class="form">
        @csrf
        <h1 class="form__title text-center" style="font-size:18px;">WEB PKL SV</h1>
        <div class="form_div">
            <input type="text" name="username" id="username" class="form__input" placeholder=" ">
            <label for="" class="form__label" style="background-color: #F9FAFC;">Username</label>
        </div>
        <div class="form_div">
            <input type="password" name="password" id="password" class="form__input" placeholder=" ">
            <label for="" class="form__label" style="background-color: #F9FAFC;">Password</label>
        </div>
        <input type="submit" class="form__button" value="Sign In" style="width: 100%;">
    </form>
</div>

@endsection