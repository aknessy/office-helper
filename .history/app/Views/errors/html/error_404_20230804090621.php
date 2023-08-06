
    <?php 
        echo view('components/header', ['page_title' => lang('Errors.pageNotFound'), 'uri' => new \CodeIgniter\HTTP\URI()]);
        echo view('components/main-menu');
    ?>

    <main class="grid bg-[u min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-base font-semibold text-indigo-600">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">
                <code class="bg-gray-200 rounded-lg p-2 italic"><?=(ENVIRONMENT != 'production' ? nl2br(esc($message)) : lang('Errors.sorryCannotFind'))?></code>
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="<?=base_url()?>" class="w-full rounded-md bg-blue-500 hover:bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Go back home</a>
                <!-- <a href="#" class="text-sm font-semibold text-gray-900">Contact support <span aria-hidden="true">&rarr;</span></a> -->
            </div>
        </div>
    </main>

    <?php
        echo view('components/footer');
    ?>

