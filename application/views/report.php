<?php // clog($data); ?>
<div class="uk-container">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>reference</th>
            <th>total</th>
            <th>right</th>
            <th>percent</th>

        </tr>
        </thead>


        <tfoot>
        <tr>
            <th>reference</th>
            <th>total</th>
            <th>right</th>
            <th>percent</th>
        </tr>
        </tfoot>
    </table>
</div>

<script>

    $(document).ready(function () {
        $('#example').DataTable({
            "ajax": "<?php echo base_url("mult/report/json")?>",
            "columns": [
                {"data": "ref"},
                {"data": "total"},
                {"data": "right"},
                {"data": "percent"},
            ]
        });
    });

</script>