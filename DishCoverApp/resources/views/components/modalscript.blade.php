@parent
@if(session('success') || session('error') || session('add-success') || session('delete-success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();

            // Change back button behavior if modal is shown
            let backButton = document.getElementById("back-button");
            if (backButton) {
                backButton.setAttribute("onclick", "window.history.go(-2);");
            }
        });
    </script>
@endif