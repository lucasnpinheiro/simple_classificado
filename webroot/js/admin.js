$('document').ready(function(){
    $('.busca :input').change(function(e){
        e.preventDefault();
        $(this).closest('form').submit();
    });
});