<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="My Website made from Bootstrap" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Jokes</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('input[name="filter"]').change(function() {
                    var filter_type = $(this).val();
                    $.post('<?= base_url('jokes/filter_jokes') ?>', { filter: filter_type }, function(data) {
                        $('#jokesContainer').html(data);
                    });
                });
            });
        </script>
    </head>
    <body>