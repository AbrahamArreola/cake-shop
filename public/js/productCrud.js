$(".modal").on("hidden.bs.modal", function(){
    $(this).find(".resettable").val('').removeClass('errorValidation').end();
    $(this).find("select").prop('selectedIndex', 0).removeClass('errorValidation').end();
    $(this).find("p").text('').end();
});

$("#editCategoriesTrigger").on("click", function(){
    $("#categoryModal").modal("show");
});

$('[data-toggle="tooltip"]').tooltip({
    trigger : 'hover'
});

$("#priceRange").on("input", function(){
    $("#amount").val("$0 - $" + $("#priceRange").val());
});
