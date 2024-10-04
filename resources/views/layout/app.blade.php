<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .custom-table-row>th {
            border-style: none;
        }

        .custom-table-row a {
            text-decoration: none;
            color: #000000
        }

        .custom-table-row th:hover {
            background-color: yellow;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // Function to handle click event on <th>
        function handleClick(event) {

            let url = "";

            if (event.target.innerText === "Table") {
                // Laravel route URL for JS
                url = "{{ route('standing') }}";
            }
            if (event.target.innerText === "Fixtures") {
                // Laravel route URL for JS
                url = "{{ route('fixture') }}";
            }

            window.location.href = url;

        }

        // Add click event listener to each <th> element
        document.querySelectorAll('th').forEach(th => {
            th.addEventListener('click', handleClick);
        });

    </script>
</body>

</html>
