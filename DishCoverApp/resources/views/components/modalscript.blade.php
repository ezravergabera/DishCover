@parent
@if(session('success') || session('error') || session('add-success') || session('delete-success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        });
    </script>
@endif