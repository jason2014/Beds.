$(function(){
    $page = $('body').attr('id');

    if($page === 'admin-colleges'){
        $('#submit').click(function(){
            $college = $('#college').val();            
            $room_marks = $('#room_mark').val().replace(/\s/g,"");

            if($college === '#' || $room_marks === '') {
                alert("请选择学院，并且填入宿舍码");
            } else {
                
            }
        });
    }
});  
