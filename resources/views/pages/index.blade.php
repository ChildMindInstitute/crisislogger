@extends('layout.app')
@section('title', 'Home')
@section('description', '')
@section('content')

    <div class="container content">
        <div class="text-center">
            <div class="overlay">
                <img src="{{ asset('media/photos/man-in-white-long-sleeve-shirt-sitting-beside-woman-in-white-3995913.jpg') }}" alt="{{ config('app.name') }}" />
            </div>

            <h1 class="display-1">Parent Logger</h1>
            <h3>Nullam id posuere nisl. Duis a pretium dolor, quis volutpat dolor.</h3>
            <p class="lead">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam suscipit, odio eget efficitur tempus, diam magna bibendum massa, ac volutpat sapien dui at neque.</p>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eleifend, ante a aliquam egestas, mi dolor convallis nibh, ac auctor urna felis nec lorem. Pellentesque mollis metus eu sollicitudin cursus. Aenean pharetra quam id hendrerit convallis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam suscipit, odio eget efficitur tempus, diam magna bibendum massa, ac volutpat sapien dui at neque. Donec auctor mauris nulla, et iaculis elit pulvinar ac. Sed eu iaculis lacus. Aenean egestas et mauris a sagittis. Quisque urna metus, volutpat non dictum id, consequat non diam. Quisque semper condimentum mauris quis fermentum. Aliquam nec vulputate mauris. Pellentesque elit nisi, tempor quis elit eu, sagittis dapibus justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus commodo quam vitae urna aliquam bibendum.</p>
        <a href="{{ route('capture') }}" class="btn-primary btn btn-wide">Capture Your Thoughts</a>
    </div>

@endsection
