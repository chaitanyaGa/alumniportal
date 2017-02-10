$('.login-input').on('focus', function() {
  $('.login').addClass('focused');
});

$('.login').click(function(){
	$.ajax({
  url: "../login.php",
  complete: function(){
             
$('.login').on('submit', function(e) {
  e.preventDefault();
  $('.login').removeClass('focused').addClass('loading');
})
setTimeout(function() {
        $('.login').removeClass('loading');
    }, 10000)
	})
	});