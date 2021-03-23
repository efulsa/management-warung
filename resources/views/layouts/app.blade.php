<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials._meta')
    @include('layouts.partials._title')
    @include('layouts.partials._style')
    @include('layouts.partials._title')
</head>

@yield('content')
    @include('layouts.partials._script')
</html>
