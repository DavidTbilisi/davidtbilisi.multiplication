<div class="uk-container">


    <h1 class="uk-heading-large uk-text-center"><?php echo "{$data['true']['n1']}x{$data['true']['n2']}=" ?></h1>


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
        el.style.backgroundColor = "lightgreen";
        setTimeout(function () {
            window.location.reload()
        },500)
    } else {
        el.style.backgroundColor = "red";

    }
}
</script>
</body>
</html>