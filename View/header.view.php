<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="/">
            <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/todo">Todo</a>
                </li>
            </ul>
            <!-- Left links -->

            <div class="d-flex align-items-center">
                <?php if ($isLogin === true) : ?>
                    <ul class="navbar-nav">
                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="/notes" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                #<?= $_SESSION['user']['username'] . $_SESSION['user']['id']?> 
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php endif ?>
                <?php if ($isLogin === false) : ?>
                    <a href="/login" class="btn btn-light btn-rounded px-3 me-2">
                        Login
                    </a>
                    <a href="/signup" class="btn btn-primary btn-rounded me-3">
                        Sign up for free
                    </a>
                <?php endif ?>
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->