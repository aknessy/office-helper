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
  <div class="w-full h-screen mt-12">
    <div class="flex flex-col lg:w-2/3 md:w-1/2 mx-auto py-4 space-y-4">
        <div class="flex flex-row items-center w-full justify-content-between justify-between pb-10 mb-5">
            <h3 class="flex items-center justify-start space-x-2">
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
            <div class="w-max text-left">
                <nav aria-label="breadcrumb">
                     <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-4">
                    <?php
                        if($breadcrumbs):
                            foreach ($breadcrumbs as $key => $menu):
                                echo '<li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-teal-400">';
                                if ($key == 0 && $menu !== ''):
                                    echo "<a href='" . base_url('/') . "' class='opacity-60'>"; 
                                    echo "<span>Home</span>";
                                    echo "<span class='pointer-events-none mx-2 select-none font-sans text-sm leading-normal text-blue-gray-500 antialiased'>/</span";
                                    echo "</a>";
                                elseif ($key == 0 && $menu == ''):
                                    echo "<a href='" . base_url('/') . "' class='opacity-60 flex space-x-2'>"; 
                                    echo "<span><i data-feather='home' class="m-0"></i> Home</span>";
                                    echo "<span class='pointer-events-none mx-2 select-none font-sans text-sm leading-normal text-blue-gray-500 antialiased'>/</span";
                                    echo "</a>";  
                                else:
                                    echo "<a href='" . base_url($menu) . "' class='opacity-60'>"; 
                                    echo "<span>" . $menu . "</span>";
                                    echo "<span class='pointer-events-none mx-2 select-none font-sans text-sm leading-normal text-blue-gray-500 antialiased'>/</span";
                                    echo "</a>";
                                endif;
                                echo '</li>';
                            endforeach;
                        endif;
                        ?>
                    </ol>
                </nav>
               
            </div>
        </div>
        
