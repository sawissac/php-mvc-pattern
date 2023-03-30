<?php
view('header', ['isLogin' => $isLogin]);
?>
<?php if ($route === '/note') : ?>
    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= htmlentities($noteData[0]['title']) ?></h5>
                        <p class="card-text"><?= htmlentities($noteData[0]['body']) ?></p>
                    </div>
                </div>
                <?php
                ?>
                <?php if ($_SESSION['user']['id'] === $noteData[0]['user_id']) : ?>
                    <a class="btn btn-secondary mt-3" href="/note/edit?id=<?= $noteData[0]['id'] ?>"><i class="fa-solid fa-pen"></i></a>
                    <a class="btn btn-secondary mt-3" href="/note/delete?id=<?= $noteData[0]['id'] ?>"><i class="fa-solid fa-trash"></i></a>
                <?php endif ?>
                <a class="btn btn-secondary mt-3" href="/notes">Back</a>
            </div>
        </div>
    </section>
<?php endif ?>

<?php if ($route === '/note/edit') : ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                <?php foreach ($noteData as $note) : ?>
                    <form action='/note/edit' method="POST">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>" />
                        <div class="d-flex align-items-center">
                            <div class="form-outline">
                                <input type="text" id="title" class="form-control" name="title" value="<?= $note['title'] ?>" />
                                <label class="form-label" for="title">Update</label>
                            </div>
                        </div>
                        <div class="form-outline mt-3">
                            <textarea class="form-control" id="textAreaExample" rows="10" name="body"><?= $note['body'] ?></textarea>
                            <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                        <button type="submit" class="btn btn-primary fw-bold btn-md mt-2">
                            save
                        </button>
                        <a href="/note?id=<?= $note['id'] ?>" class="btn btn-light fw-bold btn-md mt-2">
                            cancel
                        </a>
                    </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if ($route === '/note/create') : ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6 my-2">
                <form action='/note/create' method="POST">
                    <div class="d-flex align-items-center">
                        <div class="form-outline">
                            <input type="text" id="title" class="form-control" name="title" />
                            <label class="form-label" for="title">Title</label>
                        </div>
                    </div>
                    <div class="form-outline mt-3">
                        <textarea class="form-control" id="textAreaExample" rows="10" name="body"></textarea>
                        <label class="form-label" for="textAreaExample">Message</label>
                    </div>
                    <button type="submit" class="btn btn-primary fw-bold btn-md mt-2">
                        save
                    </button>
                    <a href="/notes" class="btn btn-light fw-bold btn-md mt-2">
                        cancel
                    </a>
            </div>
        </div>
    </div>
<?php endif ?>