<?php

view('header', ['isLogin' => $isLogin]);

?>

<form class="pt-5 mt-5 w-25 mx-auto" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="d-flex justify-content-center py-4">
        <div class="rounded-circle bg-info d-flex justify-content-center align-items-center" style="width: 70px;height: 70px;">
            <i class="fa fa-solid fa-user fa-2x text-light"></i>
        </div>
    </div>
    <?php if (isset($error['auth'])) : ?>
        <div class="alert alert-danger alert-sm text-center">
            Wrong Email or Password!
        </div>
    <?php endif ?>
    <div class="mb-3">
        <div class="form-outline">
            <input type="text" id="email" class="form-control" name="email" />
            <label class="form-label" for="email">Email address</label>
        </div>
        <?php if (isset($error['email'])) : ?>
            <div class="form-text text-danger">
                <?= $error['email'] ?>
            </div>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <div class="form-outline">
            <input type="text" id="password" class="form-control" name="password" />
            <label class="form-label" for="password">Password</label>
        </div>
        <?php if (isset($error['password'])) : ?>
            <div id="emailHelp" class="form-text text-danger">
                <?= $error['password'] ?>
            </div>
        <?php endif ?>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Login</button>
</form>