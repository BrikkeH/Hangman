function SubmitFormData(){
    var letter = $("#letterinput").val();
    $.post("submit.php", { letter: letter});
}