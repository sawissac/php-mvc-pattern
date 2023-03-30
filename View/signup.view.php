<?php

view('header', ['isLogin' => $isLogin]);

?>

<form class="pt-5 mt-5 w-25 mx-auto pb-5 mb-5" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="d-flex justify-content-center py-4">
        <div class="rounded-circle bg-info d-flex justify-content-center align-items-center" style="width: 70px;height: 70px;">
            <i class="fa fa-solid fa-user fa-2x text-light"></i>
        </div>
    </div>
    <?php if (isset($error['auth'])) : ?>
        <div class="alert alert-danger alert-sm text-center">
            Account already registered!
        </div>
    <?php endif ?>
    <div class="mb-3">
        <div class="form-outline">
            <input type="text" id="username" class="form-control" name="username" />
            <label class="form-label" for="username">User Name</label>
        </div>

        <?php if (isset($error['username'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['username'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <input type="email" id="email" class="form-control" name="email" />
            <label class="form-label" for="email">Email address</label>
        </div>
        <?php if (isset($error['email'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['email'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <input type="password" id="password" class="form-control" name="password" />
            <label class="form-label" for="password">Password</label>
        </div>
        <?php if (isset($error['password'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['password'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" />
            <label class="form-label" for="confirmPassword">Confirm Password</label>
        </div>
        <?php if (isset($error['confirmPassword'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['confirmPassword'] ?>
            </div>
        <?php endif ?>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
</form>