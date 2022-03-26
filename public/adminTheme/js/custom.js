jQuery(".search-modules").click(function(e) {
    e.preventDefault();
    jQuery(".filter-panel").toggle("slow");
});

// tooltip
$( document ).ajaxComplete(function() {
    $('[data-toggle="tooltip"]').tooltip();
});