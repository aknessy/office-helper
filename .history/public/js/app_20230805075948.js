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