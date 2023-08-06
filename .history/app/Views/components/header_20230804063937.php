<!Doctype html>
<html>
<head>
    <title><?=esc($page_title)?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> 

    <link rel="stylesheet" href="<?=base_url('css/app.css')?>">
</head>
<body class="bg-slate-200 ">
  <div class="w-full h-screen mt-7">
    <div class="flex flex-col lg:w-2/3 md:w-1/2 mx-auto py-4 space-y-4">
        <div class="w-full flex lg:flex-row items-center lg:justify-between pb-10 mb-2">
            <h3 class="w-full lg:w-1/2 flex items-center justify-start space-x-2">
                <div class="bg-zinc-400 rounded p-1 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-office" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 18h9v-12l-5 2v5l-4 2v-8l9 -4l7 2v13l-7 3z"></path>
                    </svg>
                </div>
                <a href="<?=base_url('/')?>" class="font-sans font-medium text-gray-500">
                    <span class="">Office Helper</span>
                </a>
            </h3>
            <div class="w-full lg:w-1/2 flex items-center justify-end">
                <nav role="navigation">
                    <ol aria-label="menu" class="flex items-center">
                        <li class="mr-4">
                            <a href="#" class="text-xs text-gray-400 hover:text-gray-600 hover:underline flex flex-row font-semibold space-x-1 items-center px-3 py-2">
                                <span class="p-1 rounded bg-blue-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="7 10 12 15 17 10"></polyline>
                                        <line x1="12" y1="15" x2="12" y2="3"></line>
                                    </svg>
                                </span>
                                <span>Download Nominal Roll</span>
                            </a>
                        </li>
                        <li>
                            <div class="relative inline-block text-left">
                                <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-blue-50 hover:bg-white focus:bg-white px-3 py-2 text-xs font-semibold text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    <span>Options</span>
                                    <svg class="-mr-1 h-5 w-5 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div class="absolute tight-0 z-10 mt-2 w-auto origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Generate Manually</a>
                                        <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Automated Payslip</a>
                                        <!-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
                                        <form method="POST" action="#" role="none">
                                            <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                                        </form> -->
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php
        if(!session()->getFlashdata('error')){ ?>
        <div class="flex flex-col w-full mb-6 mt-0 space-x-3">
            <div class="bg-blue-200 flex space-x-3 mb-4 items-center justify-start shadow-sm">
                <span class="h-full p-4 items-center justify-center font-sans text-2xl text-gray-700">
                    <i data-feather="alert-octagon"></i>
                </span>
                <p class="text-gray-700 text-sm font-sans leading-tight antialiased text-left m-0">This application is primarily designed to facilitate easy creation of official payslips. Other Envisage functionality are currently beyond the interim scope. However, planned expansion cannot be ruled out. Hope it serves its immediate purpose. Enjoy basic automation!</p>
            </div>
        </div>
        <?php }else{?>
            <div class="flex flex-col w-full mb-6 mt-0 space-x-3">
                <div class=" bg-red-400 flex space-x-3 mb-4 items-center justify-start shadow-sm">
                    <span class="h-full p-4 items-center justify-center font-sans text-2xl text-red-700">
                        <i data-feather="alert-octagon"></i>
                    </span>
                    <p class="text-red-700 text-sm font-sans leading-tight antialiased text-left m-0"><?=session()->getFlashdata('error')?></p>
                </div>
            </div>
        <?php } ?>