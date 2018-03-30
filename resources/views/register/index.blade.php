@extends('layouts.app')

@section('content')
    <div id="content">
        @include('register.producer-first')
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('click', 'button#first-step, button#second-step, button#submit', function(e) {
            var id = $(this).attr('id'),
                data = $(this).parents('form').serialize();
            $.post('register/' + id, data, function(response) {
                if (response == 'true') {
                    location.href = '/admin/users';
                } else {
                    $('#content').html(response);
                }
            });
            e.preventDefault();
        });
        $(document).on('change', '[name="role"]', function(e) {
            var role = $(this).val(),
                data = $(this).parents('form').serialize();
            $.post('register/first-step', data, function(response) {
                $('#content').html(response);
            });
        });
    </script>
@endsection
