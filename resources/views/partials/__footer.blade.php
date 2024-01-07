<footer class="flex fixed bottom-0 left-0 right-0 bg-gray-50 pt-8 pb-6 sm:z-0 lg:z-50 border-t-2 border-gray-100 shadow-2xl">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-blueGray-500 font-semibold py-1">
                    <a href="#" class="text-blueGray-500 hover:text-gray-800"> BCD Handmade Crafts by
                        <a href="https://www.facebook.com/profile.php?id=100005618328404" class="text-blueGray-500 hover:text-blueGray-800">W. Salleva</a>
                    </a> <br>
                    Copyright © <span id="get-current-year">2024</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
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
    
</script>
</body>
</html>