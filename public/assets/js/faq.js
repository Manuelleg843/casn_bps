
$(document).ready(function () {
    $.ajax({
        url: "/faq/fetch",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let list = '';
            let no = 1;
            $.each(response, function (key, value) {
                list += `<li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq${no}">${no}. ${value.question} <i
                        class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq${no++}" class="collapse" data-bs-parent=".faq-list">
                        ${value.answer}
                        </div>
                        </li>`;
            });
            $('#faq-list li').html(list);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: "/faq/fetch",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let rows = '';
            let no = 1;
            $.each(response, function (key, value) {
                rows += `<tr>
                        <td>${no++}</td>
                        <td>${value.question}</td>
                        <td>${value.answer}</td>
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
                        <a href="/edit_announcements/${value.id}" type="button" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <a href="/delete_announcements/${value.id}" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </div>
                        </td>
                        </tr>`;
            });
            $('#faqTableAdmin tbody').html(rows);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});