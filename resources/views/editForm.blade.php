<h2>Edit User</h2>

<form action="/updateUser/{{ $foundUser->id }}" method="POst">
    @csrf
    
    <input type="text" name="name" placeholder="Name" value={{ $foundUser->name }}><br>
    <input type="email" name="email" placeholder="Email" value={{ $foundUser->email }}><br>
    <input type="password" name="password" placeholder="Password" value={{ $foundUser->password }}><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" value={{ $foundUser->password }} ><br>
    <button type="submit">Update</button>
</form>
