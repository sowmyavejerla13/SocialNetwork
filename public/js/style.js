$('.post').find('.interaction').find('.edit').on('click',function(){
   event.preventDefault();
   var postId = 0;
   var postElementBody = event.target.parentNode.parentNode.childNodes[1];
   var postBody = postElementBody.textContent;
	postId = event.target.parentNode.parentNode.dataset['postid'];
	// console.log(postBody);
	$("#post-body").val(postBody);
	$('#editmodal').modal();
	
	$('#modal-save').on('click',function(){

		$.ajax({
			method: 'post',
			url:urledit,
			data:{body: $("#post-body").val(),postId:postId,_token:token}
		}).done(function(msg){
			$(postElementBody).text(msg['msg-body']);
			$('#editmodal').modal('hide');
		})
	});

	
});
	$('.like').on('click', function(event) {
    	event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset['postid'];
		var isLike = event.target.previousElementSibling == null ? true:false;
		$.ajax({
			 method: 'post',
			 url : urllike,
			 data: {isLike: isLike, postId: postId, _token: token}
		}).done(function(msg){
			console.log(msg);
 			event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
 			msg['msg-body'] = isLike ? event.target.innerText == 'Like' ? msg['msg-body']++ : msg['msg-body']-- : event.target.innerText == 'Dislike' ? msg['msg-body']-- : msg['msg-body']++;
 			$('.red').text(msg['msg-body']);
            if (isLike) {
            	
                event.target.nextElementSibling.innerText = 'Dislike';
                
            } else {
            	event.target.previousElementSibling.innerText = 'Like';
                
            }
                       

		});
		
	});