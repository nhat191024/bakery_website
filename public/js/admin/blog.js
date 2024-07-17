const options = {
    placeholder: 'Nội dung blog...!',
    theme: 'snow',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote'],
            ['link', 'image', 'video', 'formula'],

            // [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'list': 'check' }],
            // [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],

            [{ 'size': ['small', false, 'large', 'huge'] }],
            // [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']
        ]
    }
};

var editorContainer = document.getElementById('editor');
if (editorContainer) {
    var quill = new Quill('#editor', options);
    quill.root.innerHTML = blogContent;
}

const title = $('#title');
const subtitle = $('#subtitle');
// const content = $('#content');
const id = $('#id');

$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
    });
})

function edit() {
    $.ajax({
        url: "/admin/blog/edit",
        method: "POST",
        data: {
            _token: csrfToken,
            'title': title.val(),
            'subtitle': subtitle.val(),
            'content': quill.root.innerHTML,
            'id': id.val()
        },
        success: function (data) {
            window.location.reload();
        }
    });
}





