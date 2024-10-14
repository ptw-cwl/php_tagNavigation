//默认标签
$(document).ready(function () {
  sendTagByName('书签栏');
})


//工具提示
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// 回到顶部函数
function scrollToTop(scrollTarget) {
  if (scrollTarget) {
    const targetElement = document.querySelector(scrollTarget);
    targetElement.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  } else {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

}

// 回到底部函数
function scrollToBottom(scrollTarget) {
  if (scrollTarget) {
    const targetElement = document.querySelector(scrollTarget);
    targetElement.scrollTo({
      top: targetElement.scrollHeight,
      behavior: 'smooth'
    });
  } else {
    window.scrollTo({
      top: document.body.scrollHeight,
      behavior: 'smooth'  // 平滑滚动
    });
  }
}

//输入框标签请求
function sendTagByInput() {
  var tagName = document.getElementById('searchTagInput').value;
  sendTagByName(tagName);
}

//标签请求
function sendTagByName(tagName) {
  $.ajax({
    url: 'api/searchTag.php',
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

//设置main高度
function setMainHeight() {
  const navHeight = document.querySelector('nav').offsetHeight;
  const footerHeight = document.querySelector('footer').offsetHeight;
  const main = document.querySelector('main');
  const windowHeight = window.innerHeight;
  main.style.height = `${windowHeight - navHeight - footerHeight}px`;
}

// 初始化main高度
setMainHeight();
// 监听窗口大小变化
window.addEventListener('resize', setMainHeight);