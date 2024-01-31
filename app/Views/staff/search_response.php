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
                        <td><?=$sn?>
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
                <tr>
                    <td colspan="8">
                        <div class="w-full flex flex-col items-center justify-center py-16">
                            <?=view('fragments/empty-state')?>
                            <h3 class="font-semibold font-sans text-md text-sm text-gray-600">No record found</h3>
                            <p class="text-xs text-gray-500">Your search did not produce any result</p>
                        </div>
                    </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>