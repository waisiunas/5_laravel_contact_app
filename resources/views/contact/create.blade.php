@extends('layouts.main')
@section('title', 'Add Contact')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Contact</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('contacts') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('contact.create') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <x-form.label for="first_name">First Name</x-form.label>
                                        <x-form.input type="text" id="first_name" name="first_name"
                                            placeholder="Enter your first name!" :value="old('first_name')"></x-form.input>
                                        @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.label for="middle_name">Middle Name</x-form.label>
                                        <x-form.input type="text" id="middle_name" name="middle_name"
                                            placeholder="Enter your middle name!" :value="old('middle_name')"></x-form.input>
                                        @error('middle_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.label for="last_name">Last Name</x-form.label>
                                        <x-form.input type="text" id="last_name" name="last_name"
                                            placeholder="Enter your last name!" :value="old('last_name')"></x-form.input>
                                        @error('last_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
