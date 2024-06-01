<div class="bg-base-200 sticky top-0 z-30 flex h-16 w-full justify-center bg-opacity-90 backdrop-blur transition-all duration-100 px-2 text-base-content shadow-xl">
    <nav class="navbar justify-between w-full">
        <div class="hidden w-full max-w-sm lg:flex">
            <h3 class="w-full lg:w-1/2 flex items-center justify-start space-x-2">
                <div class="btn btn-primary rounded p-1 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-office" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                    </svg>
                </div>
                <a href="<?=base_url('/')?>" class="font-sans font-medium text-gray-500">
                    <span class="">Office Helper</span>
                </a>                               
            </h3> 
            <label for="my-drawer" class="btn btn-light drawer-button lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-column-insert-left" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 4h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1z" />
                    <path d="M5 12l4 0" />
                    <path d="M7 10l0 4" />
                </svg>
            </label> 
        </div> 
        <div class="flex-0">
            <div class="btn btn-ghost hover:bg-primary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'home' || NULL == $uri->getSegment(1) ? 'border-b-blue-600' : ''?>">
                <a href="<?=base_url()?>" class="text-sm flex flex-row items-center justify-between space-x-1">  
                    <span>
                        <i data-feather="home"></i>
                    </span>
                    <span>Home</span>
                </a>
            </div>
            <div class="btn btn-ghost hover:bg-primary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'staff' ? 'border-b-blue-600' : ''?>">
                <a href="<?=base_url('staff')?>" class="text-sm flex flex-row items-center justify-between space-x-1">
                    <span>
                        <i data-feather="users"></i>
                    </span>
                    <span>Staff</span>
                </a>
            </div>
            <div class="btn btn-ghost hover:bg-primary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'payslip' ? 'border-b-blue-600' : ''?>">
                <a href="<?=base_url('payslip')?>" class="text-sm flex flex-row items-center justify-between space-x-1">
                    <span>
                        <i data-feather="file-text"></i>
                    </span>
                    <span>Payslip</span>
                </a>
            </div>
            <div class="btn btn-ghost hover:bg-primary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'departments' ? 'border-b-blue-600' : ''?>">
                <a href="#" class="text-sm flex flex-row items-center justify-between space-x-1">
                    <span>
                        <i data-feather="box"></i>
                    </span>
                    <span>Departments</span>
                </a>
            </div>
            <div class="dropdown dropdown-end">
                <div tabindex="0" class="btn normal-case bg-primary hover:bg-blue-950 text-white rounded-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span>Options</span>
                    <svg width="12px" height="12px" class="hidden h-2 w-2 fill-current opacity-60 sm:inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048"><path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path></svg>
                </div>
                <div class="dropdown-content bg-base-100 text-base-content rounded-sm top-px w-56 overflow-y-auto shadow mt-14">
                    <div class="grid grid-cols-1 gap-3 p-2" tabindex="0">
                        <a href="#" class="outline-base-content overflow-hidden rounded-lg text-left flex space-x-2 align-center text-sm p-3 hover:bg-secondary hover:text-white">
                            <span>
                                <i data-feather="book-open"></i>
                            </span>
                            <span>Nominal Roll</span>
                        </a>
                        <a href="<?=base_url('home/manual')?>" class="outline-base-content overflow-hidden rounded-lg text-left flex space-x-2 align-center text-sm p-3 hover:bg-secondary hover:text-white">
                            <span>
                                <i data-feather="edit-3"></i>
                            </span>
                            <span>Manual Payslip</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>