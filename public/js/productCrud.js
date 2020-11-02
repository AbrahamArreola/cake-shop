$(".modal").on("hidden.bs.modal", function(){
    $(this).find("input,textarea").val('').end();
    $(this).find("select").prop('selectedIndex', 0).end();
});
