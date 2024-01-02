<?php
echo view('components/header', ['page_title' => $title, 'uri' => $uri]);
echo view('components/main-menu');
?>
<div class="drawer">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
<?=view('components/submenu')?>
<div class="drawer-content">
    <?=view($subview)?>
</dv>
<?=view('components/footer')?>