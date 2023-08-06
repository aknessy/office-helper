
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
    <div>
        <?=base_url('svgs/searc')
    </div>
</div>
