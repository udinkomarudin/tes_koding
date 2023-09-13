@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Center-align the row horizontally -->



            <div class="col-md-8"> <!-- Adjust the column width as needed -->


               @if(session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success') }}
                </div>

                <script>
                    setTimeout(function() {
                        document.getElementById('success-message').style.display = 'none';
                    }, 5000); // Menghilangkan pesan setelah 5 detik (5000 milidetik)
                </script>
                @endif

                <h1 class="text-center">User List</h1>
                 <div class="mb-3">
                     <a href="{{ route('users.create') }}">
                        <button class="btn btn-primary">Create User</button>
                    </a>
                </div>
                <table id="userTable" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td><a href="{{ route('users.edit', $user->id) }}">Edit</a> / <a href="{{ route('users.showDeleteConfirmation', $user->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endsection
