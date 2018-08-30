// $(document).ready( function () {
//     $('#file').on('submit', function () {
//         img = $('#file')[0].files[0];
//
//         form_data = new FormData();
//         form_data.append('image', img);
//
//         $.ajax({
//             url: "/uploads",
//             type: "POST",
//             headers: {
//                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
//             },
//             data: { image: form_data.get('image') },
//             contentType: 'multipart/form-data',
//             processData:false,
//             success: function( response )
//             {
//                 console.log(response)
//             },
//             error: function(errors)
//             {
//                 console.log(errors)
//             }
//         });
//
//         return false;
//     });
//     return false;
// })
//
// function sendAjax( url, image, method) {
//     $.ajax({
//         url: routeName,
//         type: method,
//         dataType: false,
//         headers: {
//             'X-CSRF-TOKEN': $('input[name="_token"]').val()
//         },
//         data: dataForm,
//
//         success: function (response) {
//
//             alert('Категория ' + response.data.name + ' успешно добавлена');
//             $('#myModal').modal('hide');
//
//             drawTrTableAjax(response.id, response.data.name, response.data.description);
//
//         },
//
//         error: function (error) {
//             alert( error.status +' Ошибка' );
//         }
//     });
// }