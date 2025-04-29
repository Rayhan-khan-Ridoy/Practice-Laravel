<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<h2>Register</h2>
<form action="/register" method="POST">
    @csrf
    {{-- @dd($errors->all()) --}}
    <input type="text" name="name" placeholder="Name"><br>
    @error('name')
    <div class="text-danger"> {{ $message }} </div>
    @enderror
    
    {{-- @if ($errors->has('name'))
    <div class="text-danger">{{ $errors->first('name') }}</div>
    @endif --}}

    <input type="email" name="email" placeholder="Email"><br>
    @if ($errors->has('email'))
    <div class="text-danger">{{ $errors->first('email') }}</div>
    @endif

    <input type="password" name="password" placeholder="Password"><br>
    @if ($errors->has('password'))
    <div class="text-danger">{{ $errors->first('password') }}</div>
    @endif

    <input type="password" name="password_confirmation" placeholder="Confirm Password"><br>
    @if ($errors->has('password_confirmation'))
    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
    @endif
    <button type="submit">Register</button>
</form>