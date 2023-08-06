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
            <div class="w-full lg:w-1/2"></div>
        </div>
        <div class="flex flex-col w-full mb-6 mt-0 space-x-3">
            <div class="bg-blue-200 flex space-x-3 mb-4 items-center justify-start">
                <span class="h-full p-4 items-center justify-center font-sans text-2xl text-gray-700">
                    <i data-feather="alert-octagon"></i>
                </span>
                <p class="text-gray-700 text-sm font-sans leading-tight antialiased text-left">This application is pr designed to facilitate easy creation of payslips, but i have envisioned a scenario where this basic functionality will metamorphosed into something more fun</p>
            </div>
        </div>
        
