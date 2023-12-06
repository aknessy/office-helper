<!Doctype html>
<html data-theme="winter">
<head>
    <title><?=esc($page_title)?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 
    <link rel="stylesheet" href="<?=base_url('css/icofont.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/app.css')?>">
</head>
<body>
    <div class="w-full h-screen">
        <div class="bg-base-200 sticky top-0 z-30 flex h-16 w-full justify-center bg-opacity-90 backdrop-blur transition-all duration-100 px-2 text-base-content shadow-xl">
            <nav class="navbar justify-between w-full">
                <div class="hidden w-full max-w-sm lg:flex">
                    <h3 class="w-full lg:w-1/2 flex items-center justify-start space-x-2">
                        <div class="btn btn-secondary rounded p-1 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-office" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                            </svg>
                        </div>
                        <a href="<?=base_url('/')?>" class="font-sans font-medium text-gray-500">
                            <span class="">Office Helper</span>
                        </a>
                    </h3>  
                </div> 
                <div class="flex-0">
                    <div class="btn btn-ghost hover:bg-secondary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'home' || NULL == $uri->getSegment(1) ? 'border-b-blue-950' : ''?>">
                        <a href="<?=base_url()?>" class="text-sm flex flex-row items-center justify-between space-x-1">  
                            <span>
                                <i data-feather="home"></i>
                            </span>
                            <span>Home</span>
                        </a>
                    </div>
                    <div class="btn btn-ghost hover:bg-secondary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'staff' ? 'border-b-blue-950' : ''?>">
                        <a href="#" class="text-sm flex flex-row items-center justify-between space-x-1">
                            <span>
                                <i data-feather="users"></i>
                            </span>
                            <span>Staff</span>
                        </a>
                    </div>
                    <div class="btn btn-ghost hover:bg-secondary hover:text-white normal-case border-b-2 rounded-0 <?=$uri->getSegment(1) == 'departments' ? 'border-b-blue-950' : ''?>">
                        <a href="#" class="text-sm flex flex-row items-center justify-between space-x-1">
                            <span>
                                <i data-feather="box"></i>
                            </span>
                            <span>Departments</span>
                        </a>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" class="btn normal-case bg-secondary hover:bg-blue-950 text-white rounded-md ">
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
        <div class="flex flex-col lg:w-2/3 md:w-1/2 mx-auto py-4 space-y-4">
        