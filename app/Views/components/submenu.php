<div class="drawer-side bg-secondary shadow-sm">
    <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="flex-col lg:hidden w-10 flex mt-10 lg:mt-0">
        <nav role="nav">
            <ul class="flex w-full flex-col">
                <li class="class="<?=$uri->getSegment(1) == 'deductions' ? 'bg-white rounded-l-md hover:bg-gray-50 shadow-lg' : 'bg-gray-50 opacity-30 hover:opacity-50'?>">
                    <a href="<?=base_url('deduction/status/')?>" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-gray-500 text-sm font-sans font-regular">
                        <i data-feather="folder-plus"></i>
                    </a>
                </li>
                <li class="class="<?=$uri->getSegment(1) == 'accounts' ? 'bg-white rounded-l-md hover:bg-gray-50 shadow-lg' : 'bg-gray-50 opacity-30 hover:opacity-50'?>">
                    <a href="" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-gray-500 text-sm font-sans font-regular">
                        <ion-icon name="wallet-outline"></ion-icon>
                    </a>
                </li>
                <li class="<?=$uri->getSegment(1) == 'allowances' ? 'bg-white rounded-l-md hover:bg-gray-50 shadow-lg' : 'bg-gray-50 opacity-30 hover:opacity-50'?>">
                    <a href="" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-gray-500 text-sm font-sans font-regular">
                        <ion-icon name="heart-half-outline"></ion-icon>
                    </a>
                </li>
                <li class="<?=$uri->getSegment(1) == 'cpssheet' ? 'bg-white rounded-l-md hover:bg-gray-50 shadow-lg' : 'bg-gray-50 opacity-30 hover:opacity-50'?>">
                    <a href="" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-gray-500 text-sm font-sans font-regular">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="LeftSidebar" class="flex flex-col mt-0 lg:mt-10">
        <nav role="nav">
            <ul class="flex w-full flex-col">
                <li class="<?=$uri->getSegment(1) == 'payslip' ? 'bg-white pointer-event-none' : 'hover:opacity-50'?>">
                    <a href="#" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-gray-500 text-sm font-sans font-regular">
                        <span>
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span>Payslip</span>
                    </a> 
                </li>
                <li class="<?=$uri->getSegment(1) == 'deductions' ? 'bg-white' : 'hover:opacity-50'?>">
                    <a href="<?=base_url('deductions')?>" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-white text-sm font-sans font-regular">
                        <span>
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span>Deductions</span>
                    </a> 
                </li>
                <li class="<?=$uri->getSegment(1) == 'accounts' ? 'bg-white' : 'hover:opacity-50'?>">
                    <a href="<?=base_url('accounts')?>" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-white text-base font-sans font-regular">
                        <span>
                            <ion-icon name="wallet-outline"></ion-icon>
                        </span>
                        <span>Account</span>
                    </a> 
                </li>
                <li class="<?=$uri->getSegment(1) == 'allowances' ? 'bg-white' : 'hover:opacity-50'?>">
                    <a href="<?=base_url('allowances')?>" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-white text-base font-sans font-regular">
                        <span>
                            <ion-icon name="heart-half-outline"></ion-icon>
                        </span>
                        <span>Allowances</span>
                    </a> 
                </li>
                <li class="<?=$uri->getSegment(1) == 'cpssheet' ? 'bg-white' : 'hover:opacity-50'?>">
                    <a href="#" class="w-full inline-flex items-center justify-start space-x-2 py-3 px-2 text-white text-base font-sans font-regular">
                        <span>
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span>CPS Deductions</span>
                    </a> 
                </li>
            </ul>
        </nav>
    </div>
</div>