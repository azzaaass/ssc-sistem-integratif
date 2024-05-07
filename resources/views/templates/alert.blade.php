@if (Session::has('success'))
    <div id="alert-success-container"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative flex justify-between items-center"
        role="alert">
        <p class="text-base">{{ Session::get('success') }}</p>
        <button onclick="alertHaldler('alert-success-container')"><i
                class="text-xl fa-regular fa-rectangle-xmark"></i></button>
    </div>
    <br>
@endif
@if (Session::has('error'))
    <div id="alert-success-container"
        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative flex justify-between items-center"
        role="alert">
        <p class="text-base">{{ Session::get('success') }}</p>
        <button onclick="alertHaldler('alert-success-container')"><i
                class="text-xl fa-regular fa-rectangle-xmark"></i></button>
    </div>
    <br>
@endif

<script>
    function alertHaldler(id) {
        $("#" + id).addClass("hidden");
    }
</script>
