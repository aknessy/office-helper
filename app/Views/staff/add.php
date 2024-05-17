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
                    <select class="select select-bordered w-full" name="title" required>
                        <option value="" <?=old('title') == '' ? 'selected' : ''?>>Select title</option>
                        <option value="Mr." <?=old('title') == 'Mr.' ? 'selected' : ''?>>Mr.</option>
                        <option value="Mrs." <?=old('title') == 'Mrs.' ? 'selected' : ''?>>Mrs.</option>
                        <option value="Ms."  <?=old('title') == 'Ms.' ? 'selected' : ''?>>Ms.</option>
                        <option value="Prof." <?=old('title') == 'Prof.' ? 'selected' : ''?>>Professor</option>
                        <option value="Dr. Mrs." <?=old('title') == 'Dr. Mrs.' ? 'selected' : ''?>>Dr. Mrs.</option>
                        <option value="Deaconness" <?=old('title') == 'Deaconnes' ? 'selected' : ''?>>Deaconness</option>
                        <option value="Pastor" <?=old('title') == 'Pastor' ? 'selected' : ''?>>Pastor</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="lg:w-1/3 w-full">
                    <label class="font-semibold text-sm text-gray-600">Firstname</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full" name="fname" value="<?=old('fname')?>" required />
                </div>
                <div class="lg:w-1/3 w-full">
                    <label class="font-semibold text-sm text-gray-600">Middlename</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full" name="mname" value="<?=old('mname')?>" />
                </div>
                <div class="lg:w-1/3 w-full">
                    <label class="font-semibold text-sm text-gray-600">Lastname</label>
                    <input type="text" placeholder="Type here" class="input input-bordered input-md w-full" name="lname" value="<?=old('lname')?>" required />
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="lg:w-2/3 w-full">
                    <label class="font-semibold text-sm text-gray-600">Gender</label>
                    <select class="select select-bordered w-full" name="gender" required>
                        <option value="" <?=old('gender') == '' ? 'selected' : ''?>>Select Gender</option>
                        <option value="M" <?=old('gender') == 'M' ? 'selected' : ''?>>Male</option>
                        <option value="F" <?=old('gender') == 'F' ? 'selected' : ''?>>Female</option>
                    </select>
                </div>
                <div class="lg:w-2/3 flex flex-col w-full">
                    <label class="font-semibold text-sm text-gray-600">Marital Status</label>
                    <select class="select select-bordered w-full" name="marital_status">
                        <option value="" <?=old('marital_status') == '' ? 'selected' : ''?>>Select Status</option>
                        <option value="Married" <?=old('marital_status') == 'Married' ? 'selected' : ''?>>Married</option>
                        <option value="Single" <?=old('marital_status') == 'Single' ? 'selected' : ''?>>Single</option>
                        <option value="Divorced" <?=old('marital_status') == 'Divorced' ? 'selected' : ''?>>Divorced</option>
                        <option value="Widow" <?=old('marital_status') == 'Widow' ? 'selected' : ''?>>Widow</option>
                        <option value="Widower" <?=old('marital_status') == 'Widower' ? 'selected' : ''?>>Widower</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 flex space-x-3">
                <div class="lg:w-1/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Rank</label>
                    <select class="select select-bordered w-full" name="rank" required>
                        <option value="">Select Rank</option>
                        <?php
                            foreach(DESIGNATION as $k => $v):?>
                                <option value="<?=$k?>" <?=old('rank') == $k ? 'selected' : ''?>><?=$v?></option>
                            <?php
                            endforeach;
                        ?>
                    </select>
                </div>
                <div class="lg:w-1/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Grade Level</label>
                    <select class="select select-bordered w-full" name="grade_level" required>
                        <option value="">Select Option</option>
                        <?php
                            for($i = 1; $i <= 17; $i++):?>
                                <option value="<?=($i < 10 ? '0' . $i : $i)?>" <?=old('grade_level') == $i ? 'selected' : ''?>><?=($i < 10 ? '0' . $i : $i)?></option>
                        <?php
                            endfor;
                        ?>
                    </select>
                </div>
                <div class="lg:w-1/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Step</label>
                    <select class="select select-bordered w-full" name="step" required>
                        <option value="">Select Option</option>
                        <?php
                            for($i = 1; $i <= 15; $i++):?>
                                <option value="<?=($i < 10 ? '0' . $i : $i)?>" <?=old('step') == $i ? 'selected' : ''?>><?=($i < 10 ? '0' . $i : $i)?></option>";
                            <?php
                            endfor;
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="flex mb-2 w-full space-x-2 items-end">
                    <div  id="qualification" class="flex items-end space-x-2 w-full">
                        <div class="flex flex-col w-full">
                            <label class="font-semibold text-sm texxt-gray-600">Qualification</label>
                            <input type="text" placeholder="Type here" class="input input-bordered input-md w-full" name="qualification[]" required />
                        </div>
                    </div>
                    <button type="button" data-clone-source="qualification" data-append-to="#appendment" class="cloneButton w-1/6 btn btn-neutral btn-md">
                        <span class="text-xs text-white">Add</span>
                    </button>
                </div>
                <div id="appendment"></div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="lg:w-1/4 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Cadre</label>
                    <select class="select select-bordered w-full" name="cadre" required>
                        <option value="">Select Cadre</option>
                        <option value="Executive" <?=old('cadre') == 'Executive' ? 'selected' : ''?>>Executive</option>
                        <option value="Administrative" <?=old('cadre') == 'Administrative' ? 'selected' : ''?>>Administrative</option>
                        <option value="Directive" <?=old('cadre') == 'Directive' ? 'selected' : ''?>>Directive</option>
                    </select>
                </div>
                <div class="lg:w-1/4 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Date of Birth</label>
                    <input type="text" placeholder="yyyy-mm-dd" class="datepicker-widget input input-bordered input-md w-full" name="date_of_birth" value="<?=old('date_of_birth')?>" required />
                </div>
                <div class="lg:w-1/4 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Date of 1st Appointment</label>
                    <input type="text" placeholder="yyyy-mm-dd" class="datepicker-widget input input-bordered input-md w-full" name="first_appt" value="<?=old('first_appt')?>" required />
                </div>
                <div class="lg:w-1/4 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Date of Confirmation</label>
                    <input type="text" placeholder="yyyy-mm-dd" class="datepicker-widget input input-bordered input-md w-full" name="confirmation" value="<?=old('confirmation')?>" />
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="lg:w-2/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">State of Origin</label>
                    <select id="statesField" class="select select-bordered w-full" name="state_of_origin" required>
                        <option value="">Select Option</option>
                        <?php
                        if(!empty($states)){
                            foreach($states as $obj){?>
                                <option value="<?=$obj->id?>" <?=old('state_of_origin') == $obj->id ? 'selected' : ''?>><?=$obj->name?></option>
                        <?php
                            }
                        }?>
                    </select>
                </div>
                <div class="lg:w-1/3 sm:w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">LGA</label>
                    <select id="lgasField" class="select select-bordered w-full" name="lga_of_origin" required>
                        <option value="">Select Option</option>
                    </select>
                </div>
            </div>
            <div class="mb-2 flex space-x-3">
                <div class="lg:w-1/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Phone Number</label>
                    <input type="text" placeholder="Enter Phone Number" class="input input-bordered input-md w-full" name="phone" value="<?=old('phone')?>" required />
                </div>
                <div class="lg:w-2/3 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">Email Address</label>
                    <input type="text" placeholder="Email Address" class="input input-bordered input-md w-full" name="email" value="<?=old('email')?>" />
                </div>
            </div>
            <div class="mb-4 flex space-x-3">
                <div class="lg:w-1/2 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">PFA</label>
                    <select class="select select-bordered w-full" name="pfa" required>
                        <option value="">Select Option</option>
                        <?php
                            foreach(PENSION_ADMINISTRATORS as $k => $v){?>
                                <option value="<?=$v?>" <?=old('pfa') == $v ? 'selected' : ''?>><?=strtoupper($v)?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="lg:w-1/2 w-full flex flex-col">
                    <label class="font-semibold text-sm text-gray-600">RSA PIN</label>
                    <input type="text" placeholder="PENXXXXXXXXXXXXXXXX" class="input input-bordered input-md w-full" name="rsa_pin" value="<?=old('rsa_pin')?>" />
                </div>
            </div>
            <div class="w-full mb-6 p-3 bg-cyan-100 shadow-sm rounded-lg">
                <label class="flex items-center justify-start space-x-2 cursor-pointer font-semibold text-sm text-gray-600">
                    <input type="checkbox" checked="checked" class="checkbox checkbox-secondary" name="i_certify" value="1" />
                    <span class="label-text">I certify to the best of my knowledge that the information provided here is correct and verifiable</span>
                </label>
            </div>
            <div class="w-full flex items-center justify-between">
                <p class="flex items-center justify-center text-sm text-gray-600 space-x-2">
                    <span>
                        <i class="text-white text-base" fill="blue" data-feather="alert-circle"></i>
                    </span>
                    <span>You'll be required to upload a staff photo on the next dialog, please ensure this is handy.</span>
                </p>
                <div class="flex space-x-3">
                    <button type="reset" class="btn">Reset Fields</button>
                    <button type="submit" class="btn btn-secondary">Save Record & Continue</button>
                </div>
            </div>
        <?=form_close()?>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var threadAction = $('#activityInProgress')

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
            var cloned = $('#'+clone).clone()
           
            $(cloned).find('label').append(' ' + increment)
            $(cloned).attr('id', clone + increment)
            $(cloned).addClass('mb-2')
            $(cloned).append(removeBtn)

            var newlyAttachedBtn = $(cloned).find('.removeBtn')
			$(newlyAttachedBtn).attr('onclick', 'removeItem("' + (clone + increment) + '")')

            $(appendTo).append($(cloned))
        })

        $('#statesField').on('change', function(){
            var selectedState = $(this).val()

            if(selectedState != '')
            {
                $(threadAction).removeClass('hidden')
                var lgasField = $('#lgasField')

                $(lgasField).empty().append('<option value="">Select Option</option>')

                $.ajax({
                    url : '<?=base_url('staff/fetch-lgas')?>',
                    method : 'post',
                    data : { state : selectedState},
                    success : function(response)
                    {
                        if(response)
                        {
                            for(var i = 0; i < response.length; i++){
                                $(lgasField).append('<option value="' + response[i].id + '">' + response[i].name + '</option>')
                            }
                        }

                        $(threadAction).addClass('hidden')
                    },
                    // error : function(error)
                    // {
                    //     console.log(error)
                    // }
                })
            }
        })
    })

    function removeItem(element)
    {
        const e = document.getElementById(element)
        e.remove()
    }
    
</script>