$(document).ready(function(){
    console.log("hoge")
    $("#search_text").change(function(){
        console.log("change")
        var form = $(this).parents("form");
        $.ajax({
            url: $(this).parents("form").data("ajax-url"),
            type: 'GET',
            data: $(this).parents("form").serialize(),
            timeout: 10000,
        })
        .done(function(res) {
            form.find(".bot_template").html(res.bots);
        })
        .fail(function(e) {
            console.log(e);
        })
        .always(function() {
        });
    })
})