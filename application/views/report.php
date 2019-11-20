<?php // clog($data); ?>
<div class="uk-container">
    <div class="uk-flex uk-flex-wrap ">
<?php foreach($data as $times):  ?>
<?php if (isset($times->right) && !empty($times->total)): ?>
<div class="box"
     style="background: rgb(253,187,45);
            background: radial-gradient(circle, rgba(253,187,45,1) <?php echo (int)($times->total-$times->right); ?>%, rgba(34,193,195,1) 100%);">
<?php else: ?>
    <div class="box">
<?php endif; ?>
    <?php echo $times->ref ?>
</div>
<?php endforeach;  ?>
    </div>
</div>


<style>

    .box{
        width: calc( 100% / 10);
    }


</style>