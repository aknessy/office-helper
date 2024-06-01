<div id="scrollTo" class="w-full lg:w-4/5 md:w-4/5 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="flex w-full items-center justify-between mb-6 mt-5">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="<?=base_url()?>">Home</a></li> 
                <li class="text-gray-300">Staff List</li>
            </ul>
        </div>
        <div class="flex items-center space-x-1">
            <div class="join">
                <input id="searchPhrase" type="text" placeholder="Search Nominal Roll" class="join-item text-xs text-gray-500 input input-bordered focus:outline-none input-sm w-full max-w-xs" />
                <button id="searchSubmitBtn" class="join-item btn btn-outline bt btn-sm text-xs flex flex-col" data-target="#searchPhrase">
                    <span>Search</span>
                </button>
            </div>
            <div class="tooltip tooltip-info tooltip-left" data-tip="Enter Staff Name or File Number (In the format P.xxx)">
                <span class="cursor-help">
                    <i class="text-sm text-gray-600" data-feather="help-circle"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="hero bg-base-200 flex items-center justify-between py-2 px-4 rounded-lg mb-5 w-full">
        <div class="flex flex-col w-full">
            <h3 class="font-bold text-2xl text-dark">Staff Nominal Roll</h3>
            <p class="text-xs mb-3">List of Commission staff deployed to Cross River State</p>
        </div>
        <a href="<?=base_url('staff/add-record')?>" class="inline-flex flex-col hover:bg-secondary text-xs py-2 px-3 text-white btn btn-sm bg-blue-950 capitalize items-center justify-between">
            <i data-feather="user-plus"></i>
            <span>Add Record</span>
        </a>
    </div>
    <div id="searchResponseContainer" class="w-full">
        <div class="w-full overfow-x-auto">
            <table class="table table-zebra border">
                <thead class="text-white bg-gray-500">
                    <tr class="font-semibold uppercase">
                        <th>S/N</th>
                        <th>Staff Names</th>
                        <th>File No.</th>
                        <th>Grade</th>
                        <th>Step</th>
                        <th>Retirement</th>
                        <th>Retirement Mode</th>
                        <th>Action(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(!empty($staff)){
                        $sn = 1;
                        foreach($staff as $obj)
                        {?>
                            <tr class="<?=$sn % 2 !== 0 ? 'hover' : ''?>">
                                <td><?=$sn?>.</td>
                                <td>
                                    <div class="flex items-center gap-3 w-full">
                                        <div class="avatar">
                                            <div class="mask mask-squircle rounded-full p-1 shadow-lg bg-white border border-gray-400">
                                                <span class="font-semibold text-base">
                                                    <i data-feather="grid"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="w-full">
                                                <span class="font-bold">
                                                    <?=ucwords(strtolower($obj->staff_name))?>
                                                </span>
                                            </div>
                                            <div class="flex items-center justify-between w-full text-ellipsis whitespace-nowrap">
                                                <span class="text-xs opacity-50 uppercase">
                                                    <?=isset(DESIGNATION[$obj->rank]) ? strtoupper(DESIGNATION[$obj->rank]) : ''?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?=$obj->file_no?></td>
                                <td><?=$obj->grade_level?></td>
                                <td><?=$obj->step?></td>
                                <!-- <td><?=$obj->date_of_birth != NULL || $obj->date_of_birth !== 'null' ? date('l jS \of F Y', strtotime(str_replace('/','-',$obj->date_of_birth))) : ''?></td>
                                <td><?=$obj->first_appt != NULL || $obj->first_appt != 'null' ? date('l jS \of F Y', strtotime(str_replace('/','-',$obj->first_appt))) : ''?></td> -->
                                <td>
                                    <?php 
                                        if(strtolower($obj->rank) != 'rec'){
                                            echo retire_when($obj->date_of_birth, $obj->first_appt);                                       
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if(strtolower($obj->rank) != 'rec'){
                                            echo retire_when($obj->date_of_birth, $obj->first_appt, 'mode');
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="w-full flex justify-start items-start space-x-1">
                                    <?php
                                        if(strtolower($obj->rank) !== 'rec'){?>
                                             <a href="#" class=" btn-xs btn btn-outline text-sm btn-warning text-yellow-400">
                                                <span class="text-xs">Edit</span>
                                             </a>
                                             <a href="#" class="btn btn-xs btn-outline text-sm btn-danger text-red-300">
                                                <span class="text-xs">Trash</span>
                                             </a>
                                             <a href="<?=base_url('staff/staff-view/' . $obj->uid)?>" class="btn btn-xs btn-outline text-sm btn-info text-blue-300">
                                                <span class="text-xs">View</span>
                                             </a>
                                        <?php
                                        }else{?>

                                        <?php 
                                        }
                                    ?>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        $sn++;
                        }   
                    }else{?>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="w-full flex items-center justify-center mt-2 mb-2">
            <?= $pager->links('default', 'tailwind_pagination') ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#searchSubmitBtn').click(function(){
            var target = $(this).data('target');
            var searchTerm = $(target).val()
            var threadAction = $('#activityInProgress')

            if(searchTerm != ''){
                $(threadAction).removeClass('hidden')

                $.ajax({
                    url : '<?=base_url('staff/fetch-staff')?>',
                    method : 'post',
                    data : {query : searchTerm},
                    success : function(res){
                        $('#searchResponseContainer').empty().append(res)
                        $(threadAction).addClass('hidden')
                    },
                    error : function(err){}
                })
            }
        })
    })
</script>