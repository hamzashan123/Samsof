<div class="navbar transparent" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start"></div>
        <div class="navbar-end user-nav-container">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-small is-warning is-rounded is-uppercase" href="{{ route('community.login') }}">
                        <span>Membership Login</span>
                    </a>
                    <a class="button is-small is-warning is-rounded is-uppercase is-inverted" href="{{ route('community.register') }}">
                        Join
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
