<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Table Example</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body>

    <h2>All test</h2>
    <div style="margin-bottom: 20px; display: flex; justify-content: flex-end ;margin-right: 10px">
        <button><a href="{{ route('create') }}">Add Test</a></button>
    </div>
    <br>
    @if (sizeof($tests) > 0)
        <table>
            <thead>
                <tr>    
                    <th>#</th>
                    <th>Title</th>
                    <th>description</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $test)
                    <tr class="rowOffer{{ $test->id }}">
                        <th>{{ $test->id }}</th>
                        <th>{{ $test->title }}</th>
                        <th>{{ $test->description }}</th>
                        <th><img src="{{ asset('storage/' . $test->photo) }}" style="max-width: 200px;"> </th>
                        <th>
                            <a href="{{ route('edit', $test->id) }}">
                                <button class=" updateBtn">
                                    Edit
                                </button>
                            </a>
                            <button data-id="{{ $test->id }}" class="btn btn-danger deleteBtn"> Delete </button>
                        </th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @else
    <table>
        <thead>
            <tr>    
                <th>#</th>
                <th>Title</th>
                <th>description</th>
                <th>image</th>
                <th>action</th>
            </tr>
        </thead>
    </table>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- delete Ajax --}}
    <script>
        $(document).ready(function() {
            $('.deleteBtn').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({

                    method: 'post',
                    url: "{{ route('delete') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,

                    },
                    success: function(data) {
                        if (data.status == '200') {
                            $('.rowOffer' + data.id).remove();

                        }

                    },
                    error: function(url) {

                    },

                    cache: false,
                });
            });
        });
    </script>


</body>

</html>
