@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">Manage Users</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>
                                        <th>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">
                                                <button class="btn btn-success btn-sm">Edit</button>
                                            </a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
