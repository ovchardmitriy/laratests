(function ($) {

    var socket = io.connect('http://localhost:3000'),
        $visitorsNum = $('#visitors-num');

    socket.emit('join', {room: 'common'});

    socket.on('clients', function (data) {
        $visitorsNum.text(data.clientsNum);
    });

    $('[data-article]').each(function (index, element) {
        var $article = $(element),
            id = $article.data('article'),
            socket = io.connect('http://localhost:3000');

        socket.emit('join', {room: 'article_' + id});

        socket.on('clients', function (data) {
            $article.find('.visitors').text(data.clientsNum);
        });
    });

})(jQuery);