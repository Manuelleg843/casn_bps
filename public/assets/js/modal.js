function showDeleteModal(dataId) {
    // Set action form di modal dengan ID yang didapat
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = `${base_url}delete_announcement/${dataId}`; // Ganti 'controller' dengan nama controller Anda

    // Tampilkan modal
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}
