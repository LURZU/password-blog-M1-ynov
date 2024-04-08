@extends('dashboard.index')

@section('title', 'Password Manage Clients')
@section('content')
    <div>
        @livewire('password.category-clients-component', ['categoryId' => $categoryId])
    </div>
@endsection
