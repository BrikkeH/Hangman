function SubmitFormData(){
    var letter = $("#letterinput").val();
    $.post("addlettertodb.php", { letter: letter},
    function(data) {
        $('#results').html(data);
	    $('#myForm')[0].reset();
    });
}