@extends('layouts.main')
@section('title', 'Lists')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Lists</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('list.create') }}" class="btn btn-outline-primary">Add List</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($contact_lists) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($contact_lists as $contact_list)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $contact_list->name }}</td>
                                                <td>
                                                    <a href="{{ route('list.edit', $contact_list) }}" class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('list.destroy', $contact_list) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        {{-- {{ $contact_lists->links('vendor.pagination.bootstrap-5') }} --}}
                                        {{ $contact_lists->links() }}
                                    </div>
                                </div>
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
