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
            <button type="reset" class=" w-full md:w-1/2 hover:bg-gray-100 text-gray-600 py-2 px-4 hover:rounded-l=md">Cancel Search</button>
            <button type="submit" class="w-full md:w-1/2 bg-teal-400 hover:bg-teal-500 font-semibold text-white hover:text-dark font-sans py-2 px-4 rounded-md">Advanced Search</button>
        </div>
    </div>
</form>