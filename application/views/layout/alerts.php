<!-- ✅ SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if ($this->session->flashdata('success')): ?>
        Swal.fire({
            toast: true,
            position: 'top-end',   // 🔥 Top Right
            icon: 'success',
            title: "<?= $this->session->flashdata('success'); ?>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    <?php endif; ?>

    <?php if ($this->session->flashdata('failed')): ?>
        Swal.fire({
            toast: true,
            position: 'top-end',   // 🔥 Top Right
            icon: 'error',
            title: "<?= $this->session->flashdata('failed'); ?>",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    <?php endif; ?>
</script>
