        
                <div class="flex w-full">
                    <div class="w-full flex items-center justify-center mt-5 p-4">
                        <p class="font-mono text-xs text-slate-500">Created by &copy;aknessy <?=date('Y')?></p>
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
                var noResultContainer = $('#containerSearchIllustration');
                var resultContainer = $('#recordsContainer')

                $(targetEl).on('blur', function(){
                    var searchTerms = $(this).val()

                    if(searchTerms !== ''){
                        $(noResultContainer).addClass('hidden').removeClass('flex')
                        $(resultContainer).removeClass('hidden').addClass('flex')

                        $.ajax(
                            {
                                url : '<?=base_url('/home/fetch_ajax')?>',
                                type : 'post',
                                data : {term : searchTerms, <?=csrf_token()?> : '<?=csrf_hash()?>'},
                                success : function(response){
                                    if(response){
                                        let res = JSON.parse(response)
                                        
                                        if(res.message){
                                            $('#responseText').html(res.message)
                                            $(noResultContainer).removeClass('hidden').addClass('flex')
                                            $(resultContainer).removeClass('hidden').addClass('flex')
                                        }else
                                            $(resultContainer).html(response)
                                    }
                                },
                                error : function(err){
                                    console.log(err)
                                }
                            }
                        )
                    }
                })
            })
        </script>
    </body>
</html>