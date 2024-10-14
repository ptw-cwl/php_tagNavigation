<footer class="user-select-none">
    <div class="position-fixed bottom-0 end-0 m-5 opacity-75">
        <!-- 回到顶部按钮 -->
        <button type="button" class="btn btn-primary shadow-lg my-1" onclick="scrollToTop('main')">回到顶部</button>
        <!-- 回到底部按钮 -->
        <button type="button" class="btn btn-secondary shadow-lg my-1" onclick="scrollToBottom('main')">回到底部</button>
    </div>
    <div class="bg-dark text-white-50 text-center p-2">&copy; <?= date('Y') ?> 版权所属: <?= AUTHOR ?></div>
</footer>