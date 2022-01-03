<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
@if (session('success'))
    <script>
        $(document).ready(function () {
            var message = "{{ session()->get('success') }}"
            toastr.success(message)
        })
    </script>
@endif

@if (session('wrong'))
    <script>
        $(document).ready(function () {
            var message = "{{ session()->get('wrong') }}"
            toastr.error(message)
        })
    </script>
@endif