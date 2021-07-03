<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>

    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            padding-left: 10px;
            padding-right: 10px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: left;
            line-height: 1cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            padding-left: 10px;
            padding-right: 10px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: left;
            line-height: 1cm;
        }
    </style>
</head>

<body>
    <header>
        Test Header
    </header>

    @foreach($laporan as $data)

    <div class="container">
        <div class="row">
            <h4>{{ $data->kegiatan }}</h4>
            <p>{{ $data->keterangan }}</p>
        </div>
    </div>

    @endforeach

    <footer>
        Test Footer
    </footer>
</body>

</html>