<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>

<body>
    <div class="container">
        <input class="search form-control" type="text" placeholder="Search here...">
    </div>
    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.search').typeahead({
            source: function(str, process) {
                return $.get(path, {
                    str: str
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
</body>

</html>