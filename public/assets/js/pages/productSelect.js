function closer(){
    $('#box a').on('click', function() {
        $(this).parent().parent().remove();
    });
}
$('#type').keypress(function(e) {
    if(e.which == 32) {//change to 32 for spacebar instead of enter
        var tx = $(this).val();
        if (tx) {
            $(this).val('').parent().before('<li><span>'+tx+'<a href="javascript:void(0);">x</a></span></li>');
            closer();
        }
    }
});

// Initialize the keywords input
const keywordsInput = document.getElementById('type');
keywordsInput.addEventListener('input', handleKeywordsInput);

function handleKeywordsInput() {
    const keywordsValue = keywordsInput.value.trim();
    const keywordsArray = keywordsValue.split(' ');

// Update the input value with the keywords joined by commas
    keywordsInput.value = keywordsArray.join(',');
}

$("#product_id").chosen({
    no_results_text: "Oops, nothing found!"
});

