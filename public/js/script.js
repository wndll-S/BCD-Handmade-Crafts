$(document).ready(function(){
function get_currencies(){
        $.ajax({
            type: "GET",
            url: "https://v6.exchangerate-api.com/v6/50be37966a920483c35442bd/codes",
            dataType: "json",
            success: function (response) {
                console.log(response);
                var jsonData = response;
                var supported_codes = jsonData.supported_codes;
                var jsonContainer = $('#available_currency');
                // Display the decoded data
                var select = $('.display_currencies');

                $.each(supported_codes, function(index, item) {
                    var currency_code = item[0];
                    var currency_name = item[1];

                    console.log('code: ' + currency_code, 'name: ' + currency_name);

                    // Append the option inside the loop
                    select.append($('<option>', {
                        value: currency_code,
                        text:  currency_code +' - '+ currency_name 
                    }));
                });
                /*
                for(var i=0; i<supported_codes.length; i++) {
                    var currency_code = supported_codes[i][0];
                    var currency_name = supported_codes[i][1];
                    console.log('code: '+ currency_code, 'name: '+ currency_name);
                    
                };
                */
            }
        });
}

    //get_currencies();
    $('#show_converter').on('click', function(){
        $('.modal').modal('show');
    });
    $('#show_quotes').on('click', function(){
        $('.modal').modal('show');
    });
    $('.display_currencies').on('change', function(){
        var right = $('#right_currency').val();
        var left = $('#left_currency').val();
            $.ajax({
                type: 'GET',
                url: "https://v6.exchangerate-api.com/v6/50be37966a920483c35442bd/pair/"+left+"/"+right+"",
                dataType: 'json',
                success: function(data){
                    $('#conversion_rate').val(data.conversion_rate);
                }
           });
    });

    $('#form_converter').on('submit', function(e){
        e.preventDefault();
        var right = $('#right_currency').val();
        var left = $('#left_currency').val();
        var amount = $('#conversion_amount').val();
        $.ajax({
            type: 'GET',
            url: "https://v6.exchangerate-api.com/v6/50be37966a920483c35442bd/pair/"+left+"/"+right+"/"+amount+"",
            dataType: 'json',
            success: function(data){
                $('#conversion_output').html(
                `<strong>1</strong> `+left+` = <strong>`+data.conversion_rate+`</strong> `+ right +`<br/> Total: 
                <strong>`+data.conversion_result+`</strong> `+ right);
                $('#conversion_output').show();
            }
       });
    });
});