 $(document).ready(function(){
        var options = {
            dateFormat : 'Y-m',
            ariaDateFormat : 'F j, Y'
        } 

        $(".datepicker-widget").flatpickr();
        $(".datepicker-widget-ym").flatpickr(options);
    });

    /**
     * All elements that have a data-feather attribute will be replaced with SVG markup corresponding to their data-feather attribute value. 
     * https://github.com/feathericons/feather#feather
     */
    feather.replace()

    $(document).ready(function(){
                var targetEl = $('#searchQuery')
                var submitBtn = $('#submitQuery')

                var noResultContainer = $('#containerSearchIllustration');
                var resultContainer = $('#recordsContainer')
                
                $(submitBtn).on('click', function(){
                    var searchTerms = $(targetEl).val()

                    if(searchTerms !== '')
                    {
                        $(noResultContainer).removeClass('flex').addClass('hidden')
                        $(resultContainer).addClass('flex').removeClass('hidden')
                        
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
                                    $(noResultContainer).removeClass('hidden').addClass('flex')
                                    $(resultContainer).addClass('hidden').removeClass('flex')
                                }
                            }
                        )
                    
                    }else{
                        $(noResultContainer).removeClass('hidden').addClass('flex')
                        $(resultContainer).addClass('hidden').removeClass('flex')
                    }
                })
            })