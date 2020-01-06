$(document).ready(function () {
    $('#show-ajax').click(function () {
        var obj_ajax ={
            url: 'get_list.php',
            methot: "POST",
            data : {
              name: 'Manh'
            },
            success: function (result) {
               // console.log(result)
                $('#result-a-jax').html(result);
            }
        };
        $.ajax(obj_ajax)
    });
});