$(function() {
    var availableTags = [
        "Beasiswa Telkom University",
        "Beasiswa Pendidikan Indonesia",
        "Lomba 1",
        "Lomba 2",
    ];

    $(".form-control").autocomplete({
        source: availableTags,
        minLength: 2
    });
});