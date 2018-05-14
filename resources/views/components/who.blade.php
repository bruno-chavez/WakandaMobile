@if(Auth::guard('web')->check())
    <p>
        You are logged in as a user
    </p>
    @else
    <p>
        You are Logged Out as a user
    </p>
@endif

@if(Auth::guard('division')->check())
    <p>
    You are logged in as a division
    </p>
@else
<p>
    You are Logged Out as a division
</p>
@endif