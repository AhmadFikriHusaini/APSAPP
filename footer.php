</div>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/sb-admin-2.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('.fav').on('click', function(e) {
        e.preventDefault();
        var id_user = $(this).attr('user_data');
        var id_buku = $(this).attr('buku_data');
        var aksi = $(this).attr('aksi');
        if (aksi == "favorite") {
            $(this).attr('aksi', 'unfavorite') // Change the div method attribute to Unlike
            $('#' + id_user).replaceWith('<button id="' + id_user +
                '" class="fav btn btn-warning float-end" user_data="' + id_user +
                '" buku_data="' + id_buku +
                '" aksi="favorite"><i class="fa-regular fa-star"></i></button>')
        } else {
            $(this).attr('aksi', 'unfavorite')
            $('#' + id_user).replaceWith('<button id="' + id_user +
                '" class="fav btn btn-outline-warning float-end" user_data="' + id_user +
                '" buku_data="' + id_buku +
                '" aksi="favorite"><i class="fa-regular fa-star"></i></button>')
        }
        $.ajax({
            url: 'proses_fav.php',
            type: 'GET',
            data: {
                id_user: id_user,
                id_buku: id_buku,
                aksi: aksi
            },
            cache: false,
            success: function(data) {}
        });
    });
});
let items1 = document.querySelectorAll('.carousel .carousel-item')

items1.forEach((el) => {
    const minPerSlide = 3
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items1[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
$(document).ready(function() {
    $('.table').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All'],
        ],
    });
});
$('.confirm').click(function() {
    var id = $(this).attr('data-id')
    var judul = $(this).attr('data-judul')
    Swal.fire({
        title: 'Confirmasi',
        text: "apakah anda yakin menghapus data buku dengan judul " + judul + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data Berhasil Di Hapus!!',
                showConfirmButton: false,
                timer: 1500
            })
            window.location = "delete_buku.php?id=" + id;
        }
    })
});
$('.confirm2').click(function() {
    var id = $(this).attr('data-id')
    var email = $(this).attr('data-email')
    Swal.fire({
        title: 'Confirmasi',
        text: "apakah anda yakin menghapus data buku dengan email " + email + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data Berhasil Di Hapus!!',
                showConfirmButton: false,
                timer: 1500
            })
            window.location = "delete_pengguna.php?id=" + id;
        }
    })
});
</script>

</body>

</html>