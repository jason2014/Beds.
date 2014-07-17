$(function(){
    var page = $('body').attr('id');

    if(page === 'admin-colleges'){

        $('.button').click(function(e){
            e.preventDefault();
            var key_str = '';
            var item_checked = [];
            
            $.each($('.item_check'), function(i, item){
                var $item = $(item);
                if($item.attr('checked')) {
                    item_checked.push($item);
                    key_str += $item.attr('key') + ',';
                }
            });
            var college = $('#college').val();
            if(college === '#' || key_str === '') {
                alert("请勾选宿舍,并请选择学院");
            } else {
                $.post('/api/distributebystorey', {key: key_str, college: college}, function(response) {
                    var response_obj = $.parseJSON(response);
                    if(response_obj.status === 'success') {

                        $.each(item_checked, function(i, item){

                            
                            item.closest('.item').remove();
                        });
                        alert("宿舍分配成功");
                    }
                });
            }            
        });
    }
});
