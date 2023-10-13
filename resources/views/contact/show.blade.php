@extends('layouts.main')
@section('title', 'Contact')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Contact</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('contacts') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Profile Picture</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('template/img/contacts/' . $contact->picture) }}" alt="Christina Mason" class="img-fluid rounded-circle mb-2"
                                width="150" height="150" />

                            <div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 col-xl-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Details</h5>
                        </div>
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        First Name: {{ $contact->first_name }}
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Middle Name: {{ $contact->middle_name }}
                                    </p>
                                </div>
                                <div class="col-12">
                                    <p class="border p-2 rounded">
                                        Last Name: {{ $contact->last_name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
