var url = 'http://localhost/Actividades/masterPhp/clonInstagram/public/';

window.addEventListener("load", function(){

   // boton like
   function like() {
       
       $('.btn-like').unbind('click').click(function(){
    
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url + 'img/heartR.png');

            $.ajax({

                url: url + 'like/' + $(this).data('id'),
                type: 'GET',
                success: function(response){

                    if(response.like){

                        console.log('has dado like a la publicación');

                    }else{

                        console.log('error');
                    }
                }
            });

            dislike();
       });
   }
   
   like();

    // boton dislike
    function dislike() {
        
        $('.btn-dislike').unbind('click').click(function(){
    
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url + 'img/heart.png');

            $.ajax({

                url: url + 'disLike/' + $(this).data('id'),
                type: 'GET',
                success: function(response){

                    if(response.like){

                        console.log('has dado dislike a la publicación');

                    }else{

                        console.log('error');
                    }
                }
            });

            like();
       });
    }

    dislike();


    // buscador
    $('#buscador').submit(function(e){

        $(this).attr('action', url + '/gente/' + $('#buscador #search').val());
    });


});