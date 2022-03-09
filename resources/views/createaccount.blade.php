@include('header')
@include('errors')

<!-- create user form -->
<form method="POST" action="/createuser">
    @csrf
    <div>

        <label for="name">Username</label>
        <input name="name" id="name" type="name" />
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

@include('footer')
