<div>
    <section class="flex items-center justify-center bg-white">
        <button id='open' class="px-4 py-2 mx-4 font-bold text-white bg-blue-500 rounded pc hover:bg-blue-700">
            Add Employee
        </button>

        <div id="modalOverlay" style="display:none;">
            <div id="modal" class="max-w-2xl rounded-2xl">
                <div class="flex items-center w-full px-4 py-2 border-b">
                    <h1 class="pt-4 mx-6 text-xl font-semibold text-center text-black">Add Employee
                    </h1>
                    <button id="close"
                        class="absolute top-0 p-1 m-4 rounded-full right-1 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-black"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="">
                    <div class="p-5">


                        <form id="addEmployeeForm">
                            @csrf
                            <!-- This generates the CSRF token -->

                            <!-- Since you are using POST in your route -->
                            <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
                                <x-input type='text' attribute='first_name' label="First Name" />

                                <x-input type='text' attribute='last_name' label="Last Name" />
                                <x-input type='text' attribute='middle_name' label="Middle Name" />


                                <x-select attribute='gender' label="Gender" :options="
                                        [
                                           [ 'value'=>'male','label'=>'Male'],
                                           [ 'value'=>'female','label'=>'Female'],
                                           [ 'value'=>'others','label'=>'others']
                                        ]" />
                                <x-input type='date' attribute='birth_date' label="Birthdate" />

                                <x-select attribute='status' label="Status" :options="
                                        [
                                            [ 'value'=>'active','label'=>'Active'],
                                            [ 'value'=>'awol','label'=>'AWOL'],
                                            [ 'value'=>'inactive','label'=>'Inactive']
                                        ]" />


                            </div>



                            <div class="flex justify-end" id="submitEmployee">
                                <button type='submit'
                                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                    Submit
                                </button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<style>
    #modalOverlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 9999;
    }

    #modal {
        position: fixed;
        width: 90%;
        top: 55%;
        left: 50%;
        text-align: center;
        background-color: #fafafa;
        box-sizing: border-box;
        opacity: 0;
        transform: translate(-50%, -50%);
        transition: all 300ms ease-in-out;
    }

    #modalOverlay.modal-open #modal {
        opacity: 1;
        top: 50%;
    }
</style>

<script>
    $('#open').click(function() {
  $('#modalOverlay').show().addClass('modal-open');
});

$('#close').click(function() {
  var modal = $('#modalOverlay');
  modal.removeClass('modal-open');
  setTimeout(function() {
    modal.hide();
  },200);
});


$(document).ready(function() {
    $('#submitEmployee').click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        let formData = {
            first_name: $('input[name="first_name"]').val(),
            last_name: $('input[name="last_name"]').val(),
            middle_name: $('input[name="middle_name"]').val(),
            gender: $('select[name="gender"]').val(),
            birth_date: $('input[name="birth_date"]').val(),
            status: $('select[name="status"]').val(),
            _token: $('input[name="_token"]').val(), // CSRF token
        };

        $.ajax({
            url: "{{ route('admin.store-employee') }}", // The route to your store function
            type: "POST",
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert('Employee added successfully!');
                    $('#addEmployeeForm')[0].reset(); // Reset the form
                    $('#modalOverlay').removeClass('modal-open').hide(); // Close modal
                } else {
                    alert('Failed to add employee. Please try again.');
                }
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;

                // Clear previous error messages
                $('.text-red-500').html(''); // Clears all existing error messages

                // Display error messages
                $.each(errors, function(key, value) {
                    $('#' + key).siblings('.text-red-500').html(value[0]); // Insert the error message next to the input field
                });
            }

        });
    });
});

</script>
