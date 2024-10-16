const formatDate = (dateStr) => {
    const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    const dateObj = new Date(dateStr);
    const day = dateObj.getDate();
    const month = months[dateObj.getMonth()];
    const year = dateObj.getFullYear();

    return `${day} ${month} ${year}`;
};

$(document).ready(function () {
    $.ajax({
        url: "/announcements/fetchcpns",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="${base_url}assets/docs/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
                            if (value.title === document.title && value.documents.length > 1) {
                                lampiran = lampiran + '<br>';
                            }
                        });
                        return lampiran;
                    })()
                    + `</td>
                        <td>${value.content}</td>
                        <td>${formatDate(value.publish_date)}</td>
                        </tr>`;
            });
            $('#cpnsTable tbody').html(rows);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: "/announcements/fetchpppk",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="${base_url}assets/docs/pppk/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
                            if (value.title === document.title && value.documents.length > 1) {
                                lampiran = lampiran + '<br>';
                            }
                        });
                        return lampiran;
                    })()
                    + `</td>
                        <td>${value.content}</td>
                        <td>${formatDate(value.publish_date)}</td>
                        </tr>`;
            });
            $('#pppkTable tbody').html(rows);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: "/announcements/fetchallcpns",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="${base_url}assets/docs/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
                            if (value.title === document.title && value.documents.length > 1) {
                                lampiran = lampiran + '<br>';
                            }
                        });
                        return lampiran;
                    })()
                    + `</td>
                        <td>${value.content}</td>
                        <td>${formatDate(value.publish_date)}</td>
                        <td>${value.category}</td>
                        <td>`+
                    (() => {
                        if (value.is_active == 1) {
                            return `<span class="badge bg-success">Active</span>`;
                        } else {
                            return `<span class="badge bg-danger">Inactive</span>`;
                        }
                    })()
                    + `</td>
                        <td style="min-width: 110px;">
                        <div class="d-flex justify-content-between">
                        <a href="${base_url}update_announcement/${value.id}" type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <button class="btn btn-danger" onclick="showDeleteModal(${value.id})"><i class="bi bi-trash"></i></button>
                        </div>
                        </td>
                        </tr>`;
            });
            $('#cpnsTableAdmin tbody').html(rows);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: "/announcements/fetchallpppk",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="${base_url}assets/docs/pppk/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
                            if (value.title === document.title && value.documents.length > 1) {
                                lampiran = lampiran + '<br>';
                            }
                        });
                        return lampiran;
                    })()
                    + `</td>
                        <td>${value.content}</td>
                        <td>${formatDate(value.publish_date)}</td>
                        <td>${value.category}</td>
                        <td>` +
                    (() => {
                        if (value.is_active == 1) {
                            return `<span class="badge bg-success">Active</span>`;
                        } else {
                            return `<span class="badge bg-danger">Inactive</span>`;
                        }
                    })()
                    + `</td>
                        <td style="min-width: 110px;">
                        <div class="d-flex justify-content-between">
                        <a href="${base_url}update_announcement/${value.id}" type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <a href="${base_url}delete_announcement/${value.id}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </div>
                        </td>
                        </tr>`;
            });
            $('#pppkTableAdmin tbody').html(rows);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});