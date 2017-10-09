$(document).ready(() => {
  refresh_chat();
  setInterval('refresh_chat()', 5000);

  $('#form').on('submit', (e) => {
    e.preventDefault();
    const message = $('#inputMessage');
    if ($.trim(message.val()) == '')	return alert("Message can't be empty");

    $.post('../libs/misc.php', { message: message.val(), type: 'submit', req }, (result) => {
      if (result != '') alert(result);
      message.val('');
      refresh_chat();
    });
  });
});

function refresh_chat() {
  $.post('../libs/misc.php', { type: 'getLog', req }, (result) => {
    const chat_block = $('#chat');
    chat_block.html('');
    $.each(result, (index, value) => {
      let block_class = 'panel-default';
      if ($.cookie('username') == value[1]) block_class = 'panel-danger';
      const block = $('<div />', {
        class: `panel ${block_class}`,
      }).appendTo(chat_block);

      $('<div />', {
        class: 'panel-heading',
        text: `${value[1]} (${value[0]})`,
      }).appendTo(block);

      $('<div />', {
        class: 'panel-body',
        text: value[2],
      }).appendTo(block);
    });
  }, 'json');
}
