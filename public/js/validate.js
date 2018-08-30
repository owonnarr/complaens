$('#uploadImage').validate({
    rules: {
        title: {
            required: true,
            minlength: 4,
            maxlength: 20
        },
        description: {
            required: true,
            minlength: 20,
            maxlength: 200
        },
        image: {
            required: true
        }
    }
});