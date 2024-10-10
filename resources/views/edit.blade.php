<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Form</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <center>
        <h1>Edit Form</h1>
        <form id="updatepost">
            @csrf
            <input type="hidden" name="id" value="{{ $test->id }}">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $test->title }}">
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" name="description" value="{{ $test->description }}">
            </div>
            <div>
                <label for="photo">Photo</label>
                <input type="file" name="photo">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </center>

    <script>
        $(document).ready(function() {
            $('#updatepost').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                $.ajax({
                    method: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{ route('update') }}", // Make sure this URL is correct according to your routes in Laravel
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,

                    success: function(data) {
                        if (data.status == 'true') {
                            window.location.href = data.redirect;
                        } else {
                            alert(data.error);
                        }
                    },
                    error: function(error) {
                    
                    }
                });
            });
        });
    </script>
</body>
</html>
