jQuery(function($){
  $('.header_search input[name="s"]').on('keyup', function(){
    var search = $('.header_search input[name="s"]').val();
    if(search.length < 3){
      return false;
    }
    var data = {
      s:search,
      action:'search_action',
      nonce: header_search.nonce
    };
    $.ajax({
      url: header_search.url,
      data :data,
      type: 'POST',
      dataType: 'json',
      beforeSend:function(xhr){
        $('.search-result-close').text('Ищем...');
      },
      success:function(data){
        $('.search-result-close').html('<i class="fa-sharp fa-solid fa-xmark"></i>');
        $('.header_search').css('overflow', 'visible');

        $('.header_search .search-result').html(data.out);
        $('.search-result').addClass('search-result-over');
      }
    });
  });
  $('.search-result-close').click(function () {
    $('.search-result').removeClass('search-result-over');
    $('.search-result').empty();
    $('.header_search input[name="s"]').val('');
  })
});