        
                <div class="flex w-full">
                    <div class="w-full flex items-center justify-center mt-5 p-4">
                        <p class="font-sans text-xs text-slate-400">Created by &copy;aknessy <?=date('Y')?></p>
                    </div>
                </div>
            </div>
        </div> 

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>


        <script>
           
            
        </script>
        
        <script type="text/javascript">
            
        </script>

        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    </body>
</html>