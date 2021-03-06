jQuery(document).ready(function($) {
    $('#vert-slider > li').hover(
        function () {
            var $this = $(this);
            $this.stop().animate({'height': '300px'}, 500);
            $('.heading', $this).stop(true, true).fadeOut();
            $('.bgDescription', $this).stop(true, true).slideDown(500);
            $('.description', $this).stop(true, true).fadeIn();
        },
        function () {
            var $this = $(this);
            $this.stop().animate({'height': '115px'}, 1000);
            $('.heading', $this).stop(true, true).fadeIn();
            $('.description', $this).stop(true, true).fadeOut(500);
            $('.bgDescription', $this).stop(true, true).slideUp(700);
        }
    );
});