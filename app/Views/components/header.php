<!Doctype html>
<html data-theme="winter">
<head>
    <title><?=esc($page_title)?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 
    <link rel="stylesheet" href="<?=base_url('css/icofont.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/app.css')?>">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <style>
        div.flatpickr-calendar.open{
            z-index: 10000 !important;
        }
    </style>
</head>
<body>
    <div class="w-full h-screen">
        <?=view('fragments/activityInProgress')?>
        
        