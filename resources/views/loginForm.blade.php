<div>
    <fieldset >
        <legend>Aishah's Login Page</legend>
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
