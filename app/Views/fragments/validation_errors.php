<?php if (! empty($errors)): ?>
    <div class="flex flex-col font-regular w-full rounded-lg shadow-2xl" data-dismissible="alert">
        <div class="flex flex-row items-center justify-between w-full rounded-t-lg bg-pink-600 border-b border-b-pink-700 p-2 text-base leading-5 text-white opacity-100">
            <h3 class="inline-flex items-center justify-start space-x-2">
                <span>
                    <i data-feather="alert-triangle" class="text-lg font-semibold text-white"></i>
                </span>
                <span class="font-semibold text-white text-lg">Validation Errors</span>
            </h3>
            <div class="bg-pink-800 border border-pink-900 text-white ring-inset ring-dark w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-30" data-dismissible-target="alert">
                <button id="alertDismiss" role="button" class="w-max rounded-lg p-1" data-alert-dimissible="true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        <ul class="p-2 bg-pink-500 border border-t-0 border-pink-600 rounded-b-lg list-disc pl-7">
            <?php foreach ($errors as $error): ?>
                <li class="text-sm text-white italic"><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

