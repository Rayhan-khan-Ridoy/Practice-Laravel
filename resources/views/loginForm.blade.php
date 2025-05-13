<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @if (session()->has('loginError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('loginError')}} <br>
        </div> 
    @endif
    <div class="container">
        <fieldset class="border rounded-3 p-3">
            <legend  class="float-none w-auto px-3" >Aishah's Login Page</legend>
            <form action="{{ url('/loginVerify') }}" method="POST">
                @csrf          
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>
        
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
        
                <button type="submit">Login</button>
        
            </form>
        </fieldset>
    </div>
</body>

    
