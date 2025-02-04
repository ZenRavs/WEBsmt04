<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tombol Highlight dan Pemuatan Halaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-4 mb-2">
                <button class="btn btn-primary" id="btn-halaman1">Halaman 1</button>
            </div>
            <div class="col-sm-4 mb-2">
                <button class="btn btn-secondary" id="btn-halaman2">Halaman 2</button>
            </div>
            <div class="col-sm-4 mb-2">
                <button class="btn btn-secondary" id="btn-halaman3">Halaman 3</button>
            </div>
        </div>
        <div class="container mt-3" id="konten-utama">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Menambahkan event click pada tombol
            $('#btn-halaman1').click(function() {
                tampilkanHalaman('halaman1');
            });

            $('#btn-halaman2').click(function() {
                tampilkanHalaman('halaman2');
            });

            $('#btn-halaman3').click(function() {
                tampilkanHalaman('halaman3');
            });

            // Fungsi untuk menampilkan halaman
            function tampilkanHalaman(halaman) {
                // Reset highlight pada semua tombol
                $('.btn').removeClass('btn-primary').addClass('btn-secondary');

                // Berikan highlight pada tombol yang diklik
                $(`#btn-${halaman}`).removeClass('btn-secondary').addClass('btn-primary');

                // Muat konten halaman yang sesuai
                $('#konten-utama').load(`halaman-${halaman}.html`);
            }
        });
    </script>
</body>

</html>