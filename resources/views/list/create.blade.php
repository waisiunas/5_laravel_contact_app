@extends('layouts.main')
@section('title', 'Add List')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add List</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('lists') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('list.create') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter your name!"
                                        value="{{ old('name')}}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
