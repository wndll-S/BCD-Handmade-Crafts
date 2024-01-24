$('#categories').hover(function() {
    $('#dropdown-example').css('display', 'block');
}, function() {
    $('#dropdown-example').css('display', 'none');
});
$('.pop-up').click(function() {
    $title = $(this).data('title');
    $action = $(this).data('action');
    $('#title').html($title);
    $('#account_status').val($action);
});
$('.pop').click(function() {
    $title = $(this).data('title');
    $action = $(this).data('action');
    $('#title').html($title);
    $('#status').val($action);
});

$('#craftspeople_viewer').click(function(){
    $('#buyer_tbl').css('display', 'none');
    $('#seller_tbl').css('display', 'block');
});
$('#buyers_viewer').click(function(){
    $('#buyer_tbl').css('display', 'block');
    $('#seller_tbl').css('display', 'none');
});

$('.category').hover(function() {
    var $id = $(this).data('action');
    console.log($id); // Use console.log for debugging

    $('#' + $id).css('display', 'flex');
}, function() {
    // Handle mouse out if needed
    var $id = $(this).data('action');
    $('#' + $id).css('display', 'none');
});
$('.order').click(function(){
    $id = $(this).data('product');
    $('#product_id').val($id);
});
$('.input').on('input', function(){
    $input = $(this).data('input');
    $preview = $(this).val();
    $('#'+$input).html($preview);
})
$('#price').on('input', function(){
    var inputValue = $(this).val();
    inputValue = inputValue.replace(/[^\d.-]|^[-](?=[\d.-])/g, '');

        // Ensure only up to 2 decimal places are allowed
        var decimalArray = inputValue.split('.');
        if (decimalArray.length > 1) {
            // Limit to 2 decimal places
            decimalArray[1] = decimalArray[1].slice(0, 2);
            inputValue = decimalArray.join('.');
        }

        // Update the input value
        $(this).val(inputValue);
})
$('#quantity').on('keydown', function(event) {
    // Prevent the input of 'e' and '.'
    if (event.key === 'e' || event.key === '.') {
        event.preventDefault();
    }
});
$('#image_url').change(function(e) {
    const file = e.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#image-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
      }
});

$('#total_quantity').on('input', function(){
    $quantity = $(this).val();
    $('#quantity').html($quantity);
    $price = $('#price').text();
    
    $total = $quantity * $price;
    $formattedTotal = $total.toFixed(2);
    $('#total').val($formattedTotal);
});
$('#total_quantity').on('keydown', function(e){
    e.preventDefault();
});
$('.pending').css('display', 'grid');
$('.status').click(function () {
    // Remove the 'active' class from all buttons
    $('.status').removeClass('bg-blue-900');

    // Add the 'active' class to the clicked button
    $(this).addClass('bg-blue-900');

    // Hide all divs with status class
    $('#content .hidden').hide();

    // Get the data-status attribute of the clicked button
    $status = $(this).data('status');

    // Show the div with the corresponding status class
    $('.' + $status).css('display', 'grid');
});
$('.view').click(function () {
    // Remove the 'active' class from all buttons
    $('.view').removeClass('bg-white');

    // Add the 'active' class to the clicked button
    $(this).addClass('bg-white');
});

// $('#to_date').attr('min', new Date().toISOString().split('T')[0]);
var currentDate = new Date().toISOString().split('T')[0];
$('#from_date, #to_date').attr('max', currentDate);
        // Listen for changes in the "From" date input
        $('#from_date').on('input', function () {
            // Get the selected date
            var fromDate = new Date($(this).val());
            var nextDay = new Date(fromDate);
            nextDay.setDate(fromDate.getDate() + 1);

            // Update the "To" date input
            $('#to_date').attr('min', nextDay.toISOString().split('T')[0]);
        });
        $('#saveAsPdfButton').on('click', function() {
            // Trigger the print dialog to save as PDF
            $('.babye').css('display', 'none');
            window.print();
        });
        $(window).on('afterprint', function() {
            $('.babye').css('display', 'block');
            $('#sidebar-multi-level-sidebar').css('display', 'block');
            $('#print').css('display', 'flex');
            $('#lapad').addClass('sm:ml-64');
        });

        $('#sandwich').on('click', function(){
            $('#footer').addClass('z-50');
        });
        $('#print').click(function(){
            $('.tago').css('display', 'none');
            $('#lapad').removeClass('sm:ml-64');
            window.print();
        });

//vanilla js na d
const modalEl = document.getElementById('info-popup');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});

privacyModal.show();

const closeModalEl = document.getElementById('close-modal');
closeModalEl.addEventListener('click', function() {
    privacyModal.hide();
});

const acceptPrivacyEl = document.getElementById('confirm-button');
acceptPrivacyEl.addEventListener('click', function() {
alert('privacy accepted');
privacyModal.hide();
});
// Get the canvas element
const config = {
    type: 'pie',
    data: data,
    options: {
        // Add any additional options here
    }
};
