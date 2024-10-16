document.getElementById('document').addEventListener('change', function () {
    const fileName = this.files[0].name;
    const title = fileName.split('.').slice(0, -1).join('.');

    document.getElementById('title').value = title;
});

document.getElementById('updateLampiran').addEventListener('click', function () {
    document.getElementById('updateLampiran').style.display = 'none';

    const attachmentDiv1 = document.createElement('div');
    attachmentDiv1.className = 'mb-3';

    const attachmentDiv2 = document.createElement('div');
    attachmentDiv2.className = 'mb-3';
    attachmentDiv2.id = 'fileLampiran';

    const attachmentDiv3 = document.createElement('div');
    attachmentDiv3.className = 'mb-3 d-flex justify-content-start';

    const batalButton = document.createElement('button');
    batalButton.type = 'button';
    batalButton.textContent = 'Batal';
    batalButton.className = 'btn mx-2 btn-danger';
    batalButton.addEventListener('click', function () {
        attachmentDiv1.remove();
        document.getElementById('updateLampiran').style.display = 'block';
    });

    const tambahLampiranButton = document.createElement('button');
    tambahLampiranButton.type = 'button';
    tambahLampiranButton.textContent = 'Tambah Lampiran';
    tambahLampiranButton.className = 'btn btn-primary';
    tambahLampiranButton.id = 'addLampiran';
    tambahLampiranButton.addEventListener('click', function () {
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

    attachmentDiv1.appendChild(attachmentDiv2);
    attachmentDiv1.appendChild(attachmentDiv3);
    attachmentDiv3.appendChild(tambahLampiranButton);
    attachmentDiv3.appendChild(batalButton);

    document.getElementById('ubahLampiran').appendChild(attachmentDiv1);
});