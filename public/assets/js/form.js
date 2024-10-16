document.getElementById('addLampiran').addEventListener('click', function () {
    const attachmentDiv = document.createElement('div');
    attachmentDiv.className = 'mb-3 d-flex align-items-center';

    // Buat input file baru
    const newFileInput = document.createElement('input');
    newFileInput.type = 'file';
    newFileInput.name = 'file_lampiran[]';
    newFileInput.id = 'file_lampiran';
    newFileInput.className = 'form-control';

    // Buat tombol untuk menghapus input lampiran
    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.textContent = 'Hapus';
    removeButton.className = 'btn btn-danger ms-2';
    removeButton.addEventListener('click', function () {
        attachmentDiv.remove();
    });

    // Tambahkan input lampiran dan tombol hapus ke dalam div
    attachmentDiv.appendChild(newFileInput);
    attachmentDiv.appendChild(removeButton);

    // Tambahkan div ke dalam div #fileAttachments
    document.getElementById('fileLampiran').appendChild(attachmentDiv);
});

document.getElementById('document').addEventListener('change', function () {
    const fileName = this.files[0].name;
    const title = fileName.split('.').slice(0, -1).join('.');

    document.getElementById('title').value = title;
});