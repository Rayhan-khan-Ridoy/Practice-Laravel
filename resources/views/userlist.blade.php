<h2>User List</h2>
@if (session('success'))
    {{ session('success') }}
@endif

@if(!session()->has('authUser'))
{{-- <p>You are not logged in. Please <a href="/loginPage">login</a>.</p> --}}
<script>
    window.location.href = "/loginPage";  // Redirect to login page
</script>
@else


<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="/editUser/{{ $user->id }}">Edit</a>
                    {{-- <a href="/editUser">Edit</a> --}}

                    <form method="POST" action="/deleteUsers/{{ $user->id }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this user?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif



