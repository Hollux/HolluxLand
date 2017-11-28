//TEST TEST TEST TEST
/*function messageTest(type, json){

 // POST
 if(type == 'post')
 {
 var message =  $('#message').val();

 if(message != '')
 {
 $.ajax({
 url: routeAjax,
 data : {type:'post', data: message},
 type: 'POST',
 dataType: 'json',
 success: function(json){   
 messageTest('maj', json);
 $('#message').val('');
 }
 });  
 }
 }
 // UPDATE
 if(type == 'maj')
 {
 $.each(json.success, function() { // et  boucle sur la réponse contenu dans la variable passé à la function du success "json"

 if(!inArray(this.id,arrayId)) {

 $('#chat').last().append('<p>'+ this.time + ' [' + this.author + ']: '+ this.content + '</p>');
 arrayId.push(this.id);
 }
 }); 

 $.each(json.error, function() {
 alert(this);
 });
 }
 }*/
// FIN TEST TEST TEST TEST