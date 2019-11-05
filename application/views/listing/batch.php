<div class="container">
    <div class="row">
<?php foreach ($data as $row) { ?>
        <div class="col-md-2 year-holder">
            <a class="year-btn" href="<?=BASE_URL?>listing/batch/<?= $row?>"><?= $row?></a>
        </div>
<?php } ?>
    </div>
</div>
