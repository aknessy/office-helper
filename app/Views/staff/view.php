<?php
    $date_of_ret = $staff[0]->date_of_ret;
    $mode_of_ret = $staff[0]->mode_of_ret;
    $current_date = date('Y-m-d');

    $retire_mode = $staff[0]->mode_of_ret;
    $yr_of_ret = 0;
    $yrs_left = 0;

    if($retire_mode == 'YOS')
        $yr_of_ret = explode('-', $date_of_ret)[0];
    else
        $yr_of_ret = explode('-', $staff[0]->date_of_birth)[0];

    $yrs_left = intval(date('Y')) - $yr_of_ret;
?>

<div id="scrollTo" class="w-full lg:w-4/5 md:w-4/5 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="flex w-full items-center justify-between mb-6 mt-5">
        <h2 class="font-bold text-lg font-sans">Staff Profile</h2>
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="<?=base_url()?>">Home</a></li> 
                <li><a href="<?=base_url('staff')?>">Staff List</a></li>
                <li><a href="<?=base_url('staff/add-record')?>">Add Staff</a></li>
                <li class="text-gray-300">View Staff</li>
            </ul>
        </div>
    </div>
    
    <div class="w-full">
        <div class="hero bg-base-200 w-full p-4 flex flex-wrap lg:flex-nowrap rounded-sm space-x-10 space-y-4">
            <div class="flex space-x-3 items-center">
                <img src="<?=base_url('assets/uploads/images/' . $staff[0]->photo)?>" alt="Staff Photo" class="w-40 h-40 rounded-full" />
                <div class="w-full flex flex-col">
                    <div class="w-full flex flex-col mb-3">
                        <h3 class="font-bold text-gray-700 flex w-full justify-between items-center text-2xl">
                            <span><?=strtoupper($staff[0]->staff_name)?></span>
                        </h3>
                        <div class="flex items-center space-x-2 justify-start mb-1">
                            <span class="text-sm text-gray-500 italic">Grade Level</span>
                            <span class="text-md text-gray-700"><?=$staff[0]->grade_level . '/' . $staff[0]->step?></span>
                        </div>
                        <div class="flex items-center space-x-2 justify-start mb-1">
                            <span class="text-sm text-gray-500 italic">Rank</span>
                            <span class="text-md text-gray-700"><?=strtoupper(DESIGNATION[$staff[0]->rank])?></span>
                        </div>
                        <!-- <div class="flex items-center space-x-2 justify-start mb-1">
                            <span class="text-sm text-gray-500 italic">Cadre</span>
                            <span class="text-md text-gray-700"><?=strtoupper($staff[0]->cadre)?></span>
                        </div> -->
                        <div class="flex items-center space-x-2 justify-start mb-1">
                            <span class="text-sm text-gray-500 italic">Years until retirement</span>
                            <span class="text-md text-gray-700"><?=$yrs_left?></span>
                        </div>
                        <div class="flex items-center space-x-2 justify-start mb-1">
                            <span class="text-sm text-gray-500 italic">Mode of retirement</span>
                            <span class="text-md text-gray-700"><?=$staff[0]->mode_of_ret?></span>
                        </div>
                    </div>
                    <div class="block lg:flex w-full items-start space-x-3">
                        <?php
                        if($current_date < $date_of_ret){?>
                            <button class="btn btn-active btn-success w-full">
                                <span class="text-white flex items-center"><em class="text-sm">Staff is active & retires On:&nbsp;<?=date('F j, Y', strtotime($date_of_ret))?></em></span>
                            </button>
                        <?php 
                        }else{?>
                            <button class="btn btn-active btn-error w-full">
                                <span class="text-white flex items-center"><em class="text-sm">Staff is inactive & retired On:&nbsp;<?=date('F j, Y', strtotime($date_of_ret))?></em></span>
                            </button>
                        <?php 
                        }?>
                    </div>
                    <!-- <div class="flex items-center space-x-2 justify-start mb-1">
                        <span class="text-sm text-gray-500 italic">Gender</span>
                        <span class="text-md text-gray-700"><?=strtoupper($staff[0]->gender == 'F' ? 'Female' : 'Male')?></span>
                    </div> -->
                </div>
            </div>
            <div class="flex flex-col space-x-4">
                <h2 class="font-semibold text-2xl uppercase text-slate-400 mb-4">Responsibility, Suitability & Rating</h2>
                <div class="flex items-start justify-start space-x-4 mb-3">
                    <div class="flex flex-col items-start justify-start space-y-3">
                        <?php
                            if($rating > 50 && $rating < 69):
                                echo '<h4 class="font-sans text-7xl font-bold text-green-400">' . $rating . '%</h4>';
                            elseif($rating > 70 && $rating < 89):
                                echo '<h4 class="font-sans text-7xl font-bold text-green-700">' . $rating . '%</h4>';
                            elseif($rating >= 90):
                                echo '<h4 class="font-sans text-7xl font-bold text-emerald-900">' . $rating . '%</h4>';
                            else:
                                echo '<h4 class="font-sans text-7xl font-bold text-red-700">' . $rating . '%</h4>';
                            endif;
                        ?>
                        
                        <div class="rating rating-lg">
                            <input type="radio" name="rating-9" class="rating-hidden" readonly />
                            <input type="radio" name="rating-9" class="mask mask-star-2" readonly />
                            <input type="radio" name="rating-9" class="mask mask-star-2" checked readonly/>
                            <input type="radio" name="rating-9" class="mask mask-star-2" readonly/>
                            <input type="radio" name="rating-9" class="mask mask-star-2" readonly/>
                            <input type="radio" name="rating-9" class="mask mask-star-2" readonly/>
                        </div>
                    </div>
                    <div class="flex flex-col w-full space-y-2 p-3 rounded-md bg-blue-200 shadow-md">
                        <div class="flex space-x-3 items-center w-full">
                            <i data-feather="star"></i>
                            <span>Leadership</span>
                        </div>
                        <div class="flex space-x-3 items-center w-full">
                            <i data-feather="star"></i>
                            <span>Communication</span>
                        </div>
                        <div class="flex space-x-3 items-center w-full">
                            <i data-feather="star"></i>
                            <span>Competence</span>
                        </div>
                    </div>
                </div>
                <div class="flex text-sm font-sans font-normal mt-3 items-center space-x-1">
                    <div class="inline-flex items-center">
                        <i data-feather="alert-circle" class="text-sm text-slate-500 font-bold"></i>&nbsp;
                        <span>Has the staff performance indexes improved? You can rate them</span>
                    </div>
                    <a href="" class="underline text-secondary italic">here</a>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-4">
        <div class="columns-2 gap-4">
            <div class="card bg-primary text-primary-content">
                <div class="card-body">  
                    <h2 class="card-title text-white">EDUCATIONAL QUALIFICATION</h2>
                    <div class="flex flex-col space-y-3">
                    <?php
                        $qual = $staff[0]->qualification;
                        $decode = json_decode($qual);
                        $explode = NULL;

                        if(is_array($decode))
                            $explode = $decode;
                        else
                            $explode = explode(',', $qual);

                        if(count($explode) > 0){
                            foreach($explode as $key => $value){?>                
                            <div class="flex space-y-2 w-full items-center justify-start">
                                <span>
                                    <i data-feather="award" class="text-sm text-white font-semibold"></i>
                                </span>
                                <span class=""><?=$value?></span>
                            </div>
                        <?php }
                        }
                    ?> 
                    </div>
                    <button class="btn btn-active btn-neutral glass mt-4 text-white">View Educational Credentials</button>
                </div>
            </div>
            <div class="card bg-primary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title text-white">Record of Service</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                    <button class="btn">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>