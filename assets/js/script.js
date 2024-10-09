//工具提示
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// 搜索跳转
function searchTag() {
  var inputValue = document.getElementById('searchInput').value;
  jump(inputValue);
}

// 跳转路径
function jump(value) {
  if (value) {
    window.location.hash = value.trim();
  }
}

