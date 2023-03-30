<?php

view('header', ['isLogin' => $isLogin]);

?>


<div class="container mt-5" style="width: 400px;">
  <form action="/todo" method="get">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="List Name" aria-label="list name" aria-describedby="button-add" name="create" />
      <button type="submit" class="btn btn-success" type="button" id="button-add" data-mdb-ripple-color="dark">
        create list
      </button>
    </div>
  </form>

  <div>
    <?php foreach ($listData as $list) : ?>
      <form action="/todo" method="get">
        <div class="input-group mt-3">
          <input type="hidden" name="id" value="<?= $list['id'] ?>"/>
          <input type="text" class="form-control" placeholder="List Name" aria-label="list name" aria-describedby="button-add" name="update" value="<?= $list['list'] ?>" />
          <button type="submit" class="btn btn-primary" type="button" id="button-add" data-mdb-ripple-color="dark">
            <i class="fa-solid fa-pen"></i>
          </button>
          <a class="btn btn-danger" href="/todo?delete=<?= $list['id'] ?>">
            <i class="fa-solid fa-trash"></i>
          </a>
        </div>
      </form>
    <?php endforeach ?>
  </div>
</div>