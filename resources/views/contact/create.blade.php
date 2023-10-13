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
                            <form action="{{ route('contact.create') }}" method="post" enctype="multipart/form-data">
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

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <x-form.label for="list_id">List</x-form.label>
                                        <select name="list_id" id="list_id" class="form-select">
                                            <option value="">Select a list!</option>
                                            @foreach ($contact_lists as $contact_list)
                                                @if (old('list_id') == $contact_list->id)
                                                    <option value="{{ $contact_list->id }}" selected>{{ $contact_list->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $contact_list->id }}">{{ $contact_list->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('list_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.label for="email">Email</x-form.label>
                                        <x-form.input type="email" id="email" name="email"
                                            placeholder="Enter your email!" :value="old('email')"></x-form.input>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <x-form.label for="phone_no">Phone Number</x-form.label>
                                        <x-form.input type="text" id="phone_no" name="phone_no"
                                            placeholder="Enter your phone number!" :value="old('phone_no')"></x-form.input>
                                        @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <x-form.label for="dob">DoB</x-form.label>
                                        <x-form.input type="date" id="dob" name="dob"
                                            :value="old('dob')"></x-form.input>
                                        @error('dob')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <x-form.label for="file">Picture</x-form.label>
                                        <x-form.input type="file" id="file" name="file"></x-form.input>
                                        @error('file')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <x-form.label for="address">Address</x-form.label>
                                        <textarea name="address" id="address" class="form-control" cols="30" rows="2"
                                            placeholder="Enter your address!">{{ old('address') }}</textarea>
                                        @error('address')
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
