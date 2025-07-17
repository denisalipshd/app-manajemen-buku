document.addEventListener("DOMContentLoaded", function () {
    const deleteForm = document.querySelectorAll(".form-delete");

    deleteForm.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
