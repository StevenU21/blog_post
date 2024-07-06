<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.deleteCommentForm');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Previene el envío del formulario

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "No podrás revertir esto.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, borrarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Procede con el envío del formulario
                        form.submit();
                    }
                });
            });
        });
    });
</script>
