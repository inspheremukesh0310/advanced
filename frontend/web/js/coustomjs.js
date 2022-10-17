
// $(function(){
//     alert('sfghjdj');
// });

$(function(){
$('#modalbtn').click(function(){
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
})
});