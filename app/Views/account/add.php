<div class="w-full mt-0 text-left">
    <nav aria-label="breadcrumb" class="w-max">
        <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-4">
            <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
                <a class="opacity-60" href="<?=base_url()?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                </a>
                <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
                /
                </span>
            </li>
            <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
                <a class="opacity-60" href="<?=base_url('staff')?>">
                <span>Account</span>
                </a>
                <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
                -
                </span>
            </li>
            <li class="flex cursor-default pointer-events-none items-center font-sans text-sm font-medium leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300 text-gray-500">
                <span>
                Add
                </span>
            </li>
        </ol>
    </nav>
</div>

<div class="flex flex-row w-full divide-x space-x-0 items-start justify-start">
    
    <?=view('components/submenu', ['uri' => $uri])?>

    <div id="mainArea" class="flex flex-col w-full bg-white border border-gray-100 rounded-lg shadow-md p-3">
        <?php if($validation->getErrors()){?>
        <div class="mb-3 w-full">
            <?=validation_list_errors('custom_validation_template') ?>
        </div>
        <?php }else{?>
            <div class="flex flex-row items-center justify-start font-regular text-sm w-full rounded-lg bg-gradient-to-tr from-orange-300 to-orange-400 px-2 py-2 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 w-6">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                </svg>
                <div class="ml-2 mr-12">You have been redirected here because no deduction information was found for the staff you attempted to create a payslip for.</div>
            </div>
        <?php }?>

        <?=form_open('accounts/add/' . $uri->getSegment(3), ['method' => 'post', 'class'=>'p-2 w-full mt-4'])?>

        <div class="flex flex-wrap mb-5">
            <div class="w-full md:mb-0 pr-3">
                <div class="relative h-10 w-full">
                    <select class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-gray-50 px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 text-gray-400 focus:border-blue-100 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 focus:bg-white" name="bank_name">
                        <option value="">Select Bank</option>
                        <?php 
                        if(count($banks) > 0)
                        {
                            foreach($banks as $obj)
                            { 
                                if($obj->bank_name != '')
                                {?>
                                <option value="<?=$obj->bank_name . '-' . $obj->bank_code?>" <?=$obj->bank_name == $account['bank_name'] ? 'selected' : ''?>><?=$obj->bank_name?></option>
                        <?php
                                }
                            }
                        }
                        ?>
                    </select>
                    <label class="before:content[' '] after:content[' '] text-gray-500 pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-sm font-semibold leading-tight text-blue-gray-300 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-400 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-400 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-400 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Bank Name
                    </label>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap mb-5">
            <div class="w-full md:mb-0 pr-3">
                <div class="relative h-10 w-full">
                    <input class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-gray-50 px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 text-gray-400 focus:border-blue-100 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 focus:bg-white" name="acct_num" type="text" value="<?=$account['account_num'] ? $account['account_num'] : set_value('acct_num')?>">
                    <label class="before:content[' '] after:content[' '] text-gray-500 pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-sm font-semibold leading-tight text-blue-gray-300 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-400 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-400 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-400 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Account Number
                    </label>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap mb-5">
            <div class="w-full md:mb-0 pr-3">
                <div class="relative h-10 w-full">
                    <input class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-gray-50 px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 text-gray-400 focus:border-blue-100 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 focus:bg-white" name="sort_code" type="text" value="<?=$account['sort_code'] ? $account['sort_code'] : set_value('sort_code')?>">
                    <label class="before:content[' '] after:content[' '] text-gray-500 pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-sm font-semibold leading-tight text-blue-gray-300 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-blue-400 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-blue-400 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-blue-400 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Sort Code
                    </label>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-between w-full px-3 mb-4">
                <button type="reset" class=" w-full md:w-1/2 hover:bg-gray-100 text-gray-600 py-2 px-4 hover:rounded-l=md">Reset</button>
                <button type="submit" class="w-full flex flex-row items-center justify-start md:w-1/2 bg-blue-400 hover:bg-blue-500 font-semibold text-white hover:text-dark font-sans rounded-md">
                    <div class="flex items-center justify-center bg-blue-500 px-2 py-3 rounded-l-md">
                        <i data-feather="send"></i>
                    </div>
                    <div class="w-full flex items-center justify-center border-l border-l-blue-600 px-4 py-3">
                        <span>Save Account</span>
                    </div>
                </button>
            </div>

        <?=form_close()?>
        
    </div>

</div>