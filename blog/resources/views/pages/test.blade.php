@extends('layouts.app')

@section('content')
    <style>


    </style>

    <form action="" method="post">
        <div class="main-content">
        Choose Date:<br>
        <input type='text' class='datepicker-here' data-language='en' />
        </div>
        
    </form>

    <div>
        <input id="toggle-heart" type="checkbox" />
        <label for="toggle-heart">❤</label>
    </div>

@endsection