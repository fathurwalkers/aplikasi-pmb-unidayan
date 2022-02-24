@extends('layouts.admin-layout')

@section('title', 'Dashboard')

@section('content-header', 'Index Page')

@section('content-body')
    <div class="card">
        <div class="card-body">
            <h1>Index Page</h1>
            <p>
                <livewire:dashboard-data-mahasiswa />
            </p>
        </div>
    </div>
@endsection
