<div class="flex flex-col w-full mb-6 p-3  space-x-3">
    <div class="flex space-x-3 mb-4 items-center justify-start">
        <span class="h-full p-4 items-center justify-center font-sans text-2xl text-teal-600"></span>
        <p class="text-gray-400 text-sm font-sans leading-tight antialiased text-left">The main idea was to facilitate easy creation of payslips, but i have envisioned a scenario where this basic functionality will metamorphosed into something more fun</p>
    </div>
</div>
<div class="w-full flex flex-row items-center justify-between">
    <form class="w-1/2">
        <div class="w-full">
            <input class="appearance-none border border-gray-300 focus:border-gray-400 rounded-sm w-full py-2 px-3 text-gray-700 text-sm font-italic font-light leading-tight focus:outline-none focus:shadow-outline" id="searchQuery" type="text" placeholder="Staff name/file no.">
        </div>
    </form>
    <div class="flex flex-row w-1/2 align-items-center justify-end space-x-4">
        <a id="searchHistory" href="" class="text-xs font-sans text-slate-600 hover:underline py-2 px-2">Search History</a>
        <a id="advancedSearch" href="<?=base_url('home/advanced')?>" class="bg-teal-400 hover:bg-teal-500 text-xs font-sans py-2 px-2 rounded-sm">Advanced Search</a>
    </div>
</div>
<div class="w-full flex h-96 items-center justify-center bg-zinc-100 rounded-lg pt-10">
    <p class=" w-auto text-4xl text-gray-400">Center</p>
</div>
