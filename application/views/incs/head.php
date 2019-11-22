
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title ?></title>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--    DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>


    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit-icons.min.js"></script>
</head>
<button class="uk-button uk-button-default" type="button" uk-toggle="target: #offcanvas-nav"><span class="uk-padding" uk-icon="icon: menu"></span></button>


<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">

        <ul class="uk-nav uk-nav-default">
            <li class="uk-active"><a href="<?php echo base_url("/") ?>">HOME</a></li>
            <li><a href="<?php echo base_url("mult/report") ?>"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Report </a></li>
            <li><a href="<?php echo base_url("mult/settings") ?>"><span class="uk-margin-small-right" uk-icon="icon: settings"></span> Settings </a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="<?php echo base_url("mult/reset") ?>"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Reset</a></li>
        </ul>

    </div>
</div>