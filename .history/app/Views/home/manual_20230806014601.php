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
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-file-no">
                    Staff File No.:
                </label>
                <input class="appearance-none block border rounded bg-gray-200 w-full py-2 px-2 text-gray-700 text-sm font-italic font-light leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-file-no" name="file_num" type="text" placeholder="File no.">
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
            <button type="reset" class=" w-full md:w-1/2 hover:bg-gray-100 text-gray-600 py-2 px-4 hover:rounded-l=md">zR</button>
            <button type="submit" class="w-full md:w-1/2 bg-blue-400 hover:bg-blue-500 font-semibold text-white hover:text-dark font-sans py-2 px-4 rounded-md">Generate Payslip</button>
        </div>
    </div>
</form>