<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    @if(session()->has('authUser'))
    <h4>Welcome to the Dashboard Mr/Miss {{ session('userName') }}.</h4>
    <p>This is User Dashboard</p>
    @endif
    
    
</div>
