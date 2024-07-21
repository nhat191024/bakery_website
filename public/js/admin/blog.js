const options = {
    placeholder: (typeof detail !== 'undefined' ? '' : 'Nội dung blog...!'),
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
    var quill_en = new Quill('#editor_en', options);
    if (typeof blogContent !== 'undefined') {
        quill.root.innerHTML = blogContent;
    }
    if (typeof blogContent_en !== 'undefined') {
        quill_en.root.innerHTML = blogContent_en;
    }
    (typeof detail !== 'undefined' ? quill.enable(false):quill.enable(true));
    (typeof detail !== 'undefined' ? quill_en.enable(false):quill_en.enable(true));
}

const title = $('#title');
const subtitle = $('#subtitle');
// const content = $('#content');
const id = $('#id');

$(document).ready(function () {
    // $('#blogForm').on('submit', function (e) {
    //     e.preventDefault();
    // });
    $('#blogEditForm').on('submit', function (e) {
        e.preventDefault();
        edit(e);
    });
    $('#blogAddForm').on('submit', function (e) {
        e.preventDefault();
        add(e);
    });
})

function appendForm(formData){
    formData.append('_token', csrfToken);
    formData.append('title', $('#title').val());
    formData.append('title_en', $('#title_en').val());
    formData.append('subtitle', $('#subtitle').val());
    formData.append('subtitle_en', $('#subtitle_en').val());
    formData.append('content', quill.root.innerHTML);
    formData.append('content_en', quill_en.root.innerHTML);
    formData.append('thumbnail', $('#customFile')[0].files[0]);
    return formData;
}

function edit(e) {
    const form = e.target.form;
    let formData = new FormData(form);
    formData = appendForm(formData);
    formData.append('id', id.val());

    $.ajax({
        url: "/admin/blog/edit",
        method: "POST",
        data: formData,
        beforeSend: function() {
            $('#saveEdit').text('Đang lưu...');
        },
        error: function () {
            $('#error').text('Lỗi, vui lòng kiểm tra lại thông tin');
            $('#saveEdit').text('Lưu lại');
        },
        success: function (data) {
            window.location.href = '/admin/blog/detail/'+id.val();
        },
        cache: false,
        contentType: false,
        processData: false
    });

}
function add(e) {
    const form = e.target.form;
    let formData = new FormData(form);
    formData = appendForm(formData);

    $.ajax({
        url: "/admin/blog/add",
        method: "POST",
        data: formData,
        beforeSend: function() {
            $('#saveEdit').text('Đang lưu...');
        },
        error: function (data) {
            $('#error').text('Lỗi, vui lòng kiểm tra lại thông tin');
            $('#saveEdit').text('Lưu lại');
        },
        success: function (data) {
            window.location.href = '/admin/blog/detail/'+data;
        },
        cache: false,
        contentType: false,
        processData: false
    });

}





