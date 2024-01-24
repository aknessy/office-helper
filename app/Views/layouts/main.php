<?=view('components/header', ['page_title' => $title, 'uri' => $uri])?>
<?=view('components/main-menu')?>
<div class="drawer min-h-full">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="bg-secondary shadow-sm min-h-full"><!--This is drawer-side. Including the class, causes unexplainable behaiours-->
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <?=view('components/submenu')?>
    </div>
    <div class="drawer-content">
        <?=view($subview)?>
        <?=view('components/footer')?>
    </div>
</div>