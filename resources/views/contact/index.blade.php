@extends('layouts.main')
@section('title', 'Contacts')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Contacts</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('contact.create') }}" class="btn btn-outline-primary">Add Contact</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($contacts) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>List</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>DoB</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact->first_name . ' ' . $contact->middle_name . ' ' . $contact->last_name }}
                                                </td>
                                                <td>{{ $contact->contact_list->name }}</td>
                                                <td>{{ $contact->phone_number }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->dob }}</td>
                                                <td>
                                                    {{-- <a href="{{ route('contact.edit', $contact) }}" class="btn btn-primary">Edit</a> --}}
                                                    <a href="{{ route('contact.show', $contact) }}"
                                                        class="btn btn-primary">Show</a>
                                                    <form action="{{ route('contact.destroy', $contact) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <div class="row justify-content-end">
                                    <div class="col-auto">
                                        {{ $contacts->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div> --}}
                            @else
                                <div class="alert alert-info">No record found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
