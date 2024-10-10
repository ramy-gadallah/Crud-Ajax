<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>


<body>
    <center>
            <h1>Creat Form</h1>
        <form id="test">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" name="title">
            </div>
            <div>
                <label for="title">Description</label>
                <input type="text" name="description">
            </div>
            <div>
                <label for="title">photo</label>
                <input type="file" name="photo">
            </div>

            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </center>
</body>

<script>
    $(document).ready(function() {
        $('#test').on('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this); //  اللى عندى ف الفورم فى متغير inputs هنا بحط كل ال 

            $.ajax({
                method: "POST", // طريقة الطلب
                enctype: 'multipart/form-data', // لو هرفع صورة او ملف
                url: "{{ route('test.store') }}", // بتاعى  route دا اسم ال
                data: formData, // تتحط هنا  formData هنا الداتا اللى جايالى من المتغير 
                processData: false,
                contentType: false,
                cache: false,

                success: function(data) {
                    if (data.status == 'true') {
                        window.location.href = data.redirect;
                        // alert(data.success);
                    }
                },
                error: function(rejected) {}
            });
        });
    });
</script>

</html>
