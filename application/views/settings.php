<form action="<?php echo base_url("mult/set_min_max") ?>" method="GET">
<div class="uk-container uk-text-center">

    <div class="uk-margin">
    <p class="uk-margin" >Min</p>
            <input class="uk-input uk-form-width-medium uk-form-large" 
            type="number" 
            name="min" 
            value="<?php echo $data->min ?>" 
            placeholder="Min">
    </div>

    <div class="uk-margin">
    <p class="uk-margin" >Max</p>
            <input class="uk-input uk-form-width-medium uk-form-large" 
            type="number" 
            name="max" 
            value="<?php echo $data->max ?>" 
            placeholder="Max">
    </div>

    <div class="uk-margin">
    <p class="uk-margin" >Answers Count</p>
            <input class="uk-input uk-form-width-medium uk-form-large" 
            type="number" 
            name="answers_count" 
            value="<?php echo $data->answers_count ?>" 
            placeholder="Answers Count">
    </div>

    <input type="submit" class="uk-button uk-button-default" value="Save">

    </form>

</div>