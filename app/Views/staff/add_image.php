<div id="scrollTo" class="w-full lg:w-4/5 md:w-4/5 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="flex w-full items-center justify-between mb-6 mt-5">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="<?=base_url()?>">Home</a></li> 
                <li><a href="<?=base_url('staff')?>">Staff List</a></li>
                <li><a href="<?=base_url('staff/add-record')?>">Add Staff</a></li>
                <li class="text-gray-300">Staff Photo</li>
            </ul>
        </div>
    </div>
    <div class="hero bg-base-200 flex items-center justify-between py-2 px-4 rounded-lg mb-5 w-full">
        <div class="flex flex-col w-full">
            <h3 class="font-bold text-2xl text-dark">New Staff Photo</h3>
            <p class="text-xs mb-3">Add an image for the newly created staff</p>
        </div>
        <a href="<?=base_url('staff')?>" class="inline-flex flex-col hover:bg-secondary text-xs py-2 px-3 text-white btn btn-sm bg-blue-950 capitalize items-center justify-between">
            <i data-feather="list"></i>
            <span>Staff List</span>
        </a>
    </div>
    <div class="w-full">
        <?php if(validation_errors()){?>
            <div class="mb-3 w-full">
                <?=validation_list_errors('custom_validation_template') ?>
            </div>
        <?php }?>
        <?=form_open_multipart('')?>

        <input type="file" name="imageName" accept="image/*" size="" class="image-selector w-0 h-0 opacity-0 invisible" />

        <div class="flex flex-row items-center justify-center">
            <div class="lg:w-40 max-w-xs flex flex-col items-center justify-around">
                <div id="thumbnailArea" class="w-32 h-32 rounded-md shadow-lg bg-white border border-gray-400 px-1 py-1 mb-5 cursor-pointer">
                    <div class="h-full w-full">
                        <img id="imageViewer" src="<?=base_url('imgs/img-avatar.png')?>" alt="Avatar" class="h-full w-full rounded-md">
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary px-1 py-1 rounded-md w-full">Upload Image</button>
            </div>
        </div>

        <?=form_close()?>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var initiateSelector = $('#thumbnailArea')
        var fileField = $('.image-selector')
        var imageField = $('#imageViewer')

        $(initiateSelector).click(function(){
            $(fileField).trigger('click')
        })

    $(fileField).change(function()
        {
            readURL(this, imageField);
        });
    })

    function readURL(input, imageField) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(imageField).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>