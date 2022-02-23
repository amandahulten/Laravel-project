@include('errors')
<form method="post" action="/createaccount">
    @csrf
    <div>
        <label for="user">Username</label>
        <input name="user" id="user" type="user" />
    </div>
    <div>
        <label for="email">Email</label>
        <input name="email" id="email" type="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input name="password" id="password" type="password" />
    </div>
    <button type="submit">Create account</button>
</form>
