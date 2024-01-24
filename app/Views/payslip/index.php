<div id="scrollTo" class="w-full lg:w-2/3 md:w-1/2 mx-auto min-h-96 justify-center rounded-lg pt-6">
    <div class="hero bg-base-200 flex flex-col items-center justify-center py-5 px-2 rounded-lg mb-5">
        <div class="w-full flex flex-row items-center justify-between p-2">
            <div class="flex w-full gap-x-3 gap-y-3">
                <div class="flex w-full lg:w-2/3 md:w-2/3 gap-x-3">
                    <div class="py-2 w-full">
                        <input id="searchQuery" class="input input-bordered input-info w-full max-w-xs" type="text" placeholder="Staff name/file no. (e.g P.123)">
                    </div>
                    <div class="relative flex text-left py-2 w-full">
                        <input id="paySlipDate" class="datepicker-widget-ym input input-bordered input-info w-full max-w-xs" type="text" placeholder="Year & Month" />
                    </div>
                </div> 
                <div class="w-full lg:w-1/3 md:w-1/2 flex items-center">
                    <button id="submitQuery" class="w-full flex flex-row gap-x-3 bg-blue-950 text-white rounded-md p-2 items-center pointer-events-none">
                        <i data-feather="search" class="font-semibold font-sans text-xs h-5 w-5 text-lg"></i>
                        <span class="text-lg font-semibold font-sans">Generate Pay Slip
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>