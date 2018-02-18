$(document).ready(function() {
    $(document).on("focus", '.datepicker', function(){
       $(this).datepicker({
           dateFormat : 'yy-mm-dd',
           changeMonth : true,
           changeYear : true,
           yearRange: '-100y:c+nn',
           minDate: '+0d'
       });
    });
});