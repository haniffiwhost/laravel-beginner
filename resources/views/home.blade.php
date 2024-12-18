<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Blade Page</title>
</head>
<body>
    <h1>Welcome to Laravel Blade!</h1>
    <p>Hello, {{ $name ?? 'Guest' }}!</p> <!- - Passing data to the view -- >
</body>
</html> -->




@extends('layouts.app') <!-- Use the layout -->

@section('title', 'Home Page') <!-- Set page title -->

@section('content') <!-- Fill in the content section -->
I see
<x-alert type="success">
    This is a success message!
</x-alert>

    <h2>This is the home page content</h2>
    <p>Hello, {{ $name }}!</p>
@endsection

