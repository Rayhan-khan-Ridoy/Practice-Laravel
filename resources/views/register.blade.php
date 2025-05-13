<head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<h2>Register</h2>
<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    @error('name')
        <div class=text-danger>{{ $message }}</div>
    @enderror
    <input type="email" name="email" placeholder="Email"><br>
    @error('email')
        <div class=text-danger>{{$message}}</div>
    @enderror
    <input type="password" name="password" placeholder="Password"><br>
    @error('password')
        <div class=text-danger>{{ $message }} </div>
    @enderror
    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>
    @error('password_confirmation')
        <div class=text-danger>{{ $message }} </div>
    @enderror
    <button type="submit">Register</button>
</form>
