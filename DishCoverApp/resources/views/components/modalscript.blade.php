@parent
@if(session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
            statusModal.show();
        });
    </script>
@endif