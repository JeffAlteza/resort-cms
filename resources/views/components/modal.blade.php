
@if(isset($success) && $success)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Show the modal by replacing "hidden" with "flex"
            var modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    </script>
@endif
<div id="modal" class="fixed hidden inset-0 bg-opacity-75 z-50  items-center justify-center">
    <!-- Modal content -->
    <div class="bg-white w-2/5 p-6 pb-2 rounded-lg shadow-lg transform translate-x-0 translate-y-[-30%]">
        <!-- Modal header -->
        <div class="mb-4 flex justify-between items-center">
            <h2 class="text-xl font-bold text-sky-800">Inquiry Sent!</h2>
            {{-- <button id="closeModal" class="text-sky-700 hover:text-sky-900 text-lg font-bold">
                &times;
            </button> --}}
        </div>
        <!-- Modal body -->
        <p class="text-gray-700 mb-4">Thank you for reaching out! Your inquiry is important to us. Expect a prompt
            response
            via email, call, or text shortly.</p>
        <hr class="bg-sky-900">
        <div class="flex justify-end mt-2 mr-2">
            <a href="/"
                class="inline-flex justify-center items-center py-2 px-5 text-lg  text-center text-sky-600 rounded-lg bg-white border border-sky-600 hover:bg-sky-600 hover:text-white focus:ring-4 focus:ring-gray-400">
                Close
            </a>
        </div>
    </div>
</div>
