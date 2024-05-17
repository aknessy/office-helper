        
        <div class="flex w-full">
            <div class="w-full flex items-center justify-center p-4">
                <p class="font-sans text-xs text-slate-400">Created by &copy;aknessy 2023 - <?=date('Y')?></p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dismissible.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


        <script>
            $(document).ready(function(){
                var options = {
                    dateFormat : 'Y-m',
                    ariaDateFormat : 'F j, Y'
                } 

                $(".datepicker-widget").flatpickr();
                $(".datepicker-widget-ym").flatpickr(options);
            });

            $('#alertDismiss').click(function(e){e.preventDefault()})

            /**
             * All elements that have a data-feather attribute will be replaced with SVG markup corresponding to their data-feather attribute value. 
             * https://github.com/feathericons/feather#feather
             */
            feather.replace()
            
        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                var targetEl = $('#searchQuery')
                var submitBtn = $('#submitQuery')
                var dateWidget = $('#paySlipDate')

                var noResultContainer = $('#containerSearchIllustration');
                var resultContainer = $('#recordsContainer')
                
                $(targetEl).on('blur', function(){
                    var query_string = $(this).val();

                    if(query_string != '')
                        $(submitBtn).removeClass('pointer-events-none')
                    else
                        alert("Please fill the file number field!")
                })

                $(dateWidget).on('change', function(){
                    var date_string = $(this).val();

                    if($(targetEl).val() != ''  && date_string != '')
                        $(submitBtn).removeClass('pointer-events-none')
                    else
                        alert("You forgot the date field!")
                })
                

                $(submitBtn).on('click', function(){
                    var searchTerms = $(targetEl).val()
                    var selectedDate = $(dateWidget).val()

                    if(searchTerms !== '' && selectedDate !== '')
                        window.location.href = "<?=base_url('payslip/withterms/')?>" + searchTerms + '/' + selectedDate
                })
            })
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

    <?php 
        if(session()->getFlashdata('flashError')){ ?>
            <script>
                swal({
                    title: "Error",
                    text: "<?=session()->getFlashdata('flashError')?>",
                    icon: "error",
                });
            </script>
        <?php }
            if(session()->getFlashdata('flashSuccess')){?>
            <script>
                swal({
                    title: "Success",
                    text: "<?=session()->getFlashdata('flashSuccess')?>",
                    icon: "success",
                });
            </script>
        <?php }
            if(session()->getFlashdata('flashWarning')){?>
            <script>
                swal({
                    title: "Warning",
                    text: "<?=session()->getFlashdata('flashWarning')?>",
                    icon: "warning",
                });
            </script>
        <?php }?>
    </body>
</html>