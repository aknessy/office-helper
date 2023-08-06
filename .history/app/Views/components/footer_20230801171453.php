        
                <div class="flex w-full">
                    <div class="w-full flex items-center justify-center ">
                        <p class="font-serif text-xs text-slate-500">Created by &copy;aknessy <?=date('Y')?></p>
                    </div>
                </div>
            </div>
        </div> 

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>


        <script>
            $(document).ready(function(){
                $(".datepicker-widget").flatpickr();
            });

            /**
             * All elements that have a data-feather attribute will be replaced with SVG markup corresponding to their data-feather attribute value. 
             * https://github.com/feathericons/feather#feather
             */
            feather.replace()
            
        </script>
        
    </body>
</html>