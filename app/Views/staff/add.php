<div id="scrollTo" class="w-full lg:w-4/5 md:w-4/5 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="flex w-full items-center justify-between mb-6 mt-5">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="<?=base_url()?>">Home</a></li> 
                <li><a href="<?=base_url('staff')?>">Staff List</a></li>
                <li class="text-gray-300">Add Staff</li>
            </ul>
        </div>
    </div>
    <div class="hero bg-base-200 flex items-center justify-between py-2 px-4 rounded-lg mb-5 w-full">
        <div class="flex flex-col w-full">
            <h3 class="font-bold text-2xl text-dark">Add New Record</h3>
            <p class="text-xs mb-3">Add a new record to the staff nominal roll</p>
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

        <?=form_open('')?>
            <div class="mb-2">
                <div class="flex flex-col w-full">
                    <label class="font-semibold text-sm text-gray-600">Title</label>
                    <select class="select select-bordered w-full" name="title">
                        <option value="">Select title</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Prof.">Professor</option>
                        <option value="Dr. Mrs.">Dr. Mrs.</option>
                        <option value="Deaconness">Deaconness</option>
                        <option value="Pastor">Pastor</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="w-1/3 sm:w-full">
                    <label class="font-semibold text-sm text-gray-600">Firstname</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full max-w-xs" name="fname" required />
                </div>
                <div class="w-1/3 sm:w-full">
                    <label class="font-semibold text-sm text-gray-600">Middlename</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full max-w-xs" name="mname" required />
                </div>
                <div class="w-1/3 sm:w-full">
                    <label class="font-semibold text-sm text-gray-600">Lastname</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full max-w-xs" name="lname" required />
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="w-2/3 sm:w-full">
                    <label class="font-semibold text-sm text-gray-600">Gender</label>
                    <select class="select select-bordered w-full" name="gender">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="w-2/3 flex flex-col sm:w-full">
                    <label class="font-semibold text-sm text-gray-600">Marital Status</label>
                    <select class="select select-bordered w-full" name="marital_status">
                        <option value="">Select Status</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widow">Widow</option>
                        <option value="Widower">Widower</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="w-1/3 flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Rank</label>
                    <select class="select select-bordered w-full" name="rank">
                        <option value="">Select Rank</option>
                        <?php
                            foreach(DESIGNATION as $k => $v):
                                echo "<option value='" . $k ."'>" . $v . "</option>";
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="w-1/3 flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Grade Level</label>
                    <select class="select select-bordered w-full" name="grade_level">
                        <option value="">Select Option</option>
                        <?php
                            for($i = 1; $i <= 17; $i++):
                                echo "<option value='". ($i < 10 ? '0' . $i : $i) . "'>" . ($i < 10 ? '0' . $i : $i) . "</option>";
                            endfor;
                        ?>
                    </select>
                </div>
                <div class="w-1/3 flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Step</label>
                    <select class="select select-bordered w-full" name="step">
                        <option value="">Select Option</option>
                        <?php
                            for($i = 1; $i <= 15; $i++):
                                echo "<option value='". ($i < 10 ? '0' . $i : $i) . "'>" . ($i < 10 ? '0' . $i : $i) . "</option>";
                            endfor;
                        ?>
                    </select>
                </div>
            </div>
            <div>
                <div class="flex mb-2 w-full space-x-2 items-end">
                    <div  id="qualification" class="flex items-end space-x-2 w-full">
                        <div class="flex flex-col w-full">
                            <label class="font-semibold text-sm texxt-gray-600">Qualification</label>
                            <input type="text" placeholder="Type here" class="input input-bordered input-md w-full" name="qualification[]" required />
                        </div>
                    </div>
                    <button type="button" data-clone-source="#qualification" data-append-to="#appendment" class="cloneButton w-1/6 btn btn-neutral btn-md">
                        <span class="text-xs text-white">Add</span>
                    </button>
                </div>
                <div id="appendment"></div>
            </div>
        <?=form_close()?>
    </dv>
</div>

<script type="text/javascript">
    $(function(){
        var increment = 1
		var id = Math.random().toString(16).slice(2)
        let removeBtn = `<button title="Remove Element" type="button" class="removeBtn btn btn-error btn-md flex text-white w-1/6">
							<span>
                                <i data-feather="trash"></i> Remove
                            </span>
						</button>`;

        $('.cloneButton').click(function()
        {
            increment++;

            var clone = $(this).data('clone-source')
            var appendTo = $(this).data('append-to')
            var cloned = $(clone).clone()
           
            $(cloned).find('label').append(' ' + increment)
            $(cloned).attr('id', clone + increment)
            $(cloned).addClass('mb-2')
            $(cloned).append(removeBtn)

            var newlyAttachedBtn = $(cloned).find('.removeBtn')

			$(newlyAttachedBtn).attr('data-removal', clone + increment)
			$(newlyAttachedBtn).attr('onclick', 'alert("9999)')

            $(appendTo).append($(cloned))
        })
    })

    function removeItem(element)
	{
		$(element).remove();
	}
</script>