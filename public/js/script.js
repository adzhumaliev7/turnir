$('.toggle-menu').click(function(){
    $(this).toggleClass('active');
    $('#menu').toggleClass('open');
  });


  $('.main__link').click(function() {
          $('#menu').removeClass('open');
          $('.toggle-menu').removeClass('active');

          $('.toggle-click').css('visibility', 'visible');

      })
  $('.toggle-menu02').click(function() {

      $('.toggle-menu').removeClass('active');

      $('#menu').toggleClass('open');

      $('.toggle-click').css('visibility', 'visible');

  })
  $('.toggle-click').click(function() {

      $(this).css({'visibility':'hidden','transition':'visibility 0.3s ease 0s'});

  })
  // toggle-menu03 active toggle-menu02


  let deleteBtn = document.querySelector('.txt-delete');
  let GamerBlock = document.querySelector('.gamer-delete');

  deleteBtn.addEventListener('click', () => {
    GamerBlock.remove();
  })
