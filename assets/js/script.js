//工具提示
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

function sendTagByInput() {
  var tagName = document.getElementById('searchTagInput').value;
  sendTagByName(tagName);
}

function sendTagByName(tagName) {
  $.ajax({
    url: 'searchTag.php',
    type: 'POST',
    data: { name: tagName },

    success: function (response) {
      $('#content').html(response);
    },
    error: function (xhr, status, error) {
      console.log("请求失败：", status, error);
    }
  });
}