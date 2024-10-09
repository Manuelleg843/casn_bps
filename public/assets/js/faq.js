
$(document).ready(function () {
    $.ajax({
        url: "/faq/fetch",
        type: "GET",
        dataType: "json",
        success: function (response) {
            console.log(response);
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