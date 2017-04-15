<div id="grid" class="container-fluid">
    <div id="posts">
<?php foreach ($data as $row) { ?>
        <div class="post">
            <a href="<?=BASE_URL?>Awardees/<?=$row->year_awarded?>/<?=str_replace(' ', '_', $row->name)?>" title="View Awardee">
                <div class="fixOverlayDiv">
                    <img class="img-responsive" src="<?=$viewHelper->includeThumbnail($row->name,$row->year_awarded)?>">
                    <div class="OverlayText"><small><?= $row->sal?> <?= $row->name?></small> <span class="link"><i class="fa fa-link"></i></span></div>
                </div>
                <p class="image-desc">
                    <strong><?=$row->info?></strong>
                </p>
            </a>
        </div>
<?php } ?>
    </div>
</div>
