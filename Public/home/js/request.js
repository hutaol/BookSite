

function getBanners(type=0) {
    $.ajax({
        url: 'Api/banner',
        data: "type=" + type,
        type: 'GET',
        cache: false,
        dataType: "JSON",
        success: function (data) {

            console.log('dddd: '+data);
            return data;
        }
    });
}
