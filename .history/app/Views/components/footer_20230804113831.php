        
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
            $(document).ready(function(){
                $(".datepicker-widget").flatpickr();
            });

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

                var noResultContainer = $('#containerSearchIllustration');
                var resultContainer = $('#recordsContainer')

                $(submitBtn).on('click', function(){
                    var searchTerms = $(targetEl).val()

                    if(searchTerms !== ''){
                        
                        $(noResultContainer).hide()
                        $(resultContainer).html(''+
                        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="80px" height="80px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                          + ''  <circle cx="50" cy="50" fill="none" stroke="#418df9" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                            </svg>
                            <p class="text-gray-400 text-xs font-sans pb-8 mb-4 font-semibold">Working on it...</p>)
                        .show()
                        
                        $.ajax(
                            {
                                url : '<?=base_url('/home/fetch_ajax')?>',
                                type : 'post',
                                dataType: 'html',
                                data : {term : searchTerms, <?=csrf_token()?> : '<?=csrf_hash()?>'},
                                success : function(response)
                                {
                                    $(resultContainer).empty().html(response)
                                },
                                error : function(err){
                                    $(resultContainer).empty().hide()
                                    $(noResultContainer).show()
                                }
                            }
                        )
                    
                    }else{
                        $(resultContainer).empty().hide()
                        $(noResultContainer).show()
                    }
                })
            })
        </script>
    </body>
</html>