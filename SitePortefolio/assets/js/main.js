jQuery(document).ready(function(){

    $('#myForm').on('submit', function(e){
        e.preventDefault();
        function resetForm(){
            $(':input','myForm')
            .not(':boutton, :submit, :reset, :hidden')
            .val('');
        }
    });

});
