@extends('home')
@section('content')
<router-view :key="$route.path"/>
@endsection