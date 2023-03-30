<?php
view('header', ['isLogin' => $isLogin]);
?>

<section class="container mb-5 py-5">
    <nav class=" d-flex justify-content-between" aria-label="Page navigation">
        <form action="/notes">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="/notes?start=<?= $pagination - 25 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active">
                    <div class="form-outline" style="width: 50px;">
                        <input type="text" id="form12" class="form-control text-center" name="start" value="<?= $pagination ?>" />
                    </div>
                </li>
                <li class="page-item">
                    <a class="page-link" href="/notes?start=<?= $pagination + 25 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </form>
        <div class="mx-2">
            <a class="btn btn-success" href="/note/create">Create Post</a>
        </div>
    </nav>
    <div class="row">
        <?php foreach ($noteData as $note) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4 my-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $note['title'] ?> #<?= $note['username'] . $note['user_id'] ?></h5>
                        <p class="card-text"><?= substr(htmlentities($note['body']), 0, 200) . "..." ?></p>
                        <a href="/note?id=<?= $note['id'] ?>" class="btn btn-primary">see more</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>