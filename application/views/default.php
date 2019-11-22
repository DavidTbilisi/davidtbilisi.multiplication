<div class="uk-container">
<?php $ref = "{$data['true']['n1']}x{$data['true']['n2']}" ?>

    <h1 class="uk-heading-large uk-text-center"><?php echo "{$ref}=" ?></h1>


<div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-3@s uk-text-center">
    <?php clog($data); ?>
    <?php foreach ($data['answers'] as $option): ?>
            <button onclick="check()"
                    data-checkable ="<?php echo $option['namravli'] ?>"
                    class="uk-button uk-button-default uk-margin-top">
                <?php echo $option['namravli'] ?>
            </button>
    <?php endforeach; ?>
</div>

</div>
<body>
<script>
function check() {
    let el = window.event.target;
    if (el.dataset.checkable == <?php echo $data['true']['answer']?>) {
        $.ajax({
           url:"<?php echo base_url('mult/save_answer')?>",
            method:"POST",
            data: {
               "ref": "<?php echo $ref ?>",
               "answer": 1,
            },
            success: function (data) {
               console.log(data);
                el.style.backgroundColor = "lightgreen";
            }
        });
        setTimeout(function () {
            window.location.reload()
        },500)



    } else {

        $.ajax({
            url:"<?php echo base_url('mult/save_answer')?>",
            method:"POST",
            data: {
                "ref": "<?php echo $ref ?>",
            },
            success: function (data) {
                console.log(data);
                document.querySelectorAll("button").forEach((el)=>{
                    if (el.dataset.checkable == <?php echo $data['true']['answer']?>){
                        el.style.backgroundColor = "lightgreen";
                    } else {
                        el.style.backgroundColor = "red";
                    }
                });

            }
        });


        setTimeout(function () {
            window.location.reload()
        },500)
    }
}
</script>
