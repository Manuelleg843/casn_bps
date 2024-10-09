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
            console.log(response);
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="assets/docs/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
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
            console.log(response);
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>` +
                    (() => {
                        let lampiran = '';
                        value.documents.forEach(function (document) {
                            lampiran = lampiran + `<a href="assets/docs/pppk/${document.file_path}" target="_blank" rel="noopener noreferrer"> ${document.title}</a> <br>`;
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