<div class="w-full mt-0 text-left">
  <nav aria-label="breadcrumb" class="w-max">
    <ol class="flex w-full flex-wrap items-center rounded-md bg-blue-gray-50 bg-opacity-60 py-2 px-4">
      <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
        <a class="opacity-60" href="<?=base_url()?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
          </svg>
        </a>
        <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
          /
        </span>
      </li>
      <li class="flex cursor-pointer items-center font-sans text-sm font-normal leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
        <a class="opacity-60" href="#">
          <span>Components</span>
        </a>
        <span class="pointer-events-none mx-2 select-none font-sans text-sm font-normal leading-normal text-blue-gray-500 antialiased">
          -
        </span>
      </li>
      <li class="flex cursor-default pointer-events-none items-center font-sans text-sm font-medium leading-normal text-blue-gray-900 antialiased transition-colors duration-300 hover:text-blue-300">
        <span>
          Generate Manually
        </span>
      </li>
    </ol>
  </nav>
</div>
<form action="" method="post" class="w-full">
    <div class="bg-white w-full rounded-lg mb-6 py-3 px-3">
        <div class="flex flex-wrap mb-3">
            <div class="w-full md:w-1/2 px-3 md:mb-0">
                <div class="relative h-10 w-72 min-w-[200px]">
                    <select class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-red-500 focus:border-2 focus:border-blue-400 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                        <option value="">Select Month</option>

                        <?php foreach(MONTH_WITH_NAMES as $num => $name){?>
                            <option value="<?=$num?>"><?=ucfirst(strtolower($name))?>
                            <?php } ?>
                    </select>
                    <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-base font-semibold leading-tight text-blue-gray-300 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Select a month
                    </label>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="relative h-10 w-full min-w-[200px]">
                    <select class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-red-500 focus:border-2 focus:border-blue-400 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50">
                        <option value="">Select Month</option>

                        <?php for($i = 2004; $i <= date('Y'); $i++){?>
                            <option value="<?=$i?>"><?=$i?>
                            <?php } ?>
                    </select>
                    <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-base font-semibold leading-tight text-blue-gray-300 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-pink-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-pink-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-pink-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                        Select a year
                    </label>
                </div>
            </div>
            
        </div>
        <div class="flex flex-wrap mb-3">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-file-no">
                    Staff File No.:
                </label>
                <input class="appearance-none block border rounded bg-gray-200 w-full py-2 px-2 text-blue-gray-700 text-sm font-italic font-light leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-file-no" name="file_num" type="text" placeholder="File no.">
            </div>
        </div>
        <div class="flex flex-wrap mb-3">
            <div class="w-full md:w-1/3 px-3 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    First Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text"  name="firstname" placeholder="Jane">
                <p class="text-red-500 text-xs italic"></p>
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-middle-name">
                    Middle Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-middle-name" type="text" name="middlename" placeholder="Doe">
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Last Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" name="lastname placeholder="Tom">
            </div>
        </div>
        <div class="flex flex-wrap mb-8">
            <div class="w-full md:w-1/2 px-3 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-dob">
                    Date of Birth
                </label>
                <input class="datepicker-widget appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-dob" type="text" name="dob" placeholder="yyyy/mm/dd">
            </div>
            <div class="w-full md:w-1/2 px-3 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-dofa">
                    Date of First Appointment
                </label>
                <input class="datepicker-widget appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-dofa" type="text" name="first_appt" placeholder="yyyy/mm/dd">
            </div>
        </div>

        <div class="flex flex-wrap justify-between w-full px-3 mb-4">
            <button type="reset" class=" w-full md:w-1/2 hover:bg-gray-100 text-gray-600 py-2 px-4 hover:rounded-l=md">Reset</button>
            <button type="submit" class="w-full md:w-1/2 bg-blue-400 hover:bg-blue-500 font-semibold text-white hover:text-dark font-sans py-2 px-4 rounded-md">Generate Payslip</button>
        </div>
    </div>
</form>