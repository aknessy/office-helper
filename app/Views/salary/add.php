<div class="w-full lg:w-2/3 md:w-1/2 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="text-sm breadcrumbs mb-5">
        <ul>
            <li><a href="<?=base_url()?>">Home</a></li> 
            <li>Add Salary</li>
        </ul>
    </div>
    <?php if(validation_errors()){?>
        <div class="mb-3 w-full">
            <?=validation_list_errors('custom_validation_template') ?>
        </div>
    <?php }else{?>
    <div role="alert" class="alert alert-info mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="text-sm">Add a salary for the specified grade level & step. This action will be performed once for the affected year.</span>
    </div>
    <?php } ?>
    <div class="hero bg-base-200 flex flex-col items-center justify-center py-2 px-4 rounded-lg mb-5">
        <?=form_open('', ['class'=>'w-full'])?>    
        <div class="flex flex-col space-y-2">  
            <div class="w-full">
                <label class="w-full text-base text-gray-500 font-semibold">Salary Year</label>
                <select class="select w-full input-bordered input-info" name="year" required>
                    <option value="">Select Year</option>
                    <?php
                            for($i = 2004; $i <= date('Y'); $i++){?>
                            <option value="<?=$i?>" <?=($i==date('Y')) ? 'selected' : ''?>><?=$i?></option>
                        <?php
                            } 
                        ?>
                </select>
            </div>  
            <div class="flex flex-row w-full space-x-3">
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Grade Level</label>
                    <select class="select w-full input-bordered input-info" name="grade">
                        <option value="">Select GL</option>
                        <?php
                            for($i = 1; $i <= 17; $i++){?>
                            <option value="<?=$i?>" <?=($i==$uri->getSegment(3)) ? 'selected' : ''?>><?=$i?></option>
                        <?php
                            } 
                        ?>
                    </select>
                </div>
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Step</label>
                    <select class="select w-full input-bordered input-info" name="step">                        
                        <option value="">Select Step</option>
                        <?php
                            for($i = 1; $i <= 15; $i++){?>
                            <option value="<?=$i?>" <?=($i==$uri->getSegment(4)) ? 'selected' : ''?>><?=$i?></option>
                        <?php
                            } 
                        ?>
                    </select>
                </div>
            </div>  
            <div class="flex flex-row w-full space-x-3">
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Annual Consolidated Salary</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Annual Consolidated Salary" name="annual_sal" required>
                </div>
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Monthly Consolidated Salary</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Monthly Consolidated Salary" name="monthly_sal" required>
                </div>
            </div>    
            <div class="flex flex-row w-full space-x-3">
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Hazard</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Electoral Hazard" name="hazard" required>
                </div>
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Responsibility</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Responsibility Allowance" name="responsibility">
                </div>
            </div>
            <div class="flex flex-row w-full space-x-3">
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Entertainment</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Entertainment" name="entertainment">
                </div>
                <div class="flex flex-col lg:w-1/2 md:w-1/2 py-2 w-full">
                    <label class="w-full text-base text-gray-500 font-semibold">Drivers</label>
                    <input class="input input-bordered input-info w-full" type="number" step="0.01" min="0.00" placeholder="Drivers Allowance" name="drivers">
                </div>
            </div>     
            <div class="w-full lg:w-1/3 md:w-1/2 flex lg:flex-row sm:flex-col items-end justify-end space-x-4">
                <button type="reset" class="w-full lg:w-1/2 flex gap-x-3 bg-ghost btn-md rounded-md p-2 items-center">
                    <i data-feather="x" class="font-semibold font-sans h-5 w-5 text-md"></i>
                    <span class="text-md font-semibold font-sans">Cancel</span>
                </button>
                <button type="submit" class="w-full lg:w-1/2 flex gap-x-3 bg-primary glass btn-md text-white rounded-md p-2 items-center">
                    <i data-feather="send" class="font-semibold font-sans h-5 w-5 text-md"></i>
                    <span class="text-md font-semibold font-sans">Save Salary</span>
                </button>
            </div>   
        </div>     
        <?=form_close()?>
    </div>
</div>