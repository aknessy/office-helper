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

<style>
    .select2-container.select2-container--default.select2-container--open{
        z-index: 100000;
    }
</style>

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
        <?php if(validation_errors()){?>
            <div class="mb-3 w-full">
                <?=validation_list_errors('custom_validation_template') ?>
            </div>
        <?php }?>
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
                    <h2 class="card-title text-white uppercase">Educational qualification</h2>
                    <?php
                    if(NULL != $staff[0]->edu_qual || $staff[0]->edu_qual != '')
                    {
                        $qual = $staff[0]->edu_qual;
                        $decode = json_decode($qual);
                        $explode = NULL;

                        if(is_array($decode))
                            $explode = $decode;
                        else
                            $explode = explode(',', $qual);
                        ?>

                        <div class="flex flex-col space-y-3">
                            <?php
                            foreach($explode as $key => $value){?>               
                                <div class="flex space-y-2 w-full items-center justify-start">
                                    <span>
                                        <i data-feather="award" class="text-sm text-white font-semibold"></i>
                                    </span>
                                    <span class=""><?=$value?></span>
                                </div>
                            <?php 
                            }?>
                        </div>
                        <button class="btn btn-active btn-neutral glass mt-4 text-white">View Educational Credentials</button>

                    <?php
                    }else{?>
                        <div class="flex items-center justify-center">
                            <h4 class="text-3xl text-gray-200">No Educational Qualifications Found!</h4>
                        </div>
                    <?php
                    }?>
                </div>
            </div>
            <div class="card bg-primary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title text-white uppercase">Professional Qualifications</h2>
                    <?php
                    if(NULL != $staff[0]->prof_qual || $staff[0]->prof_qual != '')
                    {
                        $qual = $staff[0]->prof_qual;
                        $decode = json_decode($qual);
                        $explode = NULL;

                        if(is_array($decode))
                            $explode = $decode;
                        else
                            $explode = explode(',', $qual);
                    ?>

                        <div class="flex flex-col space-y-3">
                            <?php
                            foreach($explode as $key => $value){?>               
                                <div class="flex space-y-2 w-full items-center justify-start">
                                    <span>
                                        <i data-feather="award" class="text-sm text-white font-semibold"></i>
                                    </span>
                                    <span class=""><?=$value?></span>
                                </div>
                            <?php 
                            }?>
                        </div>
                        <button class="btn btn-active btn-neutral glass mt-4 text-white">View Professional Credentials</button>

                    <?php
                    }else{?>
                        <div class="flex flex-col items-center justify-center py-7 space-y-5">
                            <span class="text-9xl text-gray-100">
                                <i data-feather="archive"></i>
                            </span>
                            <h4 class="text-sm font-sans italic text-gray-200">No Professional Qualifications Found!</h4>
                        </div>
                    <?php
                    }?>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-4">
        <div class="columns-1">
            <div class="card bg-white border-t border-t-gray-200 shadow-md">
                <div class="card-body">
                    <div class="card-title flex flex-col space-y-0 items-start justify-center mb-5 pb-4 border-b border-b-gray-100">
                        <h2 class="uppercase text-gray-900">Record of Service</h2>
                        <span class="text-sm font-normal space-y-0 text-gray-400">This shows appointment, promotions, leave, transfers and career progression</span>
                    </div>
                    <div class="w-full">
                        <div class="w-full block mx-auto justify-center mb-4">
                            <div class="flex items-center justify-between space-x-3 py-5 px-4 rounded-full border border-blue-900">
                                <div class="flex flex-col items-start">
                                    <h4 class="font-semibold text-sm text-gray-400">Date of Birth</h4>
                                    <p class="font-semibold text-gray-600 text-base font-sans"><?=date('F j, Y', strtotime($staff[0]->date_of_birth))?></p>
                                </div>
                                <div class="flex flex-col items-start">
                                    <h4 class="font-semibold text-gray-400 text-sm">Date of First Appointment</h4>
                                    <p class="font-semibold text-gray-600 text-base font-sans"><?=date('F j, Y', strtotime($staff[0]->first_appt))?></p>
                                </div>
                                <div class="flex flex-col items-start">
                                    <h4 class="font-semibold text-gray-400 text-sm">Date of Confirmation</h4>
                                    <p class="font-semibold text-gray-600 text-base font-sans"><?=(NULL == $staff[0]->confirmation ? 'Not yet confirmed' : date('F j, Y', strtotime($staff[0]->confirmation)))?></p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="card shadow-none">
                                <div class="card-body">
                                    <div class="flex space-y-0 card-title items-center justify-between py-3 px-3 bg-base-200">
                                        <div class="flex flex-col space-y-0 items-start justify-start">
                                            <h5 class="font-sans font-semibold text-base uppercase text-gray-800">Record of Promotion</h5>
                                            <span class="text-sm font-normal text-gray-500">These are promotions obtained by staff over the course of their employment.</span>
                                        </div>
                                        <button type="button" class="btn btn-outline btn-secondary text-sm capitalize text-gray-600 hover:bg-blue-600 hover:glass cursor-pointer" onclick="promotionModal.showModal()">Add staff promotional record</button>
                                    </div>
                                    <div class="overflow-x-auto border border-gray-200 p-3">
                                        <?php
                                        if(NULL != $promotion_record){?>
                                        <table class="table table-zebra table-md">
                                            <thead class="capitalize text-base text-gray-500">
                                                <tr>
                                                    <td>Serial</td>
                                                    <th>Rank</th>
                                                    <th>Grade</th>
                                                    <th>Step</th>
                                                    <th>Effective From</th>
                                                    <th>Type of Promotion</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm text-gray-500">
                                            <?php 
                                                $decode = json_decode($promotion_record);
                                                $increment = 1;

                                                foreach($decode as $key){?>

                                                <tr class="font-sans text-md">
                                                    <td><?=$increment?>.</td>
                                                    <td><?=ucwords(DESIGNATION[$key->rank])?></td>
                                                    <td><?=$key->grade?></td>
                                                    <td><?=$key->step?>
                                                    <td><?=date('d F, Y', strtotime($key->effective_date))?></td>
                                                    <td>
                                                        <span class="badge badge-success badge-sm">
                                                            <?=ucwords($key->type_of_promotion)?>
                                                        </span>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <?php
                                                    $increment++;
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php 
                                        }else{ ?>
                                            <div class="w-full block mx-auto">
                                                <div class="flex flex-col items-center justify-around space-y-2">
                                                    <svg width="180" height="180" viewBox="0 0 280 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M183.03 48.7481C183.03 48.7481 151.068 89.2336 99.929 65.0847C48.7902 40.9358 -2.34872 106.28 41.6876 146.054C85.7239 185.829 42.631 207.685 72.5475 232.061C106.55 259.767 136.152 203.585 163.142 216.37C222.71 244.587 266.84 233.417 256.897 200.745C239.442 143.393 217.123 139.663 234.168 109.831C251.214 79.9996 213.593 17.9741 183.03 48.7481Z" fill="#DEE9FF"/>
                                                        <path d="M141.111 135.285V220.223L75.1636 191.739L75.4782 107.108L141.111 135.285Z" fill="#418DF9"/>
                                                        <path d="M141.112 135.336V220.274L206.738 192.773V107.379L141.112 135.336Z" fill="#A2BDFF"/>
                                                        <path d="M141.111 135.285L207.058 107.663L141.629 78.6604L75.1636 106.973L141.111 135.285Z" fill="#0E84E5"/>
                                                        <path d="M57.1545 122.125L123.522 154.339C123.7 154.425 123.902 154.451 124.096 154.412C124.291 154.372 124.467 154.27 124.597 154.121L141.111 135.285L75.1636 106.973L57.0068 120.587C56.8827 120.68 56.7845 120.803 56.7218 120.945C56.6592 121.087 56.634 121.243 56.6489 121.397C56.6637 121.552 56.718 121.7 56.8065 121.827C56.8951 121.954 57.0149 122.057 57.1545 122.125Z" fill="#699CFF"/>
                                                        <path d="M207.058 107.663L225.373 124.222C225.485 124.323 225.57 124.45 225.62 124.592C225.67 124.735 225.684 124.887 225.66 125.036C225.637 125.184 225.576 125.325 225.485 125.444C225.393 125.564 225.273 125.659 225.135 125.72L159.586 154.975C159.411 155.053 159.216 155.073 159.029 155.033C158.841 154.993 158.671 154.895 158.543 154.752L141.111 135.285L207.058 107.663Z" fill="#699CFF"/>
                                                        <path d="M141.628 78.6603L207.241 107.663L216.677 105.476C216.863 105.433 217.03 105.333 217.155 105.189C217.28 105.046 217.357 104.866 217.374 104.676C217.391 104.487 217.348 104.297 217.251 104.133C217.154 103.969 217.008 103.84 216.833 103.764L156.92 77.8042C156.789 77.7474 156.647 77.7224 156.504 77.7314L141.628 78.6603Z" fill="#699CFF"/>
                                                        <path d="M141.629 78.6603L76.3836 107.108L68.1358 105.722C67.9448 105.686 67.7704 105.59 67.6383 105.448C67.5062 105.305 67.4234 105.124 67.4022 104.931C67.381 104.738 67.4225 104.543 67.5205 104.375C67.6186 104.208 67.768 104.076 67.9467 104L129.34 77.5417C129.476 77.484 129.623 77.4603 129.77 77.4727L141.629 78.6603Z" fill="#699CFF"/>
                                                    </svg>
                                                    <h2 class="text-xl font-sans font-semibold m-0 text-gray-400">No record found</h2>
                                                    <p class="text-sm font-sans font-normal italic m-0 text-gray-600">Staff promotional progress will be displayed here.</p>                                                    
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="card shadow-none">
                                <div class="card-body py-2">
                                    <div class="flex space-y-0 card-title items-center justify-between py-3 px-3 bg-base-200">
                                        <div class="flex flex-col space-y-0 items-start justify-start">
                                            <h5 class="font-sans font-semibold text-base uppercase text-gray-800">Record of Transfers/Postings</h5>
                                            <span class="text-sm font-normal text-gray-500">Record of official transfers/postings</span>
                                        </div>
                                        <button type="button" class="btn btn-outline btn-secondary text-sm capitalize text-gray-600 hover:bg-blue-600 hover:glass cursor-pointer" onclick="transferModal.showModal()">Add transfer/posting</button>
                                    </div>
                                    <div class="overflow-x-auto border border-gray-200 p-3">
                                    <?php
                                        if(NULL != $transfer_record){?>
                                        <table class="table table-zebra table-md">
                                            <thead class="capitalize text-base text-gray-500">
                                                <tr>
                                                    <td>Serial</td>
                                                    <th>Posted To</th>
                                                    <th>Effective Date</th>
                                                    <th>Capacity/Position</th>
                                                    <th>Type of Posting</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm text-gray-500">
                                            <?php 
                                                $decode = json_decode($transfer_record);
                                                $increment = 1;

                                                foreach($decode as $key){?>

                                                <tr class="font-sans text-md">
                                                    <td><?=$increment?>.</td>
                                                    <td><?=strtoupper($key->posted_to)?></td>
                                                    <td><?=date('d F, Y', strtotime($key->effective_date))?></td>
                                                    <td><?=ucwords($key->capacity)?></td>
                                                    <td>
                                                        <span class="badge badge-success badge-sm">
                                                            <?=ucwords($key->type_of_posting)?>
                                                        </span>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <?php
                                                    $increment++;
                                                }
                                            ?> 
                                            </tbody>
                                        </table>
                                        <?php 
                                        }else{?>
                                            <div class="w-full block mx-auto">
                                                <div class="flex flex-col items-center justify-around space-y-2">
                                                    <svg width="180" height="180" viewBox="0 0 280 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M183.03 48.7481C183.03 48.7481 151.068 89.2336 99.929 65.0847C48.7902 40.9358 -2.34872 106.28 41.6876 146.054C85.7239 185.829 42.631 207.685 72.5475 232.061C106.55 259.767 136.152 203.585 163.142 216.37C222.71 244.587 266.84 233.417 256.897 200.745C239.442 143.393 217.123 139.663 234.168 109.831C251.214 79.9996 213.593 17.9741 183.03 48.7481Z" fill="#DEE9FF"/>
                                                        <path d="M141.111 135.285V220.223L75.1636 191.739L75.4782 107.108L141.111 135.285Z" fill="#418DF9"/>
                                                        <path d="M141.112 135.336V220.274L206.738 192.773V107.379L141.112 135.336Z" fill="#A2BDFF"/>
                                                        <path d="M141.111 135.285L207.058 107.663L141.629 78.6604L75.1636 106.973L141.111 135.285Z" fill="#0E84E5"/>
                                                        <path d="M57.1545 122.125L123.522 154.339C123.7 154.425 123.902 154.451 124.096 154.412C124.291 154.372 124.467 154.27 124.597 154.121L141.111 135.285L75.1636 106.973L57.0068 120.587C56.8827 120.68 56.7845 120.803 56.7218 120.945C56.6592 121.087 56.634 121.243 56.6489 121.397C56.6637 121.552 56.718 121.7 56.8065 121.827C56.8951 121.954 57.0149 122.057 57.1545 122.125Z" fill="#699CFF"/>
                                                        <path d="M207.058 107.663L225.373 124.222C225.485 124.323 225.57 124.45 225.62 124.592C225.67 124.735 225.684 124.887 225.66 125.036C225.637 125.184 225.576 125.325 225.485 125.444C225.393 125.564 225.273 125.659 225.135 125.72L159.586 154.975C159.411 155.053 159.216 155.073 159.029 155.033C158.841 154.993 158.671 154.895 158.543 154.752L141.111 135.285L207.058 107.663Z" fill="#699CFF"/>
                                                        <path d="M141.628 78.6603L207.241 107.663L216.677 105.476C216.863 105.433 217.03 105.333 217.155 105.189C217.28 105.046 217.357 104.866 217.374 104.676C217.391 104.487 217.348 104.297 217.251 104.133C217.154 103.969 217.008 103.84 216.833 103.764L156.92 77.8042C156.789 77.7474 156.647 77.7224 156.504 77.7314L141.628 78.6603Z" fill="#699CFF"/>
                                                        <path d="M141.629 78.6603L76.3836 107.108L68.1358 105.722C67.9448 105.686 67.7704 105.59 67.6383 105.448C67.5062 105.305 67.4234 105.124 67.4022 104.931C67.381 104.738 67.4225 104.543 67.5205 104.375C67.6186 104.208 67.768 104.076 67.9467 104L129.34 77.5417C129.476 77.484 129.623 77.4603 129.77 77.4727L141.629 78.6603Z" fill="#699CFF"/>
                                                    </svg>
                                                    <h2 class="text-xl font-sans font-semibold m-0 text-gray-400">No record found</h2>
                                                    <p class="text-sm font-sans font-normal italic m-0 text-gray-600">Staff transfer record will be displayed here.</p>                                                    
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    </div>

    <!-- Open the modal using ID.showModal() method -->
    <dialog id="promotionModal" class="modal">
        <div class="modal-box backdrop-blur-sm bg-white/80">
            <h3 class="font-semibold text-md text-gray-600">Add Staff Promotion Record</h3>
            <p class="text-sm text-gray-500">Fill the form below to add a record of promotion of this staff</p>
            <div class="modal-action justify-start">
                <form action="<?=base_url('staff/service-record')?>" method="post" class="w-full">
                    <input type="hidden" value="<?=$uri->getSegment(3)?>" name="uid" />
                    <input type="hidden" value="promotion" name="record_for" />
                    
                    <button id="closePromotionModal" class="closeModal btn btn-sm btn-circle btn-primary absolute right-2 top-2" autofocus>✕</button>
                    
                    <div class="mb-2 space-x-2 flex flex-wrap lg:flex-nowrap">
                        <div class="w-full lg:w-1/2">
                            <div class="flex flex-col w-full relative">
                                <label class="font-semibold text-sm text-gray-600">Rank</label>
                                <select class="select select-bordered select-sm w-full" name="rank" required>
                                    <option value="">Select Rank</option>
                                    <?php
                                        foreach(DESIGNATION as $k => $v):?>
                                            <option value="<?=$k?>" <?=old('rank') == $k ? 'selected' : ''?>><?=$v?></option>
                                        <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="flex flex-col w-full">
                                <label class="font-semibold text-sm text-gray-600">Effective From</label>
                                <input type="date" placeholder="yyyy-mm-dd" class="input input-bordered input-sm w-full" name="effective_date_of_prom" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 space-x-2 flex flex-wrap lg:flex-nowrap">
                        <div class="w-full lg:w-1/2">
                            <label class="font-semibold text-sm text-gray-600">Grade Level</label>
                            <select class="select select-bordered select-sm w-full" name="grade_level" required>
                                <option value="">Select Option</option>
                                <?php
                                    for($i = 1; $i <= 17; $i++):?>
                                        <option value="<?=($i < 10 ? '0' . $i : $i)?>" <?=old('grade_level') == $i ? 'selected' : ''?>><?=($i < 10 ? '0' . $i : $i)?></option>
                                <?php
                                    endfor;
                                ?>
                            </select>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label class="font-semibold text-sm text-gray-600">Step</label>
                            <select class="select select-bordered select-sm w-full" name="step" required>
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
                    <div class="mb-3 flex flex-col flex-nowrap">
                        <label class="font-semibold text-sm text-gray-600">Type of promotion</label>
                        <select class="select select-bordered select-sm w-full" name="type_of_promotion">
                            <option value="normal" <?=old('type_of_promotion') == 'normal' ? 'selected' : ''?>>Normal</option>
                            <option value="notional" <?=old('type_of_promotion') == 'notional' ? 'selected' : ''?>>Notional</option>
                            <option value="accelerated" <?=old('type_of_promotion') == 'accelerated' ? 'selected' : ''?>>Accelerated</option>
                        </select>
                    </div>
                    <div class="block lg:flex items-center justify-end space-x-2">
                        <button type="submit" class="btn btn-primary">Create Record</button>
                        <button type="reset" class="btn btn-outline btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="transferModal" class="modal">
        <div class="modal-box backdrop-blur-sm bg-white/80">
            <h3 class="font-semibold text-md text-gray-600">Add Staff Transfer Record</h3>
            <p class="text-sm text-gray-500">Fill the form below to add a record of transfer/posting of this staff</p>
            <div class="modal-action justify-start">
                <form action="<?=base_url('staff/service-record')?>" method="post" class="w-full">
                    <input type="hidden" value="<?=$uri->getSegment(3)?>" name="uid" />
                    <input type="hidden" value="posting" name="record_for" />
                    
                    <button id="closeTransferModal" class="btn btn-sm btn-circle btn-primary absolute right-2 top-2" autofocus>✕</button>
                
                    <div class="flex flex-col w-full mb-2">
                        <label class="font-semibold text-sm text-gray-600">Effective From</label>
                        <input type="date" placeholder="yyyy-mm-dd" class="input input-bordered input-sm w-full" name="effective_date" value="" required />
                    </div>

                    <div class="mb-2 space-x-2 flex flex-wrap lg:flex-nowrap">
                        <div class="w-full lg:w-1/2">
                            <div class="flex flex-col w-full relative">
                                <label class="font-semibold text-sm text-gray-600">Posted to (State)</label>
                                <select id="statesField" class="select select-bordered select-sm w-full" name="state" required>
                                    <option value="">Select Option</option>
                                    <?php
                                    if(!empty($states)){
                                        foreach($states as $obj){?>
                                            <option value="<?=$obj->id?>" <?=old('state') == $obj->id ? 'selected' : ''?>><?=$obj->name?></option>
                                    <?php
                                        }
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="flex flex-col w-full relative">
                                <label class="font-semibold text-sm text-gray-600">Posted to (Lga)</label>
                                <select id="lgasField" class="select select-bordered select-sm w-full" name="lga" required>
                                    <option value="">Select Option</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 flex flex-col flex-nowrap">
                        <label class="font-semibold text-sm text-gray-600">Remark</label>
                        <select class="select select-bordered select-sm w-full" name="remark">
                            <option value="" <?=old('remark') == '' ? 'selected' : ''?>>Select Option</option>
                            <option value="staff" <?=old('remark') == 'staff' ? 'selected' : ''?>>Staff</option>
                            <option value="electoral officer" <?=old('remark') == 'electoral officer' ? 'selected' : ''?>>Electoral Officer</option>
                            <option value="accelerated" <?=old('remark') == 'assist electoral officer' ? 'selected' : ''?>>Assistant Electoral Officer</option>
                            <option value="security" <?=old('remark') == 'security' ? 'selected' : ''?>>Security</option>
                            <option value="driver" <?=old('remark') == 'driver' ? 'selected' : ''?>>Driver</option> 
                        </select>
                    </div>
                    <div class="block lg:flex items-center justify-end space-x-2">
                        <button type="submit" class="btn btn-primary">Create Record</button>
                        <button type="reset" class="btn btn-outline btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
</div>

<script>
    const promoDialog = document.getElementById('promotionModal')
    const closePromoButton = document.getElementById('closePromotionModal')

    closePromoButton.addEventListener('click', (event) => {
        event.preventDefault()
        promoDialog.close()
    })

    const postingModal = document.getElementById('transferModal')
    const closePostingModal = document.getElementById('closeTransferModal')

    closePostingModal.addEventListener('click', (event) => {
        event.preventDefault()
        postingModal.close()
    })

</script>

<script>
    $(function(){
        $('#statesField').on('change', function(){
            var selectedState = $(this).val()

            if(selectedState != '')
            {
                //$(threadAction).removeClass('hidden')
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

                        //$(threadAction).addClass('hidden')
                    },
                    // error : function(error)
                    // {
                    //     console.log(error)
                    // }
                })
            }
        })
    })
</script>