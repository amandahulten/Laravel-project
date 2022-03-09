<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="/">InstaLite</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <?php if (isset($user)) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/photos">My photos</a>
            </li>
        <?php endif ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php if (isset($user)) : ?>
                /logout">Log out
            <?php else : ?>
                /createaccount">Create account
            <?php endif ?>
            </a>
        </li>

    </ul>
</nav>
